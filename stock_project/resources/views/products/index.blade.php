<div>
    <div>
        @foreach($products as $product)
            <div>
                {{ $product->name }}
                <br>
                {{ $product->cost_price }}
                <br>
                {{ $product->selling_price }}
                <br>
                {{ $product->stock_quantity }}
                <br>
                <a href="{{ route('products.show', ['product' => Crypt::encrypt($product->id)]) }}">Detalhes</a>
                <br>
                <form action="{{ route('products.destroy', ['product' => Crypt::encrypt($product->id)]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="Delete">
                </form>
            </div>
        @endforeach
    </div>
    <a href="{{ route('products.create')}}">Create</a>
</div>