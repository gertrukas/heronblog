<x-ui.header />
<x-ui.menu :pageConfig="$pageConfig" />

<!--=============== MAIN ===============-->
<main class="container">

    <!--=============== intro ===============-->

    <section class="intro">
       <livewire:front.blog.blog-list  />
    </section>

</main>


<x-ui.footer :pageConfig="$pageConfig" />
