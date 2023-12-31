
   <!--- Carrousel ---->
   <div
   id="carouselExampleCaptions"
   class="relative"
   data-te-carousel-init
   data-te-ride="carousel">
   <!--Carousel indicators-->
   <div
     class="absolute bottom-0 left-0 right-0 z-[2] mx-[15%] mb-4 flex list-none justify-center p-0"
     data-te-carousel-indicators>
     <button
       type="button"
       data-te-target="#carouselExampleCaptions"
       data-te-slide-to="0"
       data-te-carousel-active
       class="mx-[3px] box-content h-[3px] w-[30px] flex-initial cursor-pointer border-0 border-y-[10px] border-solid border-transparent bg-white bg-clip-padding p-0 -indent-[999px] opacity-50 transition-opacity duration-[600ms] ease-[cubic-bezier(0.25,0.1,0.25,1.0)] motion-reduce:transition-none"
       aria-current="true"
       aria-label="Slide 1"></button>
     <button
       type="button"
       data-te-target="#carouselExampleCaptions"
       data-te-slide-to="1"
       class="mx-[3px] box-content h-[3px] w-[30px] flex-initial cursor-pointer border-0 border-y-[10px] border-solid border-transparent bg-white bg-clip-padding p-0 -indent-[999px] opacity-50 transition-opacity duration-[600ms] ease-[cubic-bezier(0.25,0.1,0.25,1.0)] motion-reduce:transition-none"
       aria-label="Slide 2"></button>
     <button
       type="button"
       data-te-target="#carouselExampleCaptions"
       data-te-slide-to="2"
       class="mx-[3px] box-content h-[3px] w-[30px] flex-initial cursor-pointer border-0 border-y-[10px] border-solid border-transparent bg-white bg-clip-padding p-0 -indent-[999px] opacity-50 transition-opacity duration-[600ms] ease-[cubic-bezier(0.25,0.1,0.25,1.0)] motion-reduce:transition-none"
       aria-label="Slide 3"></button>
       <button
       type="button"
       data-te-target="#carouselExampleCaptions"
       data-te-slide-to="3"
       class="mx-[3px] box-content h-[3px] w-[30px] flex-initial cursor-pointer border-0 border-y-[10px] border-solid border-transparent bg-white bg-clip-padding p-0 -indent-[999px] opacity-50 transition-opacity duration-[600ms] ease-[cubic-bezier(0.25,0.1,0.25,1.0)] motion-reduce:transition-none"
       aria-label="Slide 4"></button>
   </div>
 
   <!--Carousel items-->
   <div
     class="relative w-full overflow-hidden after:clear-both after:block after:content-['']">
     <!--First item-->
     <div
       class="relative float-left -mr-[100%] w-full transition-transform duration-[600ms] ease-in-out motion-reduce:transition-none"
       data-te-carousel-active
       data-te-carousel-item
       style="backface-visibility: hidden">
       <img
         src="{{asset('images/slider/fb.jpg')}}"
         class="block w-full"
         alt="..." />
       <div
         class="absolute inset-x-[15%] bottom-5 hidden py-5 text-center text-white md:block">
         <h5 class="text-white font-bold -text-carrousel">Herón Pazzi</h5>
         <p class="text-xl -text-carrousel">
            Médico Veterinario Zootecnista, dedicado a la clínica y cirugía de perros y gatos. Ex académico de la FMVZ UNAM y de la FCN UAQ. Conferencista y amante de los perros y su bienestar.
         </p>
       </div>
     </div>
     <!--Second item-->
     <div
       class="relative float-left -mr-[100%] hidden w-full transition-transform duration-[600ms] ease-in-out motion-reduce:transition-none"
       data-te-carousel-item
       style="backface-visibility: hidden">
       <img
         src="{{asset('images/slider/Navidad-cachorro-2.jpg')}}"
         class="block w-full"
         alt="..." />
       <div
         class="absolute inset-x-[15%] bottom-5 hidden py-5 text-center text-white md:block">
         <h5 class="text-white font-bold -text-carrousel">Un centro de Rehabilitación,</h5>
         <p class="text-xl -text-carrousel">
             Encaminado hacia la sanación con más de 25 años de experiencia. 
         </p>
       </div>
     </div>
     <!--Third item-->
     <div
       class="relative float-left -mr-[100%] hidden w-full transition-transform duration-[600ms] ease-in-out motion-reduce:transition-none"
       data-te-carousel-item
       style="backface-visibility: hidden">
       <img
         src="{{asset('images/slider/otitis-en-perros.jpg')}}"
         class="block w-full"
         alt="..." />
       <div
         class="absolute inset-x-[15%] bottom-5 hidden py-5 text-center text-white md:block">
         <h5 class="text-white font-bold -text-carrousel">Inicio de la sanación</h5>
         <p class="text-xl -text-carrousel">
             No importa qué tipo de adicción sufras, hay momentos en los que simplemente se debe pedir ayuda y admitir que hay un problema.
         </p>
       </div>
     </div>
 
     {{-- Fourth item --}}
     <div
         class="relative float-left -mr-[100%] hidden w-full transition-transform duration-[600ms] ease-in-out motion-reduce:transition-none"
         data-te-carousel-item
         style="backface-visibility: hidden">
         <img
         src="{{asset('images/slider/perro-ferales.jpg')}}"
         class="block w-full"
         alt="..." />
         <div
             class="absolute inset-x-[15%] bottom-5 hidden py-5 text-center text-white md:block">
             <h5 class="text-white font-bold -text-carrousel">Calidad de nuestros servicios</h5>
             <p class="text-xl -text-carrousel">
                 Nuestros profesionales se reunirán con usted  para adaptar el programa de recuperación de acuerdo a su particular situación, brindando atención individual y grupal.
             </p>
         </div>
     </div>
 
   </div>
 
   <!--Carousel controls - prev item-->
   <button
     class="absolute bottom-0 left-0 top-0 z-[1] flex w-[15%] items-center justify-center border-0 bg-none p-0 text-center text-white opacity-50 transition-opacity duration-150 ease-[cubic-bezier(0.25,0.1,0.25,1.0)] hover:text-white hover:no-underline hover:opacity-90 hover:outline-none focus:text-white focus:no-underline focus:opacity-90 focus:outline-none motion-reduce:transition-none"
     type="button"
     data-te-target="#carouselExampleCaptions"
     data-te-slide="prev">
     <span class="inline-block h-8 w-8">
       <svg
         xmlns="http://www.w3.org/2000/svg"
         fill="none"
         viewBox="0 0 24 24"
         stroke-width="1.5"
         stroke="currentColor"
         class="h-6 w-6">
         <path
           stroke-linecap="round"
           stroke-linejoin="round"
           d="M15.75 19.5L8.25 12l7.5-7.5" />
       </svg>
     </span>
     <span
       class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]"
       >Previous</span
     >
   </button>
   <!--Carousel controls - next item-->
   <button
     class="absolute bottom-0 right-0 top-0 z-[1] flex w-[15%] items-center justify-center border-0 bg-none p-0 text-center text-white opacity-50 transition-opacity duration-150 ease-[cubic-bezier(0.25,0.1,0.25,1.0)] hover:text-white hover:no-underline hover:opacity-90 hover:outline-none focus:text-white focus:no-underline focus:opacity-90 focus:outline-none motion-reduce:transition-none"
     type="button"
     data-te-target="#carouselExampleCaptions"
     data-te-slide="next">
     <span class="inline-block h-8 w-8">
       <svg
         xmlns="http://www.w3.org/2000/svg"
         fill="none"
         viewBox="0 0 24 24"
         stroke-width="1.5"
         stroke="currentColor"
         class="h-6 w-6">
         <path
           stroke-linecap="round"
           stroke-linejoin="round"
           d="M8.25 4.5l7.5 7.5-7.5 7.5" />
       </svg>
     </span>
     <span
       class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]"
       >Next</span
     >
   </button>
 </div>
 
     <script type="module"> 
             // Initialization for ES Users
         import {
         Carousel,
         initTE,
         } from "tw-elements";
 
         initTE({ Carousel });
     </script>
     <!--- /Carrousel ---->
