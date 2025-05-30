<!DOCTYPE html>
<html>

<head>
    <title>Welcome to MyTodoList</title>
    <link rel="stylesheet" href="{{asset('assets/style.css')}}"> <!-- Optional -->
</head>

<body>
    <header style="text-align: center;">
        <h1>MyTodoList</h1>
        <p>Mengelola tugas harianmu jadi lebih mudah dan menyenangkan.</p>
    </header>

    <section style="text-align: center; margin-top: 20px;">
        <img src="https://i.pinimg.com/736x/13/44/88/1344881a0b7b7b4a766621adbaafa811.jpg" alt="Todo Illustration"
            width="300">
        <h2>Fitur Unggulan</h2>
        <ul style="list-style: none;">
            <li>📝 Tambah & atur tugas dengan mudah</li>
            <li>📆 Reminder harian</li>
            <li>📊 Statistik produktivitas</li>
        </ul>
    </section>

    <div style="text-align: center; margin-top: 30px;">
        <a href="{{ route('login') }}">Login</a> |
        <a href="{{ route('register') }}">Daftar Sekarang</a>
    </div>
</body>

</html>