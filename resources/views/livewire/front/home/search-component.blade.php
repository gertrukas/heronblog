
  
<div class="top-0 z-50">

    <div class="relative flex w-full flex-wrap bg-blue-500 p-1">
            <form method="get" action="/search" enctype="multipart/form-data" class="ml-auto">
                {{ csrf_field() }} 
                <input class="bg-white  text-P30 focus:text-blue-500 focus:outline-none p-1  w-80 sm:w40 ml-auto" name="search" type="text" class="form-control" id="search" placeholder="Buscar...">
                <button class="-boton-blanco" type="submit" class="btn btn-primary">Buscar</button>
            </form>
    </div>

</div>

