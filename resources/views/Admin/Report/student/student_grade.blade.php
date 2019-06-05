
<tr>
    <td style="width:73px;">授業日数</td>
    @php
        $date1 = strtotime($start_at);
        $date2 = strtotime($end_at);
    @endphp
    @php
        $total_study_day =0;
    @endphp
    @while ($date1 <= $date2)
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
        @php $date1 = strtotime('+1 month', $date1); @endphp
    @endwhile
    <td style="width: 65px;">{{$total_study_day}}</td>
    <td style="width: 50px;">h</td>
</tr>
<tr>
    <td>出席時数</td>
    @php
        $date1 = strtotime($start_at);
        $date2 = strtotime($end_at);
        $total_month_attend = 0;
    @endphp
    @while ($date1 <= $date2)
        @php
        $attendances = \App\Attendance::where('student_id',$id)->where('type','1')->whereBetween("created_at",[date('Y-m-01 H:i:s',$date1), date('Y-m-t',$date1).' 23:59:59'])->get();
        $total_attend = count($attendances)*4;
            $total_month_attend +=$total_attend;
        @endphp
        <td style="width: 60px; background-color: #ffdede;">{{count($attendances)*4}}</td>
        @php $date1 = strtotime('+1 month', $date1); @endphp
    @endwhile
    <td style="width: 65px;">{{$total_month_attend}}</td>
    <td style="width: 50px;" class="attend_day" data-attend_hour="{{round(($total_month_attend/$total_study_day)*100,1)}}">{{round(($total_month_attend/$total_study_day)*100,1)}}%</td>

</tr>
<tr>
    <td>授業日数</td>
    @php
        $date1 = strtotime($start_at);
        $date2 = strtotime($end_at);
    @endphp
    @php
        $total_study_day =0;
    @endphp
    @while ($date1 <= $date2)
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
        @php $date1 = strtotime('+1 month', $date1); @endphp
    @endwhile
    <td style="width: 65px;">{{$total_study_day}}</td>
    <td style="width: 50px;">日</td>
</tr>
<tr>
    <td>出席時数</td>
    @php
        $date1 = strtotime($start_at);
        $date2 = strtotime($end_at);
        $total_month_attend = 0;
    @endphp
    @while ($date1 <= $date2)
        @php
            $attendances = \App\Attendance::where('student_id',$id)->where('type','1')->whereBetween("created_at",[date('Y-m-01 H:i:s',$date1), date('Y-m-t',$date1).' 23:59:59'])->get();
            $total_attend = count($attendances);
                $total_month_attend +=$total_attend;
        @endphp
        <td style="width: 60px; background-color: #ffdede;">{{count($attendances)}}</td>
        @php $date1 = strtotime('+1 month', $date1); @endphp
    @endwhile
    <td style="width: 65px;">{{$total_month_attend}}</td>
    <td style="width: 50px;" class="attend_hour" data-attend_day="{{round(($total_month_attend/$total_study_day)*100,1)}}">{{round(($total_month_attend/$total_study_day)*100,1)}}%</td>
</tr>
