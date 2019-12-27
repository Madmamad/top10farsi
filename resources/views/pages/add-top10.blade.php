@extends('layouts.add-top10')
@section('add-top10-page')
<div class="big p-5 m-0 gandom">
  <div class="small">
    <h1 class="mt-4 mr-3">افزودن لیست جدید</h1>
    <form action="/list/new" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
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
       <div class="mt-5">
           <label for="input-title">عنوان</label>
           <input type="text" class="form-control title material-box text-right" id="input-title" aria-describedby="emailHelp" placeholder="عنوان" name="title">
       </div>
       <div class="mt-5">
           <label for="input-desc">توضیح</label>
           <input type="text" class="form-control  description material-box text-right" id="input-desc" aria-describedby="emailHelp" placeholder="توضیح" name="description">
       </div>
      <div class="mt-5 bigcat">
        <span><b>دسته ها:</b></span>
        <div class="material-box material-input category">
          <select class="categories" name="states[]" multiple="multiple">
            <option value="Mv">فیلم</option>
            <option value="Sr">سریال</option>
            <option value="Pr">افراد</option>
            <option value="Sp">ورزش</option>
            <option value="Ir">ایران</option>
          </select>
        </div>
      </div>
      <div class="pr-5 m-5">
        <span><h5>تصویر:</h5></span>
        <input type="file" name="image">
      </div>
      <button type="submit" class="btn btn-primary mysubbtn">Submit</button>
    </form>
  </div>
</div>
@stop
