
@extends('layouts.app_landing')

@section('content')

@php
if (!function_exists('renderAdThumbnail')) {
    function renderAdThumbnail($ad) {
        $path = preg_match('/^https?:\/\//', $ad->media_path)
            ? $ad->media_path
            : asset('storage/' . $ad->media_path);

        if ($ad->type === 'image') {
            return '<a href="'.$ad->link_url.'" target="_blank">
                        <img src="'.$path.'" alt="'.$ad->title.'" 
                             class="img-thumbnail" 
                             style="max-width:150px; height:auto; border-radius:8px;">
                    </a>';
        }
        if ($ad->type === 'video') {
            return '<video width="150" controls style="border-radius:8px;">
                        <source src="'.$path.'" type="video/mp4">
                    </video>';
        }
        if ($ad->type === 'audio') {
            return '<audio controls style="width:150px;">
                        <source src="'.$path.'" type="audio/mpeg">
                    </audio>';
        }
        return '';
    }
}
@endphp


<!-- PREROLL IKLAN -->
<div id="preroll-iklan" class="preroll-overlay">
    <div class="preroll-content">
        <h5>Iklan Spesial</h5>
        <div class="ratio ratio-16x9">
            <iframe 
                src="https://www.youtube.com/embed/HoDKTWGVqmw?autoplay=1" 
                title="YouTube video player" 
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                allowfullscreen>
            </iframe>
        </div>
        <button id="skip-btn" disabled>Lewati Iklan (5)</button>
    </div>
</div>

<style>
.preroll-overlay {
    position: fixed;
    top: 0; left: 0;
    width: 100%; height: 100%;
    background: rgba(0,0,0,0.9);
    z-index: 99999;
    display: flex;
    justify-content: center;
    align-items: center;
}

.preroll-content {
    background: #fff;
    padding: 15px;
    border-radius: 10px;
    max-width: 600px;
    width: 90%;
    text-align: center;
}

#skip-btn {
    margin-top: 10px;
    padding: 8px 16px;
    background: #ccc;
    border: none;
    border-radius: 5px;
    cursor: not-allowed;
}

#skip-btn.enabled {
    background: #28a745;
    cursor: pointer;
    color: white;
}
</style>

<script>
let counter = 5;
let btn = document.getElementById('skip-btn');

let interval = setInterval(function() {
    counter--;
    btn.textContent = `Lewati Iklan (${counter})`;

    if (counter <= 0) {
        clearInterval(interval);
        btn.textContent = "Lewati Iklan";
        btn.classList.add("enabled");
        btn.disabled = false;
        btn.onclick = function() {
            document.getElementById('preroll-iklan').style.display = 'none';
        };
    }
}, 1000);
</script>

{{-- HEADER --}}
@if(!empty($ads['header']))
    <div class="container text-center my-3">
        {!! renderAdThumbnail($ads['header']->random()) !!}
    </div>
@endif
{{-- ===== HERO SECTION ===== --}}
<section class="bg-light py-5">
    <div class="container text-center">
        <div class="row align-items-center">
            <div class="col-md-6 text-md-start">
                <h1>Solusi cerdas<br><span class="text-primary">Untuk mengelola tugas harian anda</span></h1>
                <p class="lead">Absen Pintar membantu HRD dan pemilik usaha mempermudah absensi, cuti, dan rekap gaji dalam satu aplikasi</p>
                <a href="#kontak" class="btn btn-primary">Jadwalkan Demo Sekarang</a>
            </div>
            <div class="col-md-6">
                <img src="{{ asset('storage/logo/hero.jpg') }}" class="img-fluid" alt="Hero AbsenPintar">
            </div>
        </div>
    </div>
</section>


{{-- INLINE ADS di bawah hero --}}
@if(!empty($ads['inline']))
    <div class="container text-center my-3">
        {!! renderAdThumbnail($ads['inline']->random()) !!}
    </div>
@endif

{{-- SIDEBAR ADS --}}
@if(!empty($ads['sidebar']))
    <aside class="container text-center my-3">
        {!! renderAdThumbnail($ads['sidebar']->random()) !!}
    </aside>
@endif

{{-- ===== FITUR ===== --}}
<section class="py-5" id="fitur">
    <div class="container text-center">
        <h2>Solusi untuk Semua Jenis Perusahaan</h2>
        <div class="row mt-4">
            <div class="col-md-2 d-flex">
                <div class="card p-3 w-100 h-100">
                    <h5>Presensi Online</h5>
                    <p>Pantau kehadiran karyawan secara real time kapan pun dan di manapun</p>                   
                </div>
            </div>
            <div class="col-md-2 d-flex">
                <div class="card p-3 w-100 h-100">
                    <h5>Jadwal Kerja Fleksibel</h5>
                    <p>Atur jadwal regular maupun shift dengan mudah dan hemat waktu</p>              
                </div>
            </div>
            <div class="col-md-2 d-flex">
                <div class="card p-3 w-100 h-100">
                    <h5>Pengelolaan</h5>
                    <p>Dapatkan laporan absensi dan keterlambatan secara otomatis tanpa repot perhitungan manual</p>              
                </div>
            </div>
            <div class="col-md-2 d-flex">
                <div class="card p-3 w-100 h-100">
                    <h5>Manajemen Lembur</h5>
                    <p>Proses pengajuan dan persetujuan cuti karyawan berjalan cepat dan transparan</p>              
                </div>
            </div>
            <div class="col-md-2 d-flex">
                <div class="card p-3 w-100 h-100">
                    <h5>Notifikasi Pengingat</h5>
                    <p>Sistem akan mengirimkan notifikasi otomatis agar karyawan tidak lupa presensi</p>          
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Iklan Produk -->
<div class="text-center my-4">
    <a href="https://milospro.com" target="_blank">
        <img src="https://milospro.com/storage/product-images/selang-tubin.jpg" 
             alt="Selang Tubin" 
             style="max-width: 300px; height: auto; border: 1px solid #ddd; border-radius: 8px;">
    </a>
    <div class="mt-2">
        <strong>Selang Tubin</strong><br>
        <small>Produk berkualitas dari Milospro</small>
    </div>
</div>


{{-- ===== TENTANG KAMI ===== --}}
<section style="padding: 20px 0; background-color: #d3dadd; color:black;" id="biaya">
    <div class="container text-center">
        <h2>Tentang Kami</h2>
        <p>Selamat datang di blog resmi Absen Pintar.<br><br>
        Absen Pintar merupakan platform absensi online yang dirancang untuk membantu dan mempermudah pengelolaan absensi secara mudah dan efisien.<br>
        Melalui blog ini kami berbagi informasi, panduan, dan wawasan seputar dunia absensi digital, manajemen SDM, serta perkembangan teknologi yang mendukung produktivitas kerja.<br><br>
        Kami percaya bahwa transformasi digital dimulai dari hal sederhana, seperti absensi kehadiran yang mudah diakses. Sehingga kami berkomitmen menyediakan solusi praktis dan terjangkau untuk berbagai kalangan, dari skala kecil hingga besar.<br>
        Blog ini dirancang sebagai ruang berbagi manfaat bagi siapa saja yang ingin memahami lebih dalam pentingnya sistem absensi modern dan terintegrasi.<br><br>
        Terima kasih sudah berkunjung ke portal kami, semoga artikel-artikel kami menginspirasi dan memberikan solusi untuk kebutuhan Anda.<br>
        Yuk ikuti terus artikel terbaru kami dan temukan solusi tepat untuk kebutuhan absensi Anda!</p>
    </div>
</section>
<section class="py-5" id="panduan">
    <div class="container">
        <h2 class="text-center mb-4">Mengapa Memilih Absen Pintar?</h2>
        <div class="row text-center">
            <div class="col-md-4 mb-3">
                <h5>Praktis dan otomatis</h5>
                <p>pengelolaan jadwal,kalender,absensi, izin dan cuti bahkan sampai laporan pekerjaan harian karyawan dapat dilakukan scara terstruktur efisien dan mudah</p>
                <img src="{{ asset('storage/logo/praktis.jpg') }}" alt="gambar ilustrasi" class="img-fluid mt-4 text-center">
            </div>
            <div class="col-md-4 mb-3">
                <h5>skalable</h5>
                <p>cocok untuk bisnis kecil hingga Perusahaan besar</p>
                        <img src="{{ asset('storage/logo/ilustrasi.png')  }}" alt="gambar ilustrasi" class="img-fluid mt-4 text-center">
            </div>
            <div class="col-md-4 mb-3">
                <h5>Real time</h5>
                <p>analisis laporan yang kapan saja secara langsung</p>
                <img src="{{ asset('storage/logo/realtime.jpg') }}" alt="gambar ilustrasi" class="img-fluid mt-4 text-center">
            </div>
        </div>
    </div>
</section>
<br><br><br><br><br><br><br>


{{-- FOOTER ADS --}}
@if(!empty($ads['footer']))
    <div class="container text-center my-3">
        {!! renderAdThumbnail($ads['footer']->random()) !!}
    </div>
@endif

{{-- POPUP --}}
@if(!empty($ads['popup']))
    <div id="popup-ads" style="display:none; position:fixed; top:50%; left:50%; transform:translate(-50%, -50%);
        background:#fff; padding:15px; z-index:9999; border-radius:10px; max-width:500px;">
        <div style="text-align:right;">
            <button onclick="document.getElementById('popup-ads').style.display='none'" 
                    style="background:none; border:none; font-size:20px;">&times;</button>
        </div>
        {!! renderAdThumbnail($ads['popup']->random()) !!}
    </div>
    @push('scripts')
    <script>
        window.addEventListener('load', () => {
            setTimeout(() => document.getElementById('popup-ads').style.display = 'block', 3000);
        });
    </script>
    @endpush
@endif

@endsection

