@extends('layouts.app_landing')

@section('content')
<div class="container">
    <h3>Proses Pembayaran</h3>
    <button id="pay-button" class="btn btn-primary">Bayar Sekarang</button>
</div>

<script type="text/javascript"
    src="https://app.sandbox.midtrans.com/snap/snap.js"
    data-client-key="{{ config('midtrans.client_key') }}"></script>

<script type="text/javascript">
    document.getElementById('pay-button').addEventListener('click', function () {
        snap.pay('{{ $snapToken }}', {
            onSuccess: function (result) {
                alert("Pembayaran berhasil");
                console.log(result);
                window.location.href = '/fitur-kamera'; // redirect setelah bayar
            },
            onPending: function (result) {
                alert("Menunggu pembayaran");
                console.log(result);
            },
            onError: function (result) {
                alert("Pembayaran gagal");
                console.log(result);
            }
        });
    });
</script>
@endsection
