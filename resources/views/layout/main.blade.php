@extends('../layout/base')

@section('body')

        @include('includes.header')    

        @yield('content')

        @include('includes.footer')

        {{-- --=============== js =============== --}}
        @livewireScripts

       {{-- TW-ELEMENTS --}}
        <script type="text/javascript" src="/dist/js/tw-elements.umd.min.js"></script>


@endsection
