<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>

<body>

    <div>
        
        <livewire:front.home.search-component >

        <div class=" bg-yellow-500 w-full h-16 text-white flex justify-start items-center  px-10">
            <p>Publicación / {{ $blog->name }} </p>
        </div>

        <main class="container px-4 mx-auto  bg-white">
            <section class="w-full flex flex-col lg:flex-row gap-8">
                <section class="w-full lg:w-2/3">

                    <article>
                        <h1 class="text-center text-xl sm:text-5xl py-10 font-medium"> {{ $blog->name }}</h1>
                        <figure class="my-10">
                            <img src="{{ asset('uploads/' . $blog->image) }}" class="w-full object-contain rounded-md "
                                alt="">
                        </figure>


                        <div>
                            {!! $blog->description !!}
                        </div>
                    </article>

                </section>


                <div class="w-full lg:w-1/3">
                    <div class="py-10">
                        <br>

                        
                        <br>
                    </div>
                    @foreach ($blogAside as $item)
                        <a href="{{ route('posts.show', $item->slug) }}">
                            <article class="py-10 ">
                                <figure class="mx-auto">
                                    <img src="{{ asset('uploads/' . $item->image) }}"
                                        class="w-full object-contain rounded-md " width="">
                                    <h3 class="text-2xl font-semibold"> {{ str_limit($item->name, 43, '...') }}</h3>
                                    <p class="text-gray-400 text-sm">
                                        Author
                                    </p>
                                </figure>
                            </article>
                        </a>
                    @endforeach

                </div>

            </section>


        </main>

        <footer class="text-center">
            <hr />
            <p class="text-center py-5">Crafted with ❤️ by <span class="font-black">

                </span></p>
        </footer>



    </div>
    <!--=============== js ===============-->
    <livewire:scripts />
</body>

</html>
