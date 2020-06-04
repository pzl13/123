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
                            <div class="card-header">{{ __('Добавить категорию') }}</div>
                                <div class="card-body">
                        <form action="{{route('add.category')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="name_category" class="col-md-3 col-form-label text-md-right">{{ __('Название категории') }}</label>
                                <div class="col-md-6">
                                     <input type="text" name="name_category" placeholder="Укажите имя категории">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-md-3 col-form-label text-md-right">{{ __('Описание') }}</label>
                                    <div class="col-md-6">
                                        <input type="text" name="description" placeholder="Описание категории">
                                    </div>
                            </div>

                            <div class="form-group row">
                                <label for="img_category" class="col-md-3 col-form-label text-md-right">{{ __('Выберите изображение') }}</label>
                                    <div class="col-md-6">
                                        <input type="file" name="img_category" multiple accept="image/*,image/jpeg">
                                    </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" value="Сохранить">
                                        Сохранить
                                    </button>
                                </div>
                            </div>

                        </form>
@endsection

