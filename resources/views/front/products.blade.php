<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!--=============== css ===============-->
    <link rel="stylesheet" href="{{ asset('front/src/styles/global.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/src/styles/coleccion.css') }}" />
    <link rel="apple-touch-icon" href="{{ asset('front/svg/icono.svg') }}" />
    <link rel="shortcut icon" href="{{ asset('front/svg/icono.svg') }}" type="image/x-icon" />
    <!--=============== SEO ===============-->
    {!! SEO::generate() !!}
    <style>
        .banner-col {
            width: 100%;
            min-height: 460px;
            background: rgba(255, 252, 252, 0.5);
            background-image: url('{{ asset('images/books.jpg') }}');
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            background-blend-mode: multiply;
            padding: 30px;
            display: flex;
            align-items: flex-end;
            border-radius: 10px;
            margin-bottom: 20px;
        }
    </style>
    <livewire:styles />
</head>

<body>
    <x-ui.menu :pageConfig="$pageConfig" />

    <!--=============== MAIN ===============-->
    <main class="container">
        <section class="coleccion">
            <section class=""
                style="
            width: 100%;
    min-height: 460px;
    background: rgba(255, 252, 252, 0.5);
    background-image: url( {{ $category->url_image ? asset('storage' . $category->url_image) : asset('images/books.jpg') }});
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    background-blend-mode: multiply;
    padding: 30px;
    display: flex;
    align-items: flex-end;
    border-radius: 10px;
    margin-bottom: 20px;
}">

                <div class="coleccion__descripcion" id="coleccion-descripcion">
                    <h1>{{ $category->name }}</h1>
                    <p>
                        {{ $category->description ?? 'Novelas una coleccion interesante, para los amantes de la lectura y la literatura.' }}
                    </p>
                </div>
            </section>

  

            <!--=============== COLECCION ===============-->

            <section id="coleccion">
                <livewire:front.product.list-product :category="$category">
            </section>

     

        </section>
    </main>

    <x-ui.footer :pageConfig="$pageConfig" />

