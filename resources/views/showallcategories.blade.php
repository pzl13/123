@extends('layouts.app')
        @section('content')
            <table>
                <caption>Таблица Категорий</caption>
                <tr>
                    <th>№</th>
                    <th>@sortablelink('id', 'ID')<span>&#11021;</span></th>
                    <th>@sortablelink('name_category', 'Название')<span>&#11021;</span></th>
                    <th>@sortablelink('description', 'Описание')<span>&#11021;</span></th>
                    <th>@sortablelink('created_at', 'Создан')<span>&#11021;</span></th>
                    <th>Изображение</th>
                    <th></th>
                    <th></th>
                </tr>
                <tr>
                    @foreach ($categories as $category)
                        <th rowspan="1">{{$loop->index+1}}</th>
                        <th rowspan="1">{{$category->id}}</th>
                        <th rowspan="1">{{$category->name_category}}</th>
                        <th rowspan="1">{{$category->description}}</th>
                        <th rowspan="1">{{$category->created_at}}</th>
                        <th rowspan="1"><img src="{{url ($category->images)}}" alt=""></th>
                        <th rowspan="1"><a href="{{route('showcategory', ['id' => $category->id])}}">Посмотреть</a> </th>
                        <th rowspan="1"><a href="{{route('deletecategory', ['id' => $category->id]) }}">Удалить</a> </th>
                </tr>
                    @endforeach
            </table>
            <div class="row">
                <div class="col-md-1 mx-auto">
                    {{$categories->links()}}
                </div>
            </div>
        @endsection
