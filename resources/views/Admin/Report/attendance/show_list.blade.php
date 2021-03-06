
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
</style>
    <table>
        <tr>

    @php $holidays = \App\Event::where('start_date',$start_date)->get(); @endphp

    @if(time() < strtotime($start_date))
    @else
                <td>
            @if(count($holidays)>0)
                        <div class="day-group" style="background-color: lightgray; height: 96px; margin-top:5px;">
                        </div>
            @elseif(date('D',strtotime($start_date))=='Sat' || date('D',strtotime($start_date))=='Sun')
                        <div class="day-group" style="background-color: lightgray; height: 96px; margin-top:5px;">
                        </div>

            @elseif(($atten = \App\Attendance::where('student_id',$id)->whereBetween('created_at', array($start_date.' 00:00:00',$start_date.' 23:59:59'))->get()) && ($atten->count()))

           <div class="day-group">
                @foreach($class_section_student->class_batch_section_periods as $section_period)
                    <div id="{{$start_date}}_{{$section_period->period_id}}" width="20px">
                        @php $check_status = \App\StudentStatus::where('period_id',$section_period->period_id)->where('attendance_id',$atten[0]->id)->where('student_id',$id)->whereBetween('created_at', array($start_date.' 00:00:00',$start_date.' 23:59:59'))->get() @endphp
                        @if(count($check_status)>0)
                            @if($check_status[0]->status=='present')
                                <span class="btn btn-success btn-sm period-{{$section_period->period_id}}" data-period="{{$section_period->period_id}}" style="font-size: 9px">0</span>
                            @elseif ($check_status[0]->status=='late')
                                <span class="btn btn-warning btn-sm period-{{$section_period->period_id}}" data-period="{{$section_period->period_id}}" style="font-size: 9px">△</span>
                            @else
                                <i class="fa fa-times btn btn-danger btn-sm period-{{$section_period->period_id}}" data-period="{{$section_period->period_id}}" style="font-size: 9px"></i>
                            @endif
                        @else
                            @php $dif = (strtotime(date('H:i',strtotime($atten[0]->created_at))) - strtotime($section_period->start_at))/(60); @endphp
                            @if($dif < 10)
                                <span class="btn btn-success btn-sm period-{{$section_period->period_id}}" data-period="{{$section_period->period_id}}" style="font-size: 9px">0</span>
                            @elseif (($dif >= 10 ) && (strtotime(date('H:i',strtotime($atten[0]->created_at))) < strtotime($section_period->end_at)) )
                                <span class="btn btn-warning btn-sm period-{{$section_period->period_id}}" data-period="{{$section_period->period_id}}" style="font-size: 9px">△</span>
                            @else
                                <i class="fa fa-times btn btn-danger btn-sm period-{{$section_period->period_id}}" data-period="{{$section_period->period_id}}" style="font-size: 9px"></i>
                            @endif
                        @endif
                    </div>
            @endforeach
            </div>

        @else

            <div class="day-group">
            @foreach($class_section_student->class_batch_section_periods as $section_period)
                <div width="20px">
                    <i class="fa fa-times btn btn-danger btn-sm period-{{$section_period->period_id}}" data-period="{{$section_period->period_id}}" style="font-size: 9px"></i>
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
            {{--<div class="day-group">--}}
        {{--@foreach($class_section_student->class_batch_section_periods as $section_period)--}}
            {{--<div id="{{$start_date}}_{{$section_period->period_id}}" >--}}

            {{--</div>--}}
        {{--@endforeach--}}
            {{--</div>--}}
        @elseif(count($holidays)>0)
            <div class="day-group" style="background-color: lightgray; height: 96px; margin-top:5px;">
            </div>
    @elseif(date('D',strtotime($start_date))=='Sat' || date('D',strtotime($start_date))=='Sun')
            <div class="day-group" style="background-color: lightgray; height: 96px; margin-top:5px;">
            </div>
    @elseif(($atten = \App\Attendance::where('student_id',$id)->whereBetween('created_at', array($start_date.' 00:00:00',$start_date.' 23:59:59'))->get()) && ($atten->count()))

            <div class="day-group">
            @foreach($class_section_student->class_batch_section_periods as $section_period)
            <div id="{{$start_date}}_{{$section_period->period_id}}" width="20px">
                @php $check_status = \App\StudentStatus::where('period_id',$section_period->period_id)->where('attendance_id',$atten[0]->id)->where('student_id',$id)->whereBetween('created_at', array($start_date.' 00:00:00',$start_date.' 23:59:59'))->get() @endphp
                @if(count($check_status)>0)
                    @if($check_status[0]->status=='present')
                        <span class="btn btn-success btn-sm period-{{$section_period->period_id}}" data-period="{{$section_period->period_id}}" style="font-size: 9px">0</span>
                    @elseif ($check_status[0]->status=='late')
                        <span class="btn btn-warning btn-sm period-{{$section_period->period_id}}" data-period="{{$section_period->period_id}}" style="font-size: 9px">△</span>
                    @else
                        <i class="fa fa-times btn btn-danger btn-sm period-{{$section_period->period_id}}" data-period="{{$section_period->period_id}}" style="font-size: 9px"></i>
                    @endif
                @else
                    @php $dif = (strtotime(date('H:i',strtotime($atten[0]->created_at))) - strtotime($section_period->start_at))/(60); @endphp
                    @if($dif < 10)
                        <span class="btn btn-success btn-sm period-{{$section_period->period_id}}" data-period="{{$section_period->period_id}}" style="font-size: 9px">0</span>
                    @elseif (($dif >= 10 ) && (strtotime(date('H:i',strtotime($atten[0]->created_at))) < strtotime($section_period->end_at)) )
                        <span class="btn btn-warning btn-sm period-{{$section_period->period_id}}" data-period="{{$section_period->period_id}}" style="font-size: 9px">△</span>
                    @else
                        <i class="fa fa-times btn btn-danger btn-sm period-{{$section_period->period_id}}" data-period="{{$section_period->period_id}}" style="font-size: 9px"></i>
                    @endif
                @endif
            </div>
        @endforeach
            </div>
    @else
            <div class="day-group">
        @foreach($class_section_student->class_batch_section_periods as $section_period)
            <div id="{{$start_date}}_{{$section_period->period_id}}" width="20px">
                <i class="fa fa-times btn btn-danger btn-sm period-{{$section_period->period_id}}" data-period="{{$section_period->period_id}}" style="font-size: 9px"></i>
            </div>
        @endforeach
            </div>
    @endif
    </td>
@endwhile
        </tr>
    </table>
