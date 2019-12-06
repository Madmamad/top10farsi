</<!DOCTYPE html>
<html lang="fa" dir="rtl">
<!-- <meta name="csrf-token" content="{{ csrf_token() }}"> -->
  <head>
    @include('includes.all')
    @include('includes.top10')
  </head>
  <body>
    <div class="container-fluid m-0 p-0" id='app'>
      @include('includes.topbar-default')
      @yield('top10-content')
    </div>
      @include('scripts.top10')
  </body>
</html>
