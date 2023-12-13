@extends('../layout/main')

@section ('content')
        
        <!-- bread crumb section -->
        <div class=" bg-P30 w-full h-10 text-white  flex justify-start items-center  px-6 mt-px">
            <a href="/" class="-link-breadcrumb">Inicio</a> / Metodología
        </div>
        

        <div class="w-screen  m-0 bg-P60">
            <div class="grid grid-cols-1 gap-0 bg-cafe">
              
              <div  class="w-full p-12 m-auto "> 
                <h2 class=" text-3xl">Metodología</h2>
              </div> 
              
            </div>      
        </div>




        <div class="w-screen  m-0 bg-P60">

            <div class="grid grid-cols-2 gap-0 bg-cafe">
              
              <div  class="w-full h-full p-12 m-auto -f1"> 
                <h2 class=" text-3xl text-white">ACOMPAÑAMIENTO PSICOLOGICO</h2>
                <br>
                <h2 class=" text-white">Sesiones individuales de trabajo con psicologas
                    <br>Sesiones de arte terapia. 
                    <br>Talleres y sesiones informativas.
                </h2>
              </div> 

              <div  class="w-full p-12 m-auto -f2"> 
                <h2 class=" text-white text-3xl">ACOMPAÑAMIENTO TERAPEUTICO</h2>
                <br>
                <h2 class=" text-white">Espacios terapéuticos grupales de AA y NA
                    <br>Introducción al programa,trabajando paso 1, 2 y 3.
                    <br>Sesiones individuales con el Terapeuta.
                    <br>Talleres y sesiones informativas.
                </h2>
              </div> 

              <div  class="w-full h-full p-12 m-auto -f3"> 
                <h2 class=" text-white text-3xl">ACOMPAÑAMIENTO MÉDICO</h2>
                <br>
                <h2 class=" text-white">Atención individual cuidando siempre la salud física de la persona
                    <br>Proceso de detox
                    <br>Sesiones Individuales
                    <br>Talleres y sesiones informativas.
                   
                </h2>
              </div> 

              <div  class="w-full p-12 m-auto -f4"> 
                <h2 class=" text-white text-3xl">CONSCIENCIA DE LA INTEGRACIÓN CON EL ENTORNO</h2>
                <br>
                <h2 class=" text-white">Se logra con prácticas holísticas, desde las bellas artes, terapia ocupacional (huerto, equinoterapia y pequeña granja) y esto con el fin de integrar al SER.Para el mantenimiento y depuración física, contamos con 3 sesiones de 2 horas a la semana de yoga y un gimnasio con aparatos básicos abierto las 24 horas.</h2>
              </div> 
              
              <div  class="w-full h-full p-12 m-auto -f5"> 
                <h2 class=" text-white text-3xl">ENCUENTRO FAMILIAR</h2>
                <br>
                <h2 class=" text-white">Se llevará acabo el tercer fin de mana del internamiento.</h2>
              </div> 
              
      
            </div>
      
        </div>

        


        
        @include('includes.contacto')   
@endsection