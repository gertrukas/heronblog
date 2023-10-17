<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!--=============== css ===============-->
    <link rel="stylesheet" href="{{ asset('front/src/styles/global.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/src/styles/index.css') }}" />

    <!--=============== SEO ===============-->
    <title>Juan Manuel Rodríguez Caamaño - Biografía </title>
    <link rel="apple-touch-icon" href="{{ asset('front/svg/icono.svg') }}" />
    <link rel="shortcut icon" href="{{ asset('front/svg/icono.svg') }}" type="image/x-icon" />
    <meta name="theme-color" content="#000000" />

    <meta name="description"
        content="Juan Manuel Rodríguez Caamaño.
        Es un escritor de origen Mexicano, orgullasamente 
        académico egresado del tecnologico de monterrey y 
        con doctorado de la univerisidad de la habana cuba, 
        ha publicado distintas novelas y cuentos a lo largo 
        de su vida" />
    <meta name="keywords" content="Juan Manuel Rodríguez Caamaño, Libros, Novelas, Cuentos, Libros Academicos" />
    <meta name="author" content="Juan Manuel Rodríguez Caamaño" />
</head>

<body>
    <x-ui.menu :pageConfig="$pageConfig" />
    <!--=============== MAIN ===============-->
    <main class="container">
        <!--=============== intro ===============-->
        <section class="intro">
            <div class="intro__grid">
                <div>
                    <div class="intro__top">

                    </div>

                    <div class="intro__bottom">
                        <h2>¿Quien es Juan Manuel Rodríguez Caamaño?</h2>
                        <p style="text-align: justify ">
                            Es un escritor de origen Mexicano, orgullosamente académico
                            egresado del tecnologico de monterrey y con doctorado de la
                            universidad de la habana cuba, ha publicado distintas novelas y
                            cuentos a lo largo de su vida.
                        </p>
                        <br>

                        <ul class="ul-bio">

                            <li>Nació en Coatzacoalcos, Veracruz, México, el 4 de junio de 1976, es:</li>

                            <li>Licenciado en Mercadotecnia por el Instituto Tecnológico y de Estudios Superiores de
                                Monterrey.</li>

                            <li>Maestro en Administración por la Universidad Nacional Autónoma de México.</li>

                            <li>
                                Profesor investigador de la Universidad de Sotavento.
                            </li>

                            <li>
                                Rector fundador de la Universidad Istmo Americana.
                            </li>

                            <li>
                                Ha publicado cinco libros académicos
                                del área de Mercadotecnia y Administración.
                            </li>
                        </ul>

                    </div>
                </div>
                <div class="bio-box-img">
                    <img src="{{ asset('images/juan.png') }}" alt="Juan Manuel Rodriguez Caamaño" class="bio-img" />
                </div>
            </div>
        </section>


    </main>
    <x-ui.footer :pageConfig="$pageConfig" />
