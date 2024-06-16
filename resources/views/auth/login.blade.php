@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            <h1>Login</h1>
            <form method="POST" action="{{ route('login.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" class="form-control"
                        autocomplete="username email">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input id="password" type="password" name="password" class="form-control"
                        autocomplete="current-password">
                </div>
                <x-errors class="mb-3" />
                <div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
        </div>
    </div>
@endsection
