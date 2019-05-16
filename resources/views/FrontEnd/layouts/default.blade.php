<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    @include('FrontEnd.includes.head')

    <link href="{{ asset('css/frontEnd/frontend.css') }}" type="text/css" rel="stylesheet" />
</head>
<body>
    <div id="app">

        <div class="container-fluid bg-color-black">
            @include('FrontEnd.includes.header')
        </div>

        <div class="container-fluid bg-nav-red">
            <div class="container">                
                @include('FrontEnd.includes.nav')
            </div>
        </div>

        @include('FrontEnd.includes.slide')

        @include('FrontEnd.includes.brand')
        
        <main class="py-4">
            <div class="container">
              @yield('content')
            </div>
        </main>

        <div class="container-fluid bg-color-black">
          @include('FrontEnd.includes.footer')
        </div>
    </div>
    <script src="{{ asset('js/frontEnd/frontend.js') }}" charset="utf-8"></script>
</body>
</html>