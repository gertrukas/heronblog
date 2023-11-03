<div class="grid grid-cols-1  text-center mx-6  gap-x-5 gap-y-5 my-10">
    @foreach ($this->blogs as $blog)
        <div class="border  shadow-lg rounded-lg py-8  px-8 flex flex-col lg:flex-row">
            <div class="w-full lg:w-1/2 p-4">
                <img src="{{ asset('uploads/' . $blog->image) }}" class="w-full object-contain " alt="">
            </div>

            <div class="w-full lg:w-1/2 flex justify-start flex-col align-top items-start p-4">
                <h3 class="text-2xl font-semibold text-left">
                    {{ $blog->name }}
                </h3>
                <p class="text-gray-500 text-left">
                   {{ $blog->date ? changeFormatDateApp($blog->date)->format('d-M-Y') : changeFormatDateApp($blog->created_at)->format('d-M-Y') }}
                </p>
                <p class="text-left">
                    {!! $blog->intro !!}
                </p>

                <div class=" flex justify-end items-end w-full h-full">
                    <a class="text-white  bg-yellow-500 rounded-md py-2 px-4"
                        href="{{ route('posts.show', $blog->slug) }}">Ver más</a>

                </div>

            </div>
            {{-- In work, do what you enjoy. --}}
        </div>
    @endforeach


    @if ($total <= $showElements)
        <div class=" flex justify-end items-end w-full h-full ">
            <p>No se han encontrado más resultados</p>
        </div>
    @else
        <div class=" flex justify-end items-end w-full h-full ">
            <button class="text-white  bg-yellow-500 rounded-md py-2 px-4" wire:click='verMas'>Ver más</button>
        </div>
    @endif

</div>
