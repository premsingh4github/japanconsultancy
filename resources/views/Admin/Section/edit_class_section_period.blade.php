@extends('Admin.index')
@section('body')
    <!-- Main Container -->
    <main id="main-container">

        <!-- Hero -->
        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-sm-fill h3 my-2">
                        Section Wise Period
                    </h1>
                    <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-alt">
                            <li class="breadcrumb-item">List Section Wise Period</li>
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
                            <label for="c_b_s_id">Class Batch<font color="#ff0000">*</font></label>
                            <select name="c_b_s_id" class="form-control" id="c_b_s_id">
                                <option value="">[Choose]</option>
                                @foreach($classBatchSections as $section)
                                    <option value="{{$section->id}}">({{$section->class_room_batch->class_room->name}}-{{$section->class_room_batch->batch->name}}) {{$section->class_section->name}}-{{$section->shift}}</option>
                                @endforeach
                            </select>
                            <i style="font-size: 12px;">Note : Class Batch Section Not Found? <a target="_blank" href="{{url('admin/class_section')}}">Click Here</a></i>
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="period_id">Period<font color="#ff0000">*</font></label>
                            <select name="period_id" class="form-control" id="period_id">
                                <option value="">[Choose]</option>
                                @foreach($periods as $period)
                                    <option value="{{$period->id}}">{{$period->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="shift">Start Time<font color="#ff0000">*</font></label>
                            <input type="time" name="start_at" class="form-control">
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="end_at">End Time<font color="#ff0000">*</font></label>
                            <input type="time" class="form-control" name="end_at">
                        </div>
                        <div class="form-group col-sm-4">
                            <button type="submit" class="btn  btn-success">Create Section Wise Period</button>
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