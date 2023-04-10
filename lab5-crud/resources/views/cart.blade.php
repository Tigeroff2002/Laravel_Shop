@extends('layout')
@section('title', 'Cart')
@section('content')

<div class="header">
    <h3>Корзина пользователя</h3>
</div>
<div class="container products">
@if(count($products) == 1 && $products[0]->id == -1)
<div>
<h4>Корзина пуста</h4>
</div>
@endif
@if($products[0]->id != -1)
<div>
    <p class="btn-holder">
        <a class="btn btn-primary" href="{{ route('product.clearCart') }}"> Очистить корзину </a>
    </p>
</div>
<div class="row">
    @foreach($products as $key=>$product)
   <div class="col-xs-18 col-sm-6 col-md-3">
        <div class="thumbnail">
            <img src="{{url($product->photo)}}" width="500" height="300">
            <div class="caption">
                <h4>{{ $key + 1 }}.{{ $product->name }}</h4>
                <p>{{ \Illuminate\Support\Str::limit(strtolower($product->description), 50) }}</p>
                <p><strong>Price: </strong> {{ $product->price }}руб.</p>
            </div>
        </div>
   @endforeach
   </div>
</div>
@endif