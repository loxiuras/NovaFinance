<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NovaFinance</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Racing+Sans+One&family=Urbanist&display=swap" rel="stylesheet">

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/icons.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/app.min.css') }}" rel="stylesheet" />
</head>
<body
    class="@yield('bodyClass')"
    @hasSection('dataLayout') data-layout="@yield('dataLayout')" @endif
    @hasSection('dataTopbar') data-topbar="@yield('dataTopbar')" @endif
    @hasSection('dataSidebar') data-sidebar="@yield('dataSidebar')" @endif
    @hasSection('dataLayoutMode') data-layout-mode="@yield('dataLayoutMode')" @endif
>
    @yield('content')

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
