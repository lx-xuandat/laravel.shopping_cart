@extends('layouts.master')

@section('title', 'Sign In')

@section('content')
    <div class="row">
        <div class="col-sm-6 mx-auto">
            <h1>Sign In</h1>

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('user.signin') }}">

                {{ csrf_field() }}

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
                        <input name="password" type="password" class="form-control" id="inputPassword"
                            placeholder="password">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col">
                        <button type="submit" class="btn btn-primary float-right">Login</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection
