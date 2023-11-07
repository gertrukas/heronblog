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

  
        @include('includes.header')

        <div class="flex items-center justify-center p-2">
            <a href="/" class="content-center"><img src="{{asset('images/banner/master-class-gratuita.jpg')}}"></a>
        </div>
       
        <div class="relative flex flex-col items-center  bg-slate-500">
            
                <img src="{{asset('images/fb.jpg')}}" class="object-fill w-100" />
            
        </div>

        <div class=" bg-blue-500 w-full h-16 text-white flex justify-start items-center  px-10">
            Inicio
        </div>
        
        <h1 class="text-center text-2xl sm:text-5xl py-10 font-medium"> Publicaciónes recientes </h1>
        <div class="container mx-auto">
           <livewire:front.home.lasted-post />
        </div>

        @include('includes.footer')
       
    
    <!--=============== js ===============-->
    <livewire:scripts />
</body>

</html>
