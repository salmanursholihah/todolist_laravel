
document.getElementById("formTambah").addEventListener("submit", function(e) {
    e.preventDefault();
    constformTambah = new formData(this);

    fetch("public/tambah_transaksi.php", {
            method: "post",
            body: formData
        })
        .then(res => res.text())
        .then(response => {

            if (response.trim() === "success") {
                loadpage("public / index.php");
            } else {
                alert("gagal menyimpan data" + response);
            }
        })
        .catch(error => {
            alert("terjadi kesalahan" + error);

        });
});

function loadPage(page) {
    fetch(page)
        .then(response => {

            if (!response.ok) {

                throw new error("network response was not ok");
            }
            return response.text();
        })
        .then(data => {
            document.getElementById('content').innerHTML = data;
        })
        .catch(error => {
            console.error('error:', error);
            document.getElementById('content').innerHTML = '<p>gagal memuat content</p>';

        });
}
