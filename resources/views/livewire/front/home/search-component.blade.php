<div class="top-0 z-50">
    <nav class="relative flex w-full flex-nowrap items-center justify-between - py-2 text-neutral-500 shadow-lg hover:text-neutral-700 focus:text-neutral-700 dark:bg-neutral-600 lg:flex-wrap lg:justify-start lg:py-4" data-te-navbar-ref>
        <div class="flex w-full flex-wrap items-center justify-between px-3">
            
            <div class="ml-2">
                <a href="/"><img src="{{asset('images/heronpazzi.png')}}"></a>
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
            class="!visible mt-2 hidden flex-grow basis-[100%] items-right lg:mt-0 lg:!flex lg:basis-auto self-end -err"
            id="navbarSupportedContent14"
            data-te-collapse-item>
            <!-- Left links -->
            <ul class="list-style-none ml-auto flex items-end flex-col pl-0 lg:mt-1 lg:flex-row" data-te-navbar-nav-ref>
            
                <li class="mb-4 pl-2 lg:mb-0 lg:pl-0 lg:pr-1 " data-te-nav-item-ref>
                    <a class="p-0 text-neutral-500 transition duration-200 hover:text-neutral-700 hover:ease-in-out focus:text-neutral-700 disabled:text-black/30 motion-reduce:transition-none dark:text-neutral-200 dark:hover:text-neutral-400 dark:focus:text-neutral-400 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-neutral-400"
                            href="#"
                            data-te-nav-link-ref
                        >Contacto</a>
                </li>
            
            </ul>
            <div class="w-[300px] lg:pr-2">
            <div class="relative flex w-full flex-wrap items-stretch">
                <input
                type="search"
                class="relative m-0 -mr-0.5 block w-[1px] min-w-0 flex-auto rounded-l border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none motion-reduce:transition-none dark:border-neutral-500 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary"
                placeholder="Buscar"
                aria-label="Buscar"
                aria-describedby="button-addon3" />

                <!--Search button-->
                <button
                class="relative z-[2] rounded-r border-2 border-primary px-6 py-2 text-xs font-medium uppercase text-primary transition duration-150 ease-in-out hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 motion-reduce:transition-none"
                type="button"
                id="button-addon3"
                data-te-ripple-init>
                Search
                </button>
            </div>
            </div>
        </div>
        </div>
        </nav>


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
