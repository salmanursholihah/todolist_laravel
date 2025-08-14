
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Iklan</title>
</head>
<body>
    <h1>Iklan Aktif</h1>

    @if($ads->count() > 0)
        @foreach($ads as $ad)
            <a href="{{ $ad->link_url }}" target="_blank">
                <img src="{{ asset($ad->image_url) }}" alt="Iklan" style="max-width: 300px; margin: 10px;">
            </a>
        @endforeach
    @else
        <p>Belum ada iklan aktif.</p>
    @endif

</body>
</html>
