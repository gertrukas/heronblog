<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-FJGY6E2WT3"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-FJGY6E2WT3');
</script>

<title> {{ $title ?? 'heron pazzi ' }} @isset($blog->name)
        {{ $blog->name }}
    @endisset
</title>
<link rel="canonical"
    href="https://heronpazzi.com/@isset($blog->name)blog/{{ $blog->slug }} @endisset" />


@vite(['resources/css/app.css'])

<link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lato:wght@100&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100&display=swap" rel="stylesheet">


<meta property="og:url"
    content="https://heronpazzi.com/@isset($blog->slug)blogs/{{ $blog->slug }}@endisset" />
<meta property="og:type" content="website" />
<meta property="og:title"
    content="@if (empty($blog->name)) Heron Pazzi" @else
{{ $blog->name }}" @endif />
<meta property="og:description"
    content="@if (empty($blog->intro)) Médico Veterinario Zootecnista, dedicado a la clínica y cirugía de perros y gatos. Ex académico de la FMVZ UNAM y de la FCN UAQ. Conferencista y amante de los perros y su bienestar." @else
{{ $blog->intro }}" @endif/>
<meta property="og:image"
    content="https://heronpazzi.com/@if (empty($blog->image)) images/fb.jpg @else
uploads/{{ $blog->image }} @endif" />
<meta property="fb:app_id" content="714038927277647" />

@livewireStyles
