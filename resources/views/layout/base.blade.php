<!DOCTYPE html>

<html lang="es">

<head>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9881031305253297"
         crossorigin="anonymous"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @include('includes.head')


</head>
<!-- END: Head -->

<body class="bg-white p-0 m-0">
    @yield('body')
</body>

</html>
