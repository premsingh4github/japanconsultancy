@extends('Admin.index')
@section('style')
    <style>
        .row.row-deck>div>.block{
            min-width: unset;
        }
        /*.attend table{*/
        /*display: inline-block;*/
        /*}*/
        /*.attend div{*/
        /*display: inline-block;*/
        /*text-align: center;*/
        /*width: 40px;*/
        /*}*/
    </style>
@endsection
@section('body')
    <!-- Main Container -->
    <main id="main-container">

        <div class="container" style="background-color: #2196f300;">
            <!-- Hero -->
            <div class="block-content block-content-full">
                <form action="">
                    <div class="row hidden-print">
                        <div class="form-group col-sm-4">
                            <label for="section">{{__('language.Select_Running_Section')}}</label>
                            <select name="section" class="form-control " onchange="javascript:this.form.submit();" id="section">
                                <option value="">{{__('language.Select_Running_Section')}}</option>
                                @foreach($sections as $section)
                                    <option @if(request('section') == $section->id) selected @endif value="{{$section->id}}">({{$section->class_room_batch->class_room->name}}-{{$section->class_room_batch->batch->name}}) {{$section->class_section->name}}-{{$section->shift}} @if(isset($section->grade->name)) ({{$section->grade->name}}) @endif</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="">Select Month</label>
                            <select name="month_name" class="form-control " onchange="javascript:this.form.submit();" id="month_name">
                                @php
                                    $date1 = strtotime($year_start);
                                    $date2 = strtotime($year_end);
                                @endphp
                                @if(request('month_name'))
                                    @while ($date1 <= $date2)
                                        <option value="{{date('Y-m-d', $date1)}}" @if(date('M',strtotime(request('month_name')))==date('M',$date1)) selected @endif>{{date('F-Y', $date1)}}</option>
                                        @php $date1 = strtotime('+1 month', $date1); @endphp
                                    @endwhile
                                @else
                                    @while ($date1 <= $date2)
                                        <option value="{{date('Y-m-d', $date1)}}" @if(date('M')==date('M',$date1)) selected @endif>{{date('F-Y', $date1)}}</option>
                                        @php $date1 = strtotime('+1 month', $date1); @endphp
                                    @endwhile
                                @endif
                            </select>
                            @if(request('page'))
                                <input type="hidden" name="page" value="{{request('page')}}">
                            @endif

                        </div>
                        <div class="form-group col-sm-4" style="text-align: center; float:right;">
                            <table  class="table-bordered table-striped" style="width:100%;">
                                <tr>
                                    <th colspan="4">Index</th>
                                </tr>
                                <tr>
                                    <th>Present</th>
                                    <th>Late</th>
                                    <th>Absent</th>
                                    <th>Holiday</th>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="btn btn-success btn-sm" style="font-size: 9px">0</span>
                                    </td>
                                    <td>
                                        <span class="btn btn-warning btn-sm" style="font-size: 9px">△</span>
                                    </td>
                                    <td>
                                        <i class="fa fa-times btn btn-danger btn-sm" style="font-size: 9px"></i>
                                    </td>
                                    <td style="padding:5px;">
                                        <div style="background-color: lightgray; width:100%; height: 50px;">
                                        </div>
                                    </td>

                                </tr>
                            </table>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <h2 class="attendance_report">{{__('language.Student_Attendance_Report')}}</h2>
                </div>
                <table border="1">
                    <thead  class="thead-dark">
                    <tr>
                        <td colspan="6"> &nbsp;</td>
                        <td >{{__('language.Day')}}</td>
                        <!--- Current Month Showing ---->
                    @php
                        $start_date = $start_at;
                        $end_date = $end_at;
                    @endphp

                    <!--- Section wise Showing ---->
                        {{--@php--}}
                        {{--$start_date = $class_section_student->start_date;--}}
                        {{--$end_date = $class_section_student->end_date;--}}
                        {{--@endphp--}}

                        <td >
                            @if(date('D',strtotime($start_date))=='Sun') {{__('language.sunday')}}
                            @elseif(date('D',strtotime($start_date))=='Mon') {{__('language.monday')}}
                            @elseif(date('D',strtotime($start_date))=='Tue') {{__('language.tuesday')}}
                            @elseif(date('D',strtotime($start_date))=='Wed') {{__('language.wednesday')}}
                            @elseif(date('D',strtotime($start_date))=='Thu') {{__('language.thursday')}}
                            @elseif(date('D',strtotime($start_date))=='Fri') {{__('language.friday')}}
                            @elseif(date('D',strtotime($start_date))=='Sat') {{__('language.saturday')}}
                            @endif
                        </td>
                        @while($start_date != $end_date)
                            @php $start_date = date('Y-m-d',strtotime("+1 day", strtotime($start_date)))  @endphp
                            <td >
                                @if(date('D',strtotime($start_date))=='Sun') {{__('language.sunday')}}
                                @elseif(date('D',strtotime($start_date))=='Mon') {{__('language.monday')}}
                                @elseif(date('D',strtotime($start_date))=='Tue') {{__('language.tuesday')}}
                                @elseif(date('D',strtotime($start_date))=='Wed') {{__('language.wednesday')}}
                                @elseif(date('D',strtotime($start_date))=='Thu') {{__('language.thursday')}}
                                @elseif(date('D',strtotime($start_date))=='Fri') {{__('language.friday')}}
                                @elseif(date('D',strtotime($start_date))=='Sat') {{__('language.saturday')}}
                                @endif
                            </td>
                        @endwhile
                    </tr>
                    <tr>
                        <th >{{__('language.SN')}}</th>
                        <th >{{__('language.Student_ID_No')}}</th>
                        <th class="font-w700">{{__('language.Photo')}}</th>
                        <th class="font-w700">{{__('language.Student_Name')}}</th>
                        <th class="font-w700">
                            <div style="display: block; width:120px;">
                                {{__('language.Japanese_Name')}}
                            </div>
                        </th>
                        <th class="font-w700">{{__('language.Sex')}}</th>
                        <th class="font-w700">{{__('language.Period')}}</th>
                        <th class="font-w700">
                            <!--- Current Month Showing ---->
                            <div class="day-group-month">
                                @if(date('M',strtotime($start_at))=='Jan') {{__('language.Jan')}}
                                @elseif(date('M',strtotime($start_at))=='Feb') {{__('language.Feb')}}
                                @elseif(date('M',strtotime($start_at))=='Mar') {{__('language.Mar')}}
                                @elseif(date('M',strtotime($start_at))=='Apr') {{__('language.Apr')}}
                                @elseif(date('M',strtotime($start_at))=='May') {{__('language.May')}}
                                @elseif(date('M',strtotime($start_at))=='Jun') {{__('language.Jun')}}
                                @elseif(date('M',strtotime($start_at))=='Jul') {{__('language.Jul')}}
                                @elseif(date('M',strtotime($start_at))=='Aug') {{__('language.Aug')}}
                                @elseif(date('M',strtotime($start_at))=='Sep') {{__('language.Sep')}}
                                @elseif(date('M',strtotime($start_at))=='Oct') {{__('language.Oct')}}
                                @elseif(date('M',strtotime($start_at))=='Nov') {{__('language.Nov')}}
                                @elseif(date('M',strtotime($start_at))=='Dec') {{__('language.Dec')}}
                                @endif
                                {{date('d',strtotime($start_at))}}
                                @php $daycount = 1; @endphp
                            </div>
                            <!--- Current Month Showing ---->

                            <!--- Section wise Showing ---->
                        {{--<div class="day-group-month">--}}
                        {{--@if(date('M',strtotime($class_section_student->start_date))=='Jan') {{__('language.Jan')}}--}}
                        {{--@elseif(date('M',strtotime($class_section_student->start_date))=='Feb') {{__('language.Feb')}}--}}
                        {{--@elseif(date('M',strtotime($class_section_student->start_date))=='Mar') {{__('language.Mar')}}--}}
                        {{--@elseif(date('M',strtotime($class_section_student->start_date))=='Apr') {{__('language.Apr')}}--}}
                        {{--@elseif(date('M',strtotime($class_section_student->start_date))=='May') {{__('language.May')}}--}}
                        {{--@elseif(date('M',strtotime($class_section_student->start_date))=='Jun') {{__('language.Jun')}}--}}
                        {{--@elseif(date('M',strtotime($class_section_student->start_date))=='Jul') {{__('language.Jul')}}--}}
                        {{--@elseif(date('M',strtotime($class_section_student->start_date))=='Aug') {{__('language.Aug')}}--}}
                        {{--@elseif(date('M',strtotime($class_section_student->start_date))=='Sep') {{__('language.Sep')}}--}}
                        {{--@elseif(date('M',strtotime($class_section_student->start_date))=='Oct') {{__('language.Oct')}}--}}
                        {{--@elseif(date('M',strtotime($class_section_student->start_date))=='Nov') {{__('language.Nov')}}--}}
                        {{--@elseif(date('M',strtotime($class_section_student->start_date))=='Dec') {{__('language.Dec')}}--}}
                        {{--@endif--}}
                        {{--{{date('d',strtotime($class_section_student->start_date))}}--}}
                        {{--@php $daycount = 1; @endphp--}}
                        {{--</div>--}}
                        <!--- Section wise Showing ---->
                        </th>
                        <!--- Current Month Showing ---->
                    @php
                        $start_date = $start_at;
                        $end_date = $end_at;
                    @endphp

                    <!--- Section wise Showing ---->
                        {{--@php--}}
                        {{--$start_date = $class_section_student->start_date;--}}
                        {{--$end_date = $class_section_student->end_date;--}}
                        {{--@endphp--}}
                        @while($start_date != $end_date)
                            @php $start_date = date('Y-m-d',strtotime("+1 day", strtotime($start_date)))  @endphp
                            <th class="font-w700">
                                <div class="day-group-month">

                                    {{--{{date('M d',strtotime($start_date))}}--}}
                                    @if(date('M',strtotime($start_date))=='Jan') {{__('language.Jan')}}
                                    @elseif(date('M',strtotime($start_date))=='Feb') {{__('language.Feb')}}
                                    @elseif(date('M',strtotime($start_date))=='Mar') {{__('language.Mar')}}
                                    @elseif(date('M',strtotime($start_date))=='Apr') {{__('language.Apr')}}
                                    @elseif(date('M',strtotime($start_date))=='May') {{__('language.May')}}
                                    @elseif(date('M',strtotime($start_date))=='Jun') {{__('language.Jun')}}
                                    @elseif(date('M',strtotime($start_date))=='Jul') {{__('language.Jul')}}
                                    @elseif(date('M',strtotime($start_date))=='Aug') {{__('language.Aug')}}
                                    @elseif(date('M',strtotime($start_date))=='Sep') {{__('language.Sep')}}
                                    @elseif(date('M',strtotime($start_date))=='Oct') {{__('language.Oct')}}
                                    @elseif(date('M',strtotime($start_date))=='Nov') {{__('language.Nov')}}
                                    @elseif(date('M',strtotime($start_date))=='Dec') {{__('language.Dec')}}
                                    {{--                                @elseif(date('M',strtotime($start_date))=='Dec') {{__('language.Dec')}}--}}
                                    @endif
                                    {{date('d',strtotime($start_date))}}


                                </div>
                            </th>
                            @php $daycount += 1; @endphp
                        @endwhile
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($students as $classSectionStudent)
                        @php $student = $classSectionStudent->student @endphp
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$student->unique_id}}</td>
                            <td>
                                @if(isset($student->photo))
                                    <img src="{{url('public/photos/'.$student->photo)}}" alt="" style="background-color: #fff; width:65px;  border: 2px solid lightgrey; border-radius: 50%; padding:2px;">
                                @else
                                    <img src="{{url('photos/avatar.jpg')}}" alt="" class="" style="background-color: #fff; width:65px;  border: 2px solid lightgrey; border-radius: 50%; padding:2px;">
                                @endif
                            </td>
                            <td>{{$student->last_student_name}} {{$student->first_student_name}}</td>
                            <td>{{$student->last_student_japanese_name}} {{$student->first_student_japanese_name}}</td>
                            <td>
                                @if($student->student_sex == 'm')男
                                @elseif($student->student_sex == 'f')女
                                @else
                                    その他の
                                @endif
                            </td>
                            <td>
                                <table>
                                    @foreach($class_section_student->class_batch_section_periods as $section_period)
                                        <tr>
                                            <td>{{$section_period->period->name}}</td>
                                        </tr>
                                    @endforeach
                                </table>
                            </td>
                            <td colspan="{{$daycount}}">
                                <table>
                                    <tr>
                                        <div id="attend_{{$student->id}}" class="attend" data-student_id="{{$student->id}}" data-session_start="{{date('Y-m-01',strtotime($start_date))}}" data-session_end="{{date('Y-m-t',strtotime($end_date))}}">Loading</div>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    @endforeach
                    @php $colspan = $daycount+7; @endphp
                    <tr>
                        <td colspan="{{$colspan}}">
                            {{$students->appends(['section'=>request('section')])->appends(['month_name'=>request('month_name')])->links()}}
                        </td>
                    </tr>
                    </tbody>
                </table>

            </div>

        </div>
        <!-- END Main Container -->
    </main>
@endsection
@section('script')
    <script>
        $(document).ready(function () {

            $('.attend').each(function (i,ls) {
                var section = "{{request('section')}}";
                $(ls).data('student_id');
                $(ls).data('session_start');
                $(ls).data('session_end');
                $.ajax({
                    url: Laravel.url + "/getattendacelist/"+section+"/"+$(ls).data('student_id')+"/"+$(ls).data('session_start')+"/"+$(ls).data('session_end'),
                    method:"GET",
                    success: function (data, textStatus, request) {

                        $('#attend_'+request.getResponseHeader('id')).html(data);
                        // $("#"+data['id']).html(data['status']);
                    },
                    error: function (error) {
                        debugger;
                    }

                });
            });
        });
        function sectionChanged(btn) {
            var url = '{{url('attendance_list')}}'
            if(parseInt($(btn).val()) > 0){
                url += "?section="+parseInt($(btn).val());
            }
            window.location  = url;
        }
        function monthChanged(btn) {
            var url = '{{url('attendance_list')}}'
            if(parseInt($(btn).val()) > 0){
                url += "?month_name="+parseInt($(btn).val());
            }
            window.location  = url;
        }
        function getExcel() {
            var section_id = parseInt($('#section').val());
            var url = '{{url('section_attendance_excel')}}'
            if(section_id > 0){
                url += "?section_attendance_excel="+section_id;
            }
            window.location  = url;
            // $.ajax({
            //     url: Laravel.url +"/section_attendance_excel/"+section_id,
            //     method:"GET",
            //     success:function(data){
            //     }
            // });
        }


        function changeAttendace(form){
            $.ajax({
                url: form.action,
                method: form.method,
                data: $(form).serialize(),
                success: function (data, textStatus, request) {
                    if(request.getResponseHeader('old_status') != undefined){
                        $('#'+request.getResponseHeader('old_status')).html(data);
                    }
                    else if(request.getResponseHeader('id') != undefined){
                        $('#'+request.getResponseHeader('id')).html(data);
                    }
                    else if(request.getResponseHeader('new_attendance') != undefined){
                        $('#'+request.getResponseHeader('new_attendance')).parent().parent().html(data)
                    }

                    debugger;
                },
                error : function (error) {
                    debugger;
                }
            });
            debugger;
            return false;
        }

    </script>
@endsection