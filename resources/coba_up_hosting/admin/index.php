<?php

session_start();

if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../login.php");
    exit();
}


?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>mytodo.my.id</title>
    <link rel="stylesheet" href="style/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="../style/style_index_admin.css">

</head>

<th>

    <!--header-->
    <header>
        <h1>Mytodo</h1>
        <p>catat perjalanan tugasmu dengan aplikasi todolist</p>
    </header>


    <!-- Tombol untuk toggle sidebar -->
    <button id="toggleSidebar">☰</button>

    <div style="display: flex;">
        <!-- Sidebar -->
        <div id="sidebar" class="bg-light p-3" style="width: 200px; transition: width 0.3s;">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="index.php" onclick="loadPage('#')">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="loadPage('backend/indextodo.php')">Backend todo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="loadPage('/admin/service.php')">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Log out</a>
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <main class="container">
            <div id="content">
                <div class="card-container">
                    <div class="card">
                        <i class="fa-solid fa-message-text"></i>
                        <h4>todolist masuk</h4>
                        <p>200</p>
                    </div>
                    <div class="card">
                        <i class="fa-solid fa-users"></i>
                        <h4>daftar user</h4>
                        <p>200</p>
                    </div>
                    <div class="card">
                        <i class="fa-solid"></i>
                        <h4>pppppppp</h4>
                        <p></p>
                    </div>
                </div>
                haii semua ini merupakan halaman main untuk admin aplikasi mytodolist<h5></h5>
            </div>
        </main>
        </head>

        <body>
        </body>



</html>
</div>
</main>
</div>
<footer>
    <p>&copy; mytodo ~ 2025</p>
</footer>
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

// Toggle sidebar function
document.getElementById('toggleSidebar').addEventListener('click', function() {
    const sidebar = document.getElementById('sidebar');
    if (sidebar.style.width === '0px' || sidebar.style.width === '') {
        sidebar.style.width = '200px'; // Lebar saat tampil
    } else {
        sidebar.style.width = '0'; // Hide sidebar
    }
});
</script>