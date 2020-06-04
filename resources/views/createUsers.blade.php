@extends('layouts.app')
@section('content')
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <div class="card">
                                <div class="card-header">{{ __('Создать пользователя') }}</div>

                                <div class="card-body">
                                <form action="{{route('add.user')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('Название') }}</label>
                                            <div class="col-md-6">
                                                <input type="text" name="name" placeholder="Укажите Имя">
                                            </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="email" class="col-md-3 col-form-label text-md-right">{{ __('Email') }}</label>
                                            <div class="col-md-6">
                                                <input type="text" name="email" placeholder="Укажите e-mail">
                                            </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="age" class="col-md-3 col-form-label text-md-right">{{ __('Возраст') }}</label>
                                            <div class="col-md-6">
                                                <input type="text" name="age" placeholder="Укажите возраст">
                                            </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password" class="col-md-3 col-form-label text-md-right">{{ __('Пароль') }}</label>
                                            <div class="col-md-6">
                                                <input type="password" name="password" placeholder="Укажите ваш пароль" required>
                                            </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="image" class="col-md-3 col-form-label text-md-right">{{ __('Аватарка') }}</label>
                                            <div class="col-md-6">
                                    <input type="file" name="img" multiple accept="image/*,image/jpeg">
                                            </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                Сохранить
                                            </button>
                                        </div>
                                    </div>
                                    {{--    {{ $model->image }}--}}
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
@endsection
