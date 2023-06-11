@extends('layouts.app')
@section('content')

<h1>Login</h1>

<form action="{{ route('login') }}" method="POST">
    @csrf 
    <div>
     
        <label>
            <span>Email</span>
            <input type="email" name="email" value=" {{ old('email') }}">
            @error('email')
                <small>{{ $message }}</small>
            @enderror
        </label><br>

        <label>
            <span>Password</span>
            <input type="password" name="password" value=" {{ old('password') }}">
            @error('password')
                <small>{{ $message }}</small>
            @enderror
        </label><br>


    </div>

   
    <button type="submit">Iniciar Sesion</button>

</form>

@endsection