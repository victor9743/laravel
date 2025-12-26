<form action="{{ route('products_save') }}" method="POST">
    @csrf
    <div>
        <label for="name">Name</label><br>
        <input type="text" name="name" id="name" value={{ old('name') }}>
        @error('name')
            <div>
                {{ $message }}
            </div>
        @enderror
    </div>
    <div>
        <label for="description">Description</label><br>
        <textarea name="description" id="description" cols="30" rows="10">{{ old('description') }}</textarea>
        @error('description')
            <div>
                {{ $message }}
            </div>
        @enderror
    </div>
    <div>
        <label for="price">Price</label><br>
        <input type="text" name="price" id="price" value={{ old('price') }}>
        @error('price')
            <div>
                {{ $message }}
            </div>
        @enderror
    </div>
    <div>
        <label for="quantity">Quantity</label><br>
        <input type="number" name="quantity" id="quantity">
        @error('quantity')
            <div>
                {{ $message }}
            </div>
        @enderror
    </div>

    <div>
        <input type="submit" value="Save">
    </div>
</form>