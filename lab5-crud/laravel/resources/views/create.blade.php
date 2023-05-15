<div>
    <h3> Введите информацию о новом товаре: </h3>
    <form action="{{ route('product.createPost') }}" method="post" enctype="multipart/form-data">
        @csrf
        <p>
        Название товара: 
        <input type="text" name="name" />
        </p>
        <p>
        Описание товара: 
        <input type="text" name="description" />
        </p>
        <p>
        Изображение с устройства: 
        <input type="file" name="photo"/>
        </p>
        <p>
         Цена товара:
         <input type="number" name="price" />   
        </p>
        <button type="submit" class="btn btn-warning"> Создать </button>
    </form>
</div>