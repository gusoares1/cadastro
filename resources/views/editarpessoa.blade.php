@extends('layout.app',["current" =>"pessoas"])
@section('body')

<div class = "card border">
    <div class = "card-body">
        <form action="/pessoas/{{$pes->id}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nome"> Nome da pessoa</label>
                <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome" value="{{$pes->nome}}">
                <label for="cpf_cnpj"> cpf/cnpj</label>
                <input type="text" class="form-control" name="cpf_cnpj" id="cpf_cnpj" placeholder="cpf" value="{{$pes->cpf_cnpj}}">
                <label for="endereco">Endereco</label>
                <input type="text" class="form-control" name="endereco" id="endereco" placeholder="endereço" value="{{$pes->endereco}}">
                <label for="email">Email</label>
                <input type="text" class="form-control" name="email" id="email" placeholder="email"  value="{{$pes->email}}">
                
            </div>
            <br>
            <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
            <button type="cancel" class="btn btn-danger btn-sm">Cancelar</button>
        </form>
    </div>
</div>

@endsection