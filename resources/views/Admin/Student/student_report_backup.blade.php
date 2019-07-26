@extends('Admin.index')
@section('body')
    <!-- Main Container -->
    <main id="container">

        <!-- Page Content -->
        <div class="content" style="margin-top:50px;">

            <!-- Dynamic Table with Export Buttons -->
            <div class="block">
                <div class="block-header">
                    <h3 class="block-title">Student Report</h3>
                    <button onclick="window.open('{{url('admin/list_student').'/'.$student->id.'/export_report_pdf'}}', 'popup', 'height=600,width=700,scrollbars=yes,resize=no,status=no,left=100,top=100');" class="btn btn-primary btn-sm pull-right"><i class="fa fa-print"></i> Print</button>
                </div>
                <div class="block-content block-content-full">
                    <div class="block-content" style="margin-bottom: 20px;">
                        <div class="row">
                            <div class="col-lg-12">
                                <table border="1" class="full-width-table">
                                    <tr>
                                        <td class="text-align-left" colspan="4">No.</td>
                                        <td colspan="10">学業成績及び出席日数状況表</td>
                                        <td class="text-align-right">{{$student->student_number}}クラス</td>
                                        <td class="text-align-right" colspan="2">{{$student->student_number}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-align-right" colspan="17">{{date('d M-Y')}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-align-center" colspan="17">
                                            @foreach($student->grades as $grade)
                                                @if(date('Y-m-d',strtotime($grade->grade->start_at)) <= date('Y-m-d') && date('Y-m-d',strtotime($grade->grade->end_at)) <= date('Y-m-d'))
                                                    {{$grade->grade->grade->name}}: ({{date('M d, Y',strtotime($grade->grade->start_at))}} to {{date('M d, Y',strtotime($grade->grade->end_at))}})<br>
                                                @elseif(date('Y-m-d',strtotime($grade->grade->start_at)) <= date('Y-m-d') && date('Y-m-d',strtotime($grade->grade->end_at)) >= date('Y-m-d'))
                                                    {{$grade->grade->grade->name}}: ({{date('M d, Y',strtotime($grade->grade->start_at))}} to {{date('M d, Y')}})<br>
                                                @elseif(date('Y-m-d',strtotime($grade->grade->start_at)) >= date('Y-m-d'))
                                                    {{$grade->grade->grade->name}}: ({{date('M d, Y',strtotime($grade->grade->start_at))}} to {{date('M d, Y',strtotime($grade->grade->end_at))}})<br>
                                                @else
                                                    {{$grade->grade->grade->name}}: ({{date('M 01, Y')}} to {{date('M d, Y')}})<br>
                                                @endif
                                            @endforeach
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-align-center" colspan="4">国籍/母国語</td>
                                        <td class="text-align-center" colspan="9">氏  名</td>
                                        <td>
                                            性別
                                        </td>
                                        <td class="text-align-center" colspan="4">生年月日</td>
                                    </tr>
                                    <tr>
                                        <td class="text-align-center" colspan="2">{{$student->country->name}}</td>
                                        <td class="text-align-center" colspan="2">/NA</td>
                                        <td class="text-align-center" colspan="9">{{$student->first_student_japanese_name}} {{$student->last_student_japanese_name}} </td>
                                        <td>
                                            @if($student->student_sex=='m')男
                                            @elseif($student->student_sex=='f')女
                                            @endif
                                        </td>
                                        <td class="text-align-center" colspan="4">{{date('M d, Y',strtotime($student->date_of_birth))}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-align-center" colspan="2">住所</td>
                                        <td class="text-align-center" colspan="12">{{$student->address}}</td>
                                        <td class="text-align-center">学年</td>
                                        <td class="text-align-center" colspan="3">{{$student->student_of_year}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-align-center" colspan="5">在留資格</td>
                                        <td class="text-align-center" colspan="6">入国年月日</td>
                                        <td class="text-align-center" colspan="6">在留期限</td>
                                    </tr>
                                    <tr>
                                        <td class="text-align-center" colspan="5">留　　学</td>
                                        <td class="text-align-center" colspan="6">{{date('M d, Y',strtotime($student->entry_date))}}</td>
                                        <td class="text-align-center" colspan="4">{{$student->residensal->name}}</td>
                                        <td class="text-align-center" colspan="2">{{$student->residensal_card_expire}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-align-center" colspan="4">在留カード番号</td>
                                        <td class="text-align-center" colspan="13">{{$student->residensal_card}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-align-center" colspan="7">入学年月日</td>
                                        <td class="text-align-center" colspan="7">終了予定日</td>
                                        <td class="text-align-center" colspan="3">課程名</td>
                                    </tr>
                                    <tr>
                                        <td class="text-align-center" colspan="7">{{date('M d, Y',strtotime($student->entry_date))}}</td>
                                        <td class="text-align-center" colspan="7">{{date('M d, Y',strtotime($student->expire_date))}}</td>
                                        <td class="text-align-center" colspan="3">造形芸術科</td>
                                    </tr>
                                    <tr>
                                        <td class="blank_td" colspan="17"></td>
                                    </tr>
                                    @php
                                        $total_attend_hour = 0;
                                        $total_attend_day = 0;
                                    @endphp
                                    @if(count($grades)<=1)
                                        @foreach($grades as $grade)
                                            @if(date('Y-m-d',strtotime($grade->grade->start_at)) > date('Y-m-d'))
                                                <tr style="background-color: lightgray;">
                                                    <td class="text-align-center" colspan="2" style="width: 70px;">出席状況</td>
                                                    <td class="text-align-center" style="width: 70px;">月別</td>
                                                    @php
                                                        $date1 = strtotime($grade->grade->start_at);
                                                        $date2 = strtotime($grade->grade->end_at);
                                                    @endphp
                                                    @while ($date1 <= $date2)
                                                        <td class="text-align-center" style="width: 60px;">{{date('m', $date1)}}月</td>
                                                        @php
                                                            $date1 = strtotime('+1 month', $date1);
                                                        @endphp
                                                    @endwhile
                                                    <td class="text-align-right" colspan="2">合計・出席率</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-align-center" style="width: 70px;">{{$grade->grade->grade->name}}</td>
                                                    <td class="text-align-center" colspan="17">
                                                        {{--<table border="1" id="student_grade_{{$grade->id}}" class="student_grade" data-grade_id="{{$grade->id}}" data-start_at="{{$grade->grade->start_at}}" data-end_at="{{$grade->grade->end_at}}" data-student_id="{{$student->id}}">--}}

                                                        {{--</table>--}}
                                                        <table border="1">
                                                            <tr>
                                                                <td style="width:73px;">授業日数</td>
                                                                    @php
                                                                        $date1 = strtotime($grade->grade->start_at);
                                                                        $date2 = strtotime($grade->grade->end_at);
                                                                    @endphp
                                                                @while ($date1 <= $date2)
                                                                        <td style="width: 60px; background-color: #ffdede;">-</td>
                                                                        @php
                                                                            $date1 = strtotime('+1 month', $date1);
                                                                        @endphp
                                                                @endwhile
                                                                <td style="width: 65px;">-</td>
                                                                <td style="width: 50px;">h</td>
                                                            </tr>
                                                            <tr>
                                                                <td>出席時数</td>
                                                                    @php
                                                                        $date1 = strtotime($grade->grade->start_at);
                                                                        $date2 = strtotime($grade->grade->end_at);
                                                                    @endphp
                                                                @while ($date1 <= $date2)
                                                                        <td style="width: 60px; background-color: #ffdede;">-</td>
                                                                        @php
                                                                            $date1 = strtotime('+1 month', $date1);
                                                                        @endphp
                                                                @endwhile
                                                                <td style="width: 65px;">-</td>
                                                                <td style="width: 50px;">-</td>

                                                            </tr>
                                                            <tr>
                                                                <td>授業日数</td>
                                                                    @php
                                                                        $date1 = strtotime($grade->grade->start_at);
                                                                        $date2 = strtotime($grade->grade->end_at);
                                                                    @endphp
                                                                @while ($date1 <= $date2)
                                                                        <td style="width: 60px; background-color: #ffdede;">-</td>
                                                                        @php
                                                                            $date1 = strtotime('+1 month', $date1);
                                                                        @endphp
                                                                @endwhile
                                                                <td style="width: 65px;"></td>
                                                                <td style="width: 50px;">日</td>
                                                            </tr>
                                                            <tr>
                                                                <td>出席時数</td>
                                                                    @php
                                                                        $date1 = strtotime($grade->grade->start_at);
                                                                        $date2 = strtotime($grade->grade->end_at);
                                                                    @endphp
                                                                @while ($date1 <= $date2)
                                                                        <td style="width: 60px; background-color: #ffdede;">-</td>
                                                                        @php
                                                                            $date1 = strtotime('+1 month', $date1);
                                                                        @endphp
                                                                @endwhile
                                                                <td style="width: 65px;">-</td>
                                                                <td style="width: 50px;">-</td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            @else
                                                <tr style="background-color: lightgray;">
                                                    <td class="text-align-center" colspan="2" style="width: 70px;">出席状況</td>
                                                    <td class="text-align-center" style="width: 70px;">月別</td>
                                                        @php
                                                            $date1 = strtotime($grade->grade->start_at);
                                                            $date2 = strtotime($grade->grade->end_at);
                                                        @endphp
                                                    @while ($date1 <= $date2)
                                                        <td class="text-align-center" style="width: 60px;">{{date('m', $date1)}}月</td>
                                                        @php
                                                            $date1 = strtotime('+1 month', $date1);
                                                        @endphp
                                                    @endwhile
                                                    <td class="text-align-right" colspan="2">合計・出席率</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-align-center" style="width: 70px;">{{$grade->grade->grade->name}}</td>
                                                    <td class="text-align-center" colspan="17">
                                                        {{--<table border="1" id="student_grade_{{$grade->id}}" class="student_grade" data-grade_id="{{$grade->id}}" data-start_at="{{$grade->grade->start_at}}" data-end_at="{{$grade->grade->end_at}}" data-student_id="{{$student->id}}">--}}

                                                        {{--</table>--}}
                                                        <table border="1">
                                                            <tr>
                                                                <td style="width:73px;">授業日数</td>
                                                                @if(date('Y-m-d',strtotime($grade->grade->start_at)) <= date('Y-m-d') && date('Y-m-d',strtotime($grade->grade->end_at)) <= date('Y-m-d'))
                                                                    @php
                                                                        $date1 = strtotime($grade->grade->start_at);
                                                                        $date2 = strtotime($grade->grade->end_at);
                                                                    $count_month = 0;
                                                                    @endphp
                                                                @elseif(date('Y-m-d',strtotime($grade->grade->start_at)) <= date('Y-m-d') && date('Y-m-d',strtotime($grade->grade->end_at)) >= date('Y-m-d'))
                                                                    @php
                                                                        $date1 = strtotime($grade->grade->start_at);
                                                                        $date2 = strtotime(date('Y-m-d'));
                                                                    $count_month = 0;
                                                                    @endphp
                                                                @else
                                                                    @php
                                                                        $date1 = strtotime(date('Y-m-01'));
                                                                        $date2 = strtotime(date('Y-m-d'));
                                                                    $count_month = 0;
                                                                    @endphp
                                                                @endif

                                                                @php
                                                                    $total_study_day =0;
                                                                @endphp
                                                                @while ($date1 <= $date2)
                                                                    @if(date('Y-m') == date('Y-m',$date1))
                                                                        @php
                                                                            $holidays = \App\Event::orderBy('start_date','ASC')->whereBetween("start_date",[date('Y-m-01',$date1),  date('Y-m-d')])->get();
                                                                        /*============== Finding Saturday & Sunday From Holiday Listing ============ */
                                                                        $holi_sat=0;
                                                                        $holi_sun=0;
                                                                        foreach ($holidays as $holiday){
                                                                            if (date('D',strtotime($holiday->start_date))=='Sat'){
                                                                                $holi_sat +=1;
                                                                            }
                                                                            if (date('D',strtotime($holiday->start_date))=='Sun'){
                                                                                $holi_sun +=1;
                                                                            }
                                                                        }
                                                                        $t_h_sat_sun = $holi_sat+$holi_sun;
                                                                        /*============== Finding Saturday & Sunday From Holiday Listing ============ */
                                                                        /*============== Geting Total Number of  Saturday & Sunday Between Start To End Date  ============ */
                                                                        $sunday=0;
                                                                        $saturday=0;
                                                                        $start_date = date('Y-m-01',$date1);
                                                                        $end_date = date('Y-m-d');
                                                                        for($i=$start_date;$i<=$end_date;$i++)
                                                                        {

                                                                            $day=date("N",strtotime($i));
                                                                            if($day==7)
                                                                            {
                                                                                $sunday++;
                                                                            }
                                                                            if($day==6)
                                                                            {
                                                                                $saturday++;
                                                                            }
                                                                        }
                                                                        $t_sun = $sunday;
                                                                        $t_sat = $saturday;
                                                                        $t_sat_sun=$t_sat+$t_sun;
                                                                        /*============== Geting Total Number of  Saturday & Sunday Between Start To End Date  ============ */
                                                                        $datetime1 = new DateTime($start_date);
                                                                        $datetime2 = new DateTime($end_date);
                                                                        $interval = $datetime1->diff($datetime2);
                                                                        $days = $interval->format('%a')+1;
                                                                        $total_holiday = count($holidays)+$t_sat_sun-$t_h_sat_sun;
                                                                        $study_day = ($days-$total_holiday)*4;
                                                                        $total_study_day +=$study_day;
                                                                        @endphp
                                                                        <td style="width: 60px; background-color: #ffdede;">{{$study_day}}</td>
                                                                        @php
                                                                            $date1 = strtotime('+1 month', $date1);
                                                                        $count_month +=1;
                                                                        @endphp
                                                                    @else
                                                                        @php
                                                                            $holidays = \App\Event::orderBy('start_date','ASC')->whereBetween("start_date",[date('Y-m-01',$date1),  date('Y-m-t',$date1)])->get();
                                                                        /*============== Finding Saturday & Sunday From Holiday Listing ============ */
                                                                        $holi_sat=0;
                                                                        $holi_sun=0;
                                                                        foreach ($holidays as $holiday){
                                                                            if (date('D',strtotime($holiday->start_date))=='Sat'){
                                                                                $holi_sat +=1;
                                                                            }
                                                                            if (date('D',strtotime($holiday->start_date))=='Sun'){
                                                                                $holi_sun +=1;
                                                                            }
                                                                        }
                                                                        $t_h_sat_sun = $holi_sat+$holi_sun;
                                                                        /*============== Finding Saturday & Sunday From Holiday Listing ============ */
                                                                        /*============== Geting Total Number of  Saturday & Sunday Between Start To End Date  ============ */
                                                                        $sunday=0;
                                                                        $saturday=0;
                                                                        $start_date = date('Y-m-01',$date1);
                                                                        $end_date = date('Y-m-t',$date1);
                                                                        for($i=$start_date;$i<=$end_date;$i++)
                                                                        {

                                                                            $day=date("N",strtotime($i));
                                                                            if($day==7)
                                                                            {
                                                                                $sunday++;
                                                                            }
                                                                            if($day==6)
                                                                            {
                                                                                $saturday++;
                                                                            }
                                                                        }
                                                                        $t_sun = $sunday;
                                                                        $t_sat = $saturday;
                                                                        $t_sat_sun=$t_sat+$t_sun;
                                                                        /*============== Geting Total Number of  Saturday & Sunday Between Start To End Date  ============ */
                                                                        $datetime1 = new DateTime($start_date);
                                                                        $datetime2 = new DateTime($end_date);
                                                                        $interval = $datetime1->diff($datetime2);
                                                                        $days = $interval->format('%a')+1;
                                                                        $total_holiday = count($holidays)+$t_sat_sun-$t_h_sat_sun;
                                                                        $study_day = ($days-$total_holiday)*4;
                                                                        $total_study_day +=$study_day;
                                                                        @endphp
                                                                        <td style="width: 60px; background-color: #ffdede;">{{$study_day}}</td>
                                                                        @php
                                                                            $date1 = strtotime('+1 month', $date1);
                                                                        $count_month +=1;
                                                                        @endphp
                                                                    @endif
                                                                @endwhile
                                                                @php
                                                                $remain_month = 12-$count_month;
                                                                @endphp
                                                                @for($x = 0; $x < $remain_month; $x++)
                                                                    <td style="width: 60px; background-color: #ffdede;">-</td>
                                                                    @endfor
                                                                <td style="width: 65px;">{{$total_study_day}}</td>
                                                                <td style="width: 50px;">h</td>
                                                            </tr>
                                                            <tr>
                                                                <td>出席時数</td>
                                                                @if(date('Y-m-d',strtotime($grade->grade->start_at)) <= date('Y-m-d') && date('Y-m-d',strtotime($grade->grade->end_at)) <= date('Y-m-d'))
                                                                    @php
                                                                        $date1 = strtotime($grade->grade->start_at);
                                                                        $date2 = strtotime($grade->grade->end_at);
                                                                    $count_month =0;
                                                                    @endphp
                                                                @elseif(date('Y-m-d',strtotime($grade->grade->start_at)) <= date('Y-m-d') && date('Y-m-d',strtotime($grade->grade->end_at)) >= date('Y-m-d'))
                                                                    @php
                                                                        $date1 = strtotime($grade->grade->start_at);
                                                                        $date2 = strtotime(date('Y-m-d'));
                                                                    $count_month =0;
                                                                    @endphp
                                                                @else
                                                                    @php
                                                                        $date1 = strtotime(date('Y-m-01'));
                                                                        $date2 = strtotime(date('Y-m-d'));
                                                                    $count_month =0;
                                                                    @endphp
                                                                @endif

                                                                @php
                                                                    $total_month_attend = 0;
                                                                @endphp
                                                                @while ($date1 <= $date2)
                                                                        @if(date('Y-m') == date('Y-m',$date1))
                                                                            @php
                                                                                $attendances = \App\Attendance::where('student_id',$student->id)->where('type','1')->whereBetween("created_at",[date('Y-m-01 H:i:s'), date('Y-m-d').' 23:59:59'])->get();
                                                                                $present_check = \App\StudentStatus::where('student_id',$student->id)->where('status','present')->whereBetween("created_at",[date('Y-m-01 H:i:s'), date('Y-m-d').' 23:59:59'])->count()/4;
                                                                                $late_check = \App\StudentStatus::where('student_id',$student->id)->where('status','late')->whereBetween("created_at",[date('Y-m-01 H:i:s'), date('Y-m-d').' 23:59:59'])->count()/4;
                                                                                $absent_check = \App\StudentStatus::where('student_id',$student->id)->where('status','absent')->whereBetween("created_at",[date('Y-m-01 H:i:s'), date('Y-m-d').' 23:59:59'])->count()/4;
                                                                                //calculating totall attendance//
                                                                                $total_attend = count($attendances)+$present_check;
                                                                                if ($late_check>=3 && $late_check<=5){
                                                                                $g_total_attend = $total_attend-1;
                                                                                }elseif($late_check>=6 && $late_check<=9){
                                                                                $g_total_attend = $total_attend-2;
                                                                                }elseif($late_check>=10 && $late_check<=12){
                                                                                $g_total_attend = $total_attend-3;
                                                                                }else{
                                                                                $g_total_attend = $total_attend;
                                                                                }
                                                                                $grand_total_attend = $g_total_attend*4;
                                                                                $total_month_attend +=$grand_total_attend;
                                                                            @endphp
                                                                            <td style="width: 60px; background-color: #ffdede;">{{$grand_total_attend}}</td>
                                                                            @php
                                                                                $date1 = strtotime('+1 month', $date1);
                                                                            $count_month +=1;
                                                                            @endphp
                                                                        @else
                                                                            @php
                                                                                $attendances = \App\Attendance::where('student_id',$student->id)->where('type','1')->whereBetween("created_at",[date('Y-m-01 H:i:s',$date1), date('Y-m-t',$date1).' 23:59:59'])->get();
                                                                                $present_check = \App\StudentStatus::where('student_id',$student->id)->where('status','present')->whereBetween("created_at",[date('Y-m-01 H:i:s',$date1), date('Y-m-t',$date1).' 23:59:59'])->count()/4;
                                                                                $late_check = \App\StudentStatus::where('student_id',$student->id)->where('status','late')->whereBetween("created_at",[date('Y-m-01 H:i:s',$date1), date('Y-m-t',$date1).' 23:59:59'])->count()/4;
                                                                                $absent_check = \App\StudentStatus::where('student_id',$student->id)->where('status','absent')->whereBetween("created_at",[date('Y-m-01 H:i:s',$date1), date('Y-m-t',$date1).' 23:59:59'])->count()/4;
                                                                                //calculating totall attendance//
                                                                                $total_attend = count($attendances)+$present_check;
                                                                                if ($late_check>=3 && $late_check<=5){
                                                                                $g_total_attend = $total_attend-1;
                                                                                }elseif($late_check>=6 && $late_check<=9){
                                                                                $g_total_attend = $total_attend-2;
                                                                                }elseif($late_check>=10 && $late_check<=12){
                                                                                $g_total_attend = $total_attend-3;
                                                                                }else{
                                                                                $g_total_attend = $total_attend;
                                                                                }
                                                                                $grand_total_attend = $g_total_attend*4;
                                                                                $total_month_attend +=$grand_total_attend;
                                                                            @endphp
                                                                            <td style="width: 60px; background-color: #ffdede;">{{$grand_total_attend}}</td>
                                                                            @php
                                                                                $date1 = strtotime('+1 month', $date1);
                                                                            $count_month +=1;
                                                                            @endphp
                                                                        @endif

                                                                @endwhile
                                                                @php
                                                                    $attend_hour_rate = round(($total_month_attend/$total_study_day)*100,1);
                                                                $remain_month = 12-$count_month;
                                                                @endphp
                                                                @for($x = 0; $x < $remain_month; $x++)
                                                                    <td style="width: 60px; background-color: #ffdede;">-</td>
                                                                @endfor

                                                                <td style="width: 65px;">{{$total_month_attend}}</td>
                                                                <td style="width: 50px;">{{$attend_hour_rate}}%</td>

                                                            </tr>
                                                            <tr>
                                                                <td>授業日数</td>
                                                                @if(date('Y-m-d',strtotime($grade->grade->start_at)) <= date('Y-m-d') && date('Y-m-d',strtotime($grade->grade->end_at)) <= date('Y-m-d'))
                                                                    @php
                                                                        $date1 = strtotime($grade->grade->start_at);
                                                                        $date2 = strtotime($grade->grade->end_at);
                                                                    $count_month = 0;
                                                                    @endphp
                                                                @elseif(date('Y-m-d',strtotime($grade->grade->start_at)) <= date('Y-m-d') && date('Y-m-d',strtotime($grade->grade->end_at)) >= date('Y-m-d'))
                                                                    @php
                                                                        $date1 = strtotime($grade->grade->start_at);
                                                                        $date2 = strtotime(date('Y-m-d'));
                                                                    $count_month = 0;
                                                                    @endphp
                                                                @else
                                                                    @php
                                                                        $date1 = strtotime(date('Y-m-01'));
                                                                        $date2 = strtotime(date('Y-m-d'));
                                                                    $count_month = 0;
                                                                    @endphp
                                                                @endif
                                                                @php
                                                                    $total_study_day =0;
                                                                @endphp
                                                                @while ($date1 <= $date2)
                                                                    @if(date('Y-m') == date('Y-m',$date1))
                                                                        @php
                                                                            $holidays = \App\Event::orderBy('start_date','ASC')->whereBetween("start_date",[date('Y-m-01',$date1),date('Y-m-d')])->get();
                                                                            /*============== Finding Saturday & Sunday From Holiday Listing ============ */
                                                                            $holi_sat=0;
                                                                            $holi_sun=0;
                                                                            foreach ($holidays as $holiday){
                                                                                if (date('D',strtotime($holiday->start_date))=='Sat'){
                                                                                    $holi_sat +=1;
                                                                                }
                                                                                if (date('D',strtotime($holiday->start_date))=='Sun'){
                                                                                    $holi_sun +=1;
                                                                                }
                                                                            }
                                                                            $t_h_sat_sun = $holi_sat+$holi_sun;
                                                                            /*============== Finding Saturday & Sunday From Holiday Listing ============ */
                                                                            /*============== Geting Total Number of  Saturday & Sunday Between Start To End Date  ============ */
                                                                            $sunday=0;
                                                                            $saturday=0;
                                                                            $start_date = date('Y-m-01',$date1);
                                                                            $end_date = date('Y-m-d');
                                                                            for($i=$start_date;$i<=$end_date;$i++)
                                                                            {

                                                                                $day=date("N",strtotime($i));
                                                                                if($day==7)
                                                                                {
                                                                                    $sunday++;
                                                                                }
                                                                                if($day==6)
                                                                                {
                                                                                    $saturday++;
                                                                                }
                                                                            }
                                                                            $t_sun = $sunday;
                                                                            $t_sat = $saturday;
                                                                            $t_sat_sun=$t_sat+$t_sun;
                                                                            /*============== Geting Total Number of  Saturday & Sunday Between Start To End Date  ============ */
                                                                            $datetime1 = new DateTime($start_date);
                                                                            $datetime2 = new DateTime($end_date);
                                                                            $interval = $datetime1->diff($datetime2);
                                                                            $days = $interval->format('%a')+1;
                                                                            $total_holiday = count($holidays)+$t_sat_sun-$t_h_sat_sun;
                                                                            $study_day = $days-$total_holiday;
                                                                            $total_study_day +=$study_day;
                                                                        @endphp
                                                                        <td style="width: 60px; background-color: #ffdede;">{{$study_day}}</td>
                                                                        @php
                                                                            $date1 = strtotime('+1 month', $date1);
                                                                        $count_month +=1;
                                                                        @endphp
                                                                    @else
                                                                        @php
                                                                            $holidays = \App\Event::orderBy('start_date','ASC')->whereBetween("start_date",[date('Y-m-01',$date1),  date('Y-m-t',$date1)])->get();
                                                                            /*============== Finding Saturday & Sunday From Holiday Listing ============ */
                                                                            $holi_sat=0;
                                                                            $holi_sun=0;
                                                                            foreach ($holidays as $holiday){
                                                                                if (date('D',strtotime($holiday->start_date))=='Sat'){
                                                                                    $holi_sat +=1;
                                                                                }
                                                                                if (date('D',strtotime($holiday->start_date))=='Sun'){
                                                                                    $holi_sun +=1;
                                                                                }
                                                                            }
                                                                            $t_h_sat_sun = $holi_sat+$holi_sun;
                                                                            /*============== Finding Saturday & Sunday From Holiday Listing ============ */
                                                                            /*============== Geting Total Number of  Saturday & Sunday Between Start To End Date  ============ */
                                                                            $sunday=0;
                                                                            $saturday=0;
                                                                            $start_date = date('Y-m-01',$date1);
                                                                            $end_date = date('Y-m-t',$date1);
                                                                            for($i=$start_date;$i<=$end_date;$i++)
                                                                            {

                                                                                $day=date("N",strtotime($i));
                                                                                if($day==7)
                                                                                {
                                                                                    $sunday++;
                                                                                }
                                                                                if($day==6)
                                                                                {
                                                                                    $saturday++;
                                                                                }
                                                                            }
                                                                            $t_sun = $sunday;
                                                                            $t_sat = $saturday;
                                                                            $t_sat_sun=$t_sat+$t_sun;
                                                                            /*============== Geting Total Number of  Saturday & Sunday Between Start To End Date  ============ */
                                                                            $datetime1 = new DateTime($start_date);
                                                                            $datetime2 = new DateTime($end_date);
                                                                            $interval = $datetime1->diff($datetime2);
                                                                            $days = $interval->format('%a')+1;
                                                                            $total_holiday = count($holidays)+$t_sat_sun-$t_h_sat_sun;
                                                                            $study_day = $days-$total_holiday;
                                                                            $total_study_day +=$study_day;
                                                                        @endphp
                                                                        <td style="width: 60px; background-color: #ffdede;">{{$study_day}}</td>
                                                                        @php
                                                                            $date1 = strtotime('+1 month', $date1);
                                                                        $count_month +=1;
                                                                        @endphp
                                                                    @endif
                                                                @endwhile
                                                                @php
                                                                    $remain_month = 12-$count_month;
                                                                @endphp
                                                                @for($x = 0; $x < $remain_month; $x++)
                                                                    <td style="width: 60px; background-color: #ffdede;">-</td>
                                                                @endfor

                                                                <td style="width: 65px;">{{$total_study_day}}</td>
                                                                <td style="width: 50px;">日</td>
                                                            </tr>
                                                            <tr>
                                                                <td>出席時数</td>

                                                                @if(date('Y-m-d',strtotime($grade->grade->start_at)) <= date('Y-m-d') && date('Y-m-d',strtotime($grade->grade->end_at)) <= date('Y-m-d'))
                                                                    @php
                                                                        $date1 = strtotime($grade->grade->start_at);
                                                                        $date2 = strtotime($grade->grade->end_at);
                                                                    $count_month = 0;
                                                                    @endphp
                                                                @elseif(date('Y-m-d',strtotime($grade->grade->start_at)) <= date('Y-m-d') && date('Y-m-d',strtotime($grade->grade->end_at)) >= date('Y-m-d'))
                                                                    @php
                                                                        $date1 = strtotime($grade->grade->start_at);
                                                                        $date2 = strtotime(date('Y-m-d'));
                                                                    $count_month = 0;
                                                                    @endphp
                                                                @else
                                                                    @php
                                                                        $date1 = strtotime(date('Y-m-01'));
                                                                        $date2 = strtotime(date('Y-m-d'));
                                                                    $count_month = 0;
                                                                    @endphp
                                                                @endif

                                                                @php
                                                                    $total_month_attend = 0;
                                                                @endphp
                                                                @while ($date1 <= $date2)
                                                                    @if(date('Y-m') == date('Y-m',$date1))
                                                                        @php
                                                                            $attendances = \App\Attendance::where('student_id',$student->id)->where('type','1')->whereBetween("created_at",[date('Y-m-01 H:i:s'), date('Y-m-d').' 23:59:59'])->get();
                                                                            $present_check = \App\StudentStatus::where('student_id',$student->id)->where('status','present')->whereBetween("created_at",[date('Y-m-01 H:i:s'), date('Y-m-d').' 23:59:59'])->count()/4;
                                                                            $late_check = \App\StudentStatus::where('student_id',$student->id)->where('status','late')->whereBetween("created_at",[date('Y-m-01 H:i:s'), date('Y-m-d').' 23:59:59'])->count()/4;
                                                                            $absent_check = \App\StudentStatus::where('student_id',$student->id)->where('status','absent')->whereBetween("created_at",[date('Y-m-01 H:i:s'), date('Y-m-d').' 23:59:59'])->count()/4;
                                                                            //calculating totall attendance//
                                                                            $total_attend = count($attendances)+$present_check;
                                                                            if ($late_check>=3 && $late_check<=5){
                                                                            $g_total_attend = $total_attend-1;
                                                                            }elseif($late_check>=6 && $late_check<=9){
                                                                            $g_total_attend = $total_attend-2;
                                                                            }elseif($late_check>=10 && $late_check<=12){
                                                                            $g_total_attend = $total_attend-3;
                                                                            }else{
                                                                            $g_total_attend = $total_attend;
                                                                            }
                                                                            $total_month_attend +=$g_total_attend;
                                                                        @endphp
                                                                        <td style="width: 60px; background-color: #ffdede;">{{$g_total_attend}}</td>
                                                                        @php
                                                                            $date1 = strtotime('+1 month', $date1);
                                                                        $count_month  +=1;
                                                                        @endphp
                                                                    @else
                                                                        @php
                                                                            $attendances = \App\Attendance::where('student_id',$student->id)->where('type','1')->whereBetween("created_at",[date('Y-m-01 H:i:s',$date1), date('Y-m-t',$date1).' 23:59:59'])->get();
                                                                            $present_check = \App\StudentStatus::where('student_id',$student->id)->where('status','present')->whereBetween("created_at",[date('Y-m-01 H:i:s',$date1), date('Y-m-t',$date1).' 23:59:59'])->count()/4;
                                                                            $late_check = \App\StudentStatus::where('student_id',$student->id)->where('status','late')->whereBetween("created_at",[date('Y-m-01 H:i:s',$date1), date('Y-m-t',$date1).' 23:59:59'])->count()/4;
                                                                            $absent_check = \App\StudentStatus::where('student_id',$student->id)->where('status','absent')->whereBetween("created_at",[date('Y-m-01 H:i:s',$date1), date('Y-m-t',$date1).' 23:59:59'])->count()/4;
                                                                            //calculating totall attendance//
                                                                            $total_attend = count($attendances)+$present_check;
                                                                            if ($late_check>=3 && $late_check<=5){
                                                                            $g_total_attend = $total_attend-1;
                                                                            }elseif($late_check>=6 && $late_check<=9){
                                                                            $g_total_attend = $total_attend-2;
                                                                            }elseif($late_check>=10 && $late_check<=12){
                                                                            $g_total_attend = $total_attend-3;
                                                                            }else{
                                                                            $g_total_attend = $total_attend;
                                                                            }
                                                                            $total_month_attend +=$g_total_attend;
                                                                        @endphp
                                                                        <td style="width: 60px; background-color: #ffdede;">{{$g_total_attend}}</td>
                                                                        @php
                                                                            $date1 = strtotime('+1 month', $date1);
                                                                        $count_month  +=1;
                                                                        @endphp
                                                                    @endif
                                                                @endwhile
                                                                @php
                                                                    $attend_day_rate = round(($total_month_attend/$total_study_day)*100,1);
                                                                    $remain_month = 12-$count_month;
                                                                @endphp
                                                                @for($x = 0; $x < $remain_month; $x++)
                                                                    <td style="width: 60px; background-color: #ffdede;">-</td>
                                                                @endfor

                                                                <td style="width: 65px;">{{$total_month_attend}}</td>
                                                                <td style="width: 50px;">{{$attend_day_rate}}%</td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>

                                                @php
                                                    $total_attend_hour += $attend_hour_rate;
                                                    $total_attend_day += $attend_day_rate;
                                                @endphp
                                            @endif
                                        @endforeach
                                        @foreach($grades as $grade)
                                                <tr style="background-color: lightgray;">
                                                    <td class="text-align-center" colspan="2" style="width: 70px;">出席状況</td>
                                                    <td class="text-align-center" style="width: 70px;">月別</td>
                                                    @php
                                                        $date1 = strtotime($grade->grade->start_at);
                                                        $date2 = strtotime($grade->grade->end_at);
                                                    @endphp
                                                    @while ($date1 <= $date2)
                                                        <td class="text-align-center" style="width: 60px;">{{date('m', $date1)}}月</td>
                                                        @php
                                                            $date1 = strtotime('+1 month', $date1);
                                                        @endphp
                                                    @endwhile
                                                    <td class="text-align-right" colspan="2">合計・出席率</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-align-center" style="width: 70px;">@if($grade->grade->grade->name=='第1学年') 第2学年 @else 第1学年 @endif</td>
                                                    <td class="text-align-center" colspan="17">
                                                        {{--<table border="1" id="student_grade_{{$grade->id}}" class="student_grade" data-grade_id="{{$grade->id}}" data-start_at="{{$grade->grade->start_at}}" data-end_at="{{$grade->grade->end_at}}" data-student_id="{{$student->id}}">--}}

                                                        {{--</table>--}}
                                                        <table border="1">
                                                            <tr>
                                                                <td style="width:73px;">授業日数</td>
                                                                    @php
                                                                        $date1 = strtotime($grade->grade->start_at);
                                                                        $date2 = strtotime($grade->grade->end_at);
                                                                    @endphp
                                                                @while ($date1 <= $date2)
                                                                        <td style="width: 60px; background-color: #ffdede;">-</td>
                                                                        @php
                                                                            $date1 = strtotime('+1 month', $date1);
                                                                        @endphp
                                                                @endwhile
                                                                <td style="width: 65px;">-</td>
                                                                <td style="width: 50px;">h</td>
                                                            </tr>
                                                            <tr>
                                                                <td>出席時数</td>
                                                                    @php
                                                                        $date1 = strtotime($grade->grade->start_at);
                                                                        $date2 = strtotime($grade->grade->end_at);
                                                                    @endphp
                                                                @while ($date1 <= $date2)
                                                                        <td style="width: 60px; background-color: #ffdede;">-</td>
                                                                        @php
                                                                            $date1 = strtotime('+1 month', $date1);
                                                                        @endphp
                                                                @endwhile
                                                                <td style="width: 65px;">-</td>
                                                                <td style="width: 50px;">-</td>

                                                            </tr>
                                                            <tr>
                                                                <td>授業日数</td>
                                                                    @php
                                                                        $date1 = strtotime($grade->grade->start_at);
                                                                        $date2 = strtotime($grade->grade->end_at);
                                                                    @endphp
                                                                @while ($date1 <= $date2)
                                                                        <td style="width: 60px; background-color: #ffdede;">-</td>
                                                                        @php
                                                                            $date1 = strtotime('+1 month', $date1);
                                                                        @endphp
                                                                @endwhile
                                                                <td style="width: 65px;"></td>
                                                                <td style="width: 50px;">日</td>
                                                            </tr>
                                                            <tr>
                                                                <td>出席時数</td>
                                                                    @php
                                                                        $date1 = strtotime($grade->grade->start_at);
                                                                        $date2 = strtotime($grade->grade->end_at);
                                                                    @endphp
                                                                @while ($date1 <= $date2)
                                                                        <td style="width: 60px; background-color: #ffdede;">-</td>
                                                                        @php
                                                                            $date1 = strtotime('+1 month', $date1);
                                                                        @endphp
                                                                @endwhile
                                                                <td style="width: 65px;">-</td>
                                                                <td style="width: 50px;">-</td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                        @endforeach
                                    @else
                                        @foreach($grades as $grade)
                                            @if(date('Y-m-d',strtotime($grade->grade->start_at)) > date('Y-m-d'))
                                                <tr style="background-color: lightgray;">
                                                    <td class="text-align-center" colspan="2" style="width: 70px;">出席状況</td>
                                                    <td class="text-align-center" style="width: 70px;">月別</td>
                                                    @php
                                                        $date1 = strtotime($grade->grade->start_at);
                                                        $date2 = strtotime($grade->grade->end_at);
                                                    @endphp
                                                    @while ($date1 <= $date2)
                                                        <td class="text-align-center" style="width: 60px;">{{date('m', $date1)}}月</td>
                                                        @php
                                                            $date1 = strtotime('+1 month', $date1);
                                                        @endphp
                                                    @endwhile
                                                    <td class="text-align-right" colspan="2">合計・出席率</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-align-center" style="width: 70px;">{{$grade->grade->grade->name}}</td>
                                                    <td class="text-align-center" colspan="17">
                                                        {{--<table border="1" id="student_grade_{{$grade->id}}" class="student_grade" data-grade_id="{{$grade->id}}" data-start_at="{{$grade->grade->start_at}}" data-end_at="{{$grade->grade->end_at}}" data-student_id="{{$student->id}}">--}}

                                                        {{--</table>--}}
                                                        <table border="1">
                                                            <tr>
                                                                <td style="width:73px;">授業日数</td>
                                                                @php
                                                                    $date1 = strtotime($grade->grade->start_at);
                                                                    $date2 = strtotime($grade->grade->end_at);
                                                                @endphp
                                                                @while ($date1 <= $date2)
                                                                    <td style="width: 60px; background-color: #ffdede;">-</td>
                                                                    @php
                                                                        $date1 = strtotime('+1 month', $date1);
                                                                    @endphp
                                                                @endwhile
                                                                <td style="width: 65px;">-</td>
                                                                <td style="width: 50px;">h</td>
                                                            </tr>
                                                            <tr>
                                                                <td>出席時数</td>
                                                                @php
                                                                    $date1 = strtotime($grade->grade->start_at);
                                                                    $date2 = strtotime($grade->grade->end_at);
                                                                @endphp
                                                                @while ($date1 <= $date2)
                                                                    <td style="width: 60px; background-color: #ffdede;">-</td>
                                                                    @php
                                                                        $date1 = strtotime('+1 month', $date1);
                                                                    @endphp
                                                                @endwhile
                                                                <td style="width: 65px;">-</td>
                                                                <td style="width: 50px;">-</td>

                                                            </tr>
                                                            <tr>
                                                                <td>授業日数</td>
                                                                @php
                                                                    $date1 = strtotime($grade->grade->start_at);
                                                                    $date2 = strtotime($grade->grade->end_at);
                                                                @endphp
                                                                @while ($date1 <= $date2)
                                                                    <td style="width: 60px; background-color: #ffdede;">-</td>
                                                                    @php
                                                                        $date1 = strtotime('+1 month', $date1);
                                                                    @endphp
                                                                @endwhile
                                                                <td style="width: 65px;"></td>
                                                                <td style="width: 50px;">日</td>
                                                            </tr>
                                                            <tr>
                                                                <td>出席時数</td>
                                                                @php
                                                                    $date1 = strtotime($grade->grade->start_at);
                                                                    $date2 = strtotime($grade->grade->end_at);
                                                                @endphp
                                                                @while ($date1 <= $date2)
                                                                    <td style="width: 60px; background-color: #ffdede;">-</td>
                                                                    @php
                                                                        $date1 = strtotime('+1 month', $date1);
                                                                    @endphp
                                                                @endwhile
                                                                <td style="width: 65px;">-</td>
                                                                <td style="width: 50px;">-</td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            @else
                                                <tr style="background-color: lightgray;">
                                                    <td class="text-align-center" colspan="2" style="width: 70px;">出席状況</td>
                                                    <td class="text-align-center" style="width: 70px;">月別</td>
                                                    @php
                                                        $date1 = strtotime($grade->grade->start_at);
                                                        $date2 = strtotime($grade->grade->end_at);
                                                    @endphp
                                                    @while ($date1 <= $date2)
                                                        <td class="text-align-center" style="width: 60px;">{{date('m', $date1)}}月</td>
                                                        @php
                                                            $date1 = strtotime('+1 month', $date1);
                                                        @endphp
                                                    @endwhile
                                                    <td class="text-align-right" colspan="2">合計・出席率</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-align-center" style="width: 70px;">{{$grade->grade->grade->name}}</td>
                                                    <td class="text-align-center" colspan="17">
                                                        {{--<table border="1" id="student_grade_{{$grade->id}}" class="student_grade" data-grade_id="{{$grade->id}}" data-start_at="{{$grade->grade->start_at}}" data-end_at="{{$grade->grade->end_at}}" data-student_id="{{$student->id}}">--}}

                                                        {{--</table>--}}
                                                        <table border="1">
                                                            <tr>
                                                                <td style="width:73px;">授業日数</td>
                                                                @if(date('Y-m-d',strtotime($grade->grade->start_at)) <= date('Y-m-d') && date('Y-m-d',strtotime($grade->grade->end_at)) <= date('Y-m-d'))
                                                                    @php
                                                                        $date1 = strtotime($grade->grade->start_at);
                                                                        $date2 = strtotime($grade->grade->end_at);
                                                                    $count_month = 0;
                                                                    @endphp
                                                                @elseif(date('Y-m-d',strtotime($grade->grade->start_at)) <= date('Y-m-d') && date('Y-m-d',strtotime($grade->grade->end_at)) >= date('Y-m-d'))
                                                                    @php
                                                                        $date1 = strtotime($grade->grade->start_at);
                                                                        $date2 = strtotime(date('Y-m-d'));
                                                                    $count_month = 0;
                                                                    @endphp
                                                                @else
                                                                    @php
                                                                        $date1 = strtotime(date('Y-m-01'));
                                                                        $date2 = strtotime(date('Y-m-d'));
                                                                    $count_month = 0;
                                                                    @endphp
                                                                @endif

                                                                @php
                                                                    $total_study_day =0;
                                                                @endphp
                                                                @while ($date1 <= $date2)
                                                                    @if(date('Y-m') == date('Y-m',$date1))
                                                                        @php
                                                                            $holidays = \App\Event::orderBy('start_date','ASC')->whereBetween("start_date",[date('Y-m-01',$date1),  date('Y-m-d')])->get();
                                                                        /*============== Finding Saturday & Sunday From Holiday Listing ============ */
                                                                        $holi_sat=0;
                                                                        $holi_sun=0;
                                                                        foreach ($holidays as $holiday){
                                                                            if (date('D',strtotime($holiday->start_date))=='Sat'){
                                                                                $holi_sat +=1;
                                                                            }
                                                                            if (date('D',strtotime($holiday->start_date))=='Sun'){
                                                                                $holi_sun +=1;
                                                                            }
                                                                        }
                                                                        $t_h_sat_sun = $holi_sat+$holi_sun;
                                                                        /*============== Finding Saturday & Sunday From Holiday Listing ============ */
                                                                        /*============== Geting Total Number of  Saturday & Sunday Between Start To End Date  ============ */
                                                                        $sunday=0;
                                                                        $saturday=0;
                                                                        $start_date = date('Y-m-01',$date1);
                                                                        $end_date = date('Y-m-d');
                                                                        for($i=$start_date;$i<=$end_date;$i++)
                                                                        {

                                                                            $day=date("N",strtotime($i));
                                                                            if($day==7)
                                                                            {
                                                                                $sunday++;
                                                                            }
                                                                            if($day==6)
                                                                            {
                                                                                $saturday++;
                                                                            }
                                                                        }
                                                                        $t_sun = $sunday;
                                                                        $t_sat = $saturday;
                                                                        $t_sat_sun=$t_sat+$t_sun;
                                                                        /*============== Geting Total Number of  Saturday & Sunday Between Start To End Date  ============ */
                                                                        $datetime1 = new DateTime($start_date);
                                                                        $datetime2 = new DateTime($end_date);
                                                                        $interval = $datetime1->diff($datetime2);
                                                                        $days = $interval->format('%a')+1;
                                                                        $total_holiday = count($holidays)+$t_sat_sun-$t_h_sat_sun;
                                                                        $study_day = ($days-$total_holiday)*4;
                                                                        $total_study_day +=$study_day;
                                                                        @endphp
                                                                        <td style="width: 60px; background-color: #ffdede;">{{$study_day}}</td>
                                                                        @php
                                                                            $date1 = strtotime('+1 month', $date1);
                                                                        $count_month +=1;
                                                                        @endphp
                                                                    @else
                                                                        @php
                                                                            $holidays = \App\Event::orderBy('start_date','ASC')->whereBetween("start_date",[date('Y-m-01',$date1),  date('Y-m-t',$date1)])->get();
                                                                        /*============== Finding Saturday & Sunday From Holiday Listing ============ */
                                                                        $holi_sat=0;
                                                                        $holi_sun=0;
                                                                        foreach ($holidays as $holiday){
                                                                            if (date('D',strtotime($holiday->start_date))=='Sat'){
                                                                                $holi_sat +=1;
                                                                            }
                                                                            if (date('D',strtotime($holiday->start_date))=='Sun'){
                                                                                $holi_sun +=1;
                                                                            }
                                                                        }
                                                                        $t_h_sat_sun = $holi_sat+$holi_sun;
                                                                        /*============== Finding Saturday & Sunday From Holiday Listing ============ */
                                                                        /*============== Geting Total Number of  Saturday & Sunday Between Start To End Date  ============ */
                                                                        $sunday=0;
                                                                        $saturday=0;
                                                                        $start_date = date('Y-m-01',$date1);
                                                                        $end_date = date('Y-m-t',$date1);
                                                                        for($i=$start_date;$i<=$end_date;$i++)
                                                                        {

                                                                            $day=date("N",strtotime($i));
                                                                            if($day==7)
                                                                            {
                                                                                $sunday++;
                                                                            }
                                                                            if($day==6)
                                                                            {
                                                                                $saturday++;
                                                                            }
                                                                        }
                                                                        $t_sun = $sunday;
                                                                        $t_sat = $saturday;
                                                                        $t_sat_sun=$t_sat+$t_sun;
                                                                        /*============== Geting Total Number of  Saturday & Sunday Between Start To End Date  ============ */
                                                                        $datetime1 = new DateTime($start_date);
                                                                        $datetime2 = new DateTime($end_date);
                                                                        $interval = $datetime1->diff($datetime2);
                                                                        $days = $interval->format('%a')+1;
                                                                        $total_holiday = count($holidays)+$t_sat_sun-$t_h_sat_sun;
                                                                        $study_day = ($days-$total_holiday)*4;
                                                                        $total_study_day +=$study_day;
                                                                        @endphp
                                                                        <td style="width: 60px; background-color: #ffdede;">{{$study_day}}</td>
                                                                        @php
                                                                            $date1 = strtotime('+1 month', $date1);
                                                                        $count_month +=1;
                                                                        @endphp
                                                                    @endif
                                                                @endwhile
                                                                @php
                                                                    $remain_month = 12-$count_month;
                                                                @endphp
                                                                @for($x = 0; $x < $remain_month; $x++)
                                                                    <td style="width: 60px; background-color: #ffdede;">-</td>
                                                                @endfor
                                                                <td style="width: 65px;">{{$total_study_day}}</td>
                                                                <td style="width: 50px;">h</td>
                                                            </tr>
                                                            <tr>
                                                                <td>出席時数</td>
                                                                @if(date('Y-m-d',strtotime($grade->grade->start_at)) <= date('Y-m-d') && date('Y-m-d',strtotime($grade->grade->end_at)) <= date('Y-m-d'))
                                                                    @php
                                                                        $date1 = strtotime($grade->grade->start_at);
                                                                        $date2 = strtotime($grade->grade->end_at);
                                                                    $count_month =0;
                                                                    @endphp
                                                                @elseif(date('Y-m-d',strtotime($grade->grade->start_at)) <= date('Y-m-d') && date('Y-m-d',strtotime($grade->grade->end_at)) >= date('Y-m-d'))
                                                                    @php
                                                                        $date1 = strtotime($grade->grade->start_at);
                                                                        $date2 = strtotime(date('Y-m-d'));
                                                                    $count_month =0;
                                                                    @endphp
                                                                @else
                                                                    @php
                                                                        $date1 = strtotime(date('Y-m-01'));
                                                                        $date2 = strtotime(date('Y-m-d'));
                                                                    $count_month =0;
                                                                    @endphp
                                                                @endif

                                                                @php
                                                                    $total_month_attend = 0;
                                                                @endphp
                                                                @while ($date1 <= $date2)
                                                                    @if(date('Y-m') == date('Y-m',$date1))
                                                                        @php
                                                                            $attendances = \App\Attendance::where('student_id',$student->id)->where('type','1')->whereBetween("created_at",[date('Y-m-01 H:i:s'), date('Y-m-d').' 23:59:59'])->get();
                                                                            $present_check = \App\StudentStatus::where('student_id',$student->id)->where('status','present')->whereBetween("created_at",[date('Y-m-01 H:i:s'), date('Y-m-d').' 23:59:59'])->count()/4;
                                                                            $late_check = \App\StudentStatus::where('student_id',$student->id)->where('status','late')->whereBetween("created_at",[date('Y-m-01 H:i:s'), date('Y-m-d').' 23:59:59'])->count()/4;
                                                                            $absent_check = \App\StudentStatus::where('student_id',$student->id)->where('status','absent')->whereBetween("created_at",[date('Y-m-01 H:i:s'), date('Y-m-d').' 23:59:59'])->count()/4;
                                                                            //calculating totall attendance//
                                                                            $total_attend = count($attendances)+$present_check;
                                                                            if ($late_check>=3 && $late_check<=5){
                                                                            $g_total_attend = $total_attend-1;
                                                                            }elseif($late_check>=6 && $late_check<=9){
                                                                            $g_total_attend = $total_attend-2;
                                                                            }elseif($late_check>=10 && $late_check<=12){
                                                                            $g_total_attend = $total_attend-3;
                                                                            }else{
                                                                            $g_total_attend = $total_attend;
                                                                            }
                                                                            $grand_total_attend = $g_total_attend*4;
                                                                            $total_month_attend +=$grand_total_attend;
                                                                        @endphp
                                                                        <td style="width: 60px; background-color: #ffdede;">{{$grand_total_attend}}</td>
                                                                        @php
                                                                            $date1 = strtotime('+1 month', $date1);
                                                                        $count_month +=1;
                                                                        @endphp
                                                                    @else
                                                                        @php
                                                                            $attendances = \App\Attendance::where('student_id',$student->id)->where('type','1')->whereBetween("created_at",[date('Y-m-01 H:i:s',$date1), date('Y-m-t',$date1).' 23:59:59'])->get();
                                                                            $present_check = \App\StudentStatus::where('student_id',$student->id)->where('status','present')->whereBetween("created_at",[date('Y-m-01 H:i:s',$date1), date('Y-m-t',$date1).' 23:59:59'])->count()/4;
                                                                            $late_check = \App\StudentStatus::where('student_id',$student->id)->where('status','late')->whereBetween("created_at",[date('Y-m-01 H:i:s',$date1), date('Y-m-t',$date1).' 23:59:59'])->count()/4;
                                                                            $absent_check = \App\StudentStatus::where('student_id',$student->id)->where('status','absent')->whereBetween("created_at",[date('Y-m-01 H:i:s',$date1), date('Y-m-t',$date1).' 23:59:59'])->count()/4;
                                                                            //calculating totall attendance//
                                                                            $total_attend = count($attendances)+$present_check;
                                                                            if ($late_check>=3 && $late_check<=5){
                                                                            $g_total_attend = $total_attend-1;
                                                                            }elseif($late_check>=6 && $late_check<=9){
                                                                            $g_total_attend = $total_attend-2;
                                                                            }elseif($late_check>=10 && $late_check<=12){
                                                                            $g_total_attend = $total_attend-3;
                                                                            }else{
                                                                            $g_total_attend = $total_attend;
                                                                            }
                                                                            $grand_total_attend = $g_total_attend*4;
                                                                            $total_month_attend +=$grand_total_attend;
                                                                        @endphp
                                                                        <td style="width: 60px; background-color: #ffdede;">{{$grand_total_attend}}</td>
                                                                        @php
                                                                            $date1 = strtotime('+1 month', $date1);
                                                                        $count_month +=1;
                                                                        @endphp
                                                                    @endif

                                                                @endwhile
                                                                @php
                                                                    $attend_hour_rate = round(($total_month_attend/$total_study_day)*100,1);
                                                                $remain_month = 12-$count_month;
                                                                @endphp
                                                                @for($x = 0; $x < $remain_month; $x++)
                                                                    <td style="width: 60px; background-color: #ffdede;">-</td>
                                                                @endfor

                                                                <td style="width: 65px;">{{$total_month_attend}}</td>
                                                                <td style="width: 50px;">{{$attend_hour_rate}}%</td>

                                                            </tr>
                                                            <tr>
                                                                <td>授業日数</td>
                                                                @if(date('Y-m-d',strtotime($grade->grade->start_at)) <= date('Y-m-d') && date('Y-m-d',strtotime($grade->grade->end_at)) <= date('Y-m-d'))
                                                                    @php
                                                                        $date1 = strtotime($grade->grade->start_at);
                                                                        $date2 = strtotime($grade->grade->end_at);
                                                                    $count_month = 0;
                                                                    @endphp
                                                                @elseif(date('Y-m-d',strtotime($grade->grade->start_at)) <= date('Y-m-d') && date('Y-m-d',strtotime($grade->grade->end_at)) >= date('Y-m-d'))
                                                                    @php
                                                                        $date1 = strtotime($grade->grade->start_at);
                                                                        $date2 = strtotime(date('Y-m-d'));
                                                                    $count_month = 0;
                                                                    @endphp
                                                                @else
                                                                    @php
                                                                        $date1 = strtotime(date('Y-m-01'));
                                                                        $date2 = strtotime(date('Y-m-d'));
                                                                    $count_month = 0;
                                                                    @endphp
                                                                @endif
                                                                @php
                                                                    $total_study_day =0;
                                                                @endphp
                                                                @while ($date1 <= $date2)
                                                                    @if(date('Y-m') == date('Y-m',$date1))
                                                                        @php
                                                                            $holidays = \App\Event::orderBy('start_date','ASC')->whereBetween("start_date",[date('Y-m-01',$date1),date('Y-m-d')])->get();
                                                                            /*============== Finding Saturday & Sunday From Holiday Listing ============ */
                                                                            $holi_sat=0;
                                                                            $holi_sun=0;
                                                                            foreach ($holidays as $holiday){
                                                                                if (date('D',strtotime($holiday->start_date))=='Sat'){
                                                                                    $holi_sat +=1;
                                                                                }
                                                                                if (date('D',strtotime($holiday->start_date))=='Sun'){
                                                                                    $holi_sun +=1;
                                                                                }
                                                                            }
                                                                            $t_h_sat_sun = $holi_sat+$holi_sun;
                                                                            /*============== Finding Saturday & Sunday From Holiday Listing ============ */
                                                                            /*============== Geting Total Number of  Saturday & Sunday Between Start To End Date  ============ */
                                                                            $sunday=0;
                                                                            $saturday=0;
                                                                            $start_date = date('Y-m-01',$date1);
                                                                            $end_date = date('Y-m-d');
                                                                            for($i=$start_date;$i<=$end_date;$i++)
                                                                            {

                                                                                $day=date("N",strtotime($i));
                                                                                if($day==7)
                                                                                {
                                                                                    $sunday++;
                                                                                }
                                                                                if($day==6)
                                                                                {
                                                                                    $saturday++;
                                                                                }
                                                                            }
                                                                            $t_sun = $sunday;
                                                                            $t_sat = $saturday;
                                                                            $t_sat_sun=$t_sat+$t_sun;
                                                                            /*============== Geting Total Number of  Saturday & Sunday Between Start To End Date  ============ */
                                                                            $datetime1 = new DateTime($start_date);
                                                                            $datetime2 = new DateTime($end_date);
                                                                            $interval = $datetime1->diff($datetime2);
                                                                            $days = $interval->format('%a')+1;
                                                                            $total_holiday = count($holidays)+$t_sat_sun-$t_h_sat_sun;
                                                                            $study_day = $days-$total_holiday;
                                                                            $total_study_day +=$study_day;
                                                                        @endphp
                                                                        <td style="width: 60px; background-color: #ffdede;">{{$study_day}}</td>
                                                                        @php
                                                                            $date1 = strtotime('+1 month', $date1);
                                                                        $count_month +=1;
                                                                        @endphp
                                                                    @else
                                                                        @php
                                                                            $holidays = \App\Event::orderBy('start_date','ASC')->whereBetween("start_date",[date('Y-m-01',$date1),  date('Y-m-t',$date1)])->get();
                                                                            /*============== Finding Saturday & Sunday From Holiday Listing ============ */
                                                                            $holi_sat=0;
                                                                            $holi_sun=0;
                                                                            foreach ($holidays as $holiday){
                                                                                if (date('D',strtotime($holiday->start_date))=='Sat'){
                                                                                    $holi_sat +=1;
                                                                                }
                                                                                if (date('D',strtotime($holiday->start_date))=='Sun'){
                                                                                    $holi_sun +=1;
                                                                                }
                                                                            }
                                                                            $t_h_sat_sun = $holi_sat+$holi_sun;
                                                                            /*============== Finding Saturday & Sunday From Holiday Listing ============ */
                                                                            /*============== Geting Total Number of  Saturday & Sunday Between Start To End Date  ============ */
                                                                            $sunday=0;
                                                                            $saturday=0;
                                                                            $start_date = date('Y-m-01',$date1);
                                                                            $end_date = date('Y-m-t',$date1);
                                                                            for($i=$start_date;$i<=$end_date;$i++)
                                                                            {

                                                                                $day=date("N",strtotime($i));
                                                                                if($day==7)
                                                                                {
                                                                                    $sunday++;
                                                                                }
                                                                                if($day==6)
                                                                                {
                                                                                    $saturday++;
                                                                                }
                                                                            }
                                                                            $t_sun = $sunday;
                                                                            $t_sat = $saturday;
                                                                            $t_sat_sun=$t_sat+$t_sun;
                                                                            /*============== Geting Total Number of  Saturday & Sunday Between Start To End Date  ============ */
                                                                            $datetime1 = new DateTime($start_date);
                                                                            $datetime2 = new DateTime($end_date);
                                                                            $interval = $datetime1->diff($datetime2);
                                                                            $days = $interval->format('%a')+1;
                                                                            $total_holiday = count($holidays)+$t_sat_sun-$t_h_sat_sun;
                                                                            $study_day = $days-$total_holiday;
                                                                            $total_study_day +=$study_day;
                                                                        @endphp
                                                                        <td style="width: 60px; background-color: #ffdede;">{{$study_day}}</td>
                                                                        @php
                                                                            $date1 = strtotime('+1 month', $date1);
                                                                        $count_month +=1;
                                                                        @endphp
                                                                    @endif
                                                                @endwhile
                                                                @php
                                                                    $remain_month = 12-$count_month;
                                                                @endphp
                                                                @for($x = 0; $x < $remain_month; $x++)
                                                                    <td style="width: 60px; background-color: #ffdede;">-</td>
                                                                @endfor

                                                                <td style="width: 65px;">{{$total_study_day}}</td>
                                                                <td style="width: 50px;">日</td>
                                                            </tr>
                                                            <tr>
                                                                <td>出席時数</td>

                                                                @if(date('Y-m-d',strtotime($grade->grade->start_at)) <= date('Y-m-d') && date('Y-m-d',strtotime($grade->grade->end_at)) <= date('Y-m-d'))
                                                                    @php
                                                                        $date1 = strtotime($grade->grade->start_at);
                                                                        $date2 = strtotime($grade->grade->end_at);
                                                                    $count_month = 0;
                                                                    @endphp
                                                                @elseif(date('Y-m-d',strtotime($grade->grade->start_at)) <= date('Y-m-d') && date('Y-m-d',strtotime($grade->grade->end_at)) >= date('Y-m-d'))
                                                                    @php
                                                                        $date1 = strtotime($grade->grade->start_at);
                                                                        $date2 = strtotime(date('Y-m-d'));
                                                                    $count_month = 0;
                                                                    @endphp
                                                                @else
                                                                    @php
                                                                        $date1 = strtotime(date('Y-m-01'));
                                                                        $date2 = strtotime(date('Y-m-d'));
                                                                    $count_month = 0;
                                                                    @endphp
                                                                @endif

                                                                @php
                                                                    $total_month_attend = 0;
                                                                @endphp
                                                                @while ($date1 <= $date2)
                                                                    @if(date('Y-m') == date('Y-m',$date1))
                                                                        @php
                                                                            $attendances = \App\Attendance::where('student_id',$student->id)->where('type','1')->whereBetween("created_at",[date('Y-m-01 H:i:s'), date('Y-m-d').' 23:59:59'])->get();
                                                                            $present_check = \App\StudentStatus::where('student_id',$student->id)->where('status','present')->whereBetween("created_at",[date('Y-m-01 H:i:s'), date('Y-m-d').' 23:59:59'])->count()/4;
                                                                            $late_check = \App\StudentStatus::where('student_id',$student->id)->where('status','late')->whereBetween("created_at",[date('Y-m-01 H:i:s'), date('Y-m-d').' 23:59:59'])->count()/4;
                                                                            $absent_check = \App\StudentStatus::where('student_id',$student->id)->where('status','absent')->whereBetween("created_at",[date('Y-m-01 H:i:s'), date('Y-m-d').' 23:59:59'])->count()/4;
                                                                            //calculating totall attendance//
                                                                            $total_attend = count($attendances)+$present_check;
                                                                            if ($late_check>=3 && $late_check<=5){
                                                                            $g_total_attend = $total_attend-1;
                                                                            }elseif($late_check>=6 && $late_check<=9){
                                                                            $g_total_attend = $total_attend-2;
                                                                            }elseif($late_check>=10 && $late_check<=12){
                                                                            $g_total_attend = $total_attend-3;
                                                                            }else{
                                                                            $g_total_attend = $total_attend;
                                                                            }
                                                                            $total_month_attend +=$g_total_attend;
                                                                        @endphp
                                                                        <td style="width: 60px; background-color: #ffdede;">{{$g_total_attend}}</td>
                                                                        @php
                                                                            $date1 = strtotime('+1 month', $date1);
                                                                        $count_month  +=1;
                                                                        @endphp
                                                                    @else
                                                                        @php
                                                                            $attendances = \App\Attendance::where('student_id',$student->id)->where('type','1')->whereBetween("created_at",[date('Y-m-01 H:i:s',$date1), date('Y-m-t',$date1).' 23:59:59'])->get();
                                                                            $present_check = \App\StudentStatus::where('student_id',$student->id)->where('status','present')->whereBetween("created_at",[date('Y-m-01 H:i:s',$date1), date('Y-m-t',$date1).' 23:59:59'])->count()/4;
                                                                            $late_check = \App\StudentStatus::where('student_id',$student->id)->where('status','late')->whereBetween("created_at",[date('Y-m-01 H:i:s',$date1), date('Y-m-t',$date1).' 23:59:59'])->count()/4;
                                                                            $absent_check = \App\StudentStatus::where('student_id',$student->id)->where('status','absent')->whereBetween("created_at",[date('Y-m-01 H:i:s',$date1), date('Y-m-t',$date1).' 23:59:59'])->count()/4;
                                                                            //calculating totall attendance//
                                                                            $total_attend = count($attendances)+$present_check;
                                                                            if ($late_check>=3 && $late_check<=5){
                                                                            $g_total_attend = $total_attend-1;
                                                                            }elseif($late_check>=6 && $late_check<=9){
                                                                            $g_total_attend = $total_attend-2;
                                                                            }elseif($late_check>=10 && $late_check<=12){
                                                                            $g_total_attend = $total_attend-3;
                                                                            }else{
                                                                            $g_total_attend = $total_attend;
                                                                            }
                                                                            $total_month_attend +=$g_total_attend;
                                                                        @endphp
                                                                        <td style="width: 60px; background-color: #ffdede;">{{$g_total_attend}}</td>
                                                                        @php
                                                                            $date1 = strtotime('+1 month', $date1);
                                                                        $count_month  +=1;
                                                                        @endphp
                                                                    @endif
                                                                @endwhile
                                                                @php
                                                                    $attend_day_rate = round(($total_month_attend/$total_study_day)*100,1);
                                                                    $remain_month = 12-$count_month;
                                                                @endphp
                                                                @for($x = 0; $x < $remain_month; $x++)
                                                                    <td style="width: 60px; background-color: #ffdede;">-</td>
                                                                @endfor

                                                                <td style="width: 65px;">{{$total_month_attend}}</td>
                                                                <td style="width: 50px;">{{$attend_day_rate}}%</td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>

                                                @php
                                                    $total_attend_hour += $attend_hour_rate;
                                                    $total_attend_day += $attend_day_rate;
                                                @endphp
                                            @endif
                                        @endforeach
                                    @endif
                                    <tr>
                                        <td class="text-align-left" colspan="17">◎時数の増えている箇所は学校行事等による</td>
                                    </tr>
                                    <tr>
                                        <td class="text-align-center" colspan="2">科目名</td>
                                        @foreach($subjects as $subject)
                                            <td class="text-align-center" colspan="3">{{$subject->name}}</td>
                                        @endforeach
                                    </tr>
                                    @foreach($exams as $e=>$exam)
                                        @if(!($exam->name=='Assignment'))
                                            <tr>
                                                <td class="text-align-center" rowspan="2" colspan="2">成績</td>
                                                <td class="text-align-center" colspan="3" style="width: 100px;">{{$exam->name}}</td>
                                                <td class="text-align-center" colspan="3">{{$exam->name}}</td>
                                                <td class="text-align-center" colspan="3">{{$exam->name}}</td>
                                                <td class="text-align-center" colspan="3">{{$exam->name}}</td>
                                                <td class="text-align-center" colspan="3">{{$exam->name}}</td>
                                            </tr>
                                            <tr>
                                                @foreach($subjects as $subject)
                                                    @php
                                                        $marks = \App\Marksheet::where('student_id',$student->id)->where('class_id',$subject->id)->where('exam_id',$exam->id)->get();
                                                    @endphp
                                                    @if(count($marks)>0)
                                                        <td class="text-align-center" colspan="3">
                                                            @foreach($marks as $mark)
                                                                {{$mark->marks->name}}
                                                            @endforeach
                                                        </td>
                                                    @else
                                                        <td class="text-align-center" colspan="3">
                                                            ----
                                                        </td>
                                                    @endif
                                                @endforeach
                                            </tr>
                                        @else
                                            <tr>
                                                <td class="text-align-center" rowspan="2" colspan="2"></td>
                                                <td class="text-align-center" colspan="3">卒業課題1</td>
                                                <td class="text-align-center" colspan="3">卒業課題2</td>
                                                <td class="text-align-center" colspan="3">卒業課題3</td>
                                                <td class="text-align-center" colspan="3">卒業課題4</td>
                                                <td class="text-align-center" colspan="3">卒業課題5</td>
                                            </tr>
                                            <tr>
                                                @foreach($subjects as $subject)
                                                    @php
                                                        $marks = \App\Marksheet::where('student_id',$student->id)->where('class_id',$subject->id)->where('exam_id',$exam->id)->get();
                                                    @endphp
                                                    @if(count($marks)>0)
                                                        <td class="text-align-center" colspan="3">
                                                            @foreach($marks as $mark)
                                                                {{$mark->marks->name}}
                                                            @endforeach
                                                        </td>
                                                    @else
                                                        <td class="text-align-center" colspan="3">
                                                            ----
                                                        </td>
                                                    @endif
                                                @endforeach
                                            </tr>
                                        @endif
                                    @endforeach
                                    <tr>
                                        <td class="blank_td" colspan="17"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"></td>
                                        <td class="text-align-left" colspan="7">◎　１週間５日　授業（　１日　45分×4）</td>
                                        <td class="text-align-center" colspan="8">総合出席率・評価</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"></td>
                                        <td class="text-align-left" colspan="7">◎　成績評価　AA≧AB≧AC≧</td>
                                        <td class="text-align-center" colspan="4" id="average_attend">
                                            @if(count($student->grades)>=2)
                                            @php
                                            $count_value = 0;
                                            @endphp
                                            @foreach($student->grades as $countvalue)
                                                @if(!(date('Y-m-d',strtotime($countvalue->grade->start_at)) > date('Y-m-d')))
                                                        @php $count_value +=1; @endphp
                                                    @endif
                                                @endforeach
                                                {{($total_attend_hour+$total_attend_day)/($count_value*2)}}%
                                            @else
                                                {{($total_attend_hour+$total_attend_day)/(count($student->grades)*2)}}%
                                            @endif
                                        </td>
                                        <td class="text-align-center" colspan="4">
                                            @php
                                                $markrank = \App\Markrank::all();
                                                $total_mark = 0;
                                            @endphp
                                            @foreach($markrank as $rank)
                                                @php
                                                    $total_sub = \App\Subject::all();
                                                    $marksheets = \App\Marksheet::where('student_id',$student->id)->where('marks_id',$rank->id)->get();
                                                    $total_mark += count($marksheets)*$rank->rank;
                                                @endphp
                                            @endforeach
                                            @php
                                                $mark_t = \App\Marksheet::where('student_id',$student->id)->get();
                                            @endphp
                                            @if(count($mark_t)>0)
                                                @php
                                                    $average_rank = $total_mark/count($subjects);
                                                @endphp
                                                @if($average_rank>='90')
                                                    AA
                                                @elseif($average_rank>='85' && $average_rank<'90')
                                                    AB
                                                @elseif($average_rank>='80' && $average_rank<'85')
                                                    AC
                                                @elseif($average_rank>='78' && $average_rank<'80')
                                                    BA
                                                @elseif($average_rank>='75' && $average_rank<'78')
                                                    BB
                                                @elseif($average_rank>='70' && $average_rank<'75')
                                                    BC
                                                @elseif($average_rank>='68' && $average_rank<'70')
                                                    CA
                                                @elseif($average_rank>='65' && $average_rank<'68')
                                                    CB
                                                @elseif($average_rank>='60' && $average_rank<'65')
                                                    CC
                                                @elseif($average_rank<='59')
                                                    D
                                                @endif
                                            @else
                                                D
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"></td>
                                        <td class="text-align-right" colspan="7">BA≧BB≧BC≧</td>
                                        <td class="text-align-center" colspan="8"> 合  格</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"></td>
                                        <td class="text-align-right" colspan="7">CA≧CB≧CC＞</td>
                                        <td class="text-align-right" colspan="8"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"></td>
                                        <td class="text-align-right" colspan="7">D（不合格）</td>
                                        <td class="text-align-right" colspan="8"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="10"></td>
                                        <td class="text-align-left" colspan="7">学校法人郡山学園</td>
                                    </tr>
                                    <tr>
                                        <td colspan="10"></td>
                                        <td class="text-align-left" colspan="7">専門学校 中央美術学園</td>
                                    </tr>
                                    <tr>
                                        <td colspan="10"></td>
                                        <td class="text-align-left" colspan="7">理事長・学校長</td>
                                    </tr>
                                    <tr>
                                        <td colspan="10"></td>
                                        <td class="text-align-left" colspan="7">カドカ・インドラ・バハドゥル</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-lg-5"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Dynamic Table with Export Buttons -->
        </div>
        <!-- END Page Content -->

    </main>
    <!-- END Main Container -->
@endsection
@section('script')
    <script>
        $(document).ready(function () {

            $('.student_grade').each(function (i,ls) {
                {{--var section = "{{request('section')}}";--}}
                $(ls).data('grade_id');
                $(ls).data('start_at');
                $(ls).data('end_at');
                $(ls).data('student_id');
                $.ajax({
                    url: Laravel.url + "/admin/student_grade/"+$(ls).data('grade_id')+"/"+$(ls).data('start_at')+"/"+$(ls).data('end_at')+"/"+$(ls).data('student_id'),
                    method:"GET",
                    success: function (data, textStatus, request) {

                        $('#student_grade_'+request.getResponseHeader('grade_id')).html(data);

                    },
                    error: function (error) {
                        debugger;
                    }

                });
            });

        });

    </script>
@endsection