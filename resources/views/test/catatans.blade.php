<form method="POST" action="{{ route('catatan.store') }}">
    @csrf

    <!-- Form Harian -->
    <h4>Catatan Harian</h4>
    <input type="text" name="title" placeholder="Judul" required>
    <textarea name="description" placeholder="Deskripsi"></textarea>

    <!-- Cek: Tanggal dan Status -->
    @if($showMonthlyForm)
    <hr>
    <h4>Form Evaluasi Bulanan</h4>
    <input type="text" name="kendala" placeholder="Kendala">
    <input type="text" name="solusi" placeholder="Solusi">
    <input type="text" name="target" placeholder="Target Bulan Depan">
    @endif

    <button type="submit">Simpan</button>
</form>