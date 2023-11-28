@extends('../layout/base')

@section('body')

        @include('includes.header')    

        @yield('content')

        @include('includes.footer')

        <!--=============== js ===============-->
        @livewireScripts
        
       
@endsection
