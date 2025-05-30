<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <title>Keuangan</title>
    <link rel="stylesheet" href="/../style/style_keuangan.css">
</head>

<body>


    <div class="container">
        <div class="content">
            <h2>Data Keuangan</h2>
            <form action="tambah_transaksi.php" method="post"></form>
            <input type="date" name="date" required>
            <br>
            <input type="text" name="description" placeholder="Deskripsi" required>
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
        <?php
    $result = $conn->query("SELECT * FROM keuangan ORDER BY date DESC");
    $total_masuk = $total_keluar = 0;

    while ($row = $result->fetch_assoc()) {
      echo "<tr>
              <td>{$row['date']}</td>
              <td>{$row['description']}</td>
              <td>{$row['type']}</td>
              <td>{$row['amount']}</td>
            </tr>";

      if ($row['type'] === 'masuk') {
        $total_masuk += $row['amount'];
      } else {
        $total_keluar += $row['amount'];
      }
    }

    $saldo = $total_masuk - $total_keluar;
    ?>
    </table>

    <h5>Total Masuk: Rp<?= number_format($total_masuk) ?></h5>
    <h5>Total Keluar: Rp<?= number_format($total_keluar) ?></h5>
    <h5>Saldo: Rp<?= number_format($saldo) ?></h5>
</body>

</html>

<script>
function loadPage(page) {
    fetch(page)
        .then(response => response.text())
        .then(data => {
            document.getElementById('content').innerHTML = data;
        })
        .catch(error => {
            document.getElementById('content').innerHTML = '<p>Halaman gagal dimuat.</p>';
        });
}
</script>