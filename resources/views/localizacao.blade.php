@extends('layout.app',["current" =>"Localizacao"])
@section('body')
<div class="card border">
        <div class="card-body">
            <h5 class="card-title">cadastro de pessoas</h5>
            <table class="table table-ordered table-houver" id="tabelaLocalizacao">
                <thead>
                    <tr>
                        <th>codigo</th>
                        <th>Rua</th>
                        <th>Bairro</th>
                        <th>Cidade</th>
                        <th>Cep</th>
                        <th>Cliente</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <button class="btn btn-sm btn-primary" role="button" onclick="novoLocalizacao()">Novo endereço</button>
        </div>
</div>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
     integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI="
     crossorigin=""/>
     <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
     integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM="
     crossorigin=""></script>
    <style>
        #mapid 
        { 
        
        height: 50%;

    }
    </style>

<div class ="modal" tabindex="-1" role="dialog" id="dlgLocalizacao">
    <div class="modal-dialog" role ="document">
        <div class="modal-content">
            <form class="form-horizontal" id="formLocalizacao">
                <div class="modal-header">
                    <h5 class="modal-title"> Novo Endereco</h5>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="id" class="form-control">
                    <div class="form-group">
                        <label for="rua" class="control-label">rua</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="rua" placeholder="rua">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="bairro" class="control-label">Bairro</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="bairro" placeholder="Bairro">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="cidade" class="control-label">cidade</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="cidade" placeholder="cidade">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="cep" class="control-label">cep</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="cep" placeholder="cep">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="latitude" class="control-label">latitude </label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="latitude" placeholder="latitude ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="longitude" class="control-label">longitude </label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="longitude" placeholder="longitude ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="clientes" class="control-label">Clientes</label>
                        <div class="input-group">
                            <select class="form-control" id="clientes">
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"> salvar</button>
                    <button type="cancel" class="btn btn-secondary" data-bs-dismiss="modal">cancelar</button>
                </div>
            </form>
        </div>
        <body>
    <div id="mapid"></div>
        <script >
            var map = L.map('mapid').setView([51.505, -0.09], 13);

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);

var marker = L.marker([51.5, -0.09]).addTo(map);

        </script>
    </body>
    </div>
</div>




@endsection

@section('javascript')
<script type ="text/javascript">

    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        }
    });




    function novoLocalizacao(){
        $('#rua').val('')
        $('#bairro').val('')
        $('#cidade').val('')
        $('#cep').val('')
        $('#cliente').val('')
        $('#longitude').val('');
        $('#latitude').val('');
        $('#dlgLocalizacao').modal('show')
    }

    function mapa() {
        
    
        var map = L.map('mapid').setView([51.505, -0.09], 13);

            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map);

            var marker = L.marker([51.5, -0.09]).addTo(map);

    };

    function carregarClientes() {
        $.getJSON('/api/pessoas', function(data){

            for ( i = 0; i<data.length; i++) {
                opcao = '<option value = "' + data[i].id + '">'+ 
                data[i].nome + '</option>';
                $('#clientes').append(opcao);
                
            }
        });
        
    }
    function montarLinha(l){
        var linha = "<tr>"+
                        "<td>"+ l.id +"</td>" +
                        "<td>"+ l.rua +"</td>" +
                        "<td>"+ l.bairro +"</td>" +
                        "<td>"+ l.cidade +"</td>" +
                        "<td>"+ l.cep +"</td>" +  
                        "<td>"+ l.cliente +"</td>" +      
                        "<td>"+ 
                            '<button class="btn btn-xs btn-primary" onclick="editar('+ l.id +')">Editar</button> ' +
                            '<button class="btn btn-xs btn-danger" onclick="remover('+ l.id +')">Apagar</button> ' +
                        "</td>" +         
                    "</tr>";
                    return linha;
    }

    function editar(id){
        $.getJSON('/api/localizacao/'+ id, function(data){
            console.log(data);
        $('#id').val(data.id);
        $('#rua').val(data.rua);
        $('#bairro').val(data.bairro);
        $('#cidade').val(data.cidade);
        $('#cep').val(data.cep);
        $('#cliente').val(data.cliente);
        $('#longitude').val(data.longitude);
        $('#latitude').val(data.latitude);
        $('#dlgLocalizacao').modal('show');
            
        });
    }

    function remover(id){
        $.ajax({
            type:"DELETE",
            url: "/api/localizacao/" + id,
            context: this,
            sucess: function(){
                linhas = ('#tabelasLocalizacao>tbody>tr>td:first-child');
                e = linhas.filter( function(i, elemento) {
                    return elemento.textContent == id;
                });
                if(e)
                e.parent('tr').remove();
            },
            error:function(error){
            }
        });
    }
    
    function carregarLocalizacao(){
        $.getJSON('/api/localizacao', function(localizacao){
            for(i=0;i<localizacao.length;i++){
                linha = montarLinha(localizacao[i]);
                $('#tabelaLocalizacao>tbody').append(linha);
            }
    
        });
    }

    function criarLocalizacao(){
        loc = { 
            rua: $("#rua").val(),
            bairro:$("#bairro").val(),
            cidade: $("#cidade").val(), 
            cep: $("#cep").val(), 
            cliente:$("#clientes").val(),
            latitude : $("#latitude ").val(), 
            longitude:$("#longitude").val()
        };

        $.post("/api/localizacao",loc, function(data){
            localizacao=JSON.parse(data);
            linha = montarLinha(localizacao);
            $('#tabelaLocalizacao>tbody').append(linha);
        })
    }

    function salvarLocalizacao() {
        loc = { 
            id: $("#id").val(),
            rua: $("#rua").val(),
            bairro:$("#bairro").val(),
            cidade: $("#cidade").val(), 
            cep: $("#cep").val(), 
            cliente:$("#clientes").val(),
            latitude : $("#latitude ").val(), 
            longitude:$("#longitude").val()
        };
        $.ajax({
            type:"PUT",
            url: "/api/localizacao/" + loc.id,
            context: this,
            data: loc,
            sucess: function(data){
                loc = JSON.parse(data);
                linhas = $("#tabelasLocalizacao>tbody>tr");
                e = linhas.filter(function(i, e) {
                return (e.cells[0] == data.id);
                })
                if (e) {
                    e[0].cells.textContent = data.id;
                    e[0].cells.textContent = data.rua;
                    e[0].cells.textContent = data.bairro;
                    e[0].cells.textContent = data.cidade;
                    e[0].cells.textContent = data.cep;
                    e[0].cells.textContent = data.cliente;
                    e[0].cells.textContent = data.longitude;
                    e[0].cells.textContent = data.longitude;
                    
                }
            },
            error:function(error){
            }
        });

    }

    $("#formLocalizacao").submit(function(event){ 
        event.preventDefault(); 
        if ($("#id").val() != '') {
            salvarLocalizacao();
           
        $("dlgLocalizacao").modal('hide');
        } else {
            criarLocalizacao();
            $("#dlgLocalizacao").modal('hide');
        }
       
    });

    carregarClientes();
    carregarLocalizacao();
    
</script>
@endsection