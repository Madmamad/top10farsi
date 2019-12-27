</<!DOCTYPE html>
<html lang="fa" dir="rtl" ng-app="myApp">
<meta name="csrf-token" content="{{ csrf_token() }}">
  <head>
    @include('includes.all')
    @include('includes.add-item')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
  </head>
  <body>
    <div class="container-fluid m-0 p-0">
      @if (auth()->guest())
        @include('includes.topbar-default')
      @else
        @include('includes.topbar-user')
      @endif
      @yield('add-item-page')
    </div>
    <script type="text/javascript">
    $(document).ready(function() {
  $('.categories').select2();
});
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
    </script>
  </body>
</html>
