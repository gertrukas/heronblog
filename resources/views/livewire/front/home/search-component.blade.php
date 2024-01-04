
  
<div class="top-0 z-50">

    <div class="relative flex w-full flex-wrap items-stretch bg-blue-500 p-1">
        
            <input type="text" placeholder="Buscar..." wire:model.defer="search" class="bg-white  text-P30 focus:text-blue-500 focus:outline-none p-1 w-80 ml-auto -err-g">
            &nbsp;
            <button class="-boton-blanco"   wire:click="showSearch">Buscar</button>        
    </div>

    <p>search {{ $search}}
    @if ($search && $isSearch)
        <div class="w-full  bg-P30 text-left px-4 py-2 text-white">
           <a href="/"> Inicio </a>/ Resultados de la búsqueda: {{ $search }}
        </div>
    @endif
    
</div>

