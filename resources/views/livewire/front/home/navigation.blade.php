<nav x-data="accordion(6)" class="top-0 z-40 flex flex-wrap items-end  bg-P30  justify-between w-full">
    <!-- Left nav -->
    <div class="p-0 m-0">
        <a href="/" class="content-center"><img src="{{asset('images/heron-pazzi-mvz.png')}}" class="w-64 sm:w-64 lg:w-full"></a>
    </div>
    <!-- End left nav -->

    <!-- Right nav -->
    <!-- Show menu sm,md -->
    <!-- Toggle button -->
    <div @click="handleClick()" x-data="{open : false}" class="block text-gray-600 cursor-pointer lg:hidden">
      <button @click="open = ! open" class="w-6 h-6 text-lg">
        <svg x-show="! open" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg" :clas="{'transition-full each-in-out transform duration-500':! open}">
          <rect width="48" height="48" fill="white" fill-opacity="0.01"></rect>
          <path d="M7.94977 11.9498H39.9498" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
          <path d="M7.94977 23.9498H39.9498" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
          <path d="M7.94977 35.9498H39.9498" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
        </svg>

        <svg x-show="open" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
          <line x1="18" y1="6" x2="6" y2="18"></line>
          <line x1="6" y1="6" x2="18" y2="18"></line>
        </svg>
      </button>
    </div>
    <!-- End toggle button -->

    <!-- Toggle menu -->
    <div x-ref="tab" :style="handleToggle()" class="relative w-full overflow-hidden transition-all duration-700 lg:hidden max-h-0">
      
        <div class="flex flex-col">
            <a href="#" class="-boton-azul"><span>Contacto</span></a>
        </div>
       
    </div>
    <!-- End toggle menu -->
    <!-- End show menu sm,md -->

    <!-- Show Menu lg -->
    <div class="hidden w-full lg:flex  lg:w-auto">
          <a href="#" class="-boton-azul ">Contacto</a>
    </div>
    
    <!-- End show Menu lg -->
    <!-- End right nav -->
  </nav>
  <script>
    // Faq
    document.addEventListener('alpine:init', () => {
      Alpine.store('accordion', {
        tab: 0
      });
      Alpine.data('accordion', (idx) => ({
        init() {
          this.idx = idx;
        },
        idx: -1,
        handleClick() {
          this.$store.accordion.tab = this.$store.accordion.tab === this.idx ? 0 : this.idx;
        },
        handleRotate() {
          return this.$store.accordion.tab === this.idx ? '-rotate-180' : '';
        },
        handleToggle() {
          return this.$store.accordion.tab === this.idx ? `max-height: ${this.$refs.tab.scrollHeight}px` : '';
        }
      }));
    })
    //  end faq
  </script>