<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }
        .message { display: flex; margin-bottom: 10px; }
        .me { justify-content: flex-end; }
        .other { justify-content: flex-start; }
        .bubble {
            max-width: 60%;
            padding: 8px 12px;
            border-radius: 15px;
            word-wrap: break-word;
        }
        .me .bubble { background: #dcf8c6; text-align: right; }
        .other .bubble { background: #f1f0f0; text-align: left; }
    </style>
</head>

<!-- HEADER -->
<div style="display:flex; align-items:center; padding:10px; background:#ededed;">
    <img src="{{ asset('storage/avatars/' . ($receiver->avatar ?? 'default.png')) }}" class="avatar" alt="Avatar">
    <strong style="margin-left:10px;">{{ $receiver->name }}</strong>
</div>

<!-- CHAT BOX -->
<div id="chat-box" style="border:1px solid #ccc; height:500px; overflow-y:auto; padding:10px; background:#fafafa;">
    @foreach ($messages as $message)
        @php $isMe = $message->sender_id === Auth::id(); @endphp

        {{-- Pesan Teks --}}
        @if ($message->content)
            <div class="message {{ $isMe ? 'me' : 'other' }}">
                @if(!$isMe)
                    <img src="{{ asset('storage/avatars/' . ($message->sender->avatar ?? 'default.png')) }}" class="avatar" alt="Avatar">
                @endif

                <div class="bubble">{{ $message->content }}</div>

                @if($isMe)
                    <img src="{{ asset('storage/avatars/' . (auth()->user()->avatar ?? 'default.png')) }}" class="avatar" alt="Avatar">
                @endif
            </div>
        @endif

        {{-- Pesan Gambar (multi-image) --}}
        @if ($message->attachment)
            @php
                $images = is_array($message->attachment) ? $message->attachment : json_decode($message->attachment, true);
            @endphp
            @foreach ($images as $img)
                <div class="message {{ $isMe ? 'me' : 'other' }}">
                    @if(!$isMe)
                        <img src="{{ asset('storage/avatars/' . ($message->sender->avatar ?? 'default.png')) }}" class="avatar" alt="Avatar">
                    @endif
                    <div class="bubble">
                        <img src="{{ asset('storage/message_attachments/' . $img) }}" alt="Attachment" style="max-width: 200px; border-radius: 10px;">
                    </div>
                    @if($isMe)
                        <img src="{{ asset('storage/avatars/' . (auth()->user()->avatar ?? 'default.png')) }}" class="avatar" alt="Avatar">
                    @endif
                </div>
            @endforeach
        @endif

        {{-- Pesan Voice Note --}}
        @if ($message->voice_note)
            <div class="message {{ $isMe ? 'me' : 'other' }}">
                @if(!$isMe)
                    <img src="{{ asset('storage/avatars/' . ($message->sender->avatar ?? 'default.png')) }}" class="avatar" alt="Avatar">
                @endif
                <div class="bubble">
                    <audio controls preload="none" style="width: 200px;">
                        <source src="{{ asset('storage/voice_notes/' . $message->voice_note) }}" type="audio/webm">
                        Your browser does not support the audio element.
                    </audio>
                </div>
                @if($isMe)
                    <img src="{{ asset('storage/avatars/' . (auth()->user()->avatar ?? 'default.png')) }}" class="avatar" alt="Avatar">
                @endif
            </div>
        @endif
    @endforeach
</div>

<!-- FORM CHAT -->
<form id="chat-form" enctype="multipart/form-data" style="display:flex; flex-direction:column; gap:8px; margin-top:10px;">
    <textarea name="content" placeholder="Tulis pesan..." style="width:100%; resize: vertical;"></textarea>
    <input type="file" name="attachments[]" multiple accept="image/*">

    <div>
        <button type="button" id="startBtn">🎙️ Rekam</button>
        <button type="button" id="stopBtn" disabled>⏹️ Stop</button>
        <audio id="audioPreview" controls style="display:none; margin-top:5px;"></audio>
    </div>

    <button type="button" id="sendBtn">📤 Kirim</button>
</form>

<script>
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    const receiverId = @json($receiver->id);

    let mediaRecorder;
    let audioChunks = [];
    let voiceNoteBlob = null;

    // Mulai rekam suara
    document.getElementById("startBtn").addEventListener("click", async () => {
        try {
            const stream = await navigator.mediaDevices.getUserMedia({ audio: true });
            mediaRecorder = new MediaRecorder(stream);
            audioChunks = [];

            mediaRecorder.ondataavailable = e => {
                if (e.data.size > 0) audioChunks.push(e.data);
            };
            mediaRecorder.onstop = () => {
                voiceNoteBlob = new Blob(audioChunks, { type: 'audio/webm' });
                const audioPreview = document.getElementById("audioPreview");
                audioPreview.src = URL.createObjectURL(voiceNoteBlob);
                audioPreview.style.display = "block";
            };

            mediaRecorder.start();
            document.getElementById("startBtn").disabled = true;
            document.getElementById("stopBtn").disabled = false;
        } catch (err) {
            alert("Tidak dapat mengakses mikrofon.");
            console.error(err);
        }
    });

    // Stop rekam suara
    document.getElementById("stopBtn").addEventListener("click", () => {
        if (mediaRecorder) {
            mediaRecorder.stop();
            document.getElementById("startBtn").disabled = false;
            document.getElementById("stopBtn").disabled = true;
        }
    });

    // Kirim pesan (teks / gambar / voice note)
    document.getElementById("sendBtn").addEventListener("click", () => {
        const content = document.querySelector("textarea[name='content']").value.trim();
        const files = document.querySelector("input[name='attachments[]']").files;

        if (!content && files.length === 0 && !voiceNoteBlob) {
            return alert("Ketik pesan, pilih gambar, atau rekam voice note sebelum mengirim!");
        }

        const formData = new FormData();
        formData.append("receiver_id", receiverId);
        if (content) formData.append("content", content);
        [...files].forEach(file => formData.append("attachments[]", file));
        if (voiceNoteBlob) formData.append("voice_note", voiceNoteBlob, "voice_note.webm");

        sendForm(formData);
    });

    function sendForm(formData) {
        fetch("{{ route('chat.send') }}", {
            method: "POST",
            headers: { "X-CSRF-TOKEN": csrfToken },
            body: formData
        })
        .then(response => {
            if (!response.ok) throw new Error("Gagal mengirim pesan");
            return response.json();
        })
        .then(data => {
            if (data.status === 'success') {
                location.reload();
            } else {
                alert(data.message || "Gagal mengirim pesan");
            }
        })
        .catch(err => {
            console.error(err);
            alert("Terjadi kesalahan saat mengirim pesan");
        });
    }
</script>
