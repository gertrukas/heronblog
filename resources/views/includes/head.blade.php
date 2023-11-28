<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Herón Pazzi / {{ $title ?? 'Bienvenidos'}}</title>

@vite(['resources/css/app.css'])
<link rel="stylesheet" href="{{URL::asset('css/style.css')}}">


<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

@livewireStyles