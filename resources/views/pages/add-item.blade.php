@extends('layouts.add-item')
@section('add-item-page')
<div class="container-fluid p-0 m-0 gandom">
  <h1 class="mt-4 mr-3">افزودن آیتم جدید به لیست</h1>
  <h2 class="mt-4 mr-3">{{$list->title}}</h2>
  <form action="/item/new/{{$list->id}}" method="post" enctype="multipart/form-data">
    @if ($errors->any())
       <div class="alert alert-danger">
                 <ul>
                 @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
             @endforeach
          </ul>
          </div>
          @endif
     <!--error ends-->
     <!--error ends-->
     <div class="pr-5 mt-5">
         <label for="input-title">عنوان</label>
         <input type="text" class="form-control title material-box text-right" id="input-title" aria-describedby="emailHelp" placeholder="عنوان" name="title">
     </div>
     <div class="pr-5 mt-5">
         <label for="input-desc">توضیح</label>
         <input type="text" class="form-control  description material-box text-right" id="input-desc" aria-describedby="emailHelp" placeholder="توضیح" name="description">
     </div>
     <div class="pr-5 mt-2">
      <span><h5>دسته ها:</h5></span>
      <div class="material-box material-input p-1 mt-2 category">
        <select class="categories" name="states[]" multiple="multiple">
          <option value="Mv">فیلم</option>
          <option value="Sr">سریال</option>
          <option value="Pr">افراد</option>
          <option value="Sp">ورزش</option>
          <option value="Ir">ایران</option>
        </select>
      </div>
     </div>
     <div class="pr-5 mt-2">
      <span><h5>تصویر:</h5></span>
      <input type="file" name="image">
      <button type="submit" class="btn btn-primary mysubbtn">Submit</button>
     </div>
  </form>
</div>
@stop
