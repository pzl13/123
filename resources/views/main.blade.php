@extends('layouts.app')

@section('content')

    <div id="main_page">
            <h1>{{ __('messages.welcome') }} {{ Auth::user()->name }}</h1>
            <h2>ID: {{ Auth::user()->id }}</h2>
                <img src="{{url('/storage/user_images/'.Auth::user()->image)}}" height="200px" alt="{{ Auth::user()->name }}" >
            <h2>Age: {{ Auth::user()->age }}</h2>
            <h2>Your e-mail: {{ Auth::user()->email }}</h2>

    </div>
@endsection

