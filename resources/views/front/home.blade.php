@extends('../layout/main')


@section ('content')

    
        <!---- banner ------>
        <div class="flex items-center justify-center p-2">
          <a href="/" class="content-center"><img src="{{asset('images/banner/master-class-gratuita.jpg')}}"></a>
        </div>
        <!---- /banner ------>
    

    {{-- SLIDER --}}
    <x-slider />
    {{-- /SLIDER --}}
  
    <!-- bread crumb section -->
    <div class=" bg-P30 w-full h-10 text-white flex justify-start items-center  px-6">
        <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
          </svg> 
          Inicio
          <svg class="rtl:rotate-180 block w-3 h-3 mx-1 text-gray-400 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
          </svg>
    </div>
    <!-- bread crumb section -->
    
    <div class="container items-center">
      <div class="container lg:flex m-0 px-0">
          
          <main class="px-0 mb-6" flex-grow>
             <livewire:front.home.lasted-post/>
          </main>

          <aside class="px-4 md:flex-none  align-top m-0 p-0">
              <img src="{{asset('images/adds/ad-300x-600.jpg')}}" width="100%" height="auto" class="m-0 p-0" />
          </aside>
      </div>
  </div>
 

@endsection