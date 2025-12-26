<div>
    @foreach($products as $product)
        <div>
            <div>
                {{ $product->name }}
            </div>
            <div>
                {{ $product->description }}
            </div>
            <div>
                {{ $product->price }}
            </div>
            <div>
                {{ $product->quantity }}
            </div>
            <div>
                <a href="{{ route('products_show', ['id' => Crypt::encrypt($product->id)]) }}">Details</a>
                <form action="{{ route('products_delete', ['id' => Crypt::encrypt($product->id)]) }}">
                    @method('DELETE')
                    <input type="submit" value="Delete">
                </form>
            </div>
            <hr>
        </div>
    @endforeach

    <a href="{{ route('products_new') }}">+ Product</a>
</div>
