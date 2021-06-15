@extends('layouts.master')

@section('title', 'Sign Up')

@section('content')
    <h1>Sign Up</h1>

    <form method="POST" action="{{ route('user.signup.post') }}">
        {{ csrf_field() }}
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Fullname</label>
            <div class="col-sm-10">
                <input name="name" type="text" class="form-control" id="fullname" value="" placeholder="Full name">
            </div>
        </div>

        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input name="email" type="text" class="form-control" id="staticEmail" value=""
                    placeholder="example@gmail.com">
            </div>
        </div>

        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input name="password" type="password" class="form-control" id="inputPassword" placeholder="password">
            </div>
        </div>

        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Confirm Password</label>
            <div class="col-sm-10">
                <input name="password" type="password" class="form-control" id="inputConfirmPassword"
                    placeholder="Confirm Password">
            </div>
        </div>
        <div class="form-group row">
            <div class="col">
                <button type="submit" class="btn btn-primary float-right">Sign up</button>
            </div>
        </div>
    </form>

@endsection
