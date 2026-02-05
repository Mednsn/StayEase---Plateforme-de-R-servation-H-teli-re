<form action="{{ route('categories.update', $category->id) }}" method="POST" class="flex gap-1">
    @csrf
    @method('PUT')

    <input type="text" name="name" class="text-black/30 border-2 rounded-40" value="{{ $category->name }}">
    <button type="submit" class="bg-green-400 px-3 hover:bg-green-700 text-white border rounded-8 ">Save</button>
</form>