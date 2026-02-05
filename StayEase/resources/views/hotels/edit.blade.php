<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit</title>
</head>
<body>

<h1>Ajouter un nouveau Hôtel</h1>

<form action="{{ route('hotels.update' , $hotel) }}" method="POST">
     @csrf
    @method('PUT')
    
    <div>
        <label>Nom de l'hôtel :</label>
        <input type="text" name="name" value="{{$hotel->name}}"  required>
       
    </div>
     <div>
        <label>description :</label>
        <textarea type="text" name="description">{{$hotel->description}}</textarea>
       
    </div>
     <div>
        <label>address</label>
        <input type="text" name="address" value="{{$hotel->address}}" required>
       
    </div>

    <button type="submit" style="margin-top: 10px;">Enregistrer l'hôtel</button>
</form>

<a href="{{ route('hotels.index') }}">Retour à la liste</a>
    
</body>
</html>