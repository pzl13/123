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
                        <div class="card-header">{{ __('Добавить продукт') }}</div>

                            <div class="card-body">
                                <form action="{{route('add.new')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="name_products" class="col-md-3 col-form-label text-md-right">{{ __('Название продукта') }}</label>
                                            <div class="col-md-6">
                                    <input type="text" name="name_products" placeholder="Укажите имя Продукта">
                                            </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="name_descriptions" class="col-md-3 col-form-label text-md-right">{{ __('Описание') }}</label>
                                            <div class="col-md-6">
                                    <input type="text" name="name_descriptions" placeholder="Укажите описание продукта">
                                            </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="image" class="col-md-3 col-form-label text-md-right">{{ __('Изображение продукта') }}</label>
                                            <div class="col-md-6">
                                    <input type="file" name="images[]" multiple accept="image/*,image/jpeg">
                                            </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="categories" class="col-md-3 col-form-label text-md-right">{{ __('Выберите категории') }}</label>
                                            <div class="col-md-6">
                                    <select name="categories[]" multiple style="width: inherit;">
                                        @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name_category}}</option>

                                        @endforeach
                                    </select>
                                            </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Сохранить
                                    </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                    </div>
                </div>
            </div>
@endsection
