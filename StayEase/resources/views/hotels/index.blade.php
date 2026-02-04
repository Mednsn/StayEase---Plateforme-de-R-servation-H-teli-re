

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<h1>Mes Hôtels</h1>

<a href="{{ route('hotels.create') }}" style="display: inline-block; margin-bottom: 20px;">
     Ajouter un hôtel
</a>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom de l'Hôtel</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($hotels as $hotel)
            <tr>
                <td>{{ $hotel->id }}</td>
                <td>{{ $hotel->name }}</td>
                <td>
                    <a href="{{ route('hotels.edit', $hotel) }}">Modifier</a>

                    <form action="{{ route('hotels.destroy', $hotel) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Supprimer</button>
                    </form>
                </td>
            </tr>
      
        @endforeach
    </tbody>
</table>
</body>
</html>