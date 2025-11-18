@extends('layouts.app_landing')

@section('title', 'Privacy Policy - Absen Pintar')

@section('content')
<section class="py-5">
    <div class="container">
        <div class="mb-5 text-center">
            <h1 class="display-5 fw-bold">Privacy Policy</h1>
            <p class="text-muted">Terakhir diperbarui: <strong>{{ $updated_at ?? '18 November 2025' }}</strong></p>
        </div>

        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <h4>1. Pendahuluan</h4>
                <p>Absen Pintar ("kami", "kita", atau "milik kami") menghargai privasi Anda. Kebijakan privasi ini menjelaskan bagaimana kami mengumpulkan, menggunakan, menyimpan, dan membagikan data pribadi saat Anda mengunjungi situs web atau menggunakan layanan kami.</p>

                <h4>2. Informasi yang Kami Kumpulkan</h4>
                <ul>
                    <li><strong>Informasi identitas:</strong> nama, jabatan, dll.</li>
                    <li><strong>Informasi kontak:</strong> email, telepon (jika diberikan).</li>
                    <li><strong>Data absensi:</strong> waktu presensi, foto verifikasi, lokasi (jika fitur diaktifkan).</li>
                    <li><strong>Informasi teknis:</strong> IP, jenis perangkat, cookies, logs.</li>
                </ul>

                <h4>3. Tujuan Penggunaan Data</h4>
                <p>Kami menggunakan data untuk menyediakan layanan absensi, verifikasi kehadiran, pembuatan laporan, komunikasi, analitik, dan kepatuhan hukum.</p>

                <h4>4. Penggunaan Cookie</h4>
                <p>Kami menggunakan cookies untuk meningkatkan pengalaman pengguna dan analitik. Anda dapat mengatur preferensi cookie melalui browser atau popup cookie kami.</p>

                <h4>5. Pihak Ketiga</h4>
                <p>Kami dapat berbagi data dengan penyedia layanan pihak ketiga (misal hosting, analytics, dan iklan seperti Google). Kami memastikan adanya perjanjian yang sesuai untuk menjaga keamanan data.</p>

                <h4>6. Keamanan Data</h4>
                <p>Kami menerapkan langkah-langkah teknis dan organisasi untuk melindungi data. Namun, kami tidak dapat menjamin keamanan mutlak.</p>

                <h4>7. Retensi Data</h4>
                <p>Data disimpan selama diperlukan untuk tujuan layanan atau sesuai kewajiban hukum. Contoh: data absensi disimpan selama <strong>3 tahun</strong> (sesuaikan kebijakan internal).</p>

                <h4>8. Hak Pengguna</h4>
                <p>Anda dapat meminta akses, koreksi, penghapusan, atau pembatasan pemrosesan data. Hubungi kami di <a href="mailto:{{ $contact_email ?? 'email@example.com' }}">{{ $contact_email ?? 'email@example.com' }}</a>.</p>

                <h4>9. Perubahan Kebijakan</h4>
                <p>Kami dapat memperbarui kebijakan ini. Perubahan akan diumumkan di halaman ini.</p>

                <h4>10. Kontak</h4>
                <p>Jika ada pertanyaan, silakan hubungi: <br>
                    <strong>Absen Pintar</strong><br>
                    Email: <a href="mailto:{{ $contact_email ?? 'email@example.com' }}">{{ $contact_email ?? 'email@example.com' }}</a>
                </p>
            </div>
        </div>

        <div class="text-center">
            <a href="{{ url('/') }}" class="btn btn-outline-primary">Kembali ke Beranda</a>
        </div>
    </div>
</section>
@endsection
