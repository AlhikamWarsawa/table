<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 dark:bg-gray-900">
<div class="container mx-auto p-5">
    <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Edit Product</h1>
        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="image" class="block text-gray-700 dark:text-gray-300">Product Image</label>
                <input type="file" name="image" id="image" class="mt-1 block w-full">
                <img src="{{ asset('storage/images/' . $product->image) }}" alt="{{ $product->title }}" class="rounded-lg w-32 mt-2">
            </div>
            <div class="mb-4">
                <label for="title" class="block text-gray-700 dark:text-gray-300">Title</label>
                <input type="text" name="title" id="title" value="{{ $product->title }}" class="mt-1 block w-full">
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-700 dark:text-gray-300">Description</label>
                <textarea name="description" id="description" class="mt-1 block w-full">{{ $product->description }}</textarea>
            </div>
            <div class="mb-4">
                <label for="price" class="block text-gray-700 dark:text-gray-300">Price</label>
                <input type="text" name="price" id="price" value="{{ $product->price }}" class="mt-1 block w-full">
            </div>
            <div class="mb-4">
                <label for="stock" class="block text-gray-700 dark:text-gray-300">Stock</label>
                <input type="text" name="stock" id="stock" value="{{ $product->stock }}" class="mt-1 block w-full">
            </div>
            <div class="mt-6">
                <button type="submit" class="text-white bg-blue-500 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Update Product</button>
                <a href="{{ route('products.index') }}" class="text-white bg-gray-500 hover:bg-gray-700 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-600 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">Cancel</a>
            </div>
        </form>
    </div>
</div>
</body>
</html>
