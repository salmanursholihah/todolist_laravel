@extends ('layouts.app_todo')

@section ('title', 'task')
@section ('content')

<body>
    <h1>ToDo List</h1>

    {{-- Form Tambah Tugas --}}
    <div class="container">
        <div class="content">
            <form action="{{ route('tasks.store') }}" method="POST">
                @csrf
                <input type="text" name="title" placeholder="Tugas baru..." required>
                <button type="submit">Tambah</button>
            </form>
        </div>
    </div>

    {{-- Daftar Tugas --}}
    <ul>
        @foreach ($tasks as $task)
        <li>
            {{-- Tombol Selesai / Belum --}}
            <form action="{{ route('tasks.update', $task) }}" method="POST">
                @csrf
                @method('PATCH')
                <button type="submit">
                    {{ $task->is_done ? '✅' : '❌' }}
                </button>

            </form>

            {{-- Judul Tugas --}}
            <span class=" {{ $task->is_done ? 'done' : '' }}">
                {{ $task->title }}
            </span>

            {{-- Tombol Hapus --}}
            <form action="{{ route('tasks.destroy', $task) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Hapus tugas ini?')">🗑️</button>
            </form>
        </li>
        @endforeach
    </ul>
</body>
@endsection