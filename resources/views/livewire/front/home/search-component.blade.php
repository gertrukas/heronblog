<div class="sticky top-0 z-50">

    <nav>
        <div>
            <div class="w-full bg-yellow-500  opacity-90 h-20 flex justify-between ">
                <div class="w-full lg:w-30/6 xl:w-full  h-full flex items-center px-4 ">

                    <a href="/" class="text-white text-2xl font-semibold"> Inicio</a>
                </div>


                <div class="w-full  h-full flex justify-end items-center gap-4">

                    <input type="text" placeholder="Buscar..." wire:model.defer="search"
                        class="bg-white rounded-md   focus:border-yellow-500  focus:ring-yellow-300 focus:outline-none text-yellow-600 p-2">
                    <button class="bg-white rounded-md   p-2  text-yellow-500  font-semibold  hover:text-white hover:bg-yellow-600"
                        wire:click="showSearch">Buscar</button>
                    &nbsp;
                </div>


            </div>
        </div>
    </nav>

    @if ($search && $isSearch)
        <div class="w-full  bg-yellow-600 text-left px-4 py-2 text-white">
            Inicio / Resultados de la búsqueda: {{ $search }}
        </div>
    @endif
</div>
