@extends('../layout/base')

@section('body')
    <body class=" lg:bg-white bg-rgb-blueCustom-900 p-0">
        @yield('content')
        {{-- @include('../layout/components/dark-mode-switcher')
        @include('../layout/components/main-color-switcher') --}}

        <!-- BEGIN: JS Assets-->
        
        @vite('resources/js/app.js')
        @yield('script')
        @livewireScripts
        <!-- END: JS Assets-->
        @stack('modal')
    </body>
@endsection
