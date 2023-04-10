<div>
    <h3> Обновите информацию об этом товаре: </h3>
    <form action="{{ route('product.editPost') }}" method="post" enctype="multipart/form-data">
        @csrf
        <p>
        <input type="hidden" value="{{$product->id}}" name="id" />
        </p>
        <p>
        Новое название товара: 
        <input type="text" value = "{{$product->name}}" name="name" />
        </p>
        <p>
        Новое описание товара: 
        <input type="text" value = "{{$product->description}}" name="description" />
        </p>
        <p>
        Новое изображение с устройства: 
        <input type="file" value = "{{$product->photo}}" name="photo"/>
        </p>
        <p>
        Новая цена товара:
         <input type="number" value = "{{$product->price}}" name="price" />   
        </p>
        <button type="submit" class="btn btn-warning"> Обновить </button>
    </form>
</div>