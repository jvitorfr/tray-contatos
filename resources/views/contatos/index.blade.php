@extends('adminlte::page')

@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Tray | Contatos</h3>
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


                                    <div class=" row title_right">
                                        <div class="col-md-12 col-sm-12 col-xs-12 form-group pull-right ">
                                            <div class="input-group mb-3">

                                                <input type="text" id="input-pesquisar"  onkeyup="pesquisar() "class="form-control" placeholder="">

                                            <a  href="/contato/form" class="btn btn-round btn-secondary"  style="margin-left: 10px;">
                                                    <i class="fa fa-plus"></i> </a>

                                            </div>
                                        </div>
                                    </div>


                                <table class="table table-bordered" id="tabela">
                                    <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Nome</th>
                                        <th>Email</th>
                                        <th>Facebook</th>
                                        <th>Linkedin</th>
                                        <th width="150px;"></th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach ($contatos as $contato)
                                        <tr>
                                            <td>{{$contato->id}}</td>
                                            <td>{{ $contato->nome}}</td>
                                            <td>{{ $contato->email }}</td>
                                            <td>{{ $contato->facebook}}</td>
                                            <td>{{ $contato->linkedin}}</td>
                                            <td>
                                                <a  href="{{action('ContatoController@getTelByContatoId', $contato->id)}}"
                                                    class="btn btn-sm btn-outline-success telefone">
                                                    <i data-id-contato="{{ $contato->id}} "
                                                       class="fa fa-phone"></i>
                                                </a>
                                                <a href="{{action('ContatoController@getById', $contato->id)}}"
                                                   class="btn btn-sm btn-outline-secondary editar">
                                                    <i data-id-contato="{{ $contato->id }}"
                                                      class="fa fa-user-edit "></i>
                                                </a>
                                                <a  href="" class="btn btn-sm btn-outline-danger destroy" value=" {{ $contato->id }} " id="{{ $contato->id }}">
                                                    <i
                                                       class="fa fa-user-times"></i>
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
