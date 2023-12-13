@extends('../layout/baseadmin')

@section('body')

    <body class="py-5">

        @yield('content')

        {{-- @include('../layout/components/dark-mode-switcher') --}}
        {{-- @include('../layout/components/main-color-switcher') --}}

        <!-- BEGIN: JS Assets-->
        {{-- <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=["your-google-map-api"]&libraries=places"></script> --}}
      
        <livewire:scripts />
        @vite('resources/js/app.js')
        @yield('script')
        <!-- END: JS Assets-->
        @stack('modal')
    </body>
@endsection
