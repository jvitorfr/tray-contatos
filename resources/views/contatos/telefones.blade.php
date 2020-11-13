@extends('adminlte::page')

@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Tray | Contatos Telefônicos</h3>

            </div>
        </div>

        <div class="container-fluid">
            <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
            <div class="row col-md-12">
                <div class="col-md-12">

                    <div class="card">
                        <div class="card-header">
                            <!-- <h3 class="card-title">Tray | Lista de Contatos</h3> -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body" style="overflow-x: auto;">
                            <h4> Contatos  de {{$contato->nome}} </h4>

                            <div class=" row title_right">
                                <div class="col-md-12 col-sm-12 col-xs-12 form-group pull-right ">
                                    <div class="input-group mb3">

                                        <input type="text" class="form-control" id="input-pesquisar" onkeyup="pesquisar()"  placeholder="">
                                        <span class="input-group-btn">
                                     <a title="adicionar telefone"  href="{{action('ContatoController@createTelefone', $contato->id)}}"
                                         class="btn btn-round btn-secondary" style="margin-left: 10px;">
                                            <i class="fa fa-plus"></i> </a>
                                         </span>
                                    </div>
                                </div>
                            </div>


                            <table class="table table-bordered" id="tabela">
                                <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Número</th>
                                    <th>Tipo</th>
                                    <th width="110px;"></th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach ($telefones as $telefone)
                                    <tr>
                                        <td>{{$telefone->id}}</td>
                                        <td>{{ $telefone->numero}}</td>
                                        <td>{{ $telefone->tipo->tipo }}</td>
                                        <td id="{{$telefone->idContato}}">
                                            <a class="btn btn-sm btn-secondary"
                                               title="Atualizar Número"
                                               href="{{action('ContatoController@getTelById', [$telefone->id,$telefone->idContato])}}"
                                            ><i class="fa fa-pen"></i>
                                            </a>
                                            <a href="" id="{{$telefone->id}}" class="btn btn-sm btn-danger destroy-telefone" title="Remover Número">
                                                <i  class="fa fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

            @stop

            @section('js')
                <script src="/js/contatoController.js"></script>

                <script>
                    function pesquisar() {
                        // Declare variables
                        var input, filter, table, tr, td, i, txtValue;
                        input = document.getElementById("input-pesquisar");
                        filter = input.value.toUpperCase();
                        table = document.getElementById("tabela");
                        tr = table.getElementsByTagName("tr");

                        // Loop through all table rows, and hide those who don't match the search query
                        for (i = 0; i < tr.length; i++) {
                            td = tr[i].getElementsByTagName("td")[1];
                            if (td) {
                                txtValue = td.textContent || td.innerText;
                                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                    tr[i].style.display = "";
                                } else {
                                    tr[i].style.display = "none";
                                }
                            }
                        }
                    }
                </script>
@stop
