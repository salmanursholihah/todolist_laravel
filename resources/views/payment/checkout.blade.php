@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h3>Proses Pembayaran</h3>
    <div id="snap-container"></div>
</div>

<script src="https://app.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
<script type="text/javascript">
    window.snap.pay('{{ $snapToken }}', {
        onSuccess: function(result) {
            alert("Pembayaran berhasil!");
            window.location.href = "{{ route('dashboard') }}";
        },
        onPending: function(result) {
            alert("Menunggu pembayaran.");
        },
        onError: function(result) {
            alert("Pembayaran gagal.");
        }
    });
</script>
@endsection
