    @extends('layouts.app')

        @section('content')
            <div class="container">
                <div class="row">
                    <div class="col-md-6 pt-5 mx-auto">

                        <form action="/searchProduct" method="POST" role="search">
                            {{ csrf_field() }}
                            <div class="input-group">
                                <input type="text" class="form-control" name="q"
                                       placeholder="Найти..">
                                <span class="input-group-btn">
                                            <button type="submit" class="btn btn-default">
                                                <span class="glyphicon glyphicon-search">Поиск</span>
                                            </button>
                                        </span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

                <table>
                    <caption>Таблица Продуктов</caption>
                    <tr>
                        <th>№</th>
                        <th>@sortablelink('id', 'ID')<span>&#11021;</span></th>
                        <th>@sortablelink('name_products', 'Название')<span>&#11021;</span></th>
                        <th>@sortablelink('name_products', 'Описание')<span>&#11021;</span></th>
                        <th>@sortablelink('name_descriptions', 'Категории')<span>&#11021;</span></th>
                        <th>@sortablelink('created_at', 'Создан')</th>
                        <th>Изображение</th>
                        <th></th>
                        <th></th>
                    </tr>
                        <tr>
                            @foreach ($products as $product)
                                <th rowspan="1">{{$loop->index+1}}</th>
                                <th rowspan="1">{{$product->id}}</th>
                                <th rowspan="1">{{$product->name_products}}</th>
                                <th rowspan="1">{{$product->name_descriptions}}</th>
                                <th rowspan="1">
                                    @foreach($product->categories as $category)
                                        <p>{{$category->name_category}}</p>
                                        @endforeach
                                </th>
                                <th rowspan="1">{{$product->created_at}}</th>

                                        @if($product->images->toArray())
                                            @foreach($product->images as $image)
                                                @if($image->main)
                                                    <th rowspan="1"><img src="{{url ($image->name)}}" alt=""></th>
                                                    @break
                                                @elseif($loop->last && !$image->main)
                                                    <th rowspan="1"><img src="{{url ($product->images[0]->name)}}" alt=""></th>
                                                @endif
                                            @endforeach
                                                @else
                                                    <th rowspan="1"><img src="{{url ('storage/product_images/default.jpg')}}" alt=""></th>
                                        @endif

                                <th rowspan="1"><a href="{{route('showproduct', ['id' => $product->id])}}">Посмотреть</a> </th>
                                <th rowspan="1"><a href="{{route('deleteproducts', ['id' => $product->id]) }}">Удалить</a> </th>
                        </tr>

                             @endforeach
                </table>
                <div class="row">
                    <div class="col-md-1 mx-auto">
                        {{$products->links()}}
                    </div>
                </div>


         @endsection



