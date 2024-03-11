@extends('layout')

@section('content')

<main class="container"> 
  <!-- Right Column -->
  <div class="row">
    <!-- Left Column / Headphones Image -->
    <div class="col-md-4">
        <img data-image="black" src="images/black.png" alt="">
        <img data-image="blue" src="images/blue.png" alt="">
        <img data-image="red" class="active" src="{{ $product->image }}" alt="">
    </div>
    <div class="col-md-8">
 
        <!-- Product Description -->
        <div class="product-description">
          <span>{{ $product->name }}</span>
          <h1>{{ $product->name }}</h1>
          <p>{{ $product->description }}</p>
        </div>
     
        <!-- Product Pricing -->
        <div class="product-price">
          <span><strike>{{ $product->retail_price }}$</strike></span><br>
          <span>{{ $product->price }}$</span>
          <p class="btn-holder"><a href="{{ route('add.to.cart', $product->id) }}" class="btn btn-primary btn-block text-center" role="button">Add to cart</a> </p>
        </div>
      </div>

      <div class="mt-4">
          <b>Recent view Items</b>
        @foreach($recent_views as $view)
            <div class="col-md-12">
                <div class="thumbnail">
                    <img src="{{ $view->product->image }}" alt="">
                    <div class="caption">
                        <h4>{{ $view->product->name }}</h4>
                        <p>{{ $view->product->description }}</p>
                        <p><strong>Retail Price:  </strong> <strike>{{ $view->product->retail_price }}$</strike></p>
                        <p><strong>Our Price: </strong> {{ $view->product->price }}$</p>
                        <p class="btn-holder"><a href="{{ route('add.to.cart', $view->product->id) }}" class="btn btn-primary btn-block text-center" role="button">Add to cart</a> </p>
    
                        <p class="btn-holder"><a href="{{ route('product.show', $view->product->id) }}" class="btn btn-primary btn-block text-center" role="button">View Product</a> </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    
  </div>

  
   

</main>



@endsection