<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Product</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 dark:bg-gray-900">
<div class="container mx-auto p-5">
    <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">{{ $product->title }}</h1>
        <div class="flex flex-col md:flex-row">
            <div class="md:w-1/8">
                <img src="{{ asset('storage/images/' . $product->image) }}" alt="{{ $product->title }}" class="rounded-lg w-full">
            </div>
            <div class="md:w-1/2 md:pl-6 mt-4 md:mt-0">
                <p class="text-gray-700 dark:text-gray-300 mb-2"><strong>Description:</strong> {{ $product->description }}</p>
                <p class="text-gray-700 dark:text-gray-300 mb-2"><strong>Price:</strong> {{ 'Rp ' . number_format($product->price, 2, ',', '.') }}</p>
                <p class="text-gray-700 dark:text-gray-300 mb-2"><strong>Stock:</strong> {{ $product->stock }}</p>
            </div>
        </div>
        <div class="mt-6">
            <a href="{{ route('products.index') }}" class="text-white bg-blue-500 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Back</a>
        </div>
    </div>
</div>
</body>
</html>
