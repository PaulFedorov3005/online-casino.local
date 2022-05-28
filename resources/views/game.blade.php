@extends('layouts.app')

@section('content')
    <main class="main">
        <div class="cont">
                <form action="/api" method="post" class="gameForm" name="bet">
                    {{ csrf_field() }}
                    <label>Your number:
                        <input type="number" name="num">
                    </label>
                    <label>min value: 0 === max value: 12</label>
                    <label>Your bet:
                        <input type="number" name="bet">
                    </label>
{{--                    <input type="hidden" name="csrf_token" value="{{ csrf_token() }}">--}}
                    <input type="hidden" name="wallet" value="55">
                </form>
        </div>
        <div class="lost"></div>
        <div class="win"></div>
        <div class="rollet"></div>
        <div class="count"><h2 class="num">luck you</h2></div>
        <button class="button" id="btn"><i>spine</i></button>
        <script src="/js/script.js"></script>
    </main>
@endsection
