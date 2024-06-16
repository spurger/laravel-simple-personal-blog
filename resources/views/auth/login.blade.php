@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <h1>Login</h1>
    <form method="POST" action="{{ route('login.store') }}">
        @csrf

        <div>
            <label for="email">Email address</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" autocomplete="username email">
        </div>
        <div>
            <label for="password">Password</label>
            <input id="password" type="password" name="password" autocomplete="current-password">
        </div>
        <x-errors />
        <div>
            <button type="submit">Login</button>
        </div>
    </form>
@endsection
