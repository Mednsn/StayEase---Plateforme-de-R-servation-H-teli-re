<form action="{{ route('posts.store')}}" method="POST" class="space-y-6">
    @csrf
    <div>
        <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Post Title</label>
        <input type="text" id="title" name="title" placeholder="Enter post title"
            class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition outline-none">

    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <label for="author" class="block text-sm font-medium text-gray-700 mb-1">Post author</label>
        <input type="text" id="author" name="author" placeholder="Enter post author"
            class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition outline-none">
        <label for="read-time" class="block text-sm font-medium text-gray-700 mb-1">Post read time (8 min )</label>
        <input type="text" id="read-time" name="read_time" placeholder="Enter post read-time"
            class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition outline-none">
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label for="category" class="block text-sm font-medium text-gray-700 mb-1">Select Category</label>
            <select name="category_id"
                class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition outline-none bg-white">
                <!-- @foreach ($categories as $category)
                <option value=" {{ $category['id'] }}"> {{ $category['name'] }}</option>
                @endforeach -->
            </select>
        </div>
        <div>
            <label for="image" class="block text-sm font-medium text-gray-700 mb-1">image </label>
            <input type="text" id="image" name="image" placeholder="e.g. php, backend"
                class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition outline-none">
        </div>
    </div>

    <div>
        <label for="content" class="block text-sm font-medium text-gray-700 mb-1">Content</label>
        <textarea id="content" name="content" rows="6" placeholder="Write your post content..."
            class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition outline-none"></textarea>
    </div>

    <div class="flex items-center justify-end space-x-4 pt-4 border-t border-gray-100">
        <button type="button" onclick="closeModal()"
            class="px-6 py-2 rounded-lg text-gray-700 font-medium hover:bg-gray-100 transition">
            Cancel
        </button>
        <button type="submit"
            class="px-6 py-2 rounded-lg bg-indigo-600 text-white font-bold hover:bg-indigo-700 transition shadow-sm">
            Publish Post
        </button>
    </div>
</form>

