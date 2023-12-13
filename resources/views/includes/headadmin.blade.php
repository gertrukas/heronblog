<meta charset="utf-8">
<title>Back end</title>
    <link href="{{ asset('front/img/logo.png') }}" rel="shortcut icon">
    
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex">
{{-- 
    <script>
        window.addEventListener("pageshow", function(event) {
            var historyTraversal = event.persisted || (typeof window.performance != "undefined" && window
                .performance.navigation.type === 2);
            if (historyTraversal) {
                // Handle page restore.
                //alert('refresh');
                window.location.reload();
            }
        });
    </script> --}}
    <livewire:scripts />
    @vite('resources/js/app.js')
    @yield('script')
    <!-- END: JS Assets-->
    @stack('modal')