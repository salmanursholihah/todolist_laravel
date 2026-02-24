@extends('layouts.app')

@section('title', 'Catatan')
@section('content')

<meta name="viewport" content="width=device-width, initial-scale=1">

<div class="container my-4">

    <form id="multiStepForm" method="POST" action="{{ route('catatan.store') }}" enctype="multipart/form-data">
        @csrf

        <!-- STEP 1 -->
        <div id="step-1">
            <h3>Form Catatan Harian</h3>
            <div class="mb-3">
                <label class="fw-bold">Judul</label>
                <input type="text" name="title" class="form-control" placeholder="Judul" required>
            </div>
            <!-- <div class="mb-3">
                <label>Deskripsi</label>
                <textarea name="description" class="form-control" placeholder="Deskripsi" required></textarea>
            </div> -->

                      @php
$template = "

1. Planning Awal :
   
2. Pencapaian : 

3. Permasalahan : 
";
@endphp

<div class="mb-3">
    <label class="fw-bold">Deskripsi Laporan</label>

    <textarea 
        name="description" 
        rows="10"
        class="form-control"
        style="white-space: pre-wrap; font-family: 'Courier New', monospace;"
        required>{{ old('description', $template) }}</textarea>

    <small class="text-muted">
        Isi laporan sesuai bagian yang tersedia. Jangan menghapus format utama.
    </small>
</div>
   <div class="mb-3">
                <label class="fw-bold">Target selanjutnya</label>
                <input type="text" name="target" class="form-control" placeholder="Target...">
            </div>

            <div class="mb-3">
                <label class="fw-bold">Gambar</label>
                <input type="file" name="images[]" class="form-control" multiple>
            </div>
            @if ($showMonthlyForm)
            <!-- <button type="button" id="nextToMonthly" class="btn btn-primary">Lanjut Evaluasi Bulanan</button> -->
            @endif
            <button type="submit" id="submitDailyOnly" class="btn btn-success">Simpan Harian</button>
        </div>

        <!-- STEP 2 -->
        <!-- <div id="step-2" style="display: none;">
            <h3>Form Evaluasi Bulanan</h3>

            <div class="mb-3">
                <label>Kendala</label>
                <input type="text" name="kendala" class="form-control" placeholder="Kendala...">
            </div>
            <div class="mb-3">
                <label>Solusi</label>
                <input type="text" name="solusi" class="form-control" placeholder="Solusi...">
            </div>
            <div class="mb-3">
                <label>Target Bulan Depan</label>
                <input type="text" name="target" class="form-control" placeholder="Target...">
            </div>

            <button type="submit" class="btn btn-primary">Simpan Semua</button>
        </div>
    </form>

    <hr> -->

        <!-- <h3>Riwayat Catatan</h3>
        <div class="row">
            @foreach ($catatans as $catatan)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5>{{ $catatan->title }}</h5>
                        <p>{{ $catatan->created_at->format('d M Y') }}</p>
                        <p>{{ $catatan->description }}</p> -->
                        <!-- <p><strong>Kendala:</strong> {{ $catatan->kendala }}</p>
                    <p><strong>Solusi:</strong> {{ $catatan->solusi }}</p>
                    <p><strong>Target:</strong> {{ $catatan->target }}</p> -->

                        <!-- @foreach ($catatan->images as $image)
                        <img src="{{ asset($image->image_path) }}" class="img-fluid" style="max-height: 150px;">
                        @endforeach
                    </div>
                </div>
            </div>
            @endforeach
        </div>

</div> -->

<br><br><br>

<h3 class="mb-4">Riwayat Catatan</h3>

<div class="row">
    @foreach ($catatans as $catatan)
    <div class="col-md-6 mb-4">
        <div class="card shadow-sm border-0">
            <div class="card-body">

                {{-- Header --}}
                <div class="mb-3 border-bottom pb-2">
                    <h5 class="fw-bold mb-1">{{ $catatan->title }}</h5>
                    <small class="text-muted">
                        Tanggal: {{ $catatan->created_at->format('d F Y') }}
                    </small>
                </div>

                {{-- Isi Laporan --}}
             <div style="
    background: #ffffff;
    padding: 35px 45px;
    border-radius: 6px;
    font-family: 'Times New Roman', serif;
    font-size: 16px;
    line-height: 1.8;
    border: 1px solid #dcdcdc;
    text-align: justify;
">

    <ol style="padding-left: 20px; margin-bottom: 0;">
        @php
            $lines = explode("\n", $catatan->description);
        @endphp

        @foreach($lines as $line)
            @if(trim($line) !== '')
                <li style="margin-bottom: 15px;">
                    {{ trim(preg_replace('/^\d+\.\s*/', '', $line)) }}
                </li>
            @endif
        @endforeach
    </ol>

</div>

{{-- target --}}
<div class="mt-3">
    <label class="fw-bold">Target Selanjutnya:</label>
    <p>{{ $catatan->target }}</p>
</div>

                {{-- Gambar --}}
                @if($catatan->images->count())
                <div class="mt-3">
                    <label class="fw-bold">Dokumentasi:</label>
                    <div class="row mt-2">
                        @foreach ($catatan->images as $image)
                        <div class="col-6 mb-2">
                            <img src="{{ asset($image->image_path) }}" 
                                 class="img-fluid rounded shadow-sm"
                                 style="max-height: 150px; object-fit: cover;">
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

            </div>
        </div>
    </div>
    @endforeach
</div>

<script>
document.getElementById('nextToMonthly').addEventListener('click', function() {
    document.getElementById('step-1').style.display = 'none';
    document.getElementById('step-2').style.display = 'block';
});
</script>

@endsection