
//contoh
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