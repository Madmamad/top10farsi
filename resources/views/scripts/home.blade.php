<script type="text/javascript">
$(document).ready(function(){
    $("#hotTopics").css("background-image", "url('{{asset('storage/'.ltrim($images[7]->address, 'public'))}}')");
    $("#item-1 .carousel-background").css("background-image", "url('{{asset('storage/'.ltrim($hoopla_images[0]->address, 'public'))}}')");
    $("#item-2 .carousel-background").css("background-image", "url('{{asset('storage/'.ltrim($hoopla_images[1]->address, 'public'))}}')");
    $("#item-3 .carousel-background").css("background-image", "url('{{asset('storage/'.ltrim($hoopla_images[2]->address, 'public'))}}')");
    $("#item-4 .carousel-background").css("background-image", "url('{{asset('storage/'.ltrim($hoopla_images[3]->address, 'public'))}}')");
    $("#item-5 .carousel-background").css("background-image", "url('{{asset('storage/'.ltrim($hoopla_images[3]->address, 'public'))}}')");
    $("#newTopicBackground").css("background-image", "url('{{asset('storage/'.ltrim($hoopla_images[3]->address, 'public'))}}')");
    var x=document.getElementsByClassName("list-item");
    var b=document.getElementsByClassName("button");
    function listAnimator(i){
      if(i<x.length){
        x[i].style.opacity = "1";
        x[i].classList.add('animated', 'flipInX');
        setTimeout(function(){listAnimator(i+1)},300);
      }
    }
    function buttonAnimator(i){
      if(i<b.length&&i<4){
        b[3-i].classList.add('animated', 'flipInY');
        setTimeout(function(){buttonAnimator(i+1)},250);
      }
      else if(i==4){
        b[i].classList.add('animated', 'flipInX');
        setTimeout(function(){buttonAnimator(i+1)},250);
      }
      else if(i<b.length&&i>4){
        b[i].classList.add('animated', 'flipInY');
        setTimeout(function(){buttonAnimator(i+1)},250);
      }
    }
    listAnimator(0);
    buttonAnimator(0);
    $(document).on('scroll', function() {
        if( $(this).scrollTop() >= $('#categories').position().top ){
            buttonAnimator(0);
        }
    });
    $( ".ticket" ).hover(
      function() {
        $( this ).animate({'right':'0%','opacity':'1'},500);
      },function() {
$( this ).animate({'right':'75%','opacity':'0.5'},500);
      }
    );
    $(".bigger").hover(
      function(){
        $(this).css('font-size','13px');
      },
      function(){
        $(this).css('font-size','11px');
      }
    );
    var slideFrom = 0;
    $('#myCarousel').on('slide.bs.carousel', function () {
      $('#desc-content').removeClass('fadeIn');
      $('#desc-content').addClass('fadeOut');
      $('#title-content').removeClass('fadeIn');
      $('#title-content').addClass('fadeOut');
      slideFrom = $(this).find('.active').index();
    });
    var js10titles = {!! json_encode($js10titles) !!};
    var js10descs = {!! json_encode($js10descs) !!};
    $('#myCarousel').on('slid.bs.carousel', function () {
      slidTo = $(this).find('.active').index();
      $('#title-content').text(js10titles[4-slidTo]);
      $('#desc-content').text(js10descs[4-slidTo]);
      $('#desc-content').addClass('fadeIn');
      $('#desc-content').removeClass('fadeOut');
      $('#title-content').addClass('fadeIn');
      $('#title-content').removeClass('fadeOut');
    });
});
</script>
