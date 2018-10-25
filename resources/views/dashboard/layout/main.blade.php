<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

     <title>Admin Panel</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/bootstrap.css">

    <!-- Custom styles for this template -->
    <link href="/css/dashboard.css" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
  </head>

  <body>
    @include('dashboard.inc.header')
    @include('message')
    <div class="container-fluid">
      <div class="row">
         @include('dashboard.inc.sidebar')

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
         
         @include('dashboard.inc.nav')
         @yield('content')
         @include('dashboard.inc.canvas')
        </main>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script href="/js/app.js"></script>
    <script href="/js/bootstrap.min.js"></script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

    <!-- Graphs -->
        @include('dashboard.inc.graphs')
  </body>
      @include('blog.inc.footer')
</html>
