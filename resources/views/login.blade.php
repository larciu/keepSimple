@extends('layout.app')

@section('section')
<form method="POST" action="/login">
    @csrf
<div class="card card-centralizado">
    <div class="card-header card-header-dark">
      Login
    </div>
    <div class="card-body card-body-custom">
    <div class="mb-3">
        <label class="mb-1" for="login">Login:</label>
        <input id="login" name="login" value="{{ old('login') }}" class="form-control">
        @error('login')
            <p class="text-danger">{{$message}}</p>
        @enderror
    </div>

    <div class="mb-3">
        <label for="password" class="mb-1">Senha:</label>
        <input id="password" type="password" name="password" class="form-control">
        @error('password')
            <p class="text-danger">{{$message}}</p>
        @enderror
    </div>

    <div class="m-b3 float-end">
        <button class="btn btn-dark">Entrar</button>
    </div>

    </div>
  </div>
</form>
@endsection
