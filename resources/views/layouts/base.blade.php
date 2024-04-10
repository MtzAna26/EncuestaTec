<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EncuestaTec</title>
    <!--Estilos -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <!--Estilos css generales --->
    <link href="{{ asset( 'css/base/css/general.css' )}}" rel="stylesheet">
    <link href="{{ asset( 'css/base/css/menu.css' )}}" rel="stylesheet">
    <link href="{{ asset( 'css/base/css/footer.css' )}}" rel="stylesheet">

    <!--Estilos cambiantes -->
    @yield('styles')

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @yield('title')
    </title>
    <div class="content">
        <!--- Incluir menu --->
        @include('layouts.menu')
        <section class="section">
            @yield('content')
        </section>

        <!--incluir footer-->
        @include('layouts.footer')
    </div>
    @yield('scripts')
    <!-- scripts -->
    <script src="{{ minx ('js/app.js') }}"></script>
    <body>
        
    </body>

</head>
</html>
