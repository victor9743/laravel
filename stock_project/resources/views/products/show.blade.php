<div>
    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}">
            @error('name')
                <p>{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="cost_price">Cost Price</label>
            <input type="text" name="cost_price" id="cost_price" value="{{ old('cost_price', $product->cost_price) }}">
            @error('cost_price')
                <p>{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="selling_price">Selling Price</label>
            <input type="text" name="selling_price" id="selling_price" value="{{ old('selling_price', $product->selling_price) }}">
            @error('selling_price')
                <p>{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="stock_quantity">Stock Quantity</label>
            <input type="number" name="stock_quantity" id="stock_quantity" value="{{ old('stock_quantity', $product->stock_quantity)}}">
            @error('stock_quantity')
                <p>{{ $message }}</p>
            @enderror
        </div>
        <div>
            <a href="{{ route('products.index') }}">Back</a>
            <input type="submit" value="Save">
        </div>
    </form>
</div>
