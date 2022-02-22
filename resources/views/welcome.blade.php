@extends('layout.app')

@section('section')
    <div class="container">
        <div class="row">

            <div class="col-sm-3 float-end">
                <input placeholder="Pesquisar" class="form-control">
            </div>

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
                </table>
            </div>
        </div>
    </div>
@endsection
