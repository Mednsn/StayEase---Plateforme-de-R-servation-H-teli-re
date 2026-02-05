
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<div>
<form action="{{ route('categories.store') }}" method="POST">
    @csrf 
    <label for="">Nom de category :</label>
    <input type="text" name="name" placeholder="ex: suites ...">
    <button type="submit" >ajouter category</button>
</form>
</div>
<h2>affichage des categories:</h2>
<table>
    <thead>
        <tr>
            <th>#id</th>
            <th>name</th>
            <th>action</th>
        </tr>
    </thead>
    <tbody>
        @if($categories)
        @foreach ($categories as $category)
        <tr>
        <td>#{{ $category->id }}</td>
        <td>
            <form action="{{ route('categories.update',$category) }}" method="POST">
                @csrf 
                @method('PUT')
                <input type="text" name="name" value="{{ $category->name }}">
                <button type="submit" class="">update</button>
            </form>
        </td>
        <td>
            <form action="{{ route('categories.destroy',$category) }}" method="POST">
                @csrf 
                @method('delete')
                <button type="submit">delete</button>
            </form>
        </td>
        </tr>
        @endforeach
        @endif
    </tbody>
</table>
</body>
</html>