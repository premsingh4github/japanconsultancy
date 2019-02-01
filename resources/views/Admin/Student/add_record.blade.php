@extends('Admin.index')
@section('body')
    <!-- Main Container -->
    <main id="main-container">

        <!-- Hero -->
        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-sm-fill h3 my-2">
                        Class/Batch Manager
                    </h1>
                    <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-alt">
                            <li class="breadcrumb-item">Add Class/Batch</li>
                            <li class="breadcrumb-item" aria-current="page">
                                <a class="link-fx" href="{{url('admin/list_record')}}">List Class/Batch</a>
                            </li>
                        </ol>
                    </nav>
                </div>
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
                </div>
            </div>
        </div>
        <!-- END Hero -->
        <!-- Page Content -->
        <div class="content">
            <!-- Partial Table -->
            <div class="block" style="padding:10px;">
                <div class="row">
                    <div class="col-sm-4">
                        <span><h4>Create Class Room</h4></span>
                    <form action="{{url('admin/post_class_record')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                            <label for="name">Create Class <font color="#ff0000">*</font></label>
                            <input type="text" class="form-control" id="name" name="name" required="" data-validation-error-msg="news title is required">
                            {{$errors->first('name')}}
                                <button type="submit" class="btn  btn-success">Create Class</button>
                    </form>
                    </div>
                        <div class="col-sm-4">
                            <span><h4>Create Batch Year</h4></span>
                            <form action="{{url('admin/post_batch_record')}}" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <label for="name">Create Batch <font color="#ff0000">*</font></label>
                                <input type="text" class="form-control" id="name" name="name"  required="" data-validation-error-msg="news title is required">
                                {{$errors->first('name')}}
                                <button type="submit" class="btn  btn-success">Create Batch</button>
                            </form>
                        </div>
                        <div class="col-md-4">
                            <span><h4>Create Group</h4></span>
                            <form action="{{url('admin/post_classbatch_record')}}" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                    <label for="class_room_id">Select Class <font color="#ff0000">*</font></label>
                                <select name="class_room_id" class="form-control"  id="">
                                    <option value="">[Select]</option>
                                    @foreach($class as $classroom)
                                        <option value="{{$classroom->id}}">{{$classroom->name}}</option>
                                        @endforeach
                                </select>
                                    <label for="batch_id">Select Batch <font color="#ff0000">*</font></label>
                                <select name="batch_id" class="form-control"  id="">
                                    <option value="">[Select]</option>
                                    @foreach($batch as $batchyear)
                                        <option value="{{$batchyear->id}}">{{$batchyear->name}}</option>
                                    @endforeach
                                </select>
                                <div style="clear: both;"></div>
                                <button type="submit" class="btn  btn-success">Create Group</button>
                            </form>
                        </div>
                    </div>
            </div>
            <!-- END Partial Table -->
        </div>
        <!-- END Page Content -->

    </main>
    <!-- END Main Container -->
@endsection