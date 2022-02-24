@extends('layout.app')

@section('section')
    <div class="container mt-4">
        <form action="/editar-dica/{{ $dica->id }}" method="POST">
            {{ method_field('PUT') }}
            @csrf
            <div class="row justify-content-center">
                <div class="col-sm-6 mb-3">
                    <label class="control-label">Descrição:</label>
                    <textarea class="form-control" name="descricao">{{ $dica->descricao }}</textarea>
                    @error('descricao')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-sm-6 mb-3">
                    <label class="control-label">Veículo:</label>
                    <select class="form-control" name="veiculo_id">
                        <option value="{{ $dica->veiculo->id }}">{{ $dica->veiculo->marca }}</option>
                        @foreach ($veiculos as $veiculo)
                            <option value="{{ $veiculo->id }}">{{ $veiculo->marca }}</option>
                        @endforeach
                    </select>
                    @error('veiculo_id')
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
