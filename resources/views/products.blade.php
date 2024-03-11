@extends('layout')
   
@section('content')

<div class="row">
    <div class="col-md-3">
        <select name="search">
            <option value="a-z">A-Z</option>
            <option value="z-a">Z-A</option>
            <option value="higt_low"> High to Low price</option>
            <option value="Low_High">Low to High price</option>
        </select>
    </div>
</div>
<div class="row">
    @foreach($products as $product)
        <div class="col-xs-18 col-sm-6 col-md-3">
            <div class="thumbnail">
                <img src="{{ $product->image }}" alt="">
                <div class="caption">
                    <h4>{{ $product->name }}</h4>
                    <p>{{ $product->description }}</p>
                    <p><strong>Retail Price:  </strong> <strike>{{ $product->retail_price }}$</strike></p>
                    <p><strong>Our Price: </strong> {{ $product->price }}$</p>
                    <p class="btn-holder"><a href="{{ route('add.to.cart', $product->id) }}" class="btn btn-primary btn-block text-center" role="button">Add to cart</a> </p>

                    <p class="btn-holder"><a href="{{ route('product.show', $product->id) }}" class="btn btn-primary btn-block text-center" role="button">View Product</a> </p>
                </div>
            </div>
        </div>
    @endforeach
</div>
    
@endsection