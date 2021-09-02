<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.head.links')
</head>

<body>

    @include('layouts.body.header')

    <main id="main"> @yield('home_content') </main>

    @include('layouts.body.footer')

    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

    @include('layouts.body.scripts')

</body>

</html>