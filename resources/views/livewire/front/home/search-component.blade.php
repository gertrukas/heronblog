<div class="top-0 z-50 ">
    <nav class=" relative flex w-full flex-nowrap items-center justify-between  py-0 text-neutral-500 shadow-lg hover:text-neutral-700 focus:text-neutral-700 dark:bg-blue-500 lg:flex-wrap lg:justify-start" data-te-navbar-ref>
        <div class="flex w-full flex-wrap items-center justify-between pb-3">
            
            <div class="ml-0">
                <a href="/"><img src="{{asset('images/heron-pazzi-mvz.png')}}"></a>
            </div>
            
            <!-- Hamburger button for mobile view -->
            <button
                class="block border-0 bg-transparent px-2 text-neutral-500 hover:no-underline hover:shadow-none focus:no-underline focus:shadow-none focus:outline-none focus:ring-0 dark:text-neutral-200 lg:hidden"
                type="button"
                data-te-collapse-init
                data-te-target="#navbarSupportedContent14"
                aria-controls="navbarSupportedContent14"
                aria-expanded="false"
                aria-label="Toggle navigation">
                <!-- Hamburger icon -->
                <span class="[&>svg]:w-7">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    fill="currentColor"
                    class="h-7 w-7">
                    <path
                    fill-rule="evenodd"
                    d="M3 6.75A.75.75 0 013.75 6h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 6.75zM3 12a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 12zm0 5.25a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75a.75.75 0 01-.75-.75z"
                    clip-rule="evenodd" />
                </svg>
                </span>
            </button>

        <!-- Collapsible navbar container -->
        <div
            class="!visible mt-2 hidden flex-grow basis-[100%] items-right lg:mt-0 lg:!flex lg:basis-auto self-end"
            id="navbarSupportedContent14"
            data-te-collapse-item>

            <!-- Left links -->
            <ul class="list-style-none ml-auto flex items-end flex-col pl-0 lg:mt-1 lg:flex-row" data-te-navbar-nav-ref>
            
                <li class="lg:mb-2 lg:pl-0 lg:pr-1" data-te-nav-item-ref>
                    <a class="text-white transition duration-200 hover:text-neutral-700 hover:ease-in-out focus:text-neutral-700 disabled:text-black/30 motion-reduce:transition-none dark:text-neutral-200 dark:hover:text-neutral-400 dark:focus:text-neutral-400 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-neutral-400"
                            href="#"
                            data-te-nav-link-ref>Contacto</a>
                </li>
            
            </ul>
            <div class="w-[300px] lg:pr-2">
            <div class="relative flex w-full flex-wrap items-stretch">
               
                <input type="text" placeholder="Buscar..." wire:model.defer="search"
                    class="bg-white  text-blue-500 focus:text-blue-500  focus:ring-yellow-300 focus:outline-none p-2">
                &nbsp;
                <button class="bg-white  text-blue-500  font-semibold  hover:text-white hover:bg-blue-500 border border-white p-2"   wire:click="showSearch">Buscar</button>
            </div>
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
