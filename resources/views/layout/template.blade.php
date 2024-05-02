<!DOCTYPE html>
<html lang="en">


<!-- index.html  21 Nov 2019 03:44:50 GMT -->

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Otika - Admin Dashboard Template</title>
    @include('layout.css')
</head>

<body>
    <div class="loader"></div>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            @include('layout.menu')
            <!-- Main Content -->
            <div class="main-content">
                @yield('main_content')
            </div>
        </div>
    </div>
</body>
@yield('script-add')
@include('layout.javascript')


<!-- index.html  21 Nov 2019 03:47:04 GMT -->

</html>
