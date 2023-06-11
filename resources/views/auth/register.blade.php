@extends('layouts.app')
@section('content')

<h1>Registro</h1>

<form action="{{ route('register') }}" method="POST">
    @csrf 
    <div>
        <label>
            <span>Name</span>
            <input autofocus="autofocus" type="text" name="name" value=" {{ old('name') }}">
            @error('name')
                <small>{{ $message }}</small>
            @enderror
        </label>

        <label>
            <span>Email</span>
            <input type="email" name="email" value=" {{ old('email') }}">
            @error('email')
                <small>{{ $message }}</small>
            @enderror
        </label>

        <label>
            <span>Password</span>
            <input type="password" name="password" value=" {{ old('password') }}">
            @error('password')
                <small>{{ $message }}</small>
            @enderror
        </label>

      

    </div>

    <a href=" {{ route('login') }}">Login</a>
    <button type="submit">Register</button>

</form>

@endsection