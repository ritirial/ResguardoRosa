
@extends('layouts.paginaweb')

@section('content')
<!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" style="background: #a3ddf0">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1>Donaciones</h1>
                        <hr class="small">
                        <span class="subheading">Apreciamos tu apoyo</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Post Content -->
    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">

                    <h2 class="section-heading">Donadores</h2>

                    <!--LISTA DE DONADORES-->
                    <div class="row">
                        <div class="col-xs-12">

                            @foreach ($donantes as $donante)
                            <div class="col-xs-6 col-md-4">
                                <div class="thumbnail">
                                    <img src="{{Storage::url($donante->logo)}}">
                                    <div class="caption">
                                        <h3>{{$donante->nombre}}</h3>
                                        <p>{{$donante->descripcion}}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>

                    <h2 class="section-heading">Tú tambien puedes contribuir</h2>

                    <br>

                    <!--SECCION PARA BOTON DE DONACION-->
                    <div class="row">
                        <div class="col-xs-12" align="center">
                            <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                                <input type="hidden" name="cmd" value="_s-xclick">
                                <input type="hidden" name="hosted_button_id" value="">
                                <input type="image" src="https://www.paypalobjects.com/es_XC/MX/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal, la forma más segura y rápida de pagar en línea.">
                                <img alt="" border="0" src="https://www.paypalobjects.com/es_XC/i/scr/pixel.gif" width="1" height="1">
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </article>

    <hr>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <p class="copyright text-muted"><small>Derechos Reservados&copy; Fudación Resguardo Rosa 2016</small></p>
                </div>
            </div>
        </div>
    </footer>
@endsection
