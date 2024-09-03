@extends('layout')
@section('dashboard-content')
<h1>اضافة الاقسام</h1>
    
@if (@Session::get('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert" id="gone">
  <strong>{{@Session::get('success')}}</strong>
  <button type="button" class="close" data-disimmis="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
    
@endif

@if (@Session::get('failed'))
<div class="alert alert-warning alert-dismissible fade show" role="alert" id="gone">
  <strong>{{@Session::get('failed')}}</strong>
  <button type="button" class="close" data-disimmis="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
    
@endif

<form action="{{URL::to('post-department-form')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="exampleInputEmail1">اسم القسم</label>
      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="ادخل اسم القسم" name="departmentName">
    </div>
    
    <button type="submit" class="btn btn-primary">حفظ</button>
  </form>

  
@endsection