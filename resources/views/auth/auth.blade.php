<!DOCTYPE html>
<html lang="en">


<!-- auth-login.html  21 Nov 2019 03:49:32 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Otika - Admin Dashboard Template</title>
 @include('layout.css')
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
         @yield('form')
        </div>
      </div>
    </section>
  </div>
  @yield('script')
 @include('layout.javascript')
</body>


<!-- auth-login.html  21 Nov 2019 03:49:32 GMT -->
</html>