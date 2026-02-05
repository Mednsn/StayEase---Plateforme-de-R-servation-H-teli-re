<form action="{{ route('categories.destroy',$category) }}" method="POST">
    @csrf
    @method('delete')
    <button type="submit"
        class="text-red-600 hover:text-red-900 hover:font-bold font-medium">Delete</button>
</form>