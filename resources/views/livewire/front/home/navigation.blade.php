<!-- Main navigation container tw-elements-->
<nav
  class="flex-no-wrap relative flex w-full items-center justify-between bg-P30 py-0 lg:pt-0 shadow-md shadow-black/5 lg:flex-wrap lg:justify-start">
  <div class="flex w-full flex-wrap items-center justify-between px-0">
    <!-- Hamburger button for mobile view -->
    <button
      class="block border-0 bg-transparent px-2 text-white hover:no-underline hover:shadow-none focus:no-underline focus:shadow-none focus:outline-none focus:ring-0 dark:text-neutral-200 lg:hidden"
      type="button"
      data-te-collapse-init
      data-te-target="#navbarSupportedContent1"
      aria-controls="navbarSupportedContent1"
      aria-expanded="false"
      aria-label="Toggle navigation">
      
      {{-- Hamburger icon --}}
      <span class="[&>svg]:w-7">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          viewBox="0 0 24 24"
          fill="currentColor"
          class="h-7 w-7">
          <path
            fill-rule="evenodd"
            d="M3 6.75A.75.75 0 013.75 6h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 6.75zM3 12a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 12zm0 5.25a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75a.75.75 0 01-.75-.75z"
            clip-rule="evenodd" />
        </svg>
      </span>
    </button>

    {{-- LOGO --}}
    <div class="w-full py-0 px-3 m-0 flex justify-left items-left ">
      <a href="/">
        <img
          src="{{asset('images/heron-pazzi-mvz.png')}}"
          alt="Herón Pazzi"
          class="md:w-64 lg:w-64 "
          />
      </a>
    </div>


    <!-- Collapsible navigation container -->
    <div
      class="!visible hidden  w-full flex-grow basis-[100%] lg:!flex justify-end items-center p-0 bg-P30 "
      id="navbarSupportedContent1"
      data-te-collapse-item>
     
      <!-- Left center links -->
      <div > 

          <ul class="mr-auto flex flex-col lg:flex-row" data-te-navbar-nav-ref>
            
            <li class="mb-4 lg:mb-0 lg:pr-2" data-te-nav-item-ref>
              <a
                class="-nav-link"
                href="/contacto"
                data-te-nav-link-ref
                >Contacto</a
              >
            </li>
          </ul>

      </div>
    </div>



  </div>
</nav>

<script type="module">
import {
  Collapse,
  Dropdown,
  initTE,
} from "tw-elements";

initTE({ Collapse, Dropdown });
</script>




