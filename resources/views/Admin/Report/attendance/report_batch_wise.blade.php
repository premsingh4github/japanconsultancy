@extends('Admin.index')
@section('body')
    <!-- Main Container -->
    <main id="main-container">

        <!-- Hero -->
        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-sm-fill h3 my-2">
                       Batch Wise {{__('language.report_attendance')}}
                    </h1>
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
                <form action="" method="get">
                    <div class="row">
                        <div class="form-group col-sm-3">
                            <label for="student_of_year">{{__('language.Select_Running_Section')}}</label>
                            <select  name="student_of_year" id="student_of_year" class="form-control">
                                <option value="">{{__('language.student_year')}}</option>
                                <option @if(request('student_of_year') == '第1学年') selected @endif value="第1学年">第1学年</option>
                                <option @if(request('student_of_year') == '第2学年') selected @endif value="第2学年">第2学年</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="period_id">Date Duration</label>
                            <div class="row">
                                <div class="col-sm-6">
                                    <input type="text" name="from_date" class="js-datepicker form-control" value="@if(request('from_date')){{request('from_date')}} @else {{$start_date}} @endif"   data-week-start="1" data-autoclose="true" data-today-highlight="true" data-date-format="yyyy-mm-dd" placeholder="From Date" required>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text"  name="to_date" class="js-datepicker form-control" value="@if(request('to_date')){{request('to_date')}} @else {{$end_date}} @endif" data-week-start="1" data-autoclose="true" data-today-highlight="true" data-date-format="yyyy-mm-dd" placeholder="To Date" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-sm-12">
                            <button type="submit" class="btn  btn-primary btn-xs">Show</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="block" style="padding:20px;">
                <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons dataTable no-footer">
                    <thead>
                    <tr>
                        <th>{{__('language.SN')}}</th>
                        <th>Class</th>
                        <th>Student Number</th>
                        <th>Name (in Eng)</th>
                        <th>Name (in Jpn)</th>
                        <th>Attendance(%)</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($students as $key=>$student)
                        <tr style="font-size:12px;">
                            <td>{{++$key}}</td>
                            <td>
                                {{$student->class_room_batch->class_room->name}}-{{$student->class_room_batch->batch->name}}
                            </td>
                            <td>
                                {{$student->student_number}}
                            </td>
                            <td>{{$student->last_student_name}} {{$student->first_student_name}}</td>
                            <td>{{$student->last_student_japanese_name}} {{$student->first_student_japanese_name}}</td>
                            <td>
                            @php
                                $attends = \App\Attendance::where('student_id',$student->id)->whereBetween("attendance_for",[$start_date, $end_date])->where('type','1')->count();
                            $average_attend = round(($attends*100)/$total_study_day,2);
                            @endphp
                                @if(($attends) > 0)
                                    {{$average_attend}}%
                                @else
                                    0%
                                @endif

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- END Partial Table -->
        </div>
        <!-- END Page Content -->

    </main>
    <!-- END Main Container -->
@endsection
