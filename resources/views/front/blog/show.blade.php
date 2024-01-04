@extends('../layout/main')

@section ('content')

    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v18.0&appId=714038927277647" nonce="qJoelLet"></script>

    <div>
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

                        <!-- TW Elements is free under AGPL, with commercial license required for specific uses. See more details: https://tw-elements.com/license/ and contact us for queries at tailwind@mdbootstrap.com --> 
                        <div id="accordionExample ">
                            
                            
                            <div
                            class="mb-4">
                            <h2 class="accordion-header mb-0" id="headingThree">
                                <button
                                class="group relative flex w-full items-center border-0 bg-P30 text-white px-5 py-2 text-left text-base transition [overflow-anchor:none] hover:z-[2] focus:z-[3] focus:outline-none dark:bg-neutral-800 dark:text-white [&:not([data-te-collapse-collapsed])]:bg-white [&:not([data-te-collapse-collapsed])]:text-primary [&:not([data-te-collapse-collapsed])]:[box-shadow:inset_0_-1px_0_rgba(229,231,235)] dark:[&:not([data-te-collapse-collapsed])]:bg-neutral-800 dark:[&:not([data-te-collapse-collapsed])]:text-primary-400 dark:[&:not([data-te-collapse-collapsed])]:[box-shadow:inset_0_-1px_0_rgba(75,85,99)] [&[data-te-collapse-collapsed]]:rounded-b-[15px] [&[data-te-collapse-collapsed]]:transition-none"
                                type="button"
                                data-te-collapse-init
                                data-te-collapse-collapsed
                                data-te-target="#collapseThree"
                                aria-expanded="false"
                                aria-controls="collapseThree">
                                Suscribete a nuestra Newsletter
                                <span
                                    class="-mr-1 ml-auto h-5 w-5 shrink-0 rotate-[-180deg] fill-[#336dec] transition-transform duration-200 ease-in-out group-[[data-te-collapse-collapsed]]:mr-0 group-[[data-te-collapse-collapsed]]:rotate-0 group-[[data-te-collapse-collapsed]]:fill-[#212529] motion-reduce:transition-none dark:fill-blue-300 dark:group-[[data-te-collapse-collapsed]]:fill-white">
                                    <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    class="h-6 w-6">
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                    </svg>
                                </span>
                                </button>
                            </h2>
                            <div
                                id="collapseThree"
                                class="!visible hidden"
                                data-te-collapse-item
                                aria-labelledby="headingThree"
                                data-te-parent="#accordionExample">
                                <div class="px-5 py-4 text-p30">

                                    <div  class="">
                                        @include('includes.newsletter')
                                    </div>

                                </div>
                            </div>
                            </div>
                        </div>
                        
                        <script>
                            // Initialization for ES Users
                            import {
                            Collapse,
                            initTE,
                            } from "tw-elements";

                            initTE({ Collapse });
                        </script>
                       
                        <div>
                            {!! $blog->description !!}
                        </div>

                        <div class="">
                            {{-- FACEBOOK --}}
                            <div class="fb-like" 
                                data-href="https://blogs.heronpazzi.com/blogs/{{ $blog->slug }}" 
                                data-width="" 
                                data-layout="" 
                                data-action="" 
                                data-size="" 
                                data-share="true">
                            </div>
                            {{-- FACEBOOK END --}}
                        </div>

                        {{-- WatssApp --}}
                        <div class="pt-1 pb-1"><a class="td-social-sharing-button td-social-sharing-button-js td-social-network td-social-whatsapp" href="https://api.whatsapp.com/send?text= checa este artículo {{ $blog->name }} %0A%0A https://heronpazzi.com/blogs/{!! $blog->name !!}" title="WhatsApp" style="transition: opacity 0.2s ease 0s; opacity: 1;"><img src="{{asset("images/sociales/whatsapp.png")}}" width="30px" height="auto"></a></div>
                        {{-- WhatsApp END --}} 
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

                                    <a href="{{ route('posts.show', $item->slug) }}" class="-link-titulo"> {{ str_limit($item->name, 50, '...') }}</a>

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

@endsection
