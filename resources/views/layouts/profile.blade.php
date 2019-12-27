</<!DOCTYPE html>
<html lang="fa" dir="rtl">
<meta name="csrf-token" content="{{ csrf_token() }}">
  <head>
    @include('includes.all')
    @include('includes.profile')
  </head>
  <body>
    <div class="container-fluid m-0 p-0">
      @if (auth()->guest())
        @include('includes.topbar-default')
      @else
        @include('includes.topbar-user')
      @endif
      @yield('profile-page')
    </div>
    <script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var myedit="";
  $('#exampleModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var edit = button.data('edit') // Extract info from data-* attributes
      console.log(edit);
      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      myedit=edit;
    })
    $( "#savename" ).click(function() {
      console.log("going to change name to "+ $( "#newnamevalue" ).val());
        jQuery.ajax({
                url: "{{ url('/user/edit') }}",
                method: 'post',
                data: {
                   newvalue: $( "#newnamevalue" ).val(),
                   edit:"name"
                },
                success: function(result){
                  console.log("name changed successfully!");
                  alert("ویرایش موفقیت آمیز بود!");
                  location.reload(true);
                }
              });
});
$("#saveemail").click(function(){
  console.log("going to change email to"+ $( "#newemailvalue" ).val());
        jQuery.ajax({
                url: "{{ url('/user/edit') }}",
                method: 'post',
                data: {
                   newvalue: $( "#newemailvalue" ).val(),
                   edit:"email"
                },
                success: function(result){
                  console.log("email changed successfully!");
                  alert("ویرایش موفقیت آمیز بود!");
                  location.reload(true);
                }
              });
      });
    </script>
  </body>
</html>
