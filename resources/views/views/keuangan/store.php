@extends('layouts.app_keuangan')

@section('title', 'keuangan')

@section ('content')

<body>


    <div class="container">
        <div class="content">
            <h2>Data Keuangan</h2>
            <form id="formTambah" action="{{' keuangan.store' }}" method="post">
                <input type="date" name="date" required>
                <br>
                <input type="text" name="deskripsi" Q1QAEIO[] placeholder="Deskripsi" required>
                <br>
                <select name="type" required>
                    <option value="masuk">Masuk</option>
                    <option value="keluar">Keluar</option>
                </select>
                <br>
                <input type="number" name="amount" placeholder="Jumlah" required>
                <br>
                <button type="submit">Tambah</button>
                <br>
            </form>
        </div>
    </div>


    <hr>

    <table border="1">
        <tr>
            <th>Tanggal</th>
            <th>Deskripsi</th>
            <th>Jenis</th>
            <th>Jumlah</th>
        </tr>
        @foreach($data as $row)
        <tr>
            <td>{{$row->date}}</td>
            <td>{{$row->deskripsi}}</td>
            <td>{{ $row->type }}</td>
            <td>{{number_format($row->amount) }}</td>
        </tr>

    </table>

    <h5>Total Masuk: Rp {{number_format($total_masuk)}} </h5>
    <h5>Total Keluar: Rp {{number_format($total_keluar)}} </h5>
    <h5>Saldo: Rp {{number_format($saldo)}} </h5>
</body>

</html>