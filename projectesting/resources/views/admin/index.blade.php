@extends("admin/master/template")

@section("content")
<div class="page-header">
    <h1>
        Dashboard
        <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
            {{ session('user_role')['user_type'] }}
        </small>
    </h1>
</div>

<div class="row">
    <div class="col-sm-4">
        @php
            /*echo "<pre>";
            print_r($rolesName);
            echo "</pre>";*/
           /* echo "<pre>";
            print_r($countries);
            echo "</pre>";*/
            /*echo "<pre>";
            print_r(session("user_role"));
            echo "</pre>";*/
        @endphp
    </div>
</div>

	  
@stop