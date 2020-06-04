    @extends('layouts.app')
    @section('content')
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Редактировать категорию') }}</div>
                <div class="card-body">
                    <form action="{{route('showallcategories')}}/{{$category->id}}/update" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="name_category" class="col-md-3 col-form-label text-md-right">{{ __('Название Категории') }}</label>
                                <div class="col-md-6">
                                    <input type="text" name="name_category" placeholder="Укажите Категорию"value="{{{$category->name_category}}}">
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-md-3 col-form-label text-md-right">{{ __('Описание') }}</label>
                                <div class="col-md-6">
                                    <input type="text" name="description" placeholder="Укажите Описание"value="{{{$category->description}}}">
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="img_category" class="col-md-3 col-form-label text-md-right">{{ __('Выберите изображение') }}</label>
                                <div class="col-md-6">
                                    <input type="file" name="img_category" multiple accept="image/*,image/jpeg" value="{{{$category->image}}}">
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="image" class="col-md-3 col-form-label text-md-right">{{ __('Активное изображение') }}</label>
                            <div class="col-md-6">
                                <img src="{{url('/storage/category_images/'.$category->image)}}">
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Сохранить
                                </button>
                            </div>
                        </div>
                        <a class="btn" href="/showAllCategories">Вернуться назад</a>



                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
