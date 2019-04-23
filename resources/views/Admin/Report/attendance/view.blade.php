<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{url('public/favcon(2).png')}}">
    <title>
        @if(isset($title))
            {!! $title !!}
        @else
            Admin Panel
        @endif
    </title>
    <style type="text/css">
        table.main {
            width: 300px;
            border: 1px solid black;
            background-color: #9dffff;
        }
        table.main td {
            vertical-align: top;
            font-family: verdana,arial, helvetica,  sans-serif;
            font-size: 11px;
        }
        table.main th {
            border-width: 1px 1px 1px 1px;
            padding: 0px 0px 0px 0px;
            background-color: #ccb4cd;
        }
        table.main a{TEXT-DECORATION: none;}
        table,td{ border: 1px solid #ffffff }
    </style>
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

    <link rel="stylesheet" href="{{asset('public/server')}}/assets/js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css" /> </head>


<link rel="stylesheet" href="{{asset('public/server')}}/assets/css/custom.css">
<link rel="stylesheet" href="{{asset('public/server')}}/assets/js/plugins/datatables/dataTables.bootstrap4.css">
<link rel="stylesheet" href="{{asset('public/server')}}/assets/js/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.css">
{{--<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">--}}

<!-- Icons -->
<!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
<link rel="apple-touch-icon" sizes="180x180" href="{{asset('public/server')}}/assets/media/favicons/apple-touch-icon-180x180.png">
<!-- END Icons -->
<!-- Page JS Plugins CSS -->
<link rel="stylesheet" href="{{asset('public/server')}}/assets/js/plugins/summernote/summernote-bs4.css">
<link rel="stylesheet" href="{{asset('public/server')}}/assets/js/plugins/simplemde/simplemde.min.css">

<!-- Stylesheets -->
<!-- Fonts and OneUI framework -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700">
<link rel="stylesheet" id="css-main" href="{{asset('public/server')}}/assets/css/oneui.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/css/tempusdominus-bootstrap-4.min.css" />
<style>
    .report_section{
        margin:30px 0;
        padding:10px;
        /*background-color: #fff;*/
        /*border:1px solid lightgrey;*/
        width: 100%;
    }
    .day-group{
        display: inline-block;
        width: 50px !important;
        border-right: solid 1px grey;
        text-align: center;
        font-size: 16px;

    }
    .day-group-month{
        display: inline-block;
        width: 50px;
        text-align: center;
        font-size: 14px;
    }
    .day-group div{
        display: block;

    }

</style>
<body>


<div class="container-fluid">
    <div class="report_section">
        <div class="row">
            <div class="col-sm-12">
                <table border="1">
                    <thead>
                    <tr>
                            @if(request('c_b_s_id'))
                                @php $sections = \App\ClassBatchSection::where('id',request('c_b_s_id'))->get(); @endphp
                                @foreach($sections as $section)
                                <th>
                                ({{$section->class_room_batch->class_room->name}}-{{$section->class_room_batch->batch->name}}) {{$section->class_section->name}}-{{$section->shift}}
                                </th>
                            @endforeach
                            @endif
                            @if(request('student_number'))
                                @php $students = \App\Student::where('student_number',request('student_number'))->get(); @endphp
                                @foreach($students as $student)
                                <th>
                                {{$student->first_student_name}} {{$student->last_student_name}} | {{$student->first_student_japanese_name}} {{$student->last_student_japanese_name}}
                                </th>
                            @endforeach
                            @endif
                            @if(request('from_date') && request('to_date'))
                            <th>From : {{request('from_date')}} To : {{request('to_date')}}</th>
                                @elseif(request('from_date'))
                            <th>Dated On : {{request('from_date')}}</th>
                                @elseif(request('to_date'))
                            <th>Till : {{request('to_date')}}</th>
                            @endif
                    </tr>
                    </thead>
                </table>
                <table border="1">
                    <thead  class="thead-dark">
                    <tr>
                        <td colspan="6"></td>
                        <td >{{__('language.Day')}}</td>
                        @if(request('from_date') && request('to_date'))
                            @php
                                $start_date = request('from_date');
                                $end_date = request('to_date');
                            @endphp
                        @elseif(request('from_date'))
                            @php
                                $start_date = request('from_date');
                            $end_date = $class_section_student->end_date;
                            @endphp
                        @elseif(request('to_date'))
                            @php
                                $start_date = $class_section_student->start_date;
                                    $end_date = request('to_date');
                            @endphp
                            @else
                            <?php
                            $start_date = $class_section_student->start_date;
                            $end_date = $class_section_student->end_date;
                            ?>

                        @endif
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
                        <td style="width:50px;"> &nbsp;</td>
                        <td colspan="7">
                            Attendance Calculation
                        </td>
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
                            @if(request('from_date') && request('to_date'))
                                @php
                                    $start_date = request('from_date');
                                    $end_date = request('to_date');
                                @endphp
                            @elseif(request('from_date'))
                                @php
                                    $start_date = request('from_date');
                                $end_date = $class_section_student->end_date;
                                @endphp
                            @elseif(request('to_date'))
                                @php
                                    $start_date = $class_section_student->start_date;
                                        $end_date = request('to_date');
                                @endphp
                            @else
                                <?php
                                $start_date = $class_section_student->start_date;
                                $end_date = $class_section_student->end_date;
                                ?>

                            @endif

                            <div class="day-group-month">
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
                                @endif
                                {{date('d',strtotime($start_date))}} @php $daycount = 1; @endphp
                            </div>
                        </th>
                        @if(request('from_date') && request('to_date'))
                            @php
                                $start_date = request('from_date');
                                $end_date = request('to_date');
                            @endphp
                        @elseif(request('from_date'))
                            @php
                                $start_date = request('from_date');
                            $end_date = $class_section_student->end_date;
                            @endphp
                        @elseif(request('to_date'))
                            @php
                                $start_date = $class_section_student->start_date;
                                    $end_date = request('to_date');
                            @endphp
                        @else
                            <?php
                            $start_date = $class_section_student->start_date;
                            $end_date = $class_section_student->end_date;
                            ?>

                        @endif
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
                        <th style="width:50px;"></th>
                        <th>欠席合計(Total absence)</th>
                        <th>欠席(ABSENCE)</th>
                        <th>遅刻(LATE)</th>
                        <th>早退(Leave early)</th>
                        <th>出席(ATTENDANCE)</th>
                        <th>出席率(ATTENDANCE %)</th>
                        <th>時数・日数(HOURS/DAY)</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $students = $class_section_student->class_section_students;
                    @endphp
                    @foreach($students as $classSectionStudent)
                        @php $student = $classSectionStudent->student;
                        @endphp
                        @if(request('student_number'))
                            @if($student->student_number==request('student_number'))
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
                                {{--@foreach($students->classSections as $section)--}}
                                {{--{{$section->class_section}}--}}
                                {{--{{$section->class_section->class_section->name}}--}}
                                {{--@endforeach--}}
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
                                        <div id="attendance_{{$student->id}}" class="attendance" data-student_id="{{$student->id}}">Loading</div>
                                    </tr>
                                </table>
                            </td>
                            <td></td>
                            <td>
                                <table >
                                    @foreach($class_section_student->class_batch_section_periods as $section_period)
                                        @php
                                            $attendance = \App\Attendance::where('student_id',$student->id)->where('created_at','>=',date('Y-m-d H:i',strtotime($start_date)) )->where('created_at','<=',date('Y-m-d 23:59:59',strtotime($end_date)))->get();
                                        @endphp
                                        <tr>
                                            <td>
                                                {{--{{count($attendance)}}--}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </td>
                        </tr>
                                @endif
                        @else
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
                                {{--@foreach($students->classSections as $section)--}}
                                {{--{{$section->class_section}}--}}
                                {{--{{$section->class_section->class_section->name}}--}}
                                {{--@endforeach--}}
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
                                        <div id="attendance_{{$student->id}}" class="attendance" data-student_id="{{$student->id}}">Loading</div>
                                    </tr>
                                </table>
                            </td>
                            <td> </td>
                            <td id="total_absent_{{$student->id}}">
                            </td>
                            <td id="absent_{{$student->id}}">
                            </td>
                            <td id="late_{{$student->id}}">
                            </td>
                            <td id="early_{{$student->id}}">
                            </td>
                            <td id="atten_{{$student->id}}">
                            </td>
                            <td id="attendance_p_{{$student->id}}">
                            </td>
                            <td id="hours_per_day_{{$student->id}}">
                            </td>
                        </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('.attendance').each(function (i,ls) {
            var section = "{{request('c_b_s_id')}}";
            var from_date ="{{request('from_date')}}";
            var to_date ="{{request('to_date')}}";
            $(ls).data('student_id');
            $.ajax({
                url:   "attendance_report/"+section+"/"+$(ls).data('student_id')+"/"+from_date+"/"+to_date,
                method:"GET",
                success: function (data, textStatus, request) {

                    $('#attendance_'+request.getResponseHeader('id')).html(data);
                    $('#total_absent_'+request.getResponseHeader('id')).html($('#attendance_'+request.getResponseHeader('id')).find('.btn-danger').length);
                    $('#late_'+request.getResponseHeader('id')).html($('#attendance_'+request.getResponseHeader('id')).find('.btn-warning').length);
                    $('#atten_'+request.getResponseHeader('id')).html($('#attendance_'+request.getResponseHeader('id')).find('.btn-success').length);
                    var total = $('#attendance_'+request.getResponseHeader('id')).find('.btn').length ;
                    var absent =  parseInt($('#total_absent_'+request.getResponseHeader('id')).html());

                    var percent = parseFloat(((total - absent) * 100)/total).toFixed( 2 ) ;

                    $('#attendance_p_'+request.getResponseHeader('id')).html(percent + " %");
                    $('#absent_'+request.getResponseHeader('id')).html($('#attendance_'+request.getResponseHeader('id')).find('.btn-danger').length);


                    // $("#"+data['id']).html(data['status']);
                },
                error: function (error) {
                    debugger;
                }

            });
        });
    });

</script>

<!-- END Page Container -->
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>


<script src="{{asset('public/js/custom.js')}}"></script>

{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>--}}

<script src="{{asset('public/server')}}/assets/js/oneui.core.min.js"></script>

<script src="{{asset('public/server')}}/assets/js/oneui.app.min.js"></script>
{{--<script src="{{asset('public/server')}}/assets/js/plugins/datatables/jquery.dataTables.min.js"></script>--}}
{{--<script src="{{asset('public/server')}}/assets/js/plugins/datatables/dataTables.bootstrap4.min.js"></script>--}}
{{--<script src="{{asset('public/server')}}/assets/js/plugins/datatables/buttons/dataTables.buttons.min.js"></script>--}}
{{--<script src="{{asset('public/server')}}/assets/js/plugins/datatables/buttons/buttons.print.min.js"></script>--}}
{{--<script src="{{asset('public/server')}}/assets/js/plugins/datatables/buttons/buttons.html5.min.js"></script>--}}
{{--<script src="{{asset('public/server')}}/assets/js/plugins/datatables/buttons/buttons.flash.min.js"></script>--}}
{{--<script src="{{asset('public/server')}}/assets/js/plugins/datatables/buttons/buttons.colVis.min.js"></script>--}}

<!-- Page JS Code -->
{{--<script src="{{asset('public/server')}}/assets/js/pages/be_tables_datatables.min.js"></script>--}}
<script src="{{asset('public/server')}}/assets/js/custom.js"></script>
<!-- Page JS Plugins -->
{{--<script src="{{asset('public/server')}}/assets/js/plugins/summernote/summernote-bs4.min.js"></script>--}}
{{--<script src="{{asset('public/server')}}/assets/js/plugins/ckeditor/ckeditor.js"></script>--}}
{{--<script src="{{asset('public/server')}}/assets/js/plugins/simplemde/simplemde.min.js"></script>--}}
<!-- Page JS Plugins -->
<script src="{{asset('public/server')}}/assets/js/plugins/chart.js/Chart.bundle.min.js"></script>

<!-- Page JS Code -->
<script src="{{asset('public/server')}}/assets/js/pages/be_pages_dashboard.min.js"></script>
{{--<script>jQuery(function(){ One.helpers(['summernote', 'ckeditor', 'simplemde']); });</script>--}}
{{--<script src="{{asset('public/server')}}/assets/js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>--}}
{{--<script>jQuery(function(){ One.helpers(['datepicker', 'colorpicker', 'maxlength', 'select2', 'masked-inputs', 'rangeslider']); });</script>--}}
{{--<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>--}}
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
{{--<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>--}}
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/js/tempusdominus-bootstrap-4.min.js"></script>


</body>
</html>



