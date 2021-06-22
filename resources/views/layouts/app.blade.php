<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <script src="{{ mix('js/jquery.min.js') }}"></script>
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}" />
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">@lang('message.tasklist')</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="#">@lang('message.home') <span class="sr-only">(@lang('message.picked'))</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">@lang('message.feature')</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">@lang('message.pricing')</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @lang('message.change')
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="{!! route('locale.change', ['vi']) !!}">VN</a>
                    <a class="dropdown-item" href="{!! route('locale.change', ['en']) !!}">EN</a>
                </div>
            </li>
        </ul>
    </div>
</nav>
    <div class="container mt-2">
        @yield('content')
    </div>

</body>
</html>
