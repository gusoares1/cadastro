@extends('layout.app',["current" =>"home"])
@section('body')


<div class="jumbotron bg-light border border-secondary">
    <div class="row">
        <div class = "card-deck">
           <div class = "card border boder-primary">
                <div class="card-body" >
                    <h5 class="card-title"> Cadastrando Pessoa</h5>
                    <p class="card=text">
                        Aqui voce cadastrada as pessooas.
                    </p>
                    <a href="/localizacao" class="btn btn-primary"> Cadastre pessoas</a>
                </div>
           </div> 
        
            <div class="card border boder-primary">
                <div class="card-body" >
                    <h5 class="card-title"> Cadastrando Pessoa</h5>
                    <p class="card=text">
                        Aqui voce cadastrada as pessooas.
                    </p>
                    <a href="/pessoas" class="btn btn-primary"> Cadastre pessoas</a>
                </div>
            </div> 
        </div>
    </div>
</div>

@endsection