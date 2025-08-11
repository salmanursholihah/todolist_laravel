@extends('layouts.app')

@section('content')
<h2>Proses Pembayaran</h2>

<button id="pay-button">Bayar dengan Midtrans</button>

<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
<script>
document.getElementById('pay-button').onclick = function(){
    snap.pay('{{ $snapToken }}', {
        onSuccess: function(result){
            alert('Pembayaran berhasil!');
            window.location.href = '/'; // arahkan ke halaman yang sesuai
        },
        onPending: function(result){
            alert('Pembayaran tertunda, silakan lanjutkan pembayaran.');
        },
        onError: function(result){
            alert('Terjadi kesalahan saat pembayaran.');
        }
    });
};
</script>
@endsection