<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>

<script type="text/javascript">
    window.onload = function () {
        snap.pay('{{ $snapToken }}', {
            onSuccess: function (result) {
                alert("Pembayaran berhasil");
                window.location.href = '/dashboard';
            },
            onPending: function (result) {
                alert("Menunggu pembayaran");
            },
            onError: function (result) {
                alert("Pembayaran gagal");
            },
        });
    };
</script>
