@extends('Admin.index')
@section('body')
    <!-- Main Container -->
    <main id="main-container">

        <!-- Hero -->
        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-sm-fill h3 my-2">
                        {{__('language.Section_Wise_Period')}}
                    </h1>
                    <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-alt">
                            <li class="breadcrumb-item">{{__('language.List_Exist_Section')}}</li>
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
                        <div class="form-group col-sm-4">
                            <label for="c_b_s_id">{{__('language.Class_Batch')}}<font color="#ff0000">*</font></label>
                            <select name="c_b_s_id" class="form-control" id="c_b_s_id">
                                <option value="">[Choose]</option>
                                @foreach($classBatchSections as $section)
                                    <option value="{{$section->id}}">({{$section->class_room_batch->class_room->name}}-{{$section->class_room_batch->batch->name}}) {{$section->class_section->name}}-{{$section->shift}} @if(isset($section->grade->name)) ({{$section->grade->name}}) @endif</option>
                                @endforeach
                            </select>
                            <i style="font-size: 12px;">Note : Class Batch Section Not Found? <a target="_blank" href="{{url('admin/class_section')}}">Click Here</a></i>
                        </div>
                        <div class="form-group col-sm-2">
                            <label for="period_id">{{__('language.Period')}}<font color="#ff0000">*</font></label>
                            <select name="period_id" class="form-control" id="period_id">
                                <option value="">[Choose]</option>
                                @foreach($periods as $period)
                                    <option value="{{$period->id}}">{{$period->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="shift">{{__('language.Start_Time')}}<font color="#ff0000">*</font></label>
                            <input type="time" name="start_at" class="form-control">
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="end_at">{{__('language.End_Time')}}<font color="#ff0000">*</font></label>
                            <input type="time" class="form-control" name="end_at">
                        </div>
                        <div class="form-group col-sm-4">
                            <button type="submit" class="btn  btn-success">{{__('language.Create_Section_Wise_Period')}}</button>
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
                            <h3 class="block-title">Class Wise Section Record</h3>
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
                            <table class="table table-striped table-hover table-borderless table-vcenter font-size-sm mb-0 js-dataTable-buttons">
                                <thead class="thead-dark">
                                <tr>
                                    <th class="font-w700">{{__('language.S_N')}}</th>
                                    <th class="font-w700">{{__('language.Class_Batch_Group')}}</th>
                                    <th class="font-w700">{{__('language.Period_Name')}}</th>
                                    <th class="font-w700">{{__('language.Start_Time')}}</th>
                                    <th class="font-w700">{{__('language.End_Time')}}</th>
                                    <th class="font-w700">{{__('language.Action')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($class_batch_section_periods as $key=>$class_batch_section_period)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>
                                        @php $section = $class_batch_section_period->classBatchSection  @endphp
                                        ({{$section->class_room_batch->class_room->name}}-{{$section->class_room_batch->batch->name}}) {{$section->class_section->name}}-{{$section->shift}} @if(isset($section->grade->name)) ({{$section->grade->name}}) @endif
                                    </td>
                                    <td>{{$class_batch_section_period->period->name}}</td>
                                    <td>{{$class_batch_section_period->start_at}}</td>
                                    <td>{{$class_batch_section_period->end_at}}</td>
                                    <td>
                                        <a href="{{url('admin/section_period/section_period_id=').$class_batch_section_period->id}}" class="fa fa-edit"></a>
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