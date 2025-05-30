<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'user') {
    header("Location: ../login.php");
    exit();
}
?>
<?php 


include '../db.php';

if(!isset($_SESSION['username'])){
    header ("location:login.php");
    exit();
}
$username =$_SESSION['username'];

$stmt =$conn->prepare("SELECT* FROM todos WHERE create_by =? ORDER BY id DESC");
$stmt->bind_param("s",$username);
$stmt->execute();
$result = $stmt->get_result();

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>mytodo.my.id</title>

    <!-- CSS -->
    <link rel="stylesheet" href="/../style/style_index2.css">
    <link rel="stylesheet" href="/../style/style_index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">


</head>

<body>

    <!-- Header -->
    <header>
        <h1>Mytodo</h1>
        <p>catat perjalanan tugasmu dengan aplikasi todolist</p>
    </header>

    <!-- Toggle Sidebar -->
    <button id="toggleSidebar">☰</button>

    <!-- Main Layout -->
    <div style="display: flex;">
        <!-- Sidebar -->
        <div id="sidebar" class="bg-light p-3" style="width: 200px;">
            <ul class="nav flex-column">
                <li><a class="nav-link" href="index.php">Home</a></li>
                <li><a class="nav-link" href="#" onclick="loadPage('todo_list.php')">Todo</a></li>
                <li><a class="nav-link" href="#" onclick="loadPage('generalsetting.php')">General Setting</a></li>
                <li><a class="nav-link" href="calendar.php" onclick="loadPage('calendar.php')">Calendar</a></li>
                <li><a class="nav-link" href="#" onclick="loadPage('keuangan.php')">Keuangan</a></li>
                <li><a class="nav-link" href="#" onclick="loadPage('akun.php')">Akun</a></li>
                <li><a class="nav-link" href="logout.php">Log out</a></li>
            </ul>
        </div>

        <!-- Main Content -->
        <main class="container" style="flex: 1;">
            <div id="content">
                <article class="post-preview">
                    <a class="nav-link" href="#" onclick="loadPage('post.php')">Artikelku</a>
                    <p class="date">25 April 2025</p>
                    <p>Hai semua, sebelumnya perkenalkan aku .....<br>Klik untuk membaca selengkapnya...</p>
                </article>

                <br><br><br>

                <h2>todolist for
                    <?= htmlspecialchars($_SESSION['username'])?>
                </h2>
                <?php while ($todo = $result->fetch_assoc()): ?>
                <li>
                    <?= htmlspecialchars($todo['task']) ?>
                    <?= $todo['is_done'] ? "(Selesai)" : "" ?>
                </li>
                <?php endwhile; ?>

                <?php
                include 'db.php';
                date_default_timezone_set('Asia/Jakarta');
                $today = date('Y-m-d');
                $reminderLimit = date('Y-m-d', strtotime('+1 day'));
                $query = mysqli_query($conn, "SELECT * FROM todos ORDER BY deadline ASC");

                while ($task = mysqli_fetch_assoc($query)) {
                    $isNearDeadline = (!$task['is_done'] && $task['deadline'] <= $reminderLimit && $task['deadline'] >= $today);

                    echo "<div>";
                    echo "<strong>{$task['task']} (Deadline: {$task['deadline']})</strong> ";
                    echo $task['is_done'] ? "✅ <i>Selesai</i>" : "";

                    if ($isNearDeadline) {
                        echo " <span style='color: red;'>⚠️ Segera selesaikan!</span>";
                    }

                    if (!$task['is_done']) {
                        echo " <a href='done.php?id={$task['id']}'>Selesai</a>";
                    }

                    echo "</div><hr>";
                }
                ?>
            </div>
        </main>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; mytodo ~ 2025</p>
    </footer>

    <!-- JavaScript -->
    <script>
    function loadPage(page) {
        const content = document.getElementById('content');
        content.innerHTML = "<em>Memuat konten...</em>";

        fetch(page)
            .then(response => {
                if (!response.ok) {
                    throw new Error("Gagal memuat halaman: " + response.statusText);
                }
                return response.text();
            })
            .then(data => {
                content.innerHTML = data;
            })
            .catch(error => {
                console.error('Error:', error);
                content.innerHTML = '<p style="color:red;">Gagal memuat konten.</p>';
            });

        window.onload = () => {
            loadpage('todo_list.php');
        }
    }

    document.getElementById('toggleSidebar').addEventListener('click', function() {
        const sidebar = document.getElementById('sidebar');
        sidebar.style.width = (sidebar.style.width === '0px' || sidebar.style.width === '') ? '200px' : '0';
    });
    </script>
</body>

</html>