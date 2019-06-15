@if($attend_sts->status == 'present')

    <span class="btn btn-success btn-sm" style="font-size: 9px" title="Present from QR scan">0</span>
    <span class="sub-menu">
        <form action="{{url('exist_attend_update').'/'.$attend_sts->id}}" method="post" onsubmit="changeAttendace(this); return  false;">
            {{csrf_field()}}
            <input type="hidden" name="status" value="late">
            <button type="submit" class="btn btn-warning btn-sm" style="font-size: 9px" title="Late Present" onclick="return confirm('Are you sure to make late for this period?')">△</button>
        </form>
        <form action="{{url('exist_attend_update').'/'.$attend_sts->id}}" method="post" onsubmit="changeAttendace(this); return  false;">
            {{csrf_field()}}
            <input type="hidden" name="status" value="absent">
            <button class="fa fa-times btn btn-danger btn-sm" title="Absent" style="font-size: 9px" onclick="return confirm('Are you sure to make absent for this period?')"></button>
        </form>
    </span>

@elseif($attend_sts->status == 'absent')
    <i class="fa fa-times btn btn-danger btn-sm" title="Absent from QR scan" style="font-size: 9px"></i>
    <span class="sub-menu">
        <form action="{{url('exist_attend_update').'/'.$attend_sts->id}}" onsubmit="changeAttendace(this); return  false;" method="post">
            {{csrf_field()}}
            <input type="hidden" name="status" value="present">
        <button class="btn btn-success btn-sm" style="font-size: 9px" title="Present" onclick="return confirm('Are you sure to make present for this period?')">0</button>
        </form>
        <form action="{{url('exist_attend_update').'/'.$attend_sts->id}}" method="post" onsubmit="changeAttendace(this); return  false;">
            {{csrf_field()}}
            <input type="hidden" name="status" value="late">
                <button class="btn btn-warning btn-sm" style="font-size: 9px" title="Late Present" onclick="return confirm('Are you sure to make late for this period?')">△</button>
        </form>
    </span>
@elseif($attend_sts->status == 'late')
    <span class="btn btn-warning btn-sm" style="font-size: 9px" title="Late Present from QR scan">△</span>
    <span class="sub-menu">
        <form action="{{url('exist_attend_update').'/'.$attend_sts->id}}" method="post" onsubmit="changeAttendace(this); return  false;">
            {{csrf_field()}}
            <input type="hidden" name="status" value="present">
        <button class="btn btn-success btn-sm" style="font-size: 9px" title="Present" onclick="return confirm('Are you sure to make present for this period?')">0</button>
        </form>
        <form action="{{url('exist_attend_update').'/'.$attend_sts->id}}" method="post" onsubmit="changeAttendace(this); return  false;">
            {{csrf_field()}}
            <input type="hidden" name="status" value="absent">
            <button class="fa fa-times btn btn-danger btn-sm" title="Absent" style="font-size: 9px" onclick="return confirm('Are you sure to make absent for this period?')"></button>
        </form>
    </span>
@endif
