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
                <label>Judul</label>
                <input type="text" name="title" class="form-control" placeholder="Judul" required>
            </div>
            <div class="mb-3">
                <label>Deskripsi</label>
                <textarea name="description" class="form-control" placeholder="Deskripsi" required></textarea>
            </div>
            <div class="mb-3">
                <label>Gambar</label>
                <input type="file" name="images[]" class="form-control" multiple>
            </div>
            @if ($showMonthlyForm)
            <button type="button" id="nextToMonthly" class="btn btn-primary">Lanjut Evaluasi Bulanan</button>
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

    <h3>Riwayat Catatan</h3>
    <div class="row">
        @foreach ($catatans as $catatan)
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5>{{ $catatan->title }}</h5>
                    <p>{{ $catatan->created_at->format('d M Y') }}</p>
                    <p>{{ $catatan->description }}</p>
                    <!-- <p><strong>Kendala:</strong> {{ $catatan->kendala }}</p>
                    <p><strong>Solusi:</strong> {{ $catatan->solusi }}</p>
                    <p><strong>Target:</strong> {{ $catatan->target }}</p> -->

                    @foreach ($catatan->images as $image)
                    <img src="{{ asset($image->image_path) }}" class="img-fluid" style="max-height: 150px;">
                    @endforeach
                </div>
            </div>
        </div>
        @endforeach
    </div>

</div>

<script>
document.getElementById('nextToMonthly').addEventListener('click', function() {
    document.getElementById('step-1').style.display = 'none';
    document.getElementById('step-2').style.display = 'block';
});
</script>

@endsection