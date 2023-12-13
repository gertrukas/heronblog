@extends('../layout/main')

@section ('content')
        
        <!-- bread crumb section -->
        <div class=" bg-P30 w-full h-10 text-white  flex justify-start items-center  px-6 mt-px">
            <a href="/" class="-link-breadcrumb">Inicio</a> / Quienes Somos
        </div>
        


        <div class="w-screen  m-0 bg-P60">

            <div class="grid grid-cols-2 gap-0 bg-cafe">
              
              <div  class="w-full p-12 m-auto "> 
                <h2 class=" text-3xl">Quienes somos</h2>
                <br>
                <h2>Somos una empresa legalmente constituida y que nos dedicamos al acompañamiento profesional de las personas que se encuentran en un proceso de rehabilitación de sustancias psicoactivas (alcohol y otras drogas) asi como de los llamados trastornos emocionales o enfermedades del alma. </h2>
              </div> 
              
              <div class="w-full m-auto h-full bg-white p-4">
                <img src="{{asset('images/clinica-mision-logo.jpg')}}" class="h-full w-full" alt="nuestras instalaciones" /> 
              </div>
      
            </div>
      
        </div>

        <div class="w-screen  m-0 bg-ocre p-20 pb-3 text-center">
            <h1 class="text-white">Nuestro equipo</h1>

            <div class=" bg-white m-10 bg-ocre">
                <img src="{{asset('images/nuestro-equipo.jpg')}}" class="h-full w-full" alt="nuestras instalaciones" /> 
              </div>

            <h2 class="text-white">La confidencialidad y ambiente de respeto que emana de cada uno de ellos , incluyendo a todas las personas que operan en el mantenimiento, limpieza y cocina del recinto es otro de nuestros sellos; los cuales están orientados siempre al bienestar de nuestros usuarios en un enfoque humanista tienen sin perder nunca el punto de vista realista y critico.</h2>
        </div>


        <div class="grid grid-cols-1 md:grid-cols-3 gap-0 bg-ocre">

            <div class="w-full text-center p-8">
              <br>
              <h2><strong>Directora de Psicología</strong></h2>
              <br><br>
                
              <h4 class="leading-9">

                Marisa Carranza Schulenburg
                
                <br>Psicologa Clinica con Especialidad en Equidad de Género
                
                <br>No. Cédula:13045660</h4>
            </div>

            <div class="w-full text-center p-8">
                <br>
                <h2><strong> Director General</strong></h2>
                <br><br>
                  
                <h4 class="leading-9">
                    Carlos Carranza Schulenburg
                    <br>
                    Terapeuta en Adicciones con 25 años de experiencia en el ámbito.</h4>
              </div>
    
              
              <div class="w-full text-center p-8">
                <br>
                <h2><strong> Director Médico</strong></h2>
                <br><br>
                  
                <h4 class="leading-9">Ricardo Aguirre Soreque
                    
                    <br>Médico Cirujano
                    
                    <br>No. Cédula: 32944530
                </h4>
              </div>
      
    
            
        </div>
        @include('includes.contacto')   
@endsection