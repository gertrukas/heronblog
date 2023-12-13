@extends('../layout/main')

@section ('content')
        
        <!-- bread crumb section -->
        <div class=" bg-P30 w-full h-10 text-white  flex justify-start items-center  px-6 mt-px">
            <a href="/" class="-link-breadcrumb">Inicio</a> / Contacto
        </div>
        

        @include('includes.contacto')   
@endsection