<button id="startBtn">Mulai Rekam</button>
<button id="stopBtn" disabled>Stop</button>
<audio id="audioPreview" controls></audio>

<script>
    let mediaRecorder;
    let audioChunks = [];

    document.getElementById("startBtn").onclick = async () => {
        const stream = await navigator.mediaDevices.getUserMedia({ audio: true });
        mediaRecorder = new MediaRecorder(stream);
        audioChunks = [];

        mediaRecorder.ondataavailable = event => {
            if (event.data.size > 0) {
                audioChunks.push(event.data);
            }
        };

        mediaRecorder.onstop = () => {
            const audioBlob = new Blob(audioChunks, { type: 'audio/webm' });
            const audioUrl = URL.createObjectURL(audioBlob);
            document.getElementById("audioPreview").src = audioUrl;

            const formData = new FormData();
            formData.append("voice_note", audioBlob);
            formData.append("_token", "{{ csrf_token() }}");

            fetch("{{ route('messages.voice') }}", {
                method: "POST",
                body: formData
            }).then(res => res.json())
              .then(data => alert("Voice note dikirim!"));
        };

        mediaRecorder.start();
        document.getElementById("stopBtn").disabled = false;
    };

    document.getElementById("stopBtn").onclick = () => {
        mediaRecorder.stop();
        document.getElementById("stopBtn").disabled = true;
    };
</script>
