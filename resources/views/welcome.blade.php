@extends('layout.app')

@section('section')
    <div class="container">
        <div class="row">
            <form method="get" action="/filter">
                <div class="col-sm-12 mb-3 mt-3 d-flex justify-content-between">
                    <select name="coluna" class="select-form">
                        <option value="marca">Marca</option>
                        <option value="tipo">Tipo</option>
                        <option value="modelo">Modelo</option>
                        <option value="versao">Versão</option>
                    </select>
                    <div class="form-group d-flex float-end w-250px">
                        <button type="submit" class="btn btn-dark rounded-0">
                            <i class="fas fa-search"></i>
                        </button>
                        <input required placeholder="Pesquisar" name="pesquisar" class="form-control rounded-0">
                    </div>
                </div>
            </form>
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
                {{ $dicas->links() }}
            </div>
        </div>
    </div>
@endsection
