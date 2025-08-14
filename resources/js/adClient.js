// <!-- Container penempatan -->
// <div id="ad-header" data-placement="header"></div>
// <div id="ad-sidebar" data-placement="sidebar"></div>
// <div id="ad-inline" data-placement="inline"></div>
// <div id="ad-audio" data-placement="audio"></div>


// Util sederhana
const AdSDK = (() => {
  const apiBase = '/api';

  function sessionId(){
    const key = 'ad_session_id';
    let id = localStorage.getItem(key);
    if(!id){ id = Math.random().toString(36).slice(2); localStorage.setItem(key,id); }
    return id;
  }

  async function fetchAds(placement, limit=5){
    const res = await fetch(`${apiBase}/ads?placement=${encodeURIComponent(placement)}&limit=${limit}`);
    return await res.json();
  }

  async function track(adId, event){
    try {
      await fetch(`${apiBase}/ads/event`, {
        method: 'POST', headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ ad_id: adId, event, session_id: sessionId() })
      });
    } catch(e) { /* ignore */ }
  }

  function renderAd(ad){
    let el = document.createElement('div');
    el.className = 'ad-item';

    const clickWrapOpen = ad.link_url ? `<a href="${ad.link_url}" target="_blank" rel="noopener">` : '';
    const clickWrapClose = ad.link_url ? `</a>` : '';

    if(ad.type === 'image' || ad.type === 'popup'){
      el.innerHTML = `${clickWrapOpen}<img src="${ad.url}" style="max-width:100%;height:auto;display:block;"/>${clickWrapClose}`;
    } else if(ad.type === 'video'){
      el.innerHTML = `
        <video ${ad.autoplay? 'autoplay muted' : ''} controls style="max-width:100%;height:auto;display:block;">
          <source src="${ad.url}" type="video/mp4" />
        </video>`;
      const v = el.querySelector('video');
      v.addEventListener('play', ()=>track(ad.id,'start'));
      v.addEventListener('ended', ()=>track(ad.id,'complete'));
    } else if(ad.type === 'audio'){
      el.innerHTML = `
        <audio ${ad.autoplay? 'autoplay' : ''} controls style="width:100%">
          <source src="${ad.url}" />
        </audio>`;
    }

    // click tracking
    if(ad.link_url){
      el.addEventListener('click', (e)=> { track(ad.id,'click'); });
    }

    // impression saat masuk DOM
    queueMicrotask(()=> track(ad.id,'impression'));

    return el;
  }

  // Rotator untuk container
  async function mountRotator(container){
    const placement = container.dataset.placement;
    if(!placement) return;
    const ads = await fetchAds(placement, 5);
    if(!ads || ads.length === 0) return;

    let idx = 0; let timer = null;
    function show(i){
      container.innerHTML = '';
      const ad = ads[i];
      const el = renderAd(ad);
      container.appendChild(el);
      const dur = Math.max(3, parseInt(ad.duration||7));
      if(ad.type !== 'popup'){
        clearTimeout(timer);
        timer = setTimeout(()=>{ idx = (idx+1)%ads.length; show(idx); }, dur*1000);
      }
    }

    show(idx);
  }

  // Popup dengan frequency capping (maks 1x per 24 jam)
  async function showPopup(){
    const key = 'popup_last_shown_at';
    const now = Date.now();
    const last = parseInt(localStorage.getItem(key)||'0');
    const oneDay = 24*60*60*1000;
    if(now - last < oneDay) return; // sudah tampil hari ini

    const ads = await fetchAds('popup', 1);
    if(!ads || ads.length === 0) return;
    const ad = ads[0];

    const overlay = document.createElement('div');
    overlay.style.cssText = 'position:fixed;inset:0;background:rgba(0,0,0,.5);z-index:9998;display:flex;align-items:center;justify-content:center;padding:16px;';

    const box = document.createElement('div');
    box.style.cssText = 'background:#fff;max-width:420px;width:100%;border-radius:12px;overflow:hidden;position:relative;box-shadow:0 10px 30px rgba(0,0,0,.3)';

    const closeBtn = document.createElement('button');
    closeBtn.textContent = '×';
    closeBtn.setAttribute('aria-label','Close');
    closeBtn.style.cssText = 'position:absolute;top:8px;right:12px;font-size:24px;background:none;border:none;cursor:pointer;';

    const content = renderAd({...ad, type:'image'}); // popup gambar default; untuk video tinggal pakai ad.type asli

    closeBtn.onclick = ()=>{ document.body.removeChild(overlay); track(ad.id,'close'); };

    box.appendChild(closeBtn);
    box.appendChild(content);
    overlay.appendChild(box);
    document.body.appendChild(overlay);

    localStorage.setItem(key, String(now));
  }

  return { mountRotator, showPopup };
})();

// Auto-mount di halaman
window.addEventListener('DOMContentLoaded', () => {
  document.querySelectorAll('[data-placement]')
    .forEach(el => AdSDK.mountRotator(el));
  // popup opsional
  AdSDK.showPopup();
});
