@extends('layout.app',["current" =>"pessoas"])
@section('body')

<div class = "card border">
    <div class = "card-body">
        <form action="/pessoas" method="POST">
            @csrf
            <div class="form-group">
                <label for="nome"> Nome da pessoa</label>
                <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome">

                <label for="cpf_cnpj"> cpf/cnpj</label>
                <input type="text" class="form-control" name="cpf_cnpj" id="cpf_cnpj" placeholder="cpf">

                <label for="endereco">Endereco</label>
                <input type="text" class="form-control" name="endereco" id="endereco" placeholder="endereço">

                <label for="email">Email</label>
                <input type="text" class="form-control" name="email" id="email" placeholder="email">
            </div>
            <br>
            <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
            <button type="cancel" class="btn btn-danger btn-sm">Cancelar</button>
        </form>
    </div>
@if($errors->any())
    <div class="card-footer">
@foreach($errors->all() as $error)
    <div class="alert alert-danger" role="alert">
        {{ $error }}
    </div>
@endforeach
    </div>
@endif
</div>

@endsection