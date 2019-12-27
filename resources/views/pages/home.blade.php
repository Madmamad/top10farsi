@extends('layouts.home')
@section('home-page')
<div class="page row m-0 p-0 pt-1 pr-2 gandom">
  <div class="col-lg-9 pl-4 mt-2" id="mainsection">
    <div class="container-fluid material-box" id="bigsection">
      <div class="row text-center" id="hotTopicRow">
        <div class="col-lg-6 p-0 m-0" id="carousel-column">
          <div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel">
            <!-- Indicators -->
            <ul class="carousel-indicators">
              <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
              <li data-target="#myCarousel" data-slide-to="1"></li>
              <li data-target="#myCarousel" data-slide-to="2"></li>
              <li data-target="#myCarousel" data-slide-to="3"></li>
              <li data-target="#myCarousel" data-slide-to="4"></li>
            </ul>
            <!-- The slideshow -->
            <div class="carousel-inner" id="item-1">
              <div class="carousel-item active">
                <div class="carousel-background">
                </div>
              </div>
              <div class="carousel-item" id="item-2">
                <div class="carousel-background">
                </div>
              </div>
              <div class="carousel-item" id="item-3">
                <div class="carousel-background">
                </div>
              </div>
              <div class="carousel-item" id="item-4">
                <div class="carousel-background">
                </div>
              </div>
              <div class="carousel-item" id="item-5">
                <div class="carousel-background">
                </div>
              </div>
            </div>

            <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
              <span class="cc p-2"><span class="carousel-control-prev-icon"></span></span>
            </a>
            <a class="carousel-control-next" href="#myCarousel" data-slide="next">
              <span class="cc p-2"><span class="carousel-control-next-icon"></span></span>
            </a>

          </div>
        </div>
        <div class="col-lg-6 pt-4 pr-5 pl-5" id="description-column">
          <div class="" id="item-desc">
            <h1 id="title-content" class="animated">{{$hooplas[4]->title}}</h1>
            <p id="desc-content" class="animated mt-5 just">{{$hooplas[4]->description}}</p>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid mt-1 mr-2 p-0" id="doublesection">
      <div class="row pt-0 pb-3 pr-3" id="doublesectionrow">
        <div class="col-lg-5 m-0 p-0 pr-1 material-box" align="center" id="newTopic">
          <div class="m-0 p-0 row" id="newTopicBackground">
            <div class="mt-0" id="newTopicCaption">
              <h4>{{$hooplas[4]->title}}</h4>
            </div>
          </div>
        </div>
        <div class="col-lg-7 pr-2" id="categories">
          <div class="container-fluid m-0 p-0 pl-1">
            <div class="row m-0 p-0 buttonrow">
                <div class="button corner-top-right"> <span class="glyphicon glyphicon-music"></span> موسیقی </div>
                <div class="button"> <span class="glyphicon glyphicon-film"></span> سینما </div>
                <div class="button"> <span class="glyphicon glyphicon-tree-conifer"></span> طبیعت </div>
                <div class="button corner-top-left"> <span class="glyphicon glyphicon-knight"></span> ورزش </div>
            </div>
            <div class="row m-0 p-0 buttonrow">
              <div class="button corner-bottom-right"> <span class="glyphicon glyphicon-cutlery"></span> غذا </div>
              <div class="button"> <span class="glyphicon glyphicon-star"></span> مشاهیر </div>
              <div class="button"> <span class="glyphicon glyphicon-pencil"></span> ادبیات </div>
              <div class="button corner-bottom-left active"> <span class="glyphicon glyphicon-paperclip"></span> دسته ها</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="right col-lg-3 order-lg-first m-0 p-2">
    <div class="list">
        <ul class="list-list m-0 p-0">
          @foreach ($top10s as $top10)
          <a href="{{'/list/'.$top10->id}}">
            <div class="list-item mb-1 material-box bigger">
              @foreach ($images as $image=>$value)
                @if ($top10->id == $value->list_id)
              <img src="{{asset('storage/'.ltrim($value->address, 'public'))}}" alt="pic" class="list-picture">
                  @break
                @endif
              @endforeach
              <section class="list-title ml-1 mb-3">
                <p>{{$top10->title}}</p>
              </section>
            </div>
            </a>
          @endforeach
        </ul>
    </div>
  </div>
</div>
@stop
