<script type="text/javascript">
// mohamad if liked should disable
    jQuery(document).ready(function(){
      @foreach($likes as $like)
        @foreach($comments as $comment)
          @if($like->comment==$comment->id)
            $('#likebtn'+{{$comment->id}}).attr('data-like','unlike');
            console.log("comment"+{{$comment->id}});
            // disablelike({{$like->comment}});
          @endif
        @endforeach
      @endforeach
      $.ajaxSetup({

          headers: {

              // 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

          }

      });
        });

$( ".submit-cm" ).click(function() {
var item=  parseInt($(this).data("item"));
var list={{$list}};
  jQuery.ajax({
          url: "{{ url('/list/comment') }}",
          method: 'post',
          data: {
             content: jQuery('#inputcm'+item).val(),
             item:item,
             list:list
          },
          success: function(result){
            // $('#idd').trigger("reset");
              var content=jQuery('#inputcm'+item).val();
              $("#inputcm"+item).val("");
              var comment="<div class='cmwhole p-2 mb-1 whole pb-5' id='cmwhole"+result['cmid']+"'><span class='cmbody'><div class='user-cred'><img src='https://weva.pro/images/user/9414/userpic_2018-02-01_01-31-06_86_l.jpg?1567991401' alt='PIC' class='userpic'><span class='username pt-3 mr-2'><b>TopTen_Admin</b></span></div><span class='cmcontent'>"+content+"</span></span><div class='btn-group cmtool mt-1' role='group' aria-label='...'><button type='button' class='btn btn-primary pt-2 pb-2 likebtn' data-comment='"+result['cmid']+"' data-like='like' id='likebtn"+result['cmid']+"'><i class='glyphicon glyphicon-heart' data-comment='"+result['cmid']+"' data-like='like'></i><span class='mr-1 ml-1' id='cmlikes"+result['cmid']+"'>0</span></button><button type='button' class='btn btn-danger pt-1 pb-2 deletebtn' data-comment='"+result['cmid']+"'><i class='glyphicon glyphicon-remove' data-comment='"+result['cmid']+"'></i></button></div></div>";
              comment = comment.replace(/\n/g, "<br />");
              $("#commentshow"+item).append(comment);
              $("#commentshow"+item).trigger("reset");
              $(".deletebtn").click(function(){
                console.log(" begin deleting ");
                actOnDelete(event);
              });
              $(".likebtn").click(function(){
                actOnLike(event);
              });
              // para.appendChild(node);
              // location.reload();

          }
        });
});
$(".voteButton").click(function(){
actOnVote(event);
});
 function updateVoteStats(action,itemId){
   switch(action) {
     case "vote":
     console.log("Da FUCK!? "+itemId + "  ??  " + action);
       document.querySelector('#votesof' + itemId).textContent++;
       $("#voter"+itemId).attr("disabled", true);
       break;
     case "unvote":
     console.log("Da FUCK!? "+itemId + "  ??  " + action);
       document.querySelector('#votesof' + itemId).textContent--;
       break;
     default:
       console.log("Da FUCK!? "+itemId + "  ??  " + action);
   }
 }
 var actOnVote = function (event) {
     var itemId = event.target.dataset.item;
     var action = event.target.dataset.vote;
     jQuery.ajax({
             url: "{{ url('/vote') }}",
             method: 'post',
             data: {
               action:action,
               item:itemId,
             },
             success: function(result){
               updateVoteStats(action,itemId);
             }
           });
     // toggleButtonText[action](event.target);
     // updateVoteStats[action](itemId);
     // axios.post('/item/' + itemId + '/vote',
     //     { action: action });
 };
 $(".likebtn").click(function(){
   actOnLike(event);
 });
 var actOnLike = function (event) {
     var comment = event.target.dataset.comment;
     var action = event.target.dataset.like;
     jQuery.ajax({
             url: "{{ url('/like') }}",
             method: 'post',
             data: {
               action:action,
               comment:comment,
             },
             success: function(result){
               updateLikeStats(action,comment);
             }
           });
         }
           function updateLikeStats(action,comment){
             switch(action) {
               case "like":
                 document.querySelector('#cmlikes' + comment).textContent++;
                 $('#likebtn'+comment).attr('data-like', 'unlike');
                 break;
               case "unlike":
                 document.querySelector('#cmlikes' + comment).textContent--;
                 $('#likebtn'+comment).attr('data-like', 'like');
                 break;
               default:
                 console.log("Da FUCK!? "+comment + "  ??  " + action);
             }
           }
           function disablelike(id){

           }
     // toggleButtonText[action](event.target);
     // updateVoteStats[action](itemId);
     // axios.post('/item/' + itemId + '/vote',
     //     { action: action });
 // };
 $(".deletebtn").click(function(){
   console.log(" begin deleting ");
   actOnDelete(event);
 });
 var actOnDelete = function (event) {
 var comment = event.target.dataset.comment;
 console.log("deleting "+comment);
 jQuery.ajax({
         url: "{{ url('/comment/delete') }}",
         method: 'post',
         data: {
           comment:comment,
         },
         success: function(result){
           console.log("deleted");
           deleteComment(comment);
         }
       });
     };
     function deleteComment(id){
       $( "#cmwhole"+id ).remove();
     }
</script>
