<meta name="csrf-token" content="{{ csrf_token() }}">

<button id="startBtn">🎙️ Rekam</button>
<button id="stopBtn" disabled>⏹️ Stop</button>
<audio id="audioPreview" controls style="display:none;"></audio>
<button id="sendBtn" disabled>📤 Kirim</button>

<script>
const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

let mediaRecorder;
let audioChunks = [];
let voiceNoteBlob = null;

document.getElementById('startBtn').onclick = async () => {
    try {
        const stream = await navigator.mediaDevices.getUserMedia({ audio: true });
        mediaRecorder = new MediaRecorder(stream);
        audioChunks = [];
        
        mediaRecorder.ondataavailable = e => {
            if(e.data.size > 0) audioChunks.push(e.data);
        };

        mediaRecorder.onstop = () => {
            voiceNoteBlob = new Blob(audioChunks, { type: 'audio/webm' });
            const audioPreview = document.getElementById('audioPreview');
            audioPreview.src = URL.createObjectURL(voiceNoteBlob);
            audioPreview.style.display = 'block';
            document.getElementById('sendBtn').disabled = false;
        };

        mediaRecorder.start();
        document.getElementById('startBtn').disabled = true;
        document.getElementById('stopBtn').disabled = false;
    } catch (err) {
        alert('Tidak bisa akses mikrofon: ' + err.message);
    }
};

document.getElementById('stopBtn').onclick = () => {
    mediaRecorder.stop();
    document.getElementById('startBtn').disabled = false;
    document.getElementById('stopBtn').disabled = true;
};

document.getElementById('sendBtn').onclick = () => {
    if (!voiceNoteBlob) {
        alert('Rekam dulu voice note!');
        return;
    }

    const formData = new FormData();
    formData.append('voice_note', voiceNoteBlob, `voice_note_${Date.now()}.webm`);

    fetch('/voice-note/upload', {
        method: 'POST',
        headers: { 'X-CSRF-TOKEN': csrfToken },
        body: formData,
    })
    .then(res => res.json())
    .then(data => {
        if(data.status === 'success') {
            alert('Voice note berhasil dikirim!');
            // Misal refresh halaman atau reset UI
            document.getElementById('audioPreview').style.display = 'none';
            document.getElementById('sendBtn').disabled = true;
            voiceNoteBlob = null;
        } else {
            alert('Gagal mengirim voice note');
        }
    })
    .catch(err => alert('Error: ' + err.message));
};
</script>
