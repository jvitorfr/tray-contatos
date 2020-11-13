@extends('adminlte::page')

@section('content')

    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3> Tray | Cadastro Telefônico </h3>
            </div>
        </div>

        <div class="clearfix"></div>
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-dark">
                        <div class="card-header ">
                            <h3 class="card-title">Telefones do contato</h3>
                        </div>
                        <div class="row">
                            <div class="col-sm-5 col-md-12">
                            <input type="hidden" id="idContato" name="idContato" value="{{$contato->id}}"/>
                                <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
                                <form id="form_contato_telefone" class="form-horizontal form-label-left" novalidate>
                                    <div class="item form-group">
                                        <input type="hidden" id="idtelefone" name="idtelefone" value="{{$telefone->id}}" >
                                        <label class="control-label col-lg-2 col-md-3 col-sm-3 col-xs-4" for="titulo">Tipo</label>
                                        <div class="col-log-10 col-md-9 col-sm-9 col-xs-8">
                                            <select id="tipo" name="tipo" class="form-control">
                                                <option value="1"> Residencial </option>
                                                <option value="2"> Comercial </option>
                                                <option value="3"> Celular </option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="control-label col-lg-3 col-md-12" for="titulo">Número</label>
                                        <div class="col-md-12">
                                            <input id="numero" class="form-control col-md-7 col-xs-12" value="{{ $contato->login or "" }}" name="numero" placeholder="Número" required="required" type="text">
                                        </div>
                                    </div>

                                    <div class="ln_solid"></div>
                                    <div class="card-footer " id="salvar_telefone">
                                        <button type="submit" class="btn btn-dark float-right" >Confirmar</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
                </div>





    </div>
@stop

@section('js')
    <script> var idContato = "{{$contato->id }}";
    $("#numero").val({{$telefone->numero }});
    $("#tipo").val({{$telefone->idTipoTelefone}});
    </script>

    <script src="/js/contatoController.js"></script>

@stop
