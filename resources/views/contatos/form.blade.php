@extends('adminlte::page')

@section('content')

    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3> Tray | Contato </h3>
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
                            <h3 class="card-title">Cadastro de Contato</h3>
                        </div>
                        <form id="form_contato" class="form-horizontal form-label-left" novalidate>
                            <input type="hidden" id="idContato" name="idContato" value="{{ $contato->id or '0' }}">
                            <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="contato_nome">Nome</label>
                                    <input id="contato_nome" class="form-control col-md-7 col-xs-12 col-md-12" value="{{ $contato->nome or "" }}" name="contato_nome" placeholder="Nome" required="required" type="text">
                                </div>
                                <div class="form-group">
                                    <label for="contato_email">Email</label>
                                    <input id="contato_email" class="form-control col-md-7 col-xs-12 col-md-12" value="{{ $contato->email or "" }}" name="contato_email" placeholder="Email" required="required" type="email">

                                </div>

                                <div class="form-group">
                                    <label for="contato_facebook">Facebook</label>
                                    <input id="contato_facebook" class="form-control col-md-7 col-xs-12 col-md-12" value="{{ $contato->facebook or "" }}" name="contato_facebook" placeholder="Facebook" required="required" type="text">
                                </div>

                                <div class="form-group">
                                    <label for="contato_linkedin">Linkedin</label>
                                    <input id="contato_linkedin" class="form-control col-md-7 col-xs-12 col-md-12" value="{{ $contato->linkedin or "" }}" name="contato_linkedin" placeholder="Linkedin" required="required" type="text">
                                </div>

                            </div>

                            <div class="card-footer ">
                                <button type="submit" class="btn btn-dark float-right" >Confirmar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@stop

@section('js')
    <script>
    $("#contato_nome").val('{{$contato->nome}}');
    $("#contato_email").val('{{$contato->email}}');
    $("#contato_facebook").val('{{$contato->facebook}}');
    $("#contato_linkedin").val('{{$contato->linkedin}}');

    </script>
    <script src="/js/contatoController.js"></script>

@stop
