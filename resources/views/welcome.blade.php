@extends('layouts.app')

@section('content')

{{--    <img src="public/images/background.png" alt="Здесь должна быть картинка, но она какого-то хера не работает">--}}

<div class="jumbotron">
    <h1>Hello my dear friend</h1>
    <h3>You have a wonderful opportunity to try your luck and earn money. Do not waste time in vain, press the button and spend time fun and usefully</h3>
    <div style="display: flex; justify-content: center">
        <p><a class="btn btn-primary btn-lg" href="{{ route('game.index') }}" role="button">PLAY</a></p>
    </div>
</div>
@endsection
