</<!DOCTYPE html>
<html lang="fa" dir="rtl">
  <head>
    @include('includes.all')
    @include('includes.home')
  </head>
  <body>
    <div class="container-fluid m-0 p-0" id="entire">
      @if (auth()->guest())
        @include('includes.topbar-default')
      @else
        @include('includes.topbar-user')
      @endif
      @yield('home-page')
    </div>
      @include('scripts.home')
  </body>
</html>
