    @extends('layouts.app')
        @section('content')
            <div class="container">
                <div class="row">
                    <div class="col-md-6 mx-auto pt-5">

                            <form action="/search" method="POST" role="search">
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
                <caption>Таблица пользователей</caption>
                <tr>
                    <th>@sortablelink('id')</th>
                    <th>@sortablelink('name', 'Имя')<span>&#11021;</span></th>
                    <th>@sortablelink('age', 'Возраст')<span>&#11021;</span></th>
                    <th>@sortablelink('email', 'E-mail')<span>&#11021;</span></th>
                    <th>@sortablelink('created_at', 'Создан')<span>&#11021;</span></th>
                    <th>Аватар</th>
                    <th></th>
                    <th></th>

                </tr>
                <tr>
                    @foreach ($users as $user)
                        <th rowspan="1">{{$user->id}}</th>
                        <th rowspan="1">{{$user->name}}</th>
                        <th rowspan="1">{{$user->age}}</th>
                        <th rowspan="1">{{$user->email}}</th>
                        <th rowspan="1">{{$user->created_at}}</th>
                        <th rowspan="1"><img src="{{url ($user->images)}}" alt=""></th>
                        <th rowspan="1"><a href="{{route('show', ['id' => $user->id])}}">Посмотреть</a> </th>
                        <th rowspan="1"><a href="{{route('delete', ['id' => $user->id]) }}">Удалить</a> </th>
                </tr>
                    @endforeach
            </table>
            {!! $users->appends(\Request::except('page'))->render() !!}
{{--            <div class="row">--}}
{{--                <div class="col-md-1 mx-auto">--}}
{{--                    {{$users->links()}}--}}
{{--                </div>--}}
{{--            </div>--}}

    @endsection
