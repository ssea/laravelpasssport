<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('FrontEnd.includes.head')

    <link href="{{ asset('css/backend/backend.css') }}" type="text/css" rel="stylesheet" />

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel bg-info">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="/admin/user/create">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-0">
            <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="list-group list-group-flush">
                                <h4 class="list-group-item list-group-item-primary font-weight-bold">Menu</h4>

                                {{-- <a href="/admin" class="list-group-item list-group-item-action list-group-item-success">Dashboard</a>
                                <a href="/admin/user" class="list-group-item list-group-item-action list-group-item-success">Users</a> --}}
                                <a href="/admin/page" class="list-group-item list-group-item-action list-group-item-success">List News</a>
                                {{-- <a href="/admin/category" class="list-group-item list-group-item-action list-group-item-success">Categories</a>
                                <a href="/admin/product" class="list-group-item list-group-item-action list-group-item-success">Products</a>
                                <a href="/admin/json/page" class="list-group-item list-group-item-action list-group-item-success">Page record JSON</a> --}}

                                {{-- <h4 class="list-group-item list-group-item-primary font-weight-bold">Page</h4>
                                <a href="#" class="list-group-item list-group-item-action list-group-item-success">A simple success list group item</a>
                                <a href="#" class="list-group-item list-group-item-action list-group-item-success">A simple success list group item</a> --}}

                            </div>
                        </div>
                        <div class="col-md-8">
                            @yield('content')
                        </div>
                    </div>
            </div>
        </main>
    </div>
    <script src="{{ asset('js/backEnd/backend.js') }}" charset="utf-8"></script>

    <script src="{{ asset('libs/tinymce/tinymce.min.js') }}" charset="utf-8"></script>
    <script>
        tinymce.init({
            selector:'textarea[data-compose-editor]',
            menubar: false,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor textcolor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste code help wordcount', 'image code'
            ],
            toolbar: 'undo redo | formatselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | image code',

            /* without images_upload_url set, Upload tab won't show up*/
            images_upload_url: 'postAcceptor.php',

            /* we override default upload handler to simulate successful upload*/
            images_upload_handler: function (blobInfo, success, failure) {
                setTimeout(function () {
                /* no matter what you upload, we will turn it into TinyMCE logo :)*/
                success('http://moxiecode.cachefly.net/tinymce/v9/images/logo.png');
                }, 2000);
            }
        });
    </script>

    @stack('scripts')
</body>
</html>
