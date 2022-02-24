@extends('layout.app')

@section('section')
    <div class="container mt-4">
        <form action="/cadastro-veiculo" method="POST">
            @csrf
            <div class="row justify-content-center">
                <div class="col-sm-6 mb-3">
                    <label class="control-label">Marca:</label>
                    <input class="form-control" name="marca" value="{{ old('marca') }}">
                    @error('marca')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-sm-6 mb-3">
                    <label class="control-label">Modelo:</label>
                    <input class="form-control" name="modelo" value="{{ old('modelo') }}">
                    @error('modelo')
                    <p class="text-danger">{{$message}}</p>
                @enderror
                </div>
            </div>


            <div class="row justify-content-center">
                <div class="col-sm-6 mb-3">
                    <label class="control-label">Versão:</label>
                    <input class="form-control" name="versao" value="{{ old('versao') }}">
                    @error('versao')
                    <p class="text-danger">{{$message}}</p>
                @enderror
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-sm-6 mb-3">
                    <label class="control-label">Tipo</label>
                    <select class="form-control" name="tipo" value="{{ old('tipo') }}">
                        <option value="">Selecione o tipo</option>
                        <option value="Carro">Carro</option>
                        <option value="Caminhão">Caminhão</option>
                        <option value="Moto">Moto</option>
                    </select>
                    @error('tipo')
                    <p class="text-danger">{{$message}}</p>
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
