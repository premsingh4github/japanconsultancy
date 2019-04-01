@extends('Admin.index')
@section('body')
    <!-- Main Container -->
    <main id="main-container">

        <!-- Hero -->
        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-sm-fill h3 my-2">
                       {{__('language.Period_Time_Update')}}
                    </h1>
                    <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-alt">                            
                            <li class="breadcrumb-item">{{__('language.Period_Time_Update')}}</li>
                            <li class="breadcrumb-item"><a href="{{url('admin/section_period')}}">{{__('language.List_Exist_Section')}}</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- END Hero -->

        <!-- Page Content -->
        <div class="content">
            @if(session('success'))
                <div class="col-sm-12">
                    <div class="alert  alert-success alert-dismissible fade show" role="alert">
                        <span class="badge badge-pill badge-success">Success</span> {{session('success')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
                <div style="clear: both;"></div>
            @endif
            @if($errors->any())
                <div class="col-sm-12">
                    <div class="alert  alert-success alert-dismissible fade show" role="alert">
                        @foreach($errors->all() as $error)
                            <span class="badge badge-pill badge-danger">Error</span> {{$error}}<br>
                        @endforeach
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
                <div style="clear: both;"></div>
        @endif

        <!-- Partial Table -->
            <div class="block" style="padding:20px;">
                <form action="" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="form-group col-sm-3">
                            <label for="shift"> {{$class_section_period->period->name}}  Time Period</label>
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="shift">{{__('language.Start_Time')}}<font color="#ff0000">*</font></label>
                            <input type="time" class="form-control" value="{{$class_section_period->start_at}}" name="start_at">
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="end_at">{{__('language.End_Time')}}<font color="#ff0000">*</font></label>
                            <input type="time" class="form-control" value="{{$class_section_period->end_at}}" name="end_at">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-4">
                            <button type="submit" class="btn  btn-success">{{__('language.Period_Time_Update')}}</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- END Partial Table -->
        </div>
        <!-- END Page Content -->

    </main>
    <!-- END Main Container -->
@endsection