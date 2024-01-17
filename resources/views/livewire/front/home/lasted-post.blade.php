
{{$mivariable}}
<div class="grid grid-cols-1 text-center mx-0  gap-x-0 gap-y-5 my-0">
    @foreach ($this->blogs as $blog)
        <div class="border shadow-lg rounded-lg py-4  px-8 flex flex-col lg:flex-row">
            
            <div class="w-full lg:w-1/2 p-0">
                <a href="{{ route('posts.show', $blog->slug) }}"><img src="{{ asset('uploads/' . $blog->image) }}" class="w-full object-contain" alt="{{ $blog->name }}"></a>
            </div>

            <div class="w-full lg:w-1/2 flex justify-start flex-col align-top items-start p-4 pt-0 pb-0">
                <h2 class="text-2xl font-semibold text-left">
                    {{ $blog->name }}
                    
                </h2>
                <p class="text-gray-500 text-left">
                   {{ $blog->date ? changeFormatDateApp($blog->date)->format('d-M-Y') : changeFormatDateApp($blog->created_at)->format('d-M-Y') }}
                </p>
                <p class="text-left">
                    {!!  Str::words($blog->intro, 26, '...') !!}
                    
                   
                    
                </p>

                <div class=" flex justify-end items-end w-full h-full">
                    <a class="-boton-azul" href="{{ route('posts.show', $blog->slug) }}">leer más</a>
                </div>

            </div>
           
        </div>
    @endforeach


    @if ($total <= $showElements)
        <div class=" flex justify-end items-end w-full h-full ">
            <p>No se han encontrado más resultados</p>
        </div>
    @else
        <div class="container items-center">
            <button class="-boton-azul shadow-lg " wire:click='verMas'>Ver más artículos</button>
        </div>
    @endif

</div>
