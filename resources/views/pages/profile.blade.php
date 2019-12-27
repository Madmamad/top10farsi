@extends('layouts.profile')
@section('profile-page')
<div class="page p-1">
  <div class="userpic m-2">
      <img src="{{asset('storage/'.ltrim($pic[0]->address, 'public'))}}" alt="s" class="userimage m-1">
    <form class="" action="index.html" method="post">
    {{ csrf_field() }}
      <label for="files" class="lable">انتخاب تصویر</label>
      <input type="file" name="image" id="files" class="hidden">
    </form>
  </div>
  <div class="username">
    <div class="m-3">
      <div>
        <span  class="m-1 bold">نام کاربری:</span><span>{{$name}}</span>
      </div>
      <button type="button" class="btn btn-primary m-1" data-toggle="modal" data-target="#nameModal" data-edit="name">
        تغییر نام کاربری
      </button>
    </div>
    <div class="m-3">
      <div class="">
        <span class="m-1 bold">ایمیل:</span><span>{{$email}}</span>
      </div>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#emailModal" data-edit="email">
        تغییر آدرس ایمیل
      </button>
    </div>
  </div>
</div>
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="nameModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">ویرایش نام کاربری</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          {{ csrf_field() }}
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">مقدار جدید:</label>
            <input type="text" class="form-control" id="newnamevalue">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="savename">Save changes</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="emailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">ویرایش ایمیل</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          {{ csrf_field() }}
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">مقدار جدید:</label>
            <input type="text" class="form-control" id="newemailvalue">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="saveemail">Save changes</button>
      </div>
    </div>
  </div>
</div>
@stop
