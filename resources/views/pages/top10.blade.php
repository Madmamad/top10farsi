@extends('layouts.top10')
@section('top10-content')
<div class="row container-fluid page p-0 m-0 gandom">
  <div class="col-lg-9 p-1 toptenlist">
    <div class="info mb-0 p-4 gandom mt-2 mb-1 list-info">
      <div class="row">
        <div class="col-md-9 right">
          <span class="title">{{$top10}}</span>
          <div class="">
            <p class="mt-3 just">{{$desc}}</p>
            <div class="list-detail">
              <span class="mr-5 details">افزوده شده توسط:</span>
              <span class="details">{{$user}}</span>
              <span class="mr-5 details">در تاریخ :</span>
              <span class="details">{{$date}}</span>
            </div>
          </div>
        </div>
        <div class="col-md-3 p-0 m-0">
          <span class="">
            @foreach ($picture as $pic)
            <img src="{{asset('storage/'.ltrim($pic->address, 'public'))}}" alt="pic" id="listpicture">
            @endforeach
          </span>
        </div>
      </div>
    </div>
    @foreach ($items as $item)
    <div class="row toptenitem pt-1 pr-0 pb-1 pl-1 m-0 material-box mb-1">
      <div class="col-4 p-1 itemPicColumn">
        <span class="count">#{{$loop->iteration}}</span>
        <span class="toptenitempic m-0 p-0 align-middle">
          @foreach ($images as $image)
            @if ($item->id == $image->item_id)
            <img src="{{asset('storage/'.ltrim($image->address, 'public'))}}" alt="pic" class="toptenitemimage">
              @break
            @endif
          @endforeach
        </span>
      </div>
      <div class="col-8 m-0">
        <div class="row toptenitemdesc m-0 pt-2">
          <b class="mb-3">{{$item->title}}</b>
          <p class="just">{{$item->description}}</p>
        </div>
        <div class="detail p-0 pt-2 pb-2">
          <span class="details">افزوده شده توسط:</span>
          <span class="details">{{$item->user_name}}</span>
          <span class="mr-5 details">در تاریخ :</span>
          <span class="details">{{$item->created_at}}</span>
        </div>
        <div class="comment-input p-0 m-0 row cm-section">
          <span class="p-2 m-0 vote-section">
            <div class="button plus voteButton" data-vote="vote" data-item="{{$item->id}}" id="voter{{$item->id}}" data-already="false"><span class="glyphicon glyphicon-plus pt-2" data-vote="vote" data-item="{{$item->id}}" data-already="false" id="votericon{{$item->id}}" ></span></div>
            <p class="vote" id="votesof{{$item->id}}">{{$item->votes}}</p>
            <div class="button minus voteButton" data-vote="unvote" data-item="{{$item->id}}" id="unvoter{{$item->id}}" data-already="false"> <span class="glyphicon glyphicon-minus pt-2" data-vote="unvote" data-item="{{$item->id}}" data-already="false" id="unvotericon{{$item->id}}"></span></div>
          </span>
          <span class="input-group p-1 cmm-section">
            <form class="myForm" action="index.html" method="post">
              {{ csrf_field() }}
              <!-- {{ Form::hidden('item_id', $item->id) }} -->
              <input type="text" class="form-control m-0 inputcm" id="inputcm{{$item->id}}" data-item="{{$item->id}}" data-toggle="collapse" href="#cmroll{{$item->id}}" placeholder="افزودن نظر">
              <div class="button pt-3 submit-cm submitcomment" data-item="{{$item->id}}"> <span class="glyphicon glyphicon-ok"></span></div>
            </form>
          </span><!-- /input-group -->
        </div>
      </div>
      <div class="collapse cmroll mt-3 p-3 pr-5" id="cmroll{{$item->id}}">
        <form class="formsclass" id="commentshow{{$item->id}}">
          {{ csrf_field() }}
          @foreach ($comments as $comment)
            @if ($item->id == $comment->item_id)
            <div class="cmwhole p-2 mb-1 whole pb-5" id="cmwhole{{$comment->id}}">
              <div class="cmbody">
                <div class="user-cred">
                  <img src="https://weva.pro/images/user/9414/userpic_2018-02-01_01-31-06_86_l.jpg?1567991401" alt="PIC" class="userpic">
                  <span class="username pt-3 mr-2"><b>{{$comment->user_name}}</b></span>
                  <span class="mr-5 details">افزوده شده در تاریخ:</span>
                  <span class="details">{{$comment->created_at}}</span>
                </div>
                  <div class="cmcontent">{{$comment->content}}</div>
              </div>
              <div class="btn-group cmtool mb-1 mt-1" role="group" aria-label="...">
                <button type="button" class="btn btn-outline-primary pt-2 pb-2 likebtn" data-comment="{{$comment->id}}" data-like="like" id="likebtn{{$comment->id}}"><i class="glyphicon glyphicon-heart" data-comment="{{$comment->id}}" data-like="like" id="likelink{{$comment->id}}"></i><span class="mr-1 ml-1" id="cmlikes{{$comment->id}}" data-comment="{{$comment->id}}" data-like="like">{{$comment->likes}}</span></button>
                <button type="button" class="btn btn-outline-secondary pt-1 pb-2 deletebtn" data-comment="{{$comment->id}}" id="deletebtn{{$comment->id}}"><i class="glyphicon glyphicon-remove" data-comment="{{$comment->id}}" id="deletelink{{$comment->id}}"></i></button>
              </div>
            </div>
              <!-- <div class="commentedit row" data-cmid="{{$comment->id}}"> -->
                <!-- <div class="col-1">

                </div>
                <div class="col-1">
                  <span class="glyphicon glyphicon-remove commentbuttonicon deletebtn ml-3 mr-5"></span>
                </div>
                <div class="col-1">
                  <span class="glyphicon glyphicon-edit commentbuttonicon editbtn mr-3"></span>
                </div> -->
                <!-- <button type="button" class="cmbtn btn-labeled btn-success mt-5 ml-3 mb-5">
                <span class="btn-label"><i class="glyphicon glyphicon-ok commentbuttonicon likebtn ml-5"></i></span>لایک</button>
                <button type="button" class="cmbtn btn-labeled btn-danger mt-5 ml-3 mb-5">
                <span class="btn-label"><i class="glyphicon glyphicon-remove commentbuttonicon deletebtn ml-3 mr-5"></i>حذف</span></button>
                <button type="button" class="cmbtn btn-labeled btn-info mt-5 ml-3 mb-5">
                <span class="btn-label"><i class="glyphicon glyphicon-edit commentbuttonicon deletebtn ml-3 mr-5"></i></span>ویرایش</button> -->
                  <!-- <span class="glyphicon glyphicon-ok commentbuttonicon likebtn ml-5"></span>
                  <span class="glyphicon glyphicon-remove commentbuttonicon deletebtn ml-3 mr-5"></span>
                  <span class="glyphicon glyphicon-edit commentbuttonicon editbtn mr-3"></span> -->
                <!-- <div class="button commentbutton edit"><span class="glyphicon glyphicon-edit commentbuttonicon"></span></div>
                <div class="button commentbutton delete"><span class="glyphicon glyphicon-remove commentbuttonicon"></span></div>
                <div class="button commentbutton like"><span class="glyphicon glyphicon-ok commentbuttonicon"></span></div> -->
              <!-- </div> -->
            @endif
          @endforeach
        </form>
      </div>
    </div>
    @endforeach
  </div>
  <div class="col-lg-3 p-2 pr-4 left">
    <button type="button" class="btn btn-labeled btn-success mt-5 ml-3 mb-5 add-item-btn">
    <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>افزودن مورد</button><br>
    <ul class="nav nav-tabs leftnav" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
  </li>
</ul>
<div class="tab-content p-2 left-nav-extended" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="new-tab">
    @foreach ($hooplas as $hoopla)
      <p>{{$hoopla->title}}</p>
    @endforeach
  </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="popular-tab">
    @foreach ($hooplas as $hoopla)
      <p>{{$hoopla->title}}</p>
    @endforeach
  </div>
    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="featured-tab">
      @foreach ($hooplas as $hoopla)
        <p>{{$hoopla->title}}</p>
      @endforeach
    </div>
</div>
  </div>
</div>
@stop
