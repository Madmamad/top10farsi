<nav class="navbar navbar-expand-lg navbar-dark material-box mb-0 gandom" id="navbarred">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <a class="navbar-brand" href="#">برند ما </a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="#">خانه <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">لینک</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">غیرفعال</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      {{ csrf_field() }}
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success m-1 my-2 my-sm-0" type="submit">جستجو</button>
    </form>
  </div>
</nav>
