@extends('layouts.app')

@section ('title', 'catatan')
@section ('content')

<body>

    <div class=" container" style="background-color: #ffffff; padding: 40px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,
        0, 0, 0.1); width: 300px;">
        <h2 style="font-family:arial; text-align:center; font-size:30pt; font-weight:bold;">Input catatan</h2>
        <form action="{{ route('catatan.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="text" name="title" placeholder="Masukkan judul" style="width: 100%; padding: 10px; border: 1px
                    solid #ccc; border-radius: 4px; box-sizing: border-box; padding-top:20px;" />
            <br><br>
            <textarea name=" description" placeholder="Masukkan catatan" style="width: 100%; padding: 10px; border: 1px
                    solid #ccc; border-radius: 4px; box-sizing: border-box;"></textarea>
            <br><br>
            <input type="file" name="image" style="width: 100%; padding: 10px; border: 1px
                    solid #ccc; border-radius: 4px; box-sizing: border-box;" />
            <button type="submit"
                style="width: 100%; padding: 10px; background-color: #4c82c0; color: white; border: none; border-radius: 4px; margin-top: 20px; cursor: pointer; font-size: 16px;">Simpan</button>
        </form>

    </div>


    <ul>
        @foreach ($catatans as $catatan)
        <li
            style="list-style:none; background: #fff; border: 1px solid #ddd; border-radius: 8px; margin-bottom: 20px; padding: 15px; box-shadow: 0 2px 4px rgba(0,0,0,0.05);">


            <h3 style="margin-top:0; font-size:20pt;color:black; ">{{ $catatan->title }}</h3>
            <p style="color:bule;">{{ $catatan->created_at }}</p>
            <p style="color:black;">{{ $catatan->description }}</p>
            @if ($catatan->image)
            <img src="{{ asset('laporan/' . $catatan->image) }}" width="200"
                style="margin-top:0px; border-radius:2px; height:auto;">
            @endif
</body>
</li>
@endforeach
</ul>

</body>
@endsection