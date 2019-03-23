@extends('Admin.index')
@section('body')
    <!-- Main Container -->
    <main id="main-container">

        <!-- Hero -->
        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-sm-fill h3 my-2">
                        {{__('language.Batch_Wise_Subject')}}
                    </h1>
                    <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-alt">
                            <li class="breadcrumb-item">{{__('language.Batch_Wise_Subject')}}</li>
                            {{--<li class="breadcrumb-item" aria-current="page">--}}
                                {{--<a class="link-fx" href="{{url('admin/list_section')}}">List Section</a>--}}
                            {{--</li>--}}
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
            <div class="block" style="padding:20px;">
                <form action="" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="form-group col-sm-3">
                            <label for="class_batch_id">{{__('language.Batch')}}<font color="#ff0000">*</font></label>
                            <select name="class_batch_id" id="class_batch_id" class="form-control">
                                <option value="">[{{__('language.Choose')}}]</option>
                                @foreach($class_batch as $classBatch)
                                    <option value="{{$classBatch->id}}">
                                        {{$classBatch->class_room->name}}({{$classBatch->batch->name}})
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-9">
                            <label for="subject_id">{{__('language.Subjects')}}<font color="#ff0000">*</font></label>
                            <table class="table table-responsive table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>{{__('language.SN')}}</th>
                                        <th>{{__('language.Subject_Name')}}</th>
                                        <th>{{__('language.Select')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($subjects as $key=>$subject)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{$subject->name}}</td>
                                        <td><input type="checkbox" name="subject_id[]" value="{{$subject->id}}"></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="form-group col-sm-4">
                            <button type="submit" class="btn  btn-success">{{__('language.Save_Subject')}}</button>
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