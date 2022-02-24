@extends('layout.app')

@section('section')
    <div class="container mt-4">
        <form action="/cadastro-usuario" method="POST">
            @csrf
            <div class="row justify-content-center">
                <div class="col-sm-6 mb-3">
                    <label class="control-label">Nome:</label>
                    <input class="form-control" name="name" value="{{ old('name') }}">
                    @error('name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-sm-6 mb-3">
                    <label class="control-label">Login:</label>
                    <input class="form-control" name="login" value="{{ old('login') }}">
                    @error('login')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>


            <div class="row justify-content-center">
                <div class="col-sm-6 mb-3">
                    <label class="control-label">Senha:</label>
                    <input type="password" class="form-control" name="password" value="">
                    @error('password')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-sm-6 mb-3">
                    <label class="control-label">Confirmar senha:</label>
                    <input type="password" class="form-control" name="password_confirmation" value="">
                    @error('password_confirmation')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-sm-6">
                    <button class="btn btn-dark">Cadastrar</button>
                </div>
            </div>
        </form>

    </div>
@endsection
