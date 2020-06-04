
<html>
<head>
    <title>Форма заявки с сайта</title>
</head>
<body>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="http://127.0.0.1:8000/creatUser" method="post">
    @csrf
    <input type="text" name="name" placeholder="Укажите ФИО">
    <input type="text" name="email" placeholder="Укажите e-mail">
    <input type="text" name="age" placeholder="Укажите возраст">
    <input type="password" name="password" placeholder="Укажите ваш пароль" required>
    <input type="file" name="img" multiple accept="image/*,image/jpeg">
    <button type="submit" value="Сохранить">Сохранить</button>
{{--    {{ $model->image }}--}}
</form>
<form action="http://127.0.0.1:8000/creatUser" method="post">
    @csrf
    <input type="text" name="name_category" placeholder="Укажите имя категории">
    <input type="file" name="img_category" multiple accept="image/*,image/jpeg">
    <button type="submit" value="Сохранить">Сохранить</button>
</form>
<form action="http://127.0.0.1:8000/creatUser" method="post">
    @csrf
    <input type="text" name="name_products" placeholder="Укажите имя Продукта">
    <input type="text" name="name_descriptions" placeholder="Укажите имя описание продукта">
    <input type="file" name="images_products" multiple accept="image/*,image/jpeg">
            @foreach($categories as $categories){
            <option value="{{$categories->id}}">{{$categories->name_category}}</option>
            }
            @endforeach

    <button type="submit" value="Сохранить">Сохранить</button>
</form>
</body>
</html>
