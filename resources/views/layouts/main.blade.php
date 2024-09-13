<!DOCTYPE html>
<html>
<head>
<script src="https://cdn.tailwindcss.com"></script>

@vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <title>@yield('title', 'Laravel Boilerplate')</title>
    @yield('pageheadfiles')
</head>
<body>
    @yield('content')
    @yield('pagebodyfiles')

</body>

</html>
