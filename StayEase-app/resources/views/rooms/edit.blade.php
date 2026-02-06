<!DOCTYPE html>
<html>
<head>
    <title>Modifier Chambre</title>
</head>
<body>

<h1>Modifier Chambre {{ $room->number }}</h1>

<form action="{{ route('rooms.update', $room) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Hotel ID :</label><br>
    <input type="number" name="hotel_id" value="{{ $room->hotel_id }}"><br><br>

    <label>Numéro :</label><br>
    <input type="text" name="number" value="{{ $room->number }}"><br><br>

    <label>Prix par nuit :</label><br>
    <input type="number" step="0.01" name="price_per_night" value="{{ $room->price_per_night }}"><br><br>

    <label>Capacité :</label><br>
    <input type="number" name="capacity" value="{{ $room->capacity }}"><br><br>

    <label>Description :</label><br>
    <textarea name="description">{{ $room->description }}</textarea><br><br>

    <label>Tags :</label><br>
    <select name="tags[]" multiple>
        @foreach ($tags as $tag)
            <option value="{{ $tag->id }}"
                {{ in_array($tag->id, $room->tags->pluck('id')->toArray()) ? 'selected' : '' }}>
                {{ $tag->name }}
            </option>
        @endforeach
    </select>

    <br><br>

    <label>Propriétés :</label><br>
    <select name="properties[]" multiple>
        @foreach ($properties as $property)
            <option value="{{ $property->id }}"
                {{ in_array($property->id, $room->properties->pluck('id')->toArray()) ? 'selected' : '' }}>
                {{ $property->name }}
            </option>
        @endforeach
    </select>

    <br><br>
    <button type="submit">Mettre à jour</button>
</form>

<br>
<a href="{{ route('rooms.index') }}">Retour</a>

</body>
</html>
