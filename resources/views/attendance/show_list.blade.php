
<style>
    .day-group{
        display: inline-block;
        width: 51px;
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
    .main-menu{
        position: relative;
    }
    .main-menu:hover .sub-menu{
        display: block;
        z-index: 111;
        text-align: left;
        background-color: #fff;
        padding:2px;
        border:1px solid lightgrey;
        border-radius: 10px;
    }
    .main-menu .sub-menu{
        position: absolute;
        display: none;
    }
</style>
<table>
    <tr>
    <?php
    $i = 0;
    $start_date = $class_section_student->start_date;
    $end_date = $class_section_student->end_date;
    ?>
    @php $holidays = \App\Event::where('start_date',$start_date)->get(); @endphp

    @if(time() >=strtotime($start_date))
    <td>
        @if(count($holidays)>0)
        <div class="day-group" style="background-color: lightgray; height: 96px; margin-top:5px;" title="Holiday">
        </div>
        @elseif(date('D',strtotime($start_date))=='Sat' || date('D',strtotime($start_date))=='Sun')
        <div class="day-group" style="background-color: lightgray; height: 96px; margin-top:5px;" title="Saturday/Sunday">
        </div>
        @elseif(($atten = \App\Attendance::where('student_id',$id)->whereBetween('created_at', array($start_date.' 00:00:00',$start_date.' 23:59:59'))->get()) && ($atten->count()))
        <div class="day-group">
                @foreach($class_section_student->class_batch_section_periods as $section_period)
                    <div id="{{$start_date}}_{{$section_period->period_id}}" width="20px">
                        @php $check_status = \App\StudentStatus::where('period_id',$section_period->period_id)->where('attendance_id',$atten[0]->id)->where('student_id',$id)->whereBetween('created_at', array($start_date.' 00:00:00',$start_date.' 23:59:59'))->get() @endphp
                        @if(count($check_status)>0)
                            @if($check_status[0]->status=='present')
                            <span class="main-menu">
                                <span class="btn btn-success btn-sm" style="font-size: 9px" title="Present 1st-Col from Admin attend">0</span>
                                <span class="sub-menu">
                                    <form action="{{url('exist_attend_update').'/'.$check_status[0]->id}}" method="post">
                                        {{csrf_field()}}
                                        <input type="hidden" name="status" value="late">
                                        <button class="btn btn-warning btn-sm" style="font-size: 9px" title="Late Present" onclick="return confirm('Are you sure to make late for this period')">△</button>
                                    </form>
                                    <form action="{{url('exist_attend_update').'/'.$check_status[0]->id}}" method="post">
                                        {{csrf_field()}}
                                        <input type="hidden" name="status" value="absent">
                                        <button type="submit" class="fa fa-times btn btn-danger btn-sm" title="Absent" style="font-size: 9px" onclick="return confirm('Are you sure to make absent for this period')"></button>
                                    </form>
                                </span>
                            </span>
                            @elseif($check_status[0]->status=='late')
                            <span class="main-menu">
                                <span class="btn btn-warning btn-sm" style="font-size: 9px" title="Late Present 1st-Col from Admin attend">△</span>
                                    <span class="sub-menu">
                                        <form action="{{url('exist_attend_update').'/'.$check_status[0]->id}}" method="post">
                                            {{csrf_field()}}
                                            <input type="hidden" name="status" value="present">
                                            <button class="btn btn-success btn-sm" style="font-size: 9px" title="Present" onclick="return confirm('Are you sure to make present for this period')">0</button>
                                        </form>
                                        <form action="{{url('exist_attend_update').'/'.$check_status[0]->id}}" method="post">
                                            {{csrf_field()}}
                                            <input type="hidden" name="status" value="absent">
                                            <button class="fa fa-times btn btn-danger btn-sm" title="Absent" style="font-size: 9px" onclick="return confirm('Are you sure to make absent for this period')"></button>
                                        </form>
                                    </span>
                            </span>
                            @elseif($check_status[0]->status=='absent')
                                <span class="main-menu">
                                <i class="fa fa-times btn btn-danger btn-sm" title="Absent 1st-Col from Admin attend" style="font-size: 9px"></i>
                                    <span class="sub-menu">
                                    <form action="{{url('exist_attend_update').'/'.$check_status[0]->id}}" method="post">
                                        {{csrf_field()}}
                                        <input type="hidden" name="status" value="present">
                                        <button class="btn btn-success btn-sm" style="font-size: 9px" title="Present" onclick="return confirm('Are you sure to make present for this period')">0</button>
                                    </form>
                                <form action="{{url('exist_attend_update').'/'.$check_status[0]->id}}" method="post">
                                    {{csrf_field()}}
                                    <input type="hidden" name="status" value="late">
                                        <button class="btn btn-warning btn-sm" style="font-size: 9px" title="Late Present" onclick="return confirm('Are you sure to make late for this period')">△</button>
                                </form>
                                    </span>
                            </span>
                            @endif
                        @else
                            @php $dif = (strtotime(date('H:i',strtotime($atten[0]->created_at))) - strtotime($section_period->start_at))/(60); @endphp
                            @if($dif <= 10)
                            <span class="main-menu">
                                <span class="btn btn-success btn-sm" style="font-size: 9px" title="Present">0</span>
                                <span class="sub-menu">
                                    <form action="{{url('new_attend_entry').'/'.$atten[0]->id.'/'.$section_period->period_id}}" method="post">
                                        {{csrf_field()}}
                                        <input type="hidden" name="status" value="late">
                                        <button type="submit" class="btn btn-warning btn-sm" style="font-size: 9px" title="Late Present" onclick="return confirm('Are you sure to make late for this period')">△</button>
                                    </form>
                                    <form action="{{url('new_attend_entry').'/'.$atten[0]->id.'/'.$section_period->period_id}}" method="post">
                                        {{csrf_field()}}
                                        <input type="hidden" name="status" value="absent">
                                        <button class="fa fa-times btn btn-danger btn-sm" title="Absent" style="font-size: 9px" onclick="return confirm('Are you sure to make absent for this period')"></button>
                                    </form>
                                </span>
                            </span>
                            @elseif (($dif >= 10 ) && (strtotime(date('H:i',strtotime($atten[0]->created_at))) < strtotime($section_period->end_at)) )
                            <span class="main-menu">
                                <span class="btn btn-warning btn-sm" style="font-size: 9px" title="Late Present">△</span>
                                <span class="sub-menu">
                                    <form action="{{url('new_attend_entry').'/'.$atten[0]->id.'/'.$section_period->period_id}}" method="post">
                                        {{csrf_field()}}
                                        <input type="hidden" name="status" value="present">
                                    <button class="btn btn-success btn-sm" style="font-size: 9px" title="Present" onclick="return confirm('Are you sure to make present for this period?')">0</button>
                                    </form>
                                    <form action="{{url('new_attend_entry').'/'.$atten[0]->id.'/'.$section_period->period_id}}" method="post">
                                        {{csrf_field()}}
                                        <input type="hidden" name="status" value="absent">
                                        <button class="fa fa-times btn btn-danger btn-sm" title="Absent" style="font-size: 9px" onclick="return confirm('Are you sure to make absent for this period?')"></button>
                                    </form>
                                </span>
                            </span>
                            @else
                            <span class="main-menu">
                                <i class="fa fa-times btn btn-danger btn-sm" title="Absent 1st-Col from QR attend" style="font-size: 9px"></i>
                                <span class="sub-menu">
                                    <form action="{{url('new_attend_entry').'/'.$atten[0]->id.'/'.$section_period->period_id}}" method="post">
                                        {{csrf_field()}}
                                        <input type="hidden" name="status" value="present">
                                    <button class="btn btn-success btn-sm" style="font-size: 9px" title="Present" onclick="return confirm('Are you sure to make present for this period?')">0</button>
                                    </form>
                                    <form action="{{url('new_attend_entry').'/'.$atten[0]->id.'/'.$section_period->period_id}}" method="post">
                                        {{csrf_field()}}
                                        <input type="hidden" name="status" value="late">
                                            <button class="btn btn-warning btn-sm" style="font-size: 9px" title="Late Present" onclick="return confirm('Are you sure to make late for this period?')">△</button>
                                    </form>
                                </span>
                            </span>
                            @endif
                        @endif
                    </div>
            @endforeach
            </div>
        @else
        <div class="day-group">
        @foreach($class_section_student->class_batch_section_periods as $section_period)
            @php
            $period_time = $start_date.' '.$section_period->start_at;
            $period = $section_period->period_id;
            $student = $id;
            @endphp
            <div width="20px">
                <span class="main-menu">
                <i class="fa fa-times btn btn-danger btn-sm" title="Absent 1st-Col from QR Not Scan" style="font-size: 9px"></i>
                    <span class="sub-menu">
                        <form action="{{url('get_new_attend').'/'.$period_time.'/'.$period.'/'.$student}}" method="post">
                            {{csrf_field()}}
                            <input type="hidden" name="status" value="present">
                            <button type="submit" class="btn btn-success btn-sm" style="font-size: 9px" title="Present" onclick="return confirm('Are you sure to make present for this period?')">0</button>
                        </form>
                        <form action="{{url('get_new_attend').'/'.$period_time.'/'.$period.'/'.$student}}" method="post">
                            {{csrf_field()}}
                            <input type="hidden" name="status" value="late">
                        <button class="btn btn-warning btn-sm" style="font-size: 9px" title="Late Present" onclick="return confirm('Are you sure to make late for this period?')">△</button>
                        </form>
                    </span>
                </span>
            </div>
        @endforeach
        </div>
        @endif
    </td>
    @endif

@while($start_date != $end_date)
    <td>
    @php $start_date = date('Y-m-d',strtotime("+1 day", strtotime($start_date)))  @endphp
    @php $holidays = \App\Event::where('start_date',$start_date)->get(); @endphp
    @if(time() < strtotime($start_date))
    @elseif(count($holidays)>0)
        <div class="day-group" style="background-color: lightgray; height: 96px; margin-top:5px;" title="Holiday">
        </div>
    @elseif(date('D',strtotime($start_date))=='Sat' || date('D',strtotime($start_date))=='Sun')
        <div class="day-group" style="background-color: lightgray; height: 96px; margin-top:5px;" title="Saturday/Sunday">
        </div>
    @elseif(($atten = \App\Attendance::where('student_id',$id)->whereBetween('created_at', array($start_date.' 00:00:00',$start_date.' 23:59:59'))->get()) && ($atten->count()))
        <div class="day-group">
        @foreach($class_section_student->class_batch_section_periods as $section_period)
            <div id="{{$start_date}}_{{$section_period->period_id}}" width="20px">
                @php $check_status = \App\StudentStatus::where('period_id',$section_period->period_id)->where('attendance_id',$atten[0]->id)->where('student_id',$id)->whereBetween('created_at', array($start_date.' 00:00:00',$start_date.' 23:59:59'))->get() @endphp
                @if(count($check_status)>0)
                    @if($check_status[0]->status=='present')
                    <span class="main-menu" id="old_status_{{$check_status[0]->id}}">
                            <span class="btn btn-success btn-sm" style="font-size: 9px" title="Present from admin">0</span>
                            <span class="sub-menu">
                                <form action="{{url('exist_attend_update').'/'.$check_status[0]->id}}" method="post" onsubmit="changeAttendace(this); return  false;" >
                                    {{csrf_field()}}
                                    <input type="hidden" name="status" value="late">
                                    <button class="btn btn-warning btn-sm" style="font-size: 9px" title="Late Present" onclick="return confirm('Are you sure to make late for this period')">△</button>
                                </form>
                                <form action="{{url('exist_attend_update').'/'.$check_status[0]->id}}" method="post" onsubmit="changeAttendace(this); return  false;">
                                    {{csrf_field()}}
                                    <input type="hidden" name="status" value="absent">
                                    <button type="submit" class="fa fa-times btn btn-danger btn-sm" title="Absent" style="font-size: 9px" onclick="return confirm('Are you sure to make absent for this period')"></button>
                                </form>
                            </span>
                        </span>
                        @elseif($check_status[0]->status=='late')
                        <span class="main-menu" id="old_status_{{$check_status[0]->id}}">
                        <span class="btn btn-warning btn-sm" style="font-size: 9px" title="Late Present from admin">△</span>
                            <span class="sub-menu">
                                    <form action="{{url('exist_attend_update').'/'.$check_status[0]->id}}" method="post" onsubmit="changeAttendace(this); return  false;">
                                        {{csrf_field()}}
                                        <input type="hidden" name="status" value="present">
                                        <button class="btn btn-success btn-sm" style="font-size: 9px" title="Present" onclick="return confirm('Are you sure to make present for this period')">0</button>
                                    </form>
                                    <form action="{{url('exist_attend_update').'/'.$check_status[0]->id}}" method="post" onsubmit="changeAttendace(this); return  false;">
                                        {{csrf_field()}}
                                        <input type="hidden" name="status" value="absent">
                                        <button class="fa fa-times btn btn-danger btn-sm" title="Absent" style="font-size: 9px" onclick="return confirm('Are you sure to make absent for this period')"></button>
                                    </form>
                            </span>
                        </span>
                        @elseif($check_status[0]->status=='absent')
                        <span class="main-menu" id="old_status_{{$check_status[0]->id}}" >
                                <i class="fa fa-times btn btn-danger btn-sm" title="Absent from admin" style="font-size: 9px"></i>
                                    <span class="sub-menu">
                                    <form action="{{url('exist_attend_update').'/'.$check_status[0]->id}}" method="post" onsubmit="changeAttendace(this); return  false;" >
                                        {{csrf_field()}}
                                        <input type="hidden" name="status" value="present">
                                        <button class="btn btn-success btn-sm" style="font-size: 9px" title="Present" onclick="return confirm('Are you sure to make present for this period')">0</button>
                                    </form>
                                <form action="{{url('exist_attend_update').'/'.$check_status[0]->id}}" method="post"  onsubmit="changeAttendace(this); return  false;">
                                    {{csrf_field()}}
                                    <input type="hidden" name="status" value="late">
                                        <button class="btn btn-warning btn-sm" style="font-size: 9px" title="Late Present" onclick="return confirm('Are you sure to make late for this period')">△</button>
                                </form>
                                    </span>
                            </span>
                    @endif
                @else
                    @php $dif = (strtotime(date('H:i',strtotime($atten[0]->created_at))) - strtotime($section_period->start_at))/(60); @endphp
                    @if($dif <= 10)
                            <span class="main-menu" id="attendance_{{$atten[0]->id}}_{{$section_period->period_id}}">
                                <span class="btn btn-success btn-sm" style="font-size: 9px" title="Present from QR scan">0</span>
                                <span class="sub-menu">
                                    <form action="{{url('new_attend_entry').'/'.$atten[0]->id.'/'.$section_period->period_id}}" method="post" onsubmit="changeAttendace(this); return  false;">
                                        {{csrf_field()}}
                                        <input type="hidden" name="status" value="late">
                                        <button type="submit" class="btn btn-warning btn-sm" style="font-size: 9px" title="Late Present" onclick="return confirm('Are you sure to make late for this period?')">△</button>
                                    </form>
                                    <form action="{{url('new_attend_entry').'/'.$atten[0]->id.'/'.$section_period->period_id}}" method="post" onsubmit="changeAttendace(this); return  false;">
                                        {{csrf_field()}}
                                        <input type="hidden" name="status" value="absent">
                                        <button class="fa fa-times btn btn-danger btn-sm" title="Absent" style="font-size: 9px" onclick="return confirm('Are you sure to make absent for this period?')"></button>
                                    </form>
                                </span>
                            </span>
                    @elseif (($dif >= 10 ) && (strtotime(date('H:i',strtotime($atten[0]->created_at))) < strtotime($section_period->end_at)) )
                        {{--<span class="btn btn-warning btn-sm" style="font-size: 9px" title="Late Present">△</span>--}}
                            <span class="main-menu" id="attendance_{{$atten[0]->id}}_{{$section_period->period_id}}">
                            <span class="btn btn-warning btn-sm" style="font-size: 9px" title="Late Present from QR scan">△</span>
                                <span class="sub-menu">
                                    <form action="{{url('new_attend_entry').'/'.$atten[0]->id.'/'.$section_period->period_id}}" method="post" onsubmit="changeAttendace(this); return  false;">
                                        {{csrf_field()}}
                                        <input type="hidden" name="status" value="present">
                                    <button class="btn btn-success btn-sm" style="font-size: 9px" title="Present" onclick="return confirm('Are you sure to make present for this period?')">0</button>
                                    </form>
                                    <form action="{{url('new_attend_entry').'/'.$atten[0]->id.'/'.$section_period->period_id}}" method="post" onsubmit="changeAttendace(this); return  false;">
                                        {{csrf_field()}}
                                        <input type="hidden" name="status" value="absent">
                                        <button class="fa fa-times btn btn-danger btn-sm" title="Absent" style="font-size: 9px" onclick="return confirm('Are you sure to make absent for this period?')"></button>
                                    </form>
                                </span>
                            </span>
                    @else
                        {{--<i class="fa fa-times btn btn-danger btn-sm" title="Absent" style="font-size: 9px"></i>--}}
                            <span class="main-menu" id="attendance_{{$atten[0]->id}}_{{$section_period->period_id}}">
                                <i class="fa fa-times btn btn-danger btn-sm" title="Absent from QR scan" style="font-size: 9px"></i>
                                <span class="sub-menu">
                                    <form action="{{url('new_attend_entry').'/'.$atten[0]->id.'/'.$section_period->period_id}}" onsubmit="changeAttendace(this); return  false;" method="post">
                                        {{csrf_field()}}
                                        <input type="hidden" name="status" value="present">
                                    <button class="btn btn-success btn-sm" style="font-size: 9px" title="Present" onclick="return confirm('Are you sure to make present for this period?')">0</button>
                                    </form>
                                    <form action="{{url('new_attend_entry').'/'.$atten[0]->id.'/'.$section_period->period_id}}" method="post" onsubmit="changeAttendace(this); return  false;">
                                        {{csrf_field()}}
                                        <input type="hidden" name="status" value="late">
                                            <button class="btn btn-warning btn-sm" style="font-size: 9px" title="Late Present" onclick="return confirm('Are you sure to make late for this period?')">△</button>
                                    </form>
                                </span>
                            </span>
                    @endif
                @endif
            </div>
        @endforeach
        </div>
    @else
        <div class="day-group" >
        @foreach($class_section_student->class_batch_section_periods as $section_period)
        @php
            $period_time = $start_date.' '.$section_period->start_at;
            $period = $section_period->period_id;
            $student = $id;
        @endphp
        <div id="{{$start_date}}_{{$section_period->period_id}}" width="20px">
            <span class="main-menu" id="xyz_attendance_{{$start_date}}_{{$section_period->period_id}}_{{$id}}">
                <i class="fa fa-times btn btn-danger btn-sm" title="Absent from QR Not scan" style="font-size: 9px"> </i>
                <span class="sub-menu">
                    <form action="{{url('get_new_attend')."/".$start_date."_".$section_period->id.'/'.$period_time.'/'.$period.'/'.$student}}" method="post" onsubmit="changeAttendace(this); return  false;">
                        {{csrf_field()}}
                        <input type="hidden" name="status" value="present">
                        <button type="submit" class="btn btn-success btn-sm" style="font-size: 9px" title="Present" onclick="return confirm('Are you sure to make present for this period?')">0</button>
                    </form>
                    <form action="{{url('get_new_attend')."/".$start_date."_".$section_period->id.'/'.$period_time.'/'.$period.'/'.$student}}" method="post" onsubmit="changeAttendace(this); return  false;">
                        {{csrf_field()}}
                        <input type="hidden" name="status" value="late">
                    <button class="btn btn-warning btn-sm" style="font-size: 9px" title="Late Present" onclick="return confirm('Are you sure to make late for this period?')">△</button>
                    </form>
                </span>
            </span>
        </div>
    @endforeach
        </div>
    @endif
    </td>
@endwhile
    </tr>
</table>
