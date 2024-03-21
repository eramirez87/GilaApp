<!doctype html>
<html lang="en">
  <head>
    @include("layout.head")
  </head>
  <body>
    @include('layout.nav')
    <section class='container'>
        <div class='col col-12 mt-2'>
            @yield('content')
        </div>
    </section>
  </body>
</html>
