@extends('adminlte::page')

@section('content')

    <!--<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Tray-Contatos') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __(' Seja Bem vindo!') }}


                </div>
            </div>
        </div>
    </div>

</div>
-->

    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{$numeroContatos}}</h3>

                    <p>Contatos</p>
                </div>
                <div class="icon">
                    <i class="fa fa-user"></i>
                </div>
                <a href="/contato/index" class="small-box-footer"> Listar <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{$numeroTelefones}}</h3>

                    <p>Contatos Telefônicos</p>
                </div>
                <div class="icon">
                    <i class="fa fa-phone"></i>
                </div>
                <a href="/contato/index" class="small-box-footer"> Listar <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->

        <!-- ./col -->
    </div>
@endsection
