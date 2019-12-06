</<!DOCTYPE html>
<html lang="fa" dir="rtl">
  <head>
    @include('includes.all')
    @include('includes.add-top10')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
  </head>
  <body>
    <div class="container-fluid m-0 p-0">
      @include('includes.topbar-default')
      @yield('add-top10-page')
    </div>
    <script type="text/javascript">
    $(document).ready(function() {
  $('.categories').select2();
});
    </script>
  </body>
</html>
