<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #e5ddd5;
    }

    #chat-box {
      display: flex;
      flex-direction: column;
      height: 400px;
      overflow-y: scroll;
      padding: 10px;
      background: #f5f5f5;
      border: 1px solid #ccc;
    }

    .message-bubble {
      max-width: 60%;
      margin-bottom: 10px;
      padding: 10px 12px;
      border-radius: 10px;
      display: inline-block;
      clear: both;
      position: relative;
    }

    .me {
      background-color: #dcf8c6;
      align-self: flex-end;
      margin-left: auto;
    }

    .other {
      background-color: #fff;
      align-self: flex-start;
      margin-right: auto;
    }

    .avatar {
      width: 30px;
      height: 30px;
      border-radius: 50%;
      object-fit: cover;
      vertical-align: middle;
      margin-right: 5px;
    }

    .sender-name {
      font-size: 12px;
      font-weight: bold;
      margin-bottom: 4px;
    }

    .attachment-img {
      max-width: 200px;
      border-radius: 8px;
      margin-top: 5px;
    }

    #chat-form {
      margin-top: 15px;
    }
  </style>
</head>

<body>
  <div id="chat-box">
    @foreach ($messages as $message)
      <div class="message-bubble {{ $message->sender_id == auth()->id() ? 'me' : 'other' }}">
        @if ($message->sender_id != auth()->id())
          <img src="{{ asset('storage/avatars/' . ($receiver->avatar ?? 'default.png')) }}" class="avatar">
        @endif
        <div class="sender-name">
          {{ $message->sender_id == auth()->id() ? 'Saya' : $receiver->name }}
        </div>
        <div>{{ $message->content }}</div>

        @if ($message->attachment)
          @foreach (json_decode($message->attachment, true) as $img)
            <div>
              <img src="{{ asset('storage/message_attachments/' . $img) }}" class="attachment-img">
            </div>
          @endforeach
        @endif
      </div>
    @endforeach
  </div>

  <form id="chat-form" enctype="multipart/form-data">
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
        location.reload();
      });
    });
  </script>
</body>
