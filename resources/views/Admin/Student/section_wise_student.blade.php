@extends('Admin.index')
@section('body')
    <!-- Main Container -->
    <main id="main-container">

        <!-- Hero -->
        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-sm-fill h3 my-2">
                       {{__('language.Section_Wise_Students')}}
                    </h1>
                    <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-alt">
                            <li class="breadcrumb-item"> {{__('language.Section_Wise_Students')}}</li>
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
                            <label for="class_section_id">{{__('language.Section')}}<font color="#ff0000">*</font></label>
                            <select name="class_section_id" id="class_section_id" class="form-control">
                                <option value="">[{{__('language.Choose')}}]</option>
                                @foreach($class_section as $section)
                                    <option value="{{$section->id}}">
                                        {{$section->class_room_batch->class_room->name}}({{$section->class_room_batch->batch->name}})-{{$section->class_section->name}}-{{$section->shift}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-9">
                            <label for="student_id">{{__('language.Students')}}<font color="#ff0000">*</font></label>
                            <table class="table table-responsive table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>{{__('language.SN')}}</th>
                                        <th>{{__('language.Student_Name')}}</th>
                                        <th>{{__('language.Student_ID_No')}}</th>
                                        <th>{{__('language.Address')}}</th>
                                        <th>{{__('language.Students')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($Students as $key=>$Student)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{$Student->last_student_name}} {{$Student->first_student_name}}</td>
                                        <td>{{$Student->unique_id}}</td>
                                        <td>{{$Student->address}}</td>
                                        <td><input type="checkbox" name="student_id[{{$Student->id}}]" value="{{$Student->id}}"></td>
                                    </tr>

                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="form-group col-sm-4">
                            <button type="submit" class="btn  btn-success">{{__('language.Save_section')}}</button>
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