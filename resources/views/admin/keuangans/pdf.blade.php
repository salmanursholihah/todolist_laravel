<!DOCTYPE html>
<html>

<head>
    <title>Laporan Keuangan</title>
    <style>
    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        border: 1px solid #000;
        padding: 8px;
        text-align: left;
    }
    </style>
</head>

<body>
    <h2>Laporan Keuangan</h2>
    <table>
        <thead>
            <tr>
                <th>user ID</th>
                <th>user name</th>
                <th>Tanggal</th>
                <th>Deskripsi</th>
                <th>Jenis</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($keuangans as $keuangan)
            <tr>
                <td>{{ $keuangan->user_id }}</td>
                <td>{{ $keuangan->user->name ?? 'username tidak ditemukan' }}</td>
                <td>{{ $keuangan->date }}</td>
                <td>{{ $keuangan->deskripsi }}</td>
                <td>{{ ucfirst($keuangan->type) }}</td>
                <td>Rp{{ number_format($keuangan->amount) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>