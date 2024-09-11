<html>
<head>
    <title>Mass Edit Products</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>
<h1>Mass Edit Products</h1>
<form action="{{ route('products.mass_edit') }}" method="POST">
    @csrf
    @foreach($products as $product)
        <div>
            <input type="hidden" name="products[{{ $loop->index }}][id]" value="{{ $product->id }}">
            <label>Title:</label>
            <input type="text" name="products[{{ $loop->index }}][title]" value="{{ $product->title }}" required>
            <label>Description:</label>
            <input type="text" name="products[{{ $loop->index }}][description]" value="{{ $product->description }}" required>
            <label>Price:</label>
            <input type="number" name="products[{{ $loop->index }}][price]" value="{{ $product->price }}" required>
            <label>Stock:</label>
            <input type="number" name="products[{{ $loop->index }}][stock]" value="{{ $product->stock }}" required>
        </div>
    @endforeach
    <button type="submit">Update Products</button>
</form>
</body>
</html>
