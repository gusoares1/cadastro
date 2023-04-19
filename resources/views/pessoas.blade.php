@extends('layout.app', ["current" =>"pessoas"])
@section('body')
    <div class="card border">
        <div class="card-body">
            <h5 class="card-title">cadastro de pessoas</h5>
            <table class="table table-ordered table-houver">
                <thead>
                    <tr>
                        <th>codigo</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Localizacao</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pessoa as $pes)
                    <tr>
                        <td>{{$pes->id}}</td>
                        <td>{{$pes->nome}}</td>  
                        <td>{{$pes->email}}</td>
                        <td>{{$pes->endereco}}</td>
                        <td>
                            <a href="/pessoas/editar/{{$pes->id}}" class="btn btn-sm btn-primary">Editar</a>
                            <a href="/pessoas/apagar/{{$pes->id}}" class="btn btn-sm btn-danger">Apagar</a>
                            <a class="btn btn-sm btn-secondery" onclick="AbrirMapa()">endereco</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <a href="/pessoas/novo" class="btn btn-sm btn-primary" role="button">Nova pessoa</a>
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

    <div class ="modal" tabindex="-1"  role="dialog" aria-labelledby="myLargeModalLabel" id="dlgLocalizacao">
    <div class="modal-dialog">
        <div class="contanier-fluid">
        <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"> Novo Endereco</h5>
                </div>
        </div>
                <div class id="mapid"></div>
                            <script >var map = L.map('mapid').setView([ -21.1367422,-47.8366163], 13);

                                L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                    maxZoom: 19,
                                    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                                }).addTo(map);

                                var marker = L.marker([ -21.1367422, -47.8366163]).addTo(map);
                            </script>
   
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"> salvar</button>
                    <button type="cancel" class="btn btn-secondary" data-bs-dismiss="modal">cancelar</button>
                </div>
         </div>
        </div>
    </div>
</div>


@endsection


@section('javascript')

<script type ="text/javascript">

    function AbrirMapa(){
        $('#dlgLocalizacao').modal('show')
    }

</script>
@endsection