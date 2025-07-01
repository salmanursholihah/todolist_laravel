<!DOCTYPE html>
<html>

<head>
    <title>Laporan Catatan Users</title>
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
    <h2>Laporan Catatan Users</h2>
    <table>
        <thead>

            <tr>
                <th>user ID</th>
                <th>name</th>
                <th>title</th>
                <th>deskripsi</th>
                <th>gambar</th>
                <th>create_at</th>
                <th>update_at</th>
                <th>aksi</th>
            </tr>
            @foreach($catatans as $catatan)
            <tr>
                <td>{{ $catatan->user_id }}</td>
                <td>{{ $catatan->user->name ?? 'username tidak ditemukan' }}</td>
                <td>{{ $catatan->title }}</td>
                <td>{{ $catatan->description }}</td>
                <td>{{ $catatan->image }}</td>
                <td>{{ $catatan->created_at}}</td>
                <td>{{ $catatan->updated_at }}</td>
            </tr>
            @endforeach

            </tbody>
    </table>
</body>

</html>