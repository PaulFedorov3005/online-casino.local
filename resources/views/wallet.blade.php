@extends('layouts.app')

@section('content')
    @include('common.errors')
<div class="col-md-10 col-md-offset-1 mainWallet">
            <div class="panel panel-default">
                <div class="panel-heading general">Wallet</div>

                <div class="panel-body">
                    <div>Count number: #{{ $countNum }}</div>
                    <div>Amount of money: {{ $count }} $</div>
                </div>
            </div>
    <div class="moneyForms">
        <div class="panel panel-default">
            <div class="panel-heading input">Input money</div>

            <div class="panel-body">
                <form action="{{ route('wallet.input') }}" method="post">
                    {{ csrf_field() }}
                    <lable>Money transfer card: 9584 7392 7549 0239</lable>
                    <lable>Amount:
                        <input type="number" name="input" required>
                    </lable>
                    <button>confirm input</button>
                </form>
            </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading input">Output money</div>

            <div class="panel-body">
                <form action="{{ route('wallet.output') }}" method="post">
                    {{ csrf_field() }}
                    <lable>Enter your transfer card:
                        <input type="text" name="userCard" required>
                    </lable>
                    <lable>Amount:
                        <input type="number" name="output" required>
                    </lable>
                    <button>confirm output</button>
                </form>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
