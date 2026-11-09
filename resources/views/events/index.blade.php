@foreach($events as $event)
<div class="card">
  <h3>{{ $event->name }}</h3>
  <p>{{ $event->date }} • {{ $event->time }}</p>
  <p>Rp {{ number_format($event->price, 0, ',', '.') }}</p>
  
  <form action="{{ route('tickets.store') }}" method="POST">
    @csrf
    <input type="hidden" name="event_id" value="{{ $event->id }}">
    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
      Beli Tiket via DANA
    </button>
  </form>
</div>
@endforeach