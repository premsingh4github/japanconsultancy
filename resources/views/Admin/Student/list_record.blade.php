@extends('Admin.index')
@section('body')
    <!-- Main Container -->
    <main id="main-container">
        <!-- Page Content -->
        <div class="content" style="margin-top:50px;">

            <!-- Customers and Latest Orders -->
            <div class="row row-deck">
                <!-- Latest Orders -->
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

                <div class="col-lg-12">
                    <div class="block block-mode-loading-oneui">
                        <div class="block-header border-bottom">
                            <div class="block-options">
                                <h1 class="flex-sm-fill h3 my-2">
                                    {{__('language.Class_batch_manger')}}
                                </h1>
                                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                                    <ol class="breadcrumb breadcrumb-alt">
                                        <li class="breadcrumb-item">{{__('language.Class_batch_manger')}}</li>
                                        <li class="breadcrumb-item" aria-current="page">
                                            <a class="link-fx" href="{{url('admin/add_record')}}">{{__('language.Add_Record')}}</a>
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                        <div class="block-content block-content-full">
                            <div class="row">
                                <!--<div class="col-sm-4">-->
                                <!--    <h4>{{__('language.class_room_status')}}</h4>-->
                                <!--    <table class="table table-responsive table-bordered table-striped">-->
                                <!--        <thead>-->
                                <!--        <tr>-->
                                <!--            <th>{{__('language.SN')}}</th>-->
                                <!--            <th>{{__('language.Class_Name')}}</th>-->
                                <!--            <th>{{__('language.Action')}}</th>-->
                                <!--        </tr>-->
                                <!--        </thead>-->
                                <!--        <tbody>-->
                                <!--        @foreach($class_room as $key=>$clasRooms)-->
                                <!--            <tr>-->
                                <!--                <td>{{++$key}}</td>-->
                                <!--                <td>{{$clasRooms->name}}</td>-->
                                <!--                <td>-->
                                <!--                    <a href="{{url('admin/list_record/').'/'.$clasRooms->id.'/edit_class_room'}}" class="btn btn-primary btn-sm">Edit</a>-->
                                <!--                </td>-->
                                <!--            </tr>-->
                                <!--        @endforeach-->
                                <!--        </tbody>-->
                                <!--    </table>-->
                                <!--</div>-->
                                <!--<div class="col-sm-4">-->
                                <!--    <h4>{{__('language.batch_year_status')}}</h4>-->
                                <!--    <table class="table table-responsive table-bordered table-striped">-->
                                <!--        <thead>-->
                                <!--        <tr>-->
                                <!--            <th>{{__('language.SN')}}</th>-->
                                <!--            <th>{{__('language.Batch_Year')}}</th>-->
                                <!--            <th>{{__('language.Action')}}</th>-->
                                <!--        </tr>-->
                                <!--        </thead>-->
                                <!--        <tbody>-->
                                <!--        @foreach($batch as $key=>$batches)-->
                                <!--            <tr>-->
                                <!--                <td>{{++$key}}</td>-->
                                <!--                <td>{{$batches->name}}</td>-->
                                <!--                <td>-->
                                <!--                    <a href="" disabled="disabled" class="btn btn-primary btn-sm">Edit</a>-->
                                <!--                </td>-->
                                <!--            </tr>-->
                                <!--        @endforeach-->
                                <!--        </tbody>-->
                                <!--    </table>-->

                                <!--</div>-->
                                <div class="col-sm-4">
                                    <h4>{{__('language.Class_Batch_Group')}}</h4>
                                    <table class="table table-responsive table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>{{__('language.SN')}}</th>
                                            <th>{{__('language.Class_Name')}}</th>
                                            <th>{{__('language.Batch_Year')}}</th>
                                            <th>{{__('language.Action')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($class_batch as $key=>$classBatch)
                                            <tr>
                                                <td>{{++$key}}</td>
                                                <td>{{$classBatch->class_room->name}}</td>
                                                <td>{{$classBatch->batch->name}}</td>
                                                <td>
                                                    <a href=""  disabled="disabled" class="btn btn-primary btn-sm">Edit</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- END Latest Orders -->
            </div>
            <!-- END Customers and Latest Orders -->
        </div>
        <!-- END Page Content -->

    </main>
    <!-- END Main Container -->
@endsection