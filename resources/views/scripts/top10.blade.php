<script type="text/javascript">
// mohamad if liked should disable
var likable=true;
var deletable=true;
var isguest=false;
var votable=true;
var plusable=true;
var minusable=true;
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
  @if($guest)
    isguest=true;
  @endif
    jQuery(document).ready(function(){
      @foreach($likes as $like)
        @foreach($comments as $comment)
          @if($like->comment==$comment->id)
            $('#likebtn'+{{$comment->id}}).attr('data-like','unlike');
            $('#likelink'+{{$comment->id}}).attr('data-like','unlike');
            $('#cmlikes'+{{$comment->id}}).attr('data-like','unlike');
            $('#likebtn'+{{$comment->id}}).removeClass('btn-outline-primary');
            $('#likebtn'+{{$comment->id}}).addClass('btn-primary');
            $('#likebtn'+{{$comment->id}}).css('color','white');
            console.log("comment"+{{$comment->id}});
            // disablelike({{$like->comment}});
          @endif
        @endforeach
      @endforeach
        @foreach($usercomments as $usercomment)
          $('#deletebtn'+{{$usercomment->id}}).addClass('deletable');
          $('#deletebtn'+{{$usercomment->id}}).removeClass('btn-outline-secondary');
          $('#deletebtn'+{{$usercomment->id}}).addClass('btn-danger');
          $('#deletelink'+{{$usercomment->id}}).addClass('deletable');
        @endforeach
        @foreach($votes as $vote)
          @if($vote->thevote=="plus")
            $('#voter'+{{$vote->item}}).addClass('plussed');
            $('#voter'+{{$vote->item}}).attr('data-already','true');
            $('#votericon'+{{$vote->item}}).attr('data-already','true');
          @else
            $('#unvoter'+{{$vote->item}}).addClass('minussed');
            $('#unvoter'+{{$vote->item}}).attr('data-already','true');
            $('#unvotericon'+{{$vote->item}}).attr('data-already','true');
          @endif
        @endforeach
      $(".likebtn").click(function(){
        if(likable){
          likable=false;
          actOnLike(event);
        }
      });
      $(".voteButton").click(function(){
        if(votable){
          votable=false;
          console.log(" begin voting ");
          if(!isguest){
            actOnVote(event);
          }
          else{
            alert("Sign in!");
          }
        }
      });
      $(".deletebtn").click(function(){
        if(deletable){
          deletable=false;
          console.log(" begin deleting ");
          actOnDelete(event);
        }
      });
        });

$( ".submit-cm" ).click(function() {
  if(!isguest){
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
                  // para.appendChild(node);
                  // location.reload();
              }
            });
  }
  else{
    alert("sign in");
  }
});
 function updateVoteStats(action,itemId,double){
   votable=true;
   switch(action) {
     case "vote":
       console.log("Da FUCK!? "+itemId + "  ??  " + action);
         document.querySelector('#votesof' + itemId).textContent++;
         if(double)
         document.querySelector('#votesof' + itemId).textContent++;
         // $("#voter"+itemId).attr("disabled", true);
       break;
     case "unvote":
       console.log("Da FUCK!? "+itemId + "  ??  " + action);
         document.querySelector('#votesof' + itemId).textContent--;
         if(double)
         document.querySelector('#votesof' + itemId).textContent--;
       break;
     default:
       console.log("Da FUCK!? "+itemId + "  ??  " + action);
   }
 }
 function shouldWeDouble(item,action){
   if(action='vote'){
     if($('#unvote'+item).attr('data-already')=='true'){
       console.log("its a double");
       return true;
     }
     else
     return false;
   }
   else{
     if($('#vote'+item).attr('data-already')=='true'){
       console.log("its a double");
       return true;
     }
     else
     return false;
   }
 }
 var actOnVote = function (event) {
   console.log(" ...getting ready to register vote");
     var itemId = event.target.dataset.item;
     var action = event.target.dataset.vote;
     var list={{$list}};
     var withdraw=event.target.dataset.already;
     var double=shouldWeDouble(itemId,action);
     console.log("this is a vote on "+itemId + " from list "+list+":the vote is " + action + " and withrawal status is :"+withdraw +" double is " + double);
     jQuery.ajax({
             url: "{{ url('/vote') }}",
             method: 'post',
             data: {
               action:action,
               item:itemId,
               list:list,
               withdraw:withdraw,
               double:double
             },
             success: function(result){
               console.log(" ... registered!");
               if(withdraw=='true'){
                 if(action=='vote'){
                   updateVoteStats('unvote',itemId,double);
                   $('#voter'+itemId).attr('data-already','false');
                   $('#votericon'+itemId).attr('data-already','false');
                 }
                 else{
                   updateVoteStats('vote',itemId,double);
                   $('#unvoter'+itemId).attr('data-already','false');
                   $('#unvotericon'+itemId).attr('data-already','false');
                 }
               }
               else{
                 updateVoteStats(action,itemId,double);
                 if(action=='vote'){
                   $('#voter'+itemId).attr('data-already','true');
                   $('#votericon'+itemId).attr('data-already','true');
                   $('#voter'+itemId).addClass('plussed');
                   if(double){
                     $('#unvoter'+itemId).attr('data-already','false');
                     $('#unvotericon'+itemId).attr('data-already','false');
                   }
                 }
                 else{
                   $('#voter'+itemId).addClass('minussed');
                   $('#unvoter'+itemId).attr('data-already','true');
                   $('#unvotericon'+itemId).attr('data-already','true');
                   if(double){
                     $('#voter'+itemId).attr('data-already','false');
                     $('#votericon'+itemId).attr('data-already','false');
                   }
                 }
               }
             }
           });
     // toggleButtonText[action](event.target);
     // updateVoteStats[action](itemId);
     // axios.post('/item/' + itemId + '/vote',
     //     { action: action });
 };
 var actOnLike = function (event) {
     var comment = event.target.dataset.comment;
     var action = event.target.dataset.like;
     console.log("was it thought? cuz it's " + action);
     jQuery.ajax({
             url: "{{ url('/like') }}",
             method: 'post',
             data: {
               action:action,
               comment:comment,
             },
             success: function(result){
               console.log("successful like!!");
               updateLikeStats(action,comment);
             }
           });
         }
           function updateLikeStats(action,comment){
             switch(action) {
               case "like":
                 document.querySelector('#cmlikes' + comment).textContent++;
                 $('#likebtn'+comment).attr('data-like','unlike');
                 $('#likelink'+comment).attr('data-like','unlike');
                 $('#cmlikes'+comment).attr('data-like','unlike');
                 $('#likebtn'+comment).removeClass('btn-outline-primary');
                 $('#likebtn'+comment).addClass('btn-primary');
                 $('#likebtn'+comment).css('color','white');
                 likable=true;
                 var a = $('#likebtn'+comment).data('like');
                 console.log("like of"+comment + "  is  " + a);
                 break;
               case "unlike":
                 document.querySelector('#cmlikes' + comment).textContent--;
                 $('#likebtn'+comment).attr('data-like','like');
                 $('#likelink'+comment).attr('data-like','like');
                 $('#cmlikes'+comment).attr('data-like','like');
                 $('#likebtn'+comment).removeClass('btn-primary');
                 $('#likebtn'+comment).addClass('btn-outline-primary');
                 $('#likebtn'+comment).css('color','#007BFF');
                 likable=true;
                 console.log("unlike "+comment + "  ??  " + action);
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
 var actOnDelete = function (event) {
        var comment = event.target.dataset.comment;
         if($(event.target).hasClass("deletable")){
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
         }
         else{
           console.log("undeletable "+comment);
           deletable=true;
         }
     };
     function deleteComment(id){
       deletable=true;
       $( "#cmwhole"+id ).remove();
     }
</script>
