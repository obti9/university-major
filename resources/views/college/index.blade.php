@extends('layout')
@section('dashboard-content')

<h1>الكليات</h1>
@if (@Session::get('deleted'))
<div class="alert alert-success alert-dismissible fade show" role="alert" id="gone">
  <strong>{{@Session::get('deleted')}}</strong>
  <button type="button" class="close" data-disimmis="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
    
@endif

@if (@Session::get('delete_failed'))
<div class="alert alert-warning alert-dismissible fade show" role="alert" id="gone">
  <strong>{{@Session::get('delete_failed')}}</strong>
  <button type="button" class="close" data-disimmis="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
    
@endif


<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">كل الكليات </h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>اسم الكلية</th>
                        <th>الحدث</th>
                   
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>اسم الكلية</th>
                        <th>الحدث</th>
                        
                    </tr>
                </tfoot>
                <tbody>
                    
                    @foreach ($colleges as $college)

                    <tr>
                        <td>{{$college->name}}</td>
                        <td>
                            <a href="{{URL::to('edit-college')}}/{{$college->id}}" class="btn btn-outline-primary btn-sm">تعدبل</a>
                            |
                            <a href="{{URL::to('delete-college')}}/{{$college->id}}" class="btn btn-outline-danger btn-sm" onclick="checkDelete()">حذف</a>
                        </td>
                        
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    function checkDelete() {
        var check = confirm('هل انت متاكد من انك تريد حذف هذا العنصر؟');
        if (check) {
            return true;
        }
        return false;
    }
</script>
@endsection