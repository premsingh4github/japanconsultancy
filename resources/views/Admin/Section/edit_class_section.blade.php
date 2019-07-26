@extends('Admin.index')
@section('body')
    <!-- Main Container -->
    <main id="main-container">

        <!-- Hero -->
        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-sm-fill h3 my-2">
                        Edit Class Wise Section
                    </h1>
                    <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-alt">
                            <li class="breadcrumb-item">Edit Class Wise Section</li>
                            <li class="breadcrumb-item" aria-current="page">
                                <a class="link-fx" href="{{url('admin/add_section')}}">Add New Section</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">
                                <a class="link-fx" href="{{url('admin/list_section')}}">View Exist Section</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- END Hero -->
        <div class="col-sm-12 col-md-12 col-xs-12">


            <p class="font-size-sm text-muted">
                @if(session('success'))
                    <span class="alert alert-success"> {{session('success')}}</span>
            @endif
            @if($errors->any())
                <ul  class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
                @endif
                </p>

        <!-- Page Content -->
        <div class="content">
            <!-- Partial Table -->
            <div class="block" style="padding:20px;">
                <form action="" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="form-group col-sm-2">
                            <label for="class_batch_id">Class Batch<font color="#ff0000">*</font></label>
                            <select name="class_batch_id" class="form-control" id="class_batch_id">
                                <option value="">[Choose]</option>
                                @foreach($class_room_batch as $clasBatch)
                                    <option value="{{$clasBatch->id}}" <?php if($clasBatch->id == $class_section->class_batch_id) echo 'selected' ?>>{{$clasBatch->class_room->name}}/{{$clasBatch->batch->name}}</option>
                                @endforeach
                            </select>
                            <i style="font-size: 12px;">Note : Class Batch Not Found? <a target="_blank" href="{{url('admin/add_record')}}">Clear Here</a></i>
                        </div>
                        <div class="form-group col-sm-2">
                            <label for="grade_id">Grade Year<font color="#ff0000">*</font></label>
                            <select name="grade_id" class="form-control" id="grade_id">
                                <option value="">[Choose]</option>
                                @foreach($grades as $sections)
                                    <option value="{{$sections->id}}" @if($sections->id == $class_section->grade_id) selected @endif>{{$sections->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-sm-2">
                            <label for="section_id">Class Section<font color="#ff0000">*</font></label>
                            <select name="section_id" class="form-control" id="section_id">
                                <option value="">[Choose]</option>
                                @foreach($section as $sections)
                                    <option value="{{$sections->id}}" <?php if($sections->id == $class_section->section_id) echo 'selected' ?>>{{$sections->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-2">
                            <label for="shift">Class Shift<font color="#ff0000">*</font></label>
                            <select name="shift" class="form-control" id="shift">
                                <option value="">[Choose]</option>
                                <option value="morning" <?php if($class_section->shift=='morning') echo 'selected' ?>>Morning</option>
                                <option value="day" <?php if($class_section->shift=='day') echo 'selected' ?>>Day</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-2">
                            <label for="shift">Start Date<font color="#ff0000">*</font></label>
                            <input type="text" class="js-datepicker form-control" value="{{$class_section->start_date}}" name="start_date">
                        </div>
                        <div class="form-group col-sm-2">
                            <label for="shift">End Date<font color="#ff0000">*</font></label>
                            <input type="text" class="js-datepicker form-control" value="{{$class_section->end_date}}" name="end_date">
                        </div>
                        <div class="form-group col-sm-4">
                            <button type="submit" class="btn  btn-success">Update</button>
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