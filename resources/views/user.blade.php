    @extends('layouts.app')
        @section('content')
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header">{{ __('Редактировать пользователя') }}</div>
                             <div class="card-body">
                            <form action="{{route('showallusers')}}/{{$user->id}}/update" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('Имя пользователя') }}</label>
                                        <div class="col-md-6">
                                            <input type="text" name="name" placeholder="Укажите Имя"value="{{{$user->name}}}">
                                        </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-md-3 col-form-label text-md-right">{{ __('E-mail') }}</label>
                                        <div class="col-md-6">
                                            <input type="text" name="email" placeholder="Укажите e-mail"value="{{{$user->email}}}">
                                        </div>
                                </div>
                                <div class="form-group row">
                                    <label for="age" class="col-md-3 col-form-label text-md-right">{{ __('Возраст') }}</label>
                                        <div class="col-md-6">
                                            <input type="text" name="age" placeholder="Укажите возраст"value="{{{$user->age}}}">
                                        </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password" class="col-md-3 col-form-label text-md-right">{{ __('Пароль') }}</label>
                                        <div class="col-md-6">
                                            <input type="password" name="password" placeholder="Введите новый пароль"value="{{{$user->password}}}">
                                        </div>
                                </div>
                                <div class="form-group row">
                                    <label for="image" class="col-md-3 col-form-label text-md-right">{{ __('Выберите изображение') }}</label>
                                        <div class="col-md-6">
                                             <input type="file" name="image_file" multiple accept="image/*,image/jpeg" value="{{{$user->image}}}">
                                        </div>
                                </div>
                                <div class="form-group row">
                                    <label for="image" class="col-md-3 col-form-label text-md-right">{{ __('Активное изображение') }}</label>
                                    <div class="col-md-6">
                                        <img src="{{url('/storage/user_images/'.$user->image)}}">
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            Сохранить
                                        </button>
                                    </div>
                                </div>
                                <a class="btn" href="/showAllUsers">Вернуться назад</a>
                            </form>
                         </div>
                    </div>
                </div>
            </div>
        @endsection
