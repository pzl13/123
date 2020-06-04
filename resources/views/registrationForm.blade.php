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
<form action="{{route('register')}}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="text" name="name" placeholder="Укажите ФИО">
    <input type="text" name="email" placeholder="Укажите e-mail">
    <input type="text" name="age" placeholder="Укажите возраст">
    <input type="password" name="password" placeholder="Укажите ваш пароль" required>
    <input type="file" name="img" multiple accept="image/*,image/jpeg">
    <button type="submit" value="Сохранить">Сохранить</button>
    {{--    {{ $model->image }}--}}
</form>
</body>
</html>
