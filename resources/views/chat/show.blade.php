<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <style>
    .avatar {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      object-fit: cover;
    }
  </style>
</head>

<div id="chat-box" style="border:1px solid #ccc; height:500px; overflow-y:scroll; padding:10px;">
  @foreach ($messages as $message)
    @if ($message->sender_id == Auth::id())
      <div style="display: flex; justify-content: flex-end; margin-bottom: 10px;">
        <div style="max-width: 60%; background: #dcf8c6; padding: 8px 12px; border-radius: 15px; text-align: right;">
          <small>Saya</small><br>
          {{ $message->content }}
          @if ($message->attachment)
            @php $images = json_decode($message->attachment, true); @endphp
            @foreach ($images as $img)
              <div style="margin-top: 5px;">
                <img src="{{ asset('storage/message_attachments/' . $img) }}" width="200">
              </div>
            @endforeach
          @endif
        </div>
        <img src="{{ asset('storage/avatars/' . (auth()->user()->avatar ?? 'default.png')) }}" class="avatar" style="margin-left: 8px;">
      </div>
    @else
      <div style="display: flex; justify-content: flex-start; margin-bottom: 10px;">
        <img src="{{ asset('storage/avatars/' . ($receiver->avatar ?? 'default.png')) }}" class="avatar" style="margin-right: 8px;">
        <div style="max-width: 60%; background: #f1f0f0; padding: 8px 12px; border-radius: 15px; text-align: left;">
          <small>{{ $receiver->name }}</small><br>
          {{ $message->content }}
          @if ($message->attachment)
            @php $images = json_decode($message->attachment, true); @endphp
            @foreach ($images as $img)
              <div style="margin-top: 5px;">
                <img src="{{ asset('storage/message_attachments/' . $img) }}" width="200">
              </div>
            @endforeach
          @endif
        </div>
      </div>
    @endif
  @endforeach
</div>

<form id="chat-form" enctype="multipart/form-data">
  <textarea id="message" name="content" placeholder="Tulis pesan..."></textarea><br>
  <input type="file" name="attachments[]" accept="image/*" multiple><br>
  <button type="button" id="send">Send</button>
</form>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
axios.defaults.headers.common['X-CSRF-TOKEN'] =
  document.querySelector('meta[name="csrf-token"]').getAttribute('content');

const receiverId = @json($receiver->id);

document.getElementById('send').addEventListener('click', function() {
  const form = document.getElementById('chat-form');
  const formData = new FormData(form);
  formData.append('receiver_id', receiverId);

  axios.post('/chat/send', formData)
    .then(response => location.reload())
    .catch(error => console.error(error.response));
});
</script>