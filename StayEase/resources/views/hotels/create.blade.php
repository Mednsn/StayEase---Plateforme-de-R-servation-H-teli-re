<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h1>Ajouter un nouveau Hôtel</h1>

<form action="{{ route('hotels.store') }}" method="POST">
    @csrf 
    
    <div>
        <label>Nom de l'hôtel :</label>
        <input type="text" name="name"  required>
       
    </div>
     <div>
        <label>description :</label>
        <textarea type="text" name="description"></textarea>
       
    </div>
     <div>
        <label>address</label>
        <input type="text" name="address" required>
       
    </div>

    <button type="submit" style="margin-top: 10px;">Enregistrer l'hôtel</button>
</form>

<a href="{{ route('hotels.index') }}">Retour à la liste</a>
    
</body>
</html>