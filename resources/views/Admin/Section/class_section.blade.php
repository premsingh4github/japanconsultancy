@extends('Admin.index')
@section('body')
    <!-- Main Container -->
    <main id="main-container">

        <!-- Hero -->
        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-sm-fill h3 my-2">
                        Class Wise Section
                    </h1>
                    <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-alt">
                            <li class="breadcrumb-item">List Class Wise Section</li>
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
                            <label for="class_batch_id">{{__('language.class_batch')}}<font color="#ff0000">*</font></label>
                            <select name="class_batch_id" class="form-control" id="class_batch_id">
                                <option value="">[Choose]</option>
                                @foreach($class_room_batch as $clasBatch)
                                    <option value="{{$clasBatch->id}}">{{$clasBatch->class_room->name}}/{{$clasBatch->batch->name}}</option>
                                @endforeach
                            </select>
                            <i style="font-size: 12px;">Note : {{__('language.class_batch')}} Not Found? <a target="_blank" href="{{url('admin/add_record')}}">Clear Here</a></i>
                        </div>
                        <div class="form-group col-sm-2">
                            <label for="grade_id">{{__('language.grade_year')}}<font color="#ff0000">*</font></label>
                            <select name="grade_id" class="form-control" id="grade_id">
                                <option value="">[Choose]</option>
                                @foreach($grades as $sections)
                                    <option value="{{$sections->id}}">{{$sections->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-2">
                            <label for="section_id">{{__('language.class_section')}}<font color="#ff0000">*</font></label>
                            <select name="section_id" class="form-control" id="section_id">
                                <option value="">[Choose]</option>
                                @foreach($section as $sections)
                                    <option value="{{$sections->id}}">{{$sections->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-2">
                            <label for="shift">{{__('language.class_shift')}}<font color="#ff0000">*</font></label>
                            <select name="shift" class="form-control" id="shift">
                                <option value="">[Choose]</option>
                                <option value="morning">Morning</option>
                                <option value="day">Day</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-2">
                            <label for="shift">{{__('language.start_date')}}<font color="#ff0000">*</font></label>
                            <input type="text" class="form-control js-datepicker " name="start_date">
                        </div>
                        <div class="form-group col-sm-2">
                            <label for="shift">{{__('language.end_date')}}<font color="#ff0000">*</font></label>
                            <input type="text" class="js-datepicker form-control" name="end_date">
                        </div>
                        <div class="form-group col-sm-4">
                            <button type="submit" class="btn  btn-success">{{__('language.create_class_section')}}</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- END Partial Table -->

            <!-- Customers and Latest Orders -->
            <div class="row row-deck">
                <!-- Latest Orders -->
                <div class="col-lg-12">
                    <div class="block block-mode-loading-oneui">
                        <div class="block-header border-bottom">
                            <h3 class="block-title">{{__('language.Class_Wise_Section')}}</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                    <i class="si si-refresh"></i>
                                </button>
                                <button type="button" class="btn-block-option">
                                    <i class="si si-settings"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content block-content-full">
                            <table class="table table-striped table-hover table-borderless table-vcenter font-size-sm mb-0">
                                <thead class="thead-dark">
                                <tr>
                                    <th class="font-w700">SN</th>
                                    <th class="font-w700">{{__('language.class_batch')}}</th>
                                    <th class="font-w700">{{__('language.class_section')}}</th>
                                    <th class="font-w700">{{__('language.class_shift')}}</th>
                                    <th class="font-w700">{{__('language.start_date')}}</th>
                                    <th class="font-w700">{{__('language.end_date')}}</th>
                                    <th class="font-w700">{{__('language.Action')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($class_section as $key=>$section)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$section->class_room_batch->class_room->name}}/{{$section->class_room_batch->batch->name}} @if(isset($section->grade->name)) ({{$section->grade->name}}) @endif</td>
                                    <td>{{$section->class_section->name}}</td>
                                    <td>{{$section->shift}}</td>
                                    <td>{{$section->start_date}}</td>
                                    <td>{{$section->end_date}}</td>
                                    <td>
                                        <a href="{{url('admin/class_section/section_id=').$section->id}}" class="fa fa-edit"></a>
                                        {{--<a href="{{url('admin/list_subject/subject_id=').$subject->id}}.'/delete" onclick="return confirm('Are you sure you want to delete this Record?');"  class="fa fa-trash-alt" style="color: red;"></a>--}}
                                    </td>


                                </tr>
                                    @endforeach
                                </tbody>
                            </table>
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