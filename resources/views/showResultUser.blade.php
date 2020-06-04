@extends('layouts.app')
@section('content')

<div class="container pt-5">
    @if(isset($details))
        <p> Ваш запрос <b> {{ $query }} </b> :</p>
        <h2>Детали запроса</h2>
        <table>
            <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Age</th>
                <th>Image</th>
            </tr>
            </thead>
            <tr>
            @foreach($details as $user)

                    <th>{{$user->name}}</th>
                    <th>{{$user->email}}</th>
                    <th>{{$user->age}}</th>
                    <th><img src="{{url ($user->images)}}" alt=""></th>

            @endforeach
            </tr>

        </table>

    @endif
</div>

@endsection
