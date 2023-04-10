@extends('layout')
@section('title', 'Products')
@section('content')

<div>
    <p class="btn-holder">
        <a class="btn btn-primary" href="{{ route('product.createGet') }}"> Создать новый товар </a>
    </p>
    <br>
    <p class="btn-holder">
        <a class="btn btn-primary" href="{{ route('product.cartGet') }}"> Открыть корзину </a>
    </p>
    <br>
</div>

<div class="header">
    <h3>Товары в базе данных магазина: </h3>
    <br>
</div>

<div class="container products">
 <div class="row">
   @foreach($products as $key=>$product)
   <div class="col-xs-18 col-sm-6 col-md-3">
     <div class="thumbnail">
       <img src="{{url($product->photo)}}" width="500" height="300">
       <div class="caption">
         <h4>{{ $key + 1 }}.{{ $product->name }}</h4>
         <p>{{ \Illuminate\Support\Str::limit(strtolower($product->description), 50) }}</p>
         <p><strong>Price: </strong> {{ $product->price }}руб.</p>
         <p class="btn-holder">

            <a class="btn btn-primary" href="{{ route('product.editGet', $product->id) }}"> Обновить </a>

            <form action="{{ url('addToCart/'.$product->id) }}" method="Post">
                <input type="hidden" name="id" value="{{$product->id}}">
                @csrf
                <button type="submit" class="btn btn-warning"> В корзину </button>
            </form>

            <form action="{{ url('delete',$product->id) }}" method="Get">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"> Удалить </button>
            </form>
         </p>
     </div>
   </div>
   @endforeach
 </div>
</div>

@endsection
