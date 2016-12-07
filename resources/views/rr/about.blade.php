
@extends('layouts.paginaweb')

@section('content')
<!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" style="background: #a3ddf0">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1>Acerca de Nosotros</h1>
                        <hr class="small">
                        <span class="subheading">Conoce al equipo detrás de Resguardo Rosa</span>
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

                    <h2 class="section-heading">Nuestro Objetivo</h2>

                    <p align="justify">El obejtivo principal de la Asociación es cuidar, escuchar, orientar, capacitar, ayudar, asesorar, asistir y servir a las niñas, mujeres adultas y mujeres de la tercera edad que lo necesiten, de cualquier núcleo social, para así poder enfrentar los diferentes problemas que a lo largo de la vida se presentan, dando solución a sus necesidades tanto económicas como de Índole jurídico, psicológico y espiritual para lograr la armonía con ellas mismas y con su “yo” interno.</p>

                    <hr>

                    <h2 class="section-heading">Nuestra Misión</h2>

                    <p align="justify">La misión es rescatar la dignidad de la mujer impartiéndo talleres productivos, deporte, la espiritualidad y la naturaleza, a través de donativos del país y del extrangero para el cumplimiento de su objetivo.</p>

                    <hr>

                    <h2 class="section-heading">Nuestra Visión</h2>

                    <p align="justify">La visión es enlazarse a nivel nacional e internacional con otras asociaciones civiles, gobiernos, empresas privadas, públicas y empresariales, dando a conocer nuestro proyecto, para que la mujer pueda recibir mayores beneficios y esto se vea reflejado en su desarrollo cultural, físico y económico propiciando un impacto en la sociedad que se verá reflejado en la armonía familiar.</p>

                    <hr>

                    <h2 class="section-heading">Miembros</h2>

                    <!--LISTA DE DONADORES-->
                    <div class="row">
                        <div class="col-xs-12">

                            @foreach ($integrantes as $integrante)
                            <div class="col-xs-6 col-md-4">
                                <div class="thumbnail">
                                    <img src="{{Storage::url($integrante->foto)}}">
                                    
                                    <div class="caption">
                                        <h3>{{$integrante->nombre}}</h3>
                                        <p>{{$integrante->descripcion}}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>

                    <hr>

                    <h2 class="section-heading">En donde encontrarnos</h2>

                    <!--SECCION PARA BOTON DE DONACION-->
                    <div class="row">
                        <div class="col-xs-10 col-xs-offset-1">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d471.3440216326826!2d-98.27207020679963!3d19.074630831462954!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85cfc667486bdd77%3A0x9bba18847700a644!2sCultura+1102%2C+Santiago+Momoxpa%2C+Santiago+Momoxpan%2C+Pue.!5e0!3m2!1ses-419!2smx!4v1480411606209" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>

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
