</<!DOCTYPE html>
<html lang="fa" dir="rtl" ng-app="myApp">
  <head>
    @include('includes.all')
    @include('includes.add-top10')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
  </head>
  <body>
    <div class="container-fluid m-0 p-0">
      @include('includes.topbar-default')
      @yield('add-item-page')
    </div>
    <!-- lumx -->
    <!-- Before body closing tag -->
    <script src="{{asset('node_modules/jquery/dist/jquery.js')}}"></script>
    <script src="{{asset('node_modules/velocity-animate/velocity.js')}}"></script>
    <script src="{{asset('node_modules/moment/min/moment-with-locales.js')}}"></script>
    <script src="{{asset('node_modules/angular/angular.js')}}"></script>
    <script src="{{asset('node_modules/official-lumx/dist/lumx.js')}}"></script>
    <script src="{{asset('js/select2.full.min.js')}}"></script>
    <script>
      angular.module('myApp', ['lumx']);
      $(document).ready(function() {
        $('.categories').select2({
          placeholder: "دسته ها"
        });
      });
    </script>
  </body>
</html>
