<h4>selectionner les dates afin de trouver des chambres disponible :</h4>

<form action="{{ route('room.check-rooms') }}" method="POST">
    @csrf
    <label for="">check in :</label> 
    <br>
    <input type="date" name="check_in">
    <br>
    <label for="">check out :</label> 
    <br>
    <input type="date" name="check_out">
    <button type="submit">chercher</button>
</form>

<div>
@isset($rooms_disponible)
<h1>{{ $date_in }} - {{ $date_out }}</h1>
@foreach ($rooms_disponible as $room)
<h5>{{ $room->id }}</h5>
<h5>{{ $room->check_in }}</h5>
<h5>{{ $room->check_out }}</h5>
@endforeach
@endif
</div>