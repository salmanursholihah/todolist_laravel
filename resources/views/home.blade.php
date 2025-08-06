@extends('layouts.app_landing')

@section('content')


<section class="bg-light py-5">
    <div class="container text-center">
        <div class="row align-items-center">
            <div class="col-md-6 text-md-start">
                <h1>Solusi cerdas  <br><span class="text-primary">Untuk mengelola tugas harian anda</span></h1>
                <p class="lead">Uctadiv membantu HRD dan pemilik usaha mempermudah absensi, cuti, dan rekap gaji dalam satu aplikasi</p>
                <a href="#kontak" class="btn btn-primary">Jadwalkan Demo Sekarang</a>
            </div>
            <div class="col-md-6">
                <img src="{{ asset('storage/logo/hero.jpg') }}" class="img-fluid" alt="Hero Uctadiv">
            </div>
        </div>
    </div>
</section>

<section class="py-5" id="fitur">
    <div class="container text-center">
        <h2>Solusi untuk Semua Jenis Perusahaan</h2>
        <div class="row mt-4">
 
            <div class="col-md-2 d-flex">
                <div class="card p-3 w-100 h-100">
                    <h5>presensi online</h5>
                    <p>pantau kehadiran karyawan secara real time kapan pun dan dimanapun</p>                   
                </div>
            </div>
            <div class="col-md-2 d-flex">
                <div class="card p-3 w-100 h-100">
                    <h5>jadwal kerja fleksibel</h5>
                    <p>atur jadwal regular maupun shift dengan mudah dan hemat waktu</p>              
                </div>
            </div>
            <div class="col-md-2 d-flex">
                <div class="card p-3 w-100 h-100">
                    <h5>pengelolaan</h5>
                    <p>dapatkan laporan absensi dan keterlambatan secara otomatis tanpa repot perhitungan manual</p>              
                </div>
            </div>
         
            <div class="col-md-2 d-flex">
                <div class="card p-3 w-100 h-100">
                    <h5>manajement lembur</h5>
                    <p>Proses pengajuan dan persetujuan cuti karyawan berjalan cepat dan transparan.</p>              
                </div>
            </div>
            <div class="col-md-2 d-flex">
                <div class="card p-3 w-100 h-100">
                    <h5>notifikasi pengingat</h5>
                    <p>Sistem akan mengirimkan notifikasi otomatis agar karyawan tidak lupa presensi.</p>          
            </div>
        </div>
            <div class="col-md-2 d-flex">
                <div class="card p-3 w-100 h-100">
                    <h5>umum</h5>
<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Obcaecati, voluptate.
</p>        
    </div>
        </div>
    </div>
</section>


<section style="padding-top: 20px; padding-bottom: 20px ; background-color: #d3daddff; color:black;" id="biaya">
    <div class="container text-center">
        <h2>tentang kami</h2>
        <p>selamat datang di blog resmi Uctadiv.my.id
<br><br>
Uctadiv merupakan platform absensi online yang dirancang untuk membantu dan mempermudah dalam pengelolaan absesi secara mudah dan efisien. 
<br>
 melalui blog ini kami berbagi informasi, panduan, 
 <br>
 dan wawasan seputar dunia absensi digital, manajemen SDM , serta perkembangan teknologi yang mendukung produktifitas kerja.
<br>
<br>
<br>

kami percaya bahwa transformasi digital dimulai dari hal yang sederhana, seperti absensi kehadiran yang mudah di akses. 
<br>sehingga kami berkomitmen untuk menyediakan solusi praktis dan terjangkau bagi berbagai kalangan, dari skala kecil hingga besar.
<br> blog ini di rancang sebagai ruang untuk berbagi manfaat bagi siapa saja 
<br>yang ingin memahami lebih dalam tentang pentingnya system absensi yang modern dan terintegrasi
<br><br><br>

terima kasih sudah berkunjung ke portal kami, 
<br>semoga artikel-artikel kami dapat memberikan inspirasi serta solusi untuk kebutuhan anda. 
<br><br>yukkk ikuti terus artikel terbaru kami, dan temukan solusi yang tepat untuk kebutuhan absensi anda! </p>
    </div><br><br><br><br>
</section>

<section class="py-5" id="panduan">
    <div class="container">
        <h2 class="text-center mb-4">Mengapa Memilih Uctadiv?</h2>
        <div class="row text-center">
            <div class="col-md-4 mb-3">
                <h5>Praktis dan otomatis</h5>
                <p>pengelolaan jadwal,kalender,absensi, izin dan cuti bahkan sampai laporan pekerjaan harian karyawan dapat dilakukan scara terstruktur efisien dan mudah</p>
            </div>
            <div class="col-md-4 mb-3">
                <h5>skalable</h5>
                <p>cocok untuk bisnis kecil hingga Perusahaan besar</p>
                        <img src="https://trenmasakini.com/wp-content/uploads/2024/10/Scalable-Adalah-6.jpg" alt="gambar ilustrasi" class="img-fluid mt-4 text-center">
            </div>
            <div class="col-md-4 mb-3">
                <h5>Real time</h5>
                <p>analisis laporan yang kapan saja secara langsung</p>
            </div>
        </div>
    </div>
</section>
<br><br><br><br><br><br><br>
@endsection






