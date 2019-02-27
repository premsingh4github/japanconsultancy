@extends('Admin.index')
@section('body')
    <!-- Main Container -->
    <main id="main-container">

        <!-- Hero -->
        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-sm-fill h3 my-2">
                        Update Class Room
                    </h1>
                    <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-alt">
                            <li class="breadcrumb-item" aria-current="page">
                                <a class="link-fx" href="{{url('admin/add_record')}}">Add Class/Batch</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">
                                <a class="link-fx" href="{{url('admin/list_record')}}">List Class/Batch</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- END Hero -->
        <!-- Page Content -->
        <div class="content">
            <!-- Partial Table -->
            <div class="block" style="padding:10px;">
                <div class="row">
                    <div class="col-sm-3">
                        <span><h4>Update Class Room</h4></span>
                    <form action="" method="post">
                    {{csrf_field()}}
                            <label for="name">Class Name<font color="#ff0000">*</font></label>
                            <input type="text" class="form-control" id="name" value="{{$class_room->name}}" name="name" required="" data-validation-error-msg="news title is required">
                                <button type="submit" class="btn  btn-success">Update Class</button>
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