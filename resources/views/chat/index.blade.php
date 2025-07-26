@foreach ($users as $user)
    <div class="user">
        <a href="{{ route('chat.show', $user->id) }}">
            <img src="{{ asset('storage/avatars/' . ($user->avatar ?? 'default.png')) }}" class="avatar">
            {{ $user->name }}
        </a>
    </div>
@endforeach

<style>
.avatar {
  width: 40px;
  height: 40px;
  border-radius: 50%;
  object-fit: cover;
}
</style>


