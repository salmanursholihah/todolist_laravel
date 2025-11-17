@extends('layouts.app_landing')

@section('content')
<section class="py-5">
    <div class="container">
        <h2 class="text-center mb-4">Hubungi Kami</h2>
        <div class="row">
            <div class="col-md-6 mb-4">
                <h5>Alamat Kantor</h5>
                <p>Jl. Ahmad Yani Perum PJKA No.4, RT.03/RW.02,<br> Magelang, Kec. Magelang Utara, Kota Magelang, <br>Jawa Tengah</p>
                <h5>Kontak</h5>
                <p>WhatsApp: <a href="https://wa.me/62xxxxxxxx">+62 8xxx xxxx</a></p>
                <p>Email: ptutamaciptatataasri@gmail.com</p>
                <h5>Jam Operasional</h5>
                <p>Senin - Sabtu, 08.00 - 16.00 WIB</p>
                
            </div>
            <div class="col-md-6">
                <form action="{{ route('kontak.kirim') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Pesan</label>
                        <textarea name="pesan" class="form-control" rows="5" required></textarea>
                    </div>
                    <button class="btn btn-primary">Kirim Pesan</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
