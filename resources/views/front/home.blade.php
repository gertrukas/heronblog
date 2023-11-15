<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.head')
    

    
</head>

<body class="p-0 bg-white">

        
        @include('includes.header')

        {{-- <h1 x-data="{ message: 'I ❤️ Alpine' }" x-text="message"></h1> --}}
        
        <!---- banner ------>
            <div class="flex items-center justify-center p-2">
                <a href="/" class="content-center"><img src="{{asset('images/banner/master-class-gratuita.jpg')}}"></a>
            </div>
       <!---- /banner ------>

        <!-- hero section -->
            <div class="relative flex flex-col items-center">
                    <img src="{{asset('images/fb.jpg')}}" width="100%" height="auto" class="" />
            </div>
        <!-- /hero section -->


        <!-- bread crumb section -->
        <div class=" bg-P30 w-full h-10 text-white flex justify-start items-center  px-6">
            Inicio
        </div>
        <!-- bread crumb section -->
        
        <h1 class="text-center text-2xl sm:text-5xl py-6 font-medium"> Publicaciónes recientes </h1>
       

        <div class="container items-center">
            <div class="container lg:flex m-0 px-0">
                
                <main class="px-0 mb-6" flex-grow>
                   <livewire:front.home.lasted-post />
                </main>

                <aside class="px-4 md:flex-none  align-top m-0 p-0">
                    <img src="{{asset('images/adds/ad-300x-600.jpg')}}" width="100%" height="auto" class="m-0 p-0" />
                </aside>
            </div>
        </div>
          
        @include('includes.footer')
       
    
    
    <!--=============== js ===============-->
    <livewire:scripts />
</body>

</html>
