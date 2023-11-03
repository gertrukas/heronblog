<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{URL::asset('css/style.css')}}">
    <script src="https://cdn.tailwindcss.com"></script>
    
</head>

<body>

    <div>
            
        <livewire:front.home.search-component>
          
        <header class="relative overflow-hidden text-ybg-yellow-500 rounded-lg sm:mx-16 mx-2 sm:py-16">
                <p class="-err">baner</p>
        </header>


        <div class=" bg-yellow-500 w-full h-16 text-white flex justify-start items-center  px-10">
            Inicio
        </div>



        <h1 class="text-center text-2xl sm:text-5xl py-10 font-medium"> Publicaciónes recientes </h1>
        <div class="container mx-auto">
           <!-- <livewire:front.home.lasted-post /> -->
        </div>

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
