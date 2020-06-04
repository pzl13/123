        @extends('layouts.app')
                @section('content')
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <div class="card">
                                <div class="card-header">{{ __('Редактировать продукт') }}</div>
                                     <div class="card-body">
                                        <form action="{{route('showallproducts')}}/{{$product->id}}/update" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group row">
                                                <label for="name_products" class="col-md-3 col-form-label text-md-right">{{ __('Название продукта') }}</label>
                                                    <div class="col-md-6">
                                                        <input type="text" name="name_products" placeholder="Укажите Название"value="{{{$product->name_products}}}">
                                                    </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="name_descriptions" class="col-md-3 col-form-label text-md-right">{{ __('Описание') }}</label>
                                                    <div class="col-md-6">
                                                        <input type="text" name="name_descriptions" placeholder="Укажите e-mail"value="{{{$product->name_descriptions}}}">
                                                    </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="images" class="col-md-3 col-form-label text-md-right">{{ __('Выберите изображение') }}</label>
                                                    <div class="col-md-6">
                                                        <input type="file" name="images[]" multiple accept="image/*,image/jpeg">
                                                    </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="categories" class="col-md-3 col-form-label text-md-right">{{ __('Категории') }}</label>
                                                    <div class="col-md-6">
                                                        <select name="categories[]" multiple>

                                                                @foreach($categories as $category)
                                                                    <option @if(in_array($category->id,$product->categories->pluck('id')->toArray()))
                                                                            selected
                                                                            @endif
                                                                            value="{{$category->id}}">{{$category->name_category}}
                                                                    </option>
                                                                @endforeach
                                                        </select>
                                                    </div>
                                            </div>

                                            <div class="form-group row" id="form_check">
                                                <label for="categories" class="col-md-3 col-form-label text-md-right">{{ __('Images list') }}</label>
                                                <div class="col-md-9">
                                                    <div class="row">
                                                    @foreach($product->images as $image)


                                                    <div class="col-md-3">
                                                        <img src="{{url($image->name)}}">

                                                        <label for="deleteimage" class="col-md-4 col-form-label text-md-right">{{ __('Delete') }}

                                                        </label>
                                                        <input type="checkbox" name="deleteImages[]" value="{{$image->id}}">


                                                        <label for="images" class="col-md-4 col-form-label text-md-right">{{ __('Main') }}

                                                        </label>
                                                        <input type="radio" name="imageMain" value="{{$image->id}}"
                                                               @if($image->main) checked
                                                            @endif>
                                                    </div>

                                                    @endforeach
                                                </div>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-0">
                                                <div class="col-md-6 offset-md-4">
                                                    <button type="submit" class="btn btn-primary">
                                                        Сохранить
                                                    </button>
                                                </div>
                                            </div>
                                            <a class="btn" href="/showAllProducts">Вернуться назад</a>
                                        </form>
                                     </div>
                            </div>
                        </div>
                    </div>
                @endsection
