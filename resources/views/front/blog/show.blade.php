<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.head')

   
    <meta property="og:title" content="{{ $blog->name }}"/>
    <meta property="og:site_name" content="heronpazzi.com"/>
    <meta property="og:url" content="@yield('ogUrl', 'https://blogs.heronpazzi.com')"/>
    <meta property="og:description" content="@yield('ogDesc', 'Los expertos en la salud y bienestar de tu perro.')"/>
    <meta property="og:type" content="@yield('ogType', 'website')"/>
    <meta property="og:locale" content="es"/>
    <meta property="og:image" content="https://uploads/{{ $blog->image }}"/>
    <meta property="og:image:width" content="400" />
    <meta property="og:image:height" content="400" />
    <meta property="fb:app_id" content="875029200167861"/>
    
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
                        
                        <h1 class=""> {{ $blog->name }}</h1>
                           
                        <figure class="">
                            <img src="{{ asset('uploads/' . $blog->image) }}" class="w-full object-contain rounded-md mb-2" alt="">
                        </figure>

                        <div>
                            {!! $blog->description !!}
                        </div>

                        <div class="">
                            <iframe src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fheronpazzi.com%2Fblog%2Famputacion-de-miembros-en-perros&width=450&layout=standard&action=like&size=small&share=true&height=35&appId=875029200167861"
                            
                                width="450"
                                height="20"
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

                    {{-- Autor --}} 
                    <div class="w-2/3 lg:max-w-full lg:flex border-solid border-2 border-gray-200">
                        <div class="h-full lg:h-auto lg:w-48 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center ">
                            <img src="{{ asset('images/heronpazzi.jpg') }}">
                        </div>

                        <div class=" bg-white rounded-b lg:rounded-b-none lg:rounded-r pt-4 pl-4 pr-4 flex flex-col justify-between leading-normal">
                          <div class="mb-0">
                            <div class="text-gray-900 font-bold text-xl mb-2">Autor: Heron Pazzi</div>
                            <p class="text-gray-700 text-base">Médico Veterinario Zootecnista, dedicado a la clínica y cirugía de perros y gatos. Ex académico de la FMVZ UNAM y de la FCN UAQ. Conferencista y amante de los perros y su bienestar.</p>
                          </div>
                        </div>
                      </div>
                      {{-- END autor --}}
                    

                    <div  class="">
                        @include('includes.newsletter')
                    </div>

                </section>


                <div class="w-full lg:w-1/3 mx-auto">
                    <div class="py-3">
                        <br>

                        
                        <br>
                    </div>
                    @foreach ($blogAside as $item)
                        
                            <article class="py-0 my-2">
                                <figure class="mx-auto">
                                    <a href="{{ route('posts.show', $item->slug) }}" class=""><img src="{{ asset('uploads/' . $item->image) }}" class="w-full object-contain rounded-md py-0  my-1" width=""></a>

                                    <a href="{{ route('posts.show', $item->slug) }}" class="no-underline"><h2> {{ str_limit($item->name, 50, '...') }}</h2></a>
                                    <p class="text-gray-400 text-sm">
                                        Author: {{ $item->author }}
                                    </p>
                                </figure>
                            </article>

                    @endforeach

                    @include('includes.addright')

                </div>

            </section>


        </main>

        @include('includes.footer')



    </div>
    <!--=============== js ===============-->
    <livewire:scripts />
</body>

</html>
