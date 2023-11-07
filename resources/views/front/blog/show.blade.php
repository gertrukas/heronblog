<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{URL::asset('css/style.css')}}">
    @vite(['resources/css/app.css'])

</head>

<body class="p-0 bg-white">

    <div>
        <livewire:front.home.navigation>
        <livewire:front.home.search-component >

        <!-- bread crumb section -->
        <div class=" bg-P30 w-full h-10 text-white flex justify-start items-center  px-6">
            <a href="/" class="-link-breadcrumb"> Inicio </a> / {{ $blog->name }} 
        </div>
        <!-- bread crumb section -->

        <main class="container px-0 mx-auto w-full pb-4">
            <section class="w-full flex flex-col lg:flex-row gap-8">
                <section class="w-full lg:w-2/3">

                    <article>
                        
                        <h1 class="-err"> {{ $blog->name }}</h1>

                        <figure class="">
                            <img src="{{ asset('uploads/' . $blog->image) }}" class="w-full object-contain rounded-md " alt="">
                        </figure>


                        <div>
                            {!! $blog->description !!}
                        </div>

                        <div class="-err">
                            <iframe [src]="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fheronpazzi.com%2Fblog%2Famputacion-de-miembros-en-perros&width=450&layout=standard&action=like&size=small&share=true&height=35&appId=875029200167861"
                                width="450"
                                height="55"
                                style="border:none;
                                    overflow:hidden;
                                    color:white;"
                                allowfullscreen="true"
                                allow="autoplay;
                                    clipboard-write;
                                    encrypted-media;
                                    picture-in-picture;
                                    web-share">
                            </iframe>
                    
                        </div>

                        
                        <div class="pt-1 pb-1"><a class="td-social-sharing-button td-social-sharing-button-js td-social-network td-social-whatsapp" href="https://api.whatsapp.com/send?text= checa este artículo {{ $blog->name }} %0A%0A https://heronpazzi.com/blogs/{!! $blog->name !!}" title="WhatsApp" style="transition: opacity 0.2s ease 0s; opacity: 1;"><img src="{{asset("images/sociales/whatsapp.png")}}" width="30px" height="auto"></a></div>
                    </article>

                    
                    <div class=" -err">
                        <img src="{{asset("images/heronpazzi.jpg")}}" class="" >
                        <div class="card-body">
                          <h5 class="card-title">Autor: Heron Pazzi</h5>
                          <br>
                          <p class="card-text">Médico Veterinario Zootecnista, dedicado a la clínica y cirugía de perros y gatos. Ex académico de la FMVZ UNAM y de la FCN UAQ. Conferencista y amante de los perros y su bienestar.</p>
                        </div>
                      </div>

                    <div  class="-err">
                        @include('includes.newsletter')
                    </div>
                </section>


                <div class="w-full lg:w-1/3">
                    <div class="py-7 ">
                        <br>

                        
                        <br>
                    </div>
                    @foreach ($blogAside as $item)
                        <a href="{{ route('posts.show', $item->slug) }}">
                            <article class="py-4 ">
                                <figure class="mx-auto">
                                    <img src="{{ asset('uploads/' . $item->image) }}"
                                        class="w-full object-contain rounded-md " width="">
                                    <h3 class="text-2xl font-semibold"> {{ str_limit($item->name, 50, '...') }}</h3>
                                    <p class="text-gray-400 text-sm">
                                        Author: {{ $item->author }}
                                    </p>
                                </figure>
                            </article>
                        </a>
                    @endforeach

                </div>

            </section>


        </main>

        @include('includes.footer')



    </div>
    <!--=============== js ===============-->
    <livewire:scripts />
</body>

</html>
