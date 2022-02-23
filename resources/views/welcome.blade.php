@extends('layout.app')

@section('section')
    <div class="container">
        <div class="row">

            <div class="col-sm-12 mb-3 mt-3">
                <div class="form-group d-flex float-end">
                    <button type="button" class="btn btn-dark rounded-0">
                        <i class="fas fa-search"></i>
                    </button>
                    <input placeholder="Pesquisar" class="form-control rounded-0">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 table-responsive">
                <table class="table">
                    <thead>
                        <th>Usuário</th>
                        <th>Dica</th>
                        <th>Veículo</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Versão</th>
                    </thead>

                    <tbody>
                        @foreach ($dicas as $dica)
                            <tr>
                                <td>{{ $dica->user->name }}</td>
                                <td>{{ $dica->descricao }}</td>
                                <td>{{ $dica->veiculo->tipo }}</td>
                                <td>{{ $dica->veiculo->marca }}</td>
                                <td>{{ $dica->veiculo->modelo }}</td>
                                <td>{{ $dica->veiculo->versao }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                {{$dicas->links()}}
            </div>
        </div>
    </div>
@endsection
