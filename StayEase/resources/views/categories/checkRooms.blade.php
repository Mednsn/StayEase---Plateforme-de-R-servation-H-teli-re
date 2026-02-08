<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Available Rooms</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans p-6">

<h4 class="text-lg font-semibold text-gray-800 mb-4">
    Selectionner les dates afin de trouver des chambres disponible :
</h4>

<div class="flex flex-col md:flex-row gap-6">
    <!-- Form à gauche -->
    <form action="{{ route('room.check-rooms') }}" method="POST" class="bg-white p-6  rounded-lg shadow-md w-full md:w-1/3">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-1">Check in :</label> 
            <input type="date" name="check_in" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-1">Check out :</label> 
            <input type="date" name="check_out" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded font-semibold">Chercher</button>
    </form>

    <!-- Results à droite -->
    <div class="bg-white p-6 rounded-lg shadow-md w-full md:w-2/3">
        @isset($rooms_disponible)
            <h1 class="text-xl font-bold text-gray-800 mb-4">{{ $date_in }} ==>> {{ $date_out }}</h1>
            <div class="space-y-3">
                @foreach ($rooms_disponible as $room)
                    <div class="border p-3 rounded hover:bg-gray-50">
                        <h5 class="font-semibold text-gray-700">Room ID: {{ $room->id }}</h5>
                        <h5 class="text-gray-600">number: {{ $room->number }}</h5>
                        <h5 class="text-gray-600">date chenck in : {{ $room->check_in }}</h5>
                        <h5 class="text-gray-600">date check out : {{ $room->check_out }}</h5>
                        <h5 class="text-gray-600">price : {{ $room->price_per_night }}</h5>
                    </div>
                @endforeach
            </div>
        @endisset
    </div>
</div>

</body>
</html>
