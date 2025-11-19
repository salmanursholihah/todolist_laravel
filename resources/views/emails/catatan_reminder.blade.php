<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Reminder Catatan</title>
</head>
<body>
    <h2>Halo, {{ $user->name }}</h2>
    <p>Sepertinya kamu belum mengisi catatan harian hari ini ({{ now()->format('d,M,Y') }}).</p>
    <p>Jangan lupa isi sebelum jam 23:59 ya 🙏</p>
    <p>Terima kasih.</p>
</body>
</html>
