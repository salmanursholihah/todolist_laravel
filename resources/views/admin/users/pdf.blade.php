<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data Users</title>
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
    <h2>Laporan Data Users</h2>
    <table>
        <thead>
            <tr>
                <th>user ID</th>
                <th>user name</th>
                <th>created at</th>
                <th>update at</th>
                <th>role</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at->format('d M Y H:i') }}</td>
                <td>{{ $user->updated_at->format('d M Y H:i') }}</td>
                <td>{{ $user->role }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>