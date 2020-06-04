@extends('layouts.app')
@section('content')

    <div class="container pt-5">
        @if(isset($details))
            <p> Ваш запрос <b> {{ $query }} </b> :</p>
            <h2>Детали запроса</h2>
            <table>
                <thead>
                <tr>
                    <th>Название продукта</th>
                    <th>Описание</th>
                    <th>Категория</th>
                    <th>Изображение</th>
                </tr>
                </thead>
                <tr>
                    @foreach($details as $product)

                        <th>{{$product->name_products}}</th>
                        <th>{{$product->name_descriptions}}</th>
                        <th>
                            @foreach($product->categories as $category)
                                <p>{{$category->name_category}}</p>
                            @endforeach
                        </th>
                        <th rowspan="1">
                            @foreach($product->images as $image)
                                <p><img src="{{url ($image->name)}}" alt=""></p>
                            @endforeach
                        </th>
                    @endforeach
                </tr>

            </table>

        @endif
    </div>

@endsection
