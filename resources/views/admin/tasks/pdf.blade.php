<!DOCTYPE html>
<html>

<head>
    <title>Laporan Task</title>
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
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7858281078425614"
     crossorigin="anonymous"></script>
</head>

<body>
    <h2>Laporan Task</h2>
    <table>
        <thead>
            <tr>
                <th>user ID</th>
                <th>user name</th>
                <th>title</th>
                <th>create at</th>
                <th>update at</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tasks as $task)
            <tr>
                <td>{{ $task->user_id }}</td>
                <td>{{ $task->user->name ?? 'username tidak di temukan' }}</td>
                <td>{{ $task->title }}</td>
                <td>{{  $task->created_at}}</td>
                <td>{{ $task->updated_at }}</td>
                <td>{{ $task->is_done }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>