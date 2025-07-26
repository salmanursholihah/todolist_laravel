<h1>Daftar User</h1>
<ul>
    @foreach($users as $user)
        <li>
            <a href="{{ route('admin.chat.show', $user->id) }}">
                Chat dengan {{ $user->name }}
            </a>
        </li>
    @endforeach
</ul>
