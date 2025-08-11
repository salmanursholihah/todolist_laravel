<!doctype html>
<html>
<head>
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Midtrans Snap JS (sandbox) -->
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
<style>
/* styling sederhana, ganti dengan Tailwind/Bootstrap */
.card{ width:220px; padding:20px; border-radius:10px; box-shadow:0 6px 18px rgba(0,0,0,0.08); margin:10px; display:inline-block; vertical-align:top;}
.btn{background:#28a745;color:#fff;padding:8px 12px;border-radius:6px;cursor:pointer;}
</style>
</head>
<body>
<h1>Pilih Paket</h1>

<div id="plans">
@foreach($plans as $plan)
  <div class="card">
    <h3>{{ $plan->name }}</h3>
    <p>Rp {{ number_format($plan->price,0,',','.') }} / tahun</p>
    <p>{{ $plan->description }}</p>
    <ul>
     @foreach(json_decode($plan->benefits, true) ?? [] as $b)
    <li>{{ $b }}</li>
@endforeach

    </ul>
    <button class="btn" onclick="pay({{ $plan->id }})">Pesan Sekarang</button>
  </div>
@endforeach
</div>

<script>
function pay(planId){
  fetch("{{ route('checkout') }}", {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
    },
    body: JSON.stringify({plan_id: planId})
  })
.then(res => {
  if (!res.ok) {
    return res.text().then(text => { throw new Error(text) });
  }
  return res.json();
})

  .then(data => {
    window.snap.pay(data.snap_token, {
      onSuccess: function(result){
        console.log('success:', result);
        // Serahkan ke server if perlu; tapi final status akan datang lewat webhook
        alert('Pembayaran sukses! menunggu verifikasi.');
        window.location.reload();
      },
      onPending: function(result){
        console.log('pending:', result);
        alert('Pembayaran pending. Silakan selesaikan pembayaran.');
      },
      onError: function(result){
        console.log('error:', result);
        alert('Pembayaran gagal.');
      }
    });
  })
.catch(async err => {
  let msg;
  try {
    msg = await err.text();
  } catch(e) {
    msg = err;
  }
  console.error('Detail error:', msg);
  alert('Gagal membuat transaksi\n' + msg);
})
}
</script>
</body>
</html>
