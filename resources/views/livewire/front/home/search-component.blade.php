
  
<div class="top-0 z-50">

    <div class="relative flex w-full flex-wrap bg-blue-500 p-1">
        <!--
            <input type="text" placeholder="buscar..." wire:model.defer="search" class="bg-white  text-P30 focus:text-blue-500 focus:outline-none p-1 w-80 ml-auto -err-g">
            &nbsp;
            <button class="-boton-blanco"   wire:click="showSearch">Buscar</button>  -->
            <form method="get" action="/search" enctype="multipart/form-data" class="ml-auto">
                {{ csrf_field() }}
                <input class="bg-white  text-P30 focus:text-blue-500 focus:outline-none p-1 w-80 ml-auto -err-g" name="search" type="text" class="form-control" id="search" placeholder="Buscar...">
                <button class="-boton-blanco" type="submit" class="btn btn-primary">Buscar</button>
            </form>
    </div>
<!--
    @if ($search && $isSearch)
        <div class="w-full  bg-P30 text-left px-4 py-2 text-white">
           <a href="/"> Inicio </a>/ Resultados de la búsqueda: {{ $search }}
        </div>
    @endif
    -->
</div>

