@foreach($plans as $plan)
    <div class="card mb-3">
        <div class="card-body">
            <h5>{{ $plan->name }}</h5>
            <p>Rp {{ number_format($plan->price, 0) }} - {{ strtoupper($plan->billing_type) }}</p>
           <form method="POST" action="{{ route('subscribe') }}">
    @csrf
    <input type="hidden" name="plan_id" value="{{ $plan->id }}">
    <button type="submit" class="btn btn-primary w-100">Langganan</button>
</form>

        </div>
    </div>
@endforeach

