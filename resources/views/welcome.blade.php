@extends('layouts.app')

@section('content')

    <img src="/images/background.png" alt="Здесь должна быть картинка, но она какого-то хера не работает">

<div class="jumbotron" style="height: 190px; padding-top: 0; margin-bottom: 0; background-color: #ffffff; box-shadow: 0 0 10px #9d9d9d;">
    <h2>Hello my dear friend</h2>
    <p style="font-family: 'Arial Narrow'">You have a wonderful opportunity to try your luck and earn money. Do not waste time in vain, press the button and spend time fun and usefully</p>
    <div style="display: flex; justify-content: center">
        <p><a class="btn btn-primary btn-lg" href="{{ route('game.index') }}" role="button">PLAY</a></p>
    </div>
</div>
@endsection
