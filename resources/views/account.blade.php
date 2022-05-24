@extends('layouts.app')

@section('content')

<div class="panel panel-default" >
    <div class="panel-heading">
        <h3 class="panel-title">Your Account</h3>
    </div>
    <div class="panel-body">
        Panel for editing personal data
        <div style="display: flex; align-items: center; justify-content: center">
            <form style="width: 50%;" action="{{route('account.update', Auth::user()->id )}}" method="POST">
                {{csrf_field()}}
                {{method_field('PUT')}}
                <div class="form-group">
                    <label for="name">Change name</label>
                    <input type="text" class="form-control" name="name" placeholder="Change name" value="{{old('name')?old('name'):Auth::user()->name}}">
                </div>
                <div class="form-group">
                    <label for="email">Change email</label>
                    <input type="email" class="form-control" name="email" placeholder="Change email" value="{{old('email')?old('email'):Auth::user()->email}}">
                </div>
                <div class="form-group">
                    <label for="password">Change Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Change password" value="{{old('password')?old('password'):Auth::user()->password}}">
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox"> Confirm Changes
                    </label>
                </div>
                <button type="submit" class="btn btn-default">Update</button>
            </form>
        </div>
    </div>
</div>

@endsection
