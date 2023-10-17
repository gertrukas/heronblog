<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!--=============== css ===============-->
    <link rel="stylesheet" href="{{ asset('front/src/styles/global.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/src/styles/producto.css') }}" />
    <link rel="apple-touch-icon" href="{{ asset('front/svg/icono.svg') }}" />
    <link rel="shortcut icon" href="{{ asset('front/svg/icono.svg') }}" type="image/x-icon" />
    <!--=============== SEO ===============-->
    {!! SEO::generate() !!}

    <style>
        .producto__banner {
            width: 100%;
            min-height: 460px;
            background: rgba(250, 248, 248, 0.5);
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
            ≤
        }
    </style>



</head>

<body>
    <x-ui.menu :pageConfig="$pageConfig" />
    <!--=============== MAIN ===============-->
    <main class="container">
        <!--=============== PRODUCTO ===============-->


        <section class="producto">
            <section
                style="
                width: 100%;
    min-height: 460px;
    background: rgba(250, 248, 248, 0.5);
    background-image:  url( {{ $book->url_banner ? asset('storage' . $book->url_banner) : asset('images/books.jpg') }});
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    background-blend-mode: multiply;
    padding: 30px;
    display: flex;
    align-items: flex-end;
    border-radius: 10px;
    margin-bottom: 20px;
">

                <div class="producto__descripcion" id="producto-descripcion">
                    <h1>{{ $book->title }}</h1>
                    <p>
                        {{ $book->text_banner }}
                    </p>
                </div>
            </section>


            <!--=============== PRODUCTO ===============-->
            <section class="producto__contenido" id="producto">
                <div>
                    <div class="producto__flex">
                        <div class="producto__imagen">
                            <img src="{{ asset('storage/' . $book->url_image) }}" alt="{{ $book->title }}"
                                title="{{ $book->title }}">
                        </div>
                        <div class="producto__informacion">
                            <div class="producto__encabezado">
                                <h2>{{ $book->title }}</h2>
                                <h4>{{ $book->autor }}</h4>
                            </div>
                            <div class="producto__precio">
                                <h3>{{ currency($book->price) }}</h3>
                            </div>

                            <div class="producto__selecionar">
                            </div>
                            <div class="producto__botones">
                                <a href="{{ $book->url_amazon }}" target="_blank" class="boton-secundary"
                                    title="Comprar en Amazon">
                                    <svg viewBox="2.167 .438 251.038 259.969" xmlns="http://www.w3.org/2000/svg">
                                        <g fill="none" fill-rule="evenodd">
                                            <path
                                                d="m221.503 210.324c-105.235 50.083-170.545 8.18-212.352-17.271-2.587-1.604-6.984.375-3.169 4.757 13.928 16.888 59.573 57.593 119.153 57.593 59.621 0 95.09-32.532 99.527-38.207 4.407-5.627 1.294-8.731-3.16-6.872zm29.555-16.322c-2.826-3.68-17.184-4.366-26.22-3.256-9.05 1.078-22.634 6.609-21.453 9.93.606 1.244 1.843.686 8.06.127 6.234-.622 23.698-2.826 27.337 1.931 3.656 4.79-5.57 27.608-7.255 31.288-1.628 3.68.622 4.629 3.68 2.178 3.016-2.45 8.476-8.795 12.14-17.774 3.639-9.028 5.858-21.622 3.71-24.424z"
                                                fill="#f90" fill-rule="nonzero"></path>
                                            <path
                                                d="m150.744 108.13c0 13.141.332 24.1-6.31 35.77-5.361 9.489-13.853 15.324-23.341 15.324-12.952 0-20.495-9.868-20.495-24.432 0-28.75 25.76-33.968 50.146-33.968zm34.015 82.216c-2.23 1.992-5.456 2.135-7.97.806-11.196-9.298-13.189-13.615-19.356-22.487-18.502 18.882-31.596 24.527-55.601 24.527-28.37 0-50.478-17.506-50.478-52.565 0-27.373 14.85-46.018 35.96-55.126 18.313-8.066 43.884-9.489 63.43-11.718v-4.365c0-8.018.616-17.506-4.08-24.432-4.128-6.215-12.003-8.777-18.93-8.777-12.856 0-24.337 6.594-27.136 20.257-.57 3.037-2.799 6.026-5.835 6.168l-32.735-3.51c-2.751-.618-5.787-2.847-5.028-7.07 7.543-39.66 43.36-51.616 75.43-51.616 16.415 0 37.858 4.365 50.81 16.795 16.415 15.323 14.849 35.77 14.849 58.02v52.565c0 15.798 6.547 22.724 12.714 31.264 2.182 3.036 2.657 6.69-.095 8.966-6.879 5.74-19.119 16.415-25.855 22.393l-.095-.095"
                                                fill="#000"></path>
                                            <path
                                                d="m221.503 210.324c-105.235 50.083-170.545 8.18-212.352-17.271-2.587-1.604-6.984.375-3.169 4.757 13.928 16.888 59.573 57.593 119.153 57.593 59.621 0 95.09-32.532 99.527-38.207 4.407-5.627 1.294-8.731-3.16-6.872zm29.555-16.322c-2.826-3.68-17.184-4.366-26.22-3.256-9.05 1.078-22.634 6.609-21.453 9.93.606 1.244 1.843.686 8.06.127 6.234-.622 23.698-2.826 27.337 1.931 3.656 4.79-5.57 27.608-7.255 31.288-1.628 3.68.622 4.629 3.68 2.178 3.016-2.45 8.476-8.795 12.14-17.774 3.639-9.028 5.858-21.622 3.71-24.424z"
                                                fill="#f90" fill-rule="nonzero"></path>
                                            <path
                                                d="m150.744 108.13c0 13.141.332 24.1-6.31 35.77-5.361 9.489-13.853 15.324-23.341 15.324-12.952 0-20.495-9.868-20.495-24.432 0-28.75 25.76-33.968 50.146-33.968zm34.015 82.216c-2.23 1.992-5.456 2.135-7.97.806-11.196-9.298-13.189-13.615-19.356-22.487-18.502 18.882-31.596 24.527-55.601 24.527-28.37 0-50.478-17.506-50.478-52.565 0-27.373 14.85-46.018 35.96-55.126 18.313-8.066 43.884-9.489 63.43-11.718v-4.365c0-8.018.616-17.506-4.08-24.432-4.128-6.215-12.003-8.777-18.93-8.777-12.856 0-24.337 6.594-27.136 20.257-.57 3.037-2.799 6.026-5.835 6.168l-32.735-3.51c-2.751-.618-5.787-2.847-5.028-7.07 7.543-39.66 43.36-51.616 75.43-51.616 16.415 0 37.858 4.365 50.81 16.795 16.415 15.323 14.849 35.77 14.849 58.02v52.565c0 15.798 6.547 22.724 12.714 31.264 2.182 3.036 2.657 6.69-.095 8.966-6.879 5.74-19.119 16.415-25.855 22.393l-.095-.095"
                                                fill="currentColor"></path>
                                        </g>
                                    </svg>
                                    Comprar en amazon</a>
                                <button class="boton-red" title="Agregar a favoritos">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                                        </path>
                                    </svg>

                                    Favoritos
                                </button>
                                <button class="boton-gray" title="Copiar" id="btn-copy">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                                        </path>
                                    </svg>
                                    Copiar enlace
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="producto__bottom">
                        <button class="top" id="btn-descripcion">Descripción</button>
                        <div class="bottom open" id="desplegable-descripcion">
                            <p>
                                {{ $book->description }}
                            </p>
                        </div>
                    </div>
                </div>
            </section>
            <!--=============== RECOMENDADOS ===============-->
            <section class="productos">
                <div class="produtos__encabezado">

                    <h2>Libros Recomendados</h2>
                </div>

                <div id="productos-recomendados">


                    <livewire:front.home.limited-product-category :name="$name" :quantity="$quantity"
                        :wire:key="'books-pro'" />

                </div>
            </section>
        </section>
    </main>

    <x-ui.footer :pageConfig="$pageConfig" />
