<nav class="navbar navbar-expand-lg navbar-dark material-box mb-0 gandom" id="navbarred">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <ul class="navbar-nav ml-auto">
      <li><a class="navbar-brand" href="/user/profile"><img src="{{asset('storage/'.ltrim($userpic[0]->address, 'public'))}}" alt="!!!" class="navbar-user-pic"></a></li>
      <li class="nav-item dropdown">
        <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          {{$username}}
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">پروفایل</a>
        </div>
      </li>
    </ul>
      <ul class="navbar-nav mr-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            لیست ها
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="#">جدید</a>
            <a class="dropdown-item" href="#">پربازدید</a>
            <a class="dropdown-item" href="#">پیشنهادی</a>
          </div>
        </li>
    <li class="nav-item mr-3 active">
      <a class="nav-link" href="/hi">خانه <span class="sr-only">(current)</span></a>
    </li>
  </ul>
  </div>
</nav>
