<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>@yield("page_title","Home")</title>

    <meta name="description" content="Valiant Grading Advantage, LLC All Rights Reserved 2021">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Icons -->
    <link rel="shortcut icon" href="{{ asset('media/favicons/vga-fav.png') }}">
    <link rel="icon" sizes="192x192" type="image/png" href="{{ asset('media/favicons/vga-fav.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('media/favicons/vga-fav.png') }}">

    <!-- Fonts and Styles -->
    @yield('css_before')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet" id="css-main" href="{{ asset('/css/oneui.css') }}">

    <!-- You can include a specific file from public/css/themes/ folder to alter the default color theme of the template. eg: -->
    <!-- <link rel="stylesheet" id="css-theme" href="{{ asset('/css/themes/amethyst.css') }}"> -->
    @yield('css_after')

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode(['csrfToken' => csrf_token()]) !!};
    </script>
    @livewireStyles
</head>


<body class="d-flex flex-column h-100">
    <main class="flex-shrink-0">
        <!-- Navigation-->
        <!-- Header-->

        @php

        $header=\App\Models\Header::find(1);




        @endphp
        <header class="bg-dark ">
            <div class="container px-5">
                <div class="row gx-5 align-items-center justify-content-center">
                    <div class="col-lg-8 col-xl-7 col-xxl-6">
                        <div class="my-5 text-center text-xl-start">
                            <a href="{{ route("home") }}">
                                <h1 class="display-5 fw-bolder text-white mb-2">{{ $header->heading }}</h1>

                            </a>

                        </div>
                    </div>
                    <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center">
                        <a href="{{ route("home") }}">
                        <img class="img-fluid rounded-3 my-5" src="{{ asset('header/'.$header->image) }}" alt="">

                        </a>
                    </div>
                </div>
            </div>
        </header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container px-5">
                <a class="navbar-brand" href="{{ route("home") }}">Home</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                        @php
                        $categories=App\Models\Category::latest()->get();
                        @endphp
                        @foreach ($categories as $category)
                            <li class="nav-item">
                                <a class="nav-link{{ request()->is('category/'.$category->id.'/'.$category->slug) ? ' active' : '' }}" href="{{ route("category.show",[$category->id,$category->slug]) }}">{{ $category->name }}</a>
                            </li>
                        @endforeach

                        {{-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownBlog" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">All Categories</a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownBlog">
                                <li>
                                    <a class="dropdown-item" href="blog-home.html">Blog Home</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="blog-post.html">Blog Post</a>
                                </li>
                            </ul>
                        </li> --}}

                    </ul>
                </div>
            </div>
        </nav>
        <div id="page-container">





            @yield('content')



            <!-- Footer -->

            <!-- END Footer -->
        </div>
        <!-- END Page Container -->
    </main>

    <!-- Footer-->
    <footer class="bg-dark py-4 mt-auto">
        <div class="container px-5">
            <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                <div class="col-auto">
                    <div class="small m-0 text-white">Copyright &copy; scholarlyowl.com 2022</div>
                </div>
                <div class="col-auto">
                    <a class="link-light small" href="#!">Privacy</a>
                    <span class="text-white mx-1">&middot;</span>
                    <a class="link-light small" href="#!">Terms</a>
                    <span class="text-white mx-1">&middot;</span>
                    <a class="link-light small" href="#!">Contact</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap core JS-->
    <script src="{{ asset('js/oneui.app.js') }}"></script>

    <!-- Laravel Scaffolding JS -->
    <!-- <script src="{{ asset('/js/laravel.app.js') }}"></script> -->

    @livewireScripts

    @yield('js_after')
</body>

</html>
