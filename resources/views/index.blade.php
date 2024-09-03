@extends('main')
@section('content')
<div id="wrapper">
    <div id="bg"></div>
    <div id="overlay"></div>
    <div id="main">

        <!-- Header -->
            <header id="header">
                <h1 style="font-family:arabic2;" >اختيار التخصص الجامعي</h1>
                
                <form action="{{URL::to('get-data')}}" method="GET" enctype="multipart/form-data">
                    @csrf
                <div class="row" id="row">
                    <div class="col-md-6">
                        <select class="form-control @error('qualified') is-invalid @enderror" name="qualified" id="qualified" required autocomplete="qualified">
                            {{-- <option selected="false"> اختر المؤهل</option> --}}
                            @foreach ($qualifieds as $qualified)
                                <option value="{{$qualified->id}}">{{$qualified->name}}</option>
                            @endforeach
                        </select>
                        @error('qualified')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <input type="number" class="form-control @error('acceptance_percentage') is-invalid @enderror" id="acceptance_percentage" aria-describedby="emailHelp" placeholder="ادخل نسبة القبول" name="acceptance_percentage" required autocomplete="acceptance_percentage" autofocus>
                        @error('acceptance_percentage')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                <div class="col-md-3">
                    <button class="btn btn-primary rounded" type="submit" id="search">
                        Search <i class="fa fa-search"></i>
                    </button>
                </div> 
            </form>
            <div id="card" class="card">
                {{-- <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">تخصصات الدراسة</h6>
                </div> --}}
                <div  class="card-body"  @if (!$fieldofstudies) hidden
                    
                @endif>
            
                    <div class="table-responsive" id="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>الجامعة</th>
                                    <th>الكلية</th>
                                    <th>القسم</th>
                                    <th>النسبة</th>
                                    <th>المؤهل الاكاديمي</th>
                                    
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>الجامعة</th>
                                    <th>الكلية</th>
                                    <th>القسم</th>
                                    <th>النسبة</th>
                                    <th>المؤهل الاكاديمي</th>
                                    
                                </tr>
                            </tfoot>
                        <tbody>
                                @if ($fieldofstudies)
                                    
                                
                                @foreach ($fieldofstudies as $fieldofstudy)
            
                                <tr>
                                    @foreach ($univers as $university)
                                    @if ($university->id == $fieldofstudy->university_id)
                                    <td >{{$university->name}}</td>
                                    @endif
                                    @endforeach
            
                                    @foreach ($colleges as $college)
                                    @if ($college->id == $fieldofstudy->college_id)
                                    <td >{{$college->name}}</td>
                                    @endif
                                    @endforeach
            
                                    @foreach ($departments as $department)
                                    @if ($department->id == $fieldofstudy->department_id)
                                    <td >{{$department->name}}<a href="{{URL::to('show-job')}}/{{$department->id}}/{{$department->name}}">{{(' - المجال الوظيفي')}}</a></td>
                                    @endif
                                    @endforeach
            
                                    <td>{{$fieldofstudy->acceptance_percentage}}</td>
            
                                    @foreach ($qualifieds as $qualified)
                                    @if ($qualified->id == $fieldofstudy->qualified_id)
                                    <td >{{$qualified->name}}</td>
                                    @endif
                                    @endforeach
                                
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            </header>
            
        <!-- Footer -->
            <footer id="footer">
                <div class="copyright text-center my-auto">
                    <span>جميع الحقوق محفوظة &copy; لموقع اختيار التخصص الجامعي 2023</span>
                </div>
            </footer>
            <!-- End of Footer -->

    </div>
</div>
<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
<script>
    window.onload = function() { document.body.className = ''; }
    window.ontouchmove = function() { return false; }
    window.onorientationchange = function() { document.body.scrollTop = 0; }
</script>
                {{-- <div class="card ">
                    <div class="card-header">
                        <h2 class="text-center">
                            اختيار التخصص الجامعي
                        </h2>
                    </div>
                    <div class="card-body">
                        <form action="{{URL::to('get-data')}}" method="GET" enctype="multipart/form-data">
                            @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <select class="form-control" name="qualified" id="qualified">
                                    <option selected="false"> اختر المؤهل</option>
                                    @foreach ($qualifieds as $qualified)
                                        <option value="{{$qualified->id}}">{{$qualified->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <input type="number" class="form-control" id="acceptance_percentage" aria-describedby="emailHelp" placeholder="ادخل نسبة القبول" name="acceptance_percentage">
                        </div>
                        <div class="col-md-3">
                            <button class="btn btn-primary rounded" type="submit" id="search">
                                Search <i class="fa fa-search"></i>
                            </button>
                        </div> 
                        </form
                        
                    </div>
                </div>

                
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">تخصصات الدراسة</h6>
                    </div> 
                    <div id="data" class="card-body" @if (!$fieldofstudies) hidden
                        
                    @endif>
                
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>الجامعة</th>
                                        <th>الكلية</th>
                                        <th>القسم</th>
                                        <th>النسبة</th>
                                        <th>المؤهل الاكاديمي</th>
                                        
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>الجامعة</th>
                                        <th>الكلية</th>
                                        <th>القسم</th>
                                        <th>النسبة</th>
                                        <th>المؤهل الاكاديمي</th>
                                        
                                    </tr>
                                </tfoot>
                            <tbody>
                                    @if ($fieldofstudies)
                                        
                                    
                                    @foreach ($fieldofstudies as $fieldofstudy)
                
                                    <tr>
                                        @foreach ($univers as $university)
                                        @if ($university->id == $fieldofstudy->university_id)
                                        <td >{{$university->name}}</td>
                                        @endif
                                        @endforeach
                
                                        @foreach ($colleges as $college)
                                        @if ($college->id == $fieldofstudy->college_id)
                                        <td >{{$college->name}}</td>
                                        @endif
                                        @endforeach
                
                                        @foreach ($departments as $department)
                                        @if ($department->id == $fieldofstudy->department_id)
                                        <td ><a href="{{URL::to('show-job')}}/{{$department->id}}/{{$department->name}}">{{$department->name}}</a></td>
                                        @endif
                                        @endforeach
                
                                        <td>{{$fieldofstudy->acceptance_percentage}}</td>
                
                                        @foreach ($qualifieds as $qualified)
                                        @if ($qualified->id == $fieldofstudy->qualified_id)
                                        <td >{{$qualified->name}}</td>
                                        @endif
                                        @endforeach
                                    
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> --}}

                @endsection

        