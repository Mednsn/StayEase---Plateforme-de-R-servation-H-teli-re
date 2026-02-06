<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans p-6">

<div class="bg-white p-6 rounded-lg shadow-md max-w-md mb-6">
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf 
        <label class="block text-gray-700 font-semibold mb-2">Nom de category :</label>
        <input type="text" name="name" placeholder="ex: suites ..." class="w-full p-2 border border-gray-300 rounded mb-4 focus:outline-none focus:ring-2 focus:ring-blue-500">
        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-4 py-2 rounded">ajouter category</button>
    </form>
</div>

<h2 class="text-xl font-bold text-gray-800 mb-4">Affichage des categories:</h2>

<div class="overflow-x-auto">
<table class="min-w-full bg-white rounded-lg shadow-md">
    <thead>
        <tr class="bg-gray-200 text-gray-700 uppercase text-sm">
            <th class="py-3 px-4 text-left">#id</th>
            <th class="py-3 px-4 text-left">name</th>
            <th class="py-3 px-4 text-left">action</th>
        </tr>
    </thead>
    <tbody>
        @if($categories)
        @foreach ($categories as $category)
        <tr class="border-b hover:bg-gray-50">
            <td class="py-3 px-4">#{{ $category->id }}</td>
            <td class="py-3 px-4">
                <form action="{{ route('categories.update',$category) }}" method="POST" class="flex gap-2">
                    @csrf 
                    @method('PUT')
                    <input type="text" name="name" value="{{ $category->name }}" class="flex-1 p-2 bg-black/10 border border-gray-400 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded">update</button>
                </form>
            </td>
            <td class="py-3 px-4">
                <form action="{{ route('categories.destroy',$category) }}" method="POST">
                    @csrf 
                    @method('delete')
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">delete</button>
                </form>
            </td>
        </tr>
        @endforeach
        @endif
    </tbody>
</table>
</div>

</body>
</html>
