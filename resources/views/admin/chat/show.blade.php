<div id="chat-box" style="height: 300px; overflow-y: scroll; padding: 10px; background: #f5f5f5;">
  @foreach ($messages as $message)
    <div style="max-width: 60%;margin-bottom: 10px;padding: 8px 12px;border-radius: 10px;background: {{ $message->sender_id == auth()->id() ? '#dcf8c6' : '#fff' }};align-self: {{ $message->sender_id == auth()->id() ? 'flex-end' : 'flex-start' }};">
      <b style="font-size: 12px;">{{ $message->sender_id == auth()->id() ? 'Saya' : $receiver->name }}</b><br>
      <span style="font-size: 14px;">{{ $message->content }}</span>

      @if ($message->attachment)
        @foreach (json_decode($message->attachment, true) as $img)
          <div style="margin-top: 5px;">
            <img src="{{ asset('message_attachments/' . $img) }}" style="max-width: 200px; border-radius: 8px;">
          </div>
        @endforeach
      @endif
    </div>
  @endforeach
</div>

<form id="chat-form" enctype="multipart/form-data" style="margin-top: 10px;">
  @csrf
  <textarea id="content" placeholder="Tulis pesan..." style="width: 100%; height: 60px; padding: 5px;"></textarea><br>
  <input type="file" id="attachments" name="attachments[]" multiple accept="image/*"><br>
  <button type="button" id="send" style="margin-top: 5px;">Send</button>
</form>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
  const receiverId = @json($receiver->id);
  const chatBox = document.getElementById('chat-box');

  document.getElementById('send').addEventListener('click', () => {
    const formData = new FormData();
    formData.append('receiver_id', receiverId);
    formData.append('content', document.getElementById('content').value);

    const files = document.getElementById('attachments').files;
    for (let i = 0; i < files.length; i++) {
      formData.append('attachments[]', files[i]);
    }

    axios.post('{{ route('chat.send') }}', formData, {
      headers: { 'Content-Type': 'multipart/form-data' }
    }).then(() => {
      location.reload(); // Jika mau real-time, hapus ini & update bubble pakai JS
    });
  });
</script>
