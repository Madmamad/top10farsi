@extends('layouts.top10')
@section('top10-content')
<div class="row container-fluid page p-0 m-0 gandom">
  <div class="col-lg-9 p-2 toptenlist">
    <div class="info mb-0 p-1 gandom mt-2 mb-1 list-info">
      <p class="mr-5 title">{{$top10}}</p>
      <span class="mr-5">افزوده شده توسط:</span>
      <span>{{$user}}</span>
      <span class="mr-5">در تاریخ :</span>
      <span class="">{{$date}}</span>
      <p class="p-2 mt-3">{{$desc}}</p>
    </div>
    @foreach ($items as $item)
    <div class="row toptenitem pt-1 pr-0 pb-1 pl-1 m-0 material-box mb-1">
      <div class="col-4 itemPicColumn">
        <div class="toptenitempic align-middle">
          @foreach ($images as $image)
            @if ($item->id == $image->item_id)
            <img src="{{asset('storage/'.ltrim($image->address, 'public'))}}" alt="pic" class="toptenitemimage">
              @break
            @endif
          @endforeach
        </div>
      </div>
      <div class="col-8">
        <div class="row toptenitemdesc m-0 pt-2">
          <b>{{$item->title}}</b>
          <p>{{$item->description}}</p>
        </div>
        <div class="comment-input p-0 m-0 row cm-section">
          <div class="p-2 m-0 vote-section">
            <div class="button plus voteButton" data-vote="vote" data-item="{{$item->id}}" id="voter{{$item->id}}"><span class="glyphicon glyphicon-plus pt-2" data-vote="vote" data-item="{{$item->id}}"></span></div>
            <p class="vote" id="votesof{{$item->id}}">{{$item->votes}}</p>
            <div class="button minus voteButton" data-vote="unvote" data-item="{{$item->id}}" id="unvoter{{$item->id}}"> <span class="glyphicon glyphicon-minus pt-2" data-vote="unvote" data-item="{{$item->id}}"></span></div>
          </div>
          <div class="input-group p-1">
            <form class="myForm" action="index.html" method="post">
              <!-- {{ Form::hidden('item_id', $item->id) }} -->
              <input type="text" class="form-control m-0 inputcm" id="inputcm{{$item->id}}" data-item="{{$item->id}}" data-toggle="collapse" href="#cmroll{{$item->id}}" placeholder="افزودن نظر">
              <div class="button pt-3 submit-cm submitcomment" data-item="{{$item->id}}"> <span class="glyphicon glyphicon-ok"></span></div>
            </form>
          </div><!-- /input-group -->
        </div>
      </div>
      <div class="collapse cmroll mt-3 p-3 pr-5" id="cmroll{{$item->id}}">
        <form class="formsclass" id="commentshow{{$item->id}}">
          @foreach ($comments as $comment)
            @if ($item->id == $comment->item_id)
            <div class="cmwhole p-2 mb-1 whole pb-5" id="cmwhole{{$comment->id}}">
              <span class="cmbody">
                <div class="user-cred">
                  <img src="https://weva.pro/images/user/9414/userpic_2018-02-01_01-31-06_86_l.jpg?1567991401" alt="PIC" class="userpic">
                  <span class="username pt-3 mr-2"><b>TopTen_Admin</b></span>
                </div>
                  <span class="cmcontent">{{$comment->content}}</span>
              </span>
              <div class="btn-group cmtool mt-1" role="group" aria-label="...">
                <button type="button" class="btn btn-primary pt-2 pb-2 likebtn" data-comment="{{$comment->id}}" data-like="like" id="likebtn{{$comment->id}}"><i class="glyphicon glyphicon-heart" data-comment="{{$comment->id}}" data-like="like"></i><span class="mr-1 ml-1" id="cmlikes{{$comment->id}}">{{$comment->likes}}</span></button>
                <button type="button" class="btn btn-danger pt-1 pb-2 deletebtn" data-comment="{{$comment->id}}"><i class="glyphicon glyphicon-remove" data-comment="{{$comment->id}}"></i></button>
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
    <button type="button" class="btn btn-labeled btn-success mt-5 ml-3 mb-5">
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
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.</div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.</div>
  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.</div>
</div>
  </div>
</div>
@stop
