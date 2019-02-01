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
                            <li class="breadcrumb-item">Class/Batch Manager</li>
                            <li class="breadcrumb-item" aria-current="page">
                                <a class="link-fx" href="{{url('admin/add_record')}}">Add Record</a>
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
            <div class="row">
                <div class="col-sm-3">
                    <h4>Class Room Status</h4>
                    <table class="table table-responsive table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>SN</th>
                            <th>Class Name</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($class_room as $key=>$clasRooms)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$clasRooms->name}}</td>
                            <td>
                                <a href="" class="btn btn-primary btn-sm">Edit</a>
                            </td>
                        </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-sm-3">
                    <h4>Batch Year Status</h4>
                    <table class="table table-responsive table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>SN</th>
                            <th>Batch Year</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($batch as $key=>$batches)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$batches->name}}</td>
                                <td>
                                    <a href="" class="btn btn-primary btn-sm">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
                <div class="col-sm-6">
                    <h4>Class/Batch Group</h4>
                    <table class="table table-responsive table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>SN</th>
                            <th>Class Name</th>
                            <th>Batch Year</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($class_batch as $key=>$classBatch)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$classBatch->class_room->name}}</td>
                            <td>{{$classBatch->batch->name}}</td>
                            <td>
                                <a href="" class="btn btn-primary btn-sm">Edit</a>
                            </td>
                        </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <!-- END Page Content -->

    </main>
    <!-- END Main Container -->
@endsection