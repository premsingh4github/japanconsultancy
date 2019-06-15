@foreach($attends->studentStatus as $check_status)
    @if($check_status->status=='present')
        <span class="main-menu" id="old_status_{{$check_status->id}}">
                            <span class="btn btn-success btn-sm" style="font-size: 9px" title="Present from admin">0</span>
                            <span class="sub-menu">
                                <form action="{{url('exist_attend_update').'/'.$check_status->id}}" method="post" onsubmit="changeAttendace(this); return  false;" >
                                    {{csrf_field()}}
                                    <input type="hidden" name="status" value="late">
                                    <button class="btn btn-warning btn-sm" style="font-size: 9px" title="Late Present" onclick="return confirm('Are you sure to make late for this period')">△</button>
                                </form>
                                <form action="{{url('exist_attend_update').'/'.$check_status->id}}" method="post" onsubmit="changeAttendace(this); return  false;">
                                    {{csrf_field()}}
                                    <input type="hidden" name="status" value="absent">
                                    <button type="submit" class="fa fa-times btn btn-danger btn-sm" title="Absent" style="font-size: 9px" onclick="return confirm('Are you sure to make absent for this period')"></button>
                                </form>
                            </span>
                        </span>
    @elseif($check_status->status=='late')
        <span class="main-menu" id="old_status_{{$check_status->id}}">
                        <span class="btn btn-warning btn-sm" style="font-size: 9px" title="Late Present from admin">△ Lat</span>
                            <span class="sub-menu">
                                    <form action="{{url('exist_attend_update').'/'.$check_status->id}}" method="post" onsubmit="changeAttendace(this); return  false;">
                                        {{csrf_field()}}
                                        <input type="hidden" name="status" value="present">
                                        <button class="btn btn-success btn-sm" style="font-size: 9px" title="Present" onclick="return confirm('Are you sure to make present for this period')">0</button>
                                    </form>
                                    <form action="{{url('exist_attend_update').'/'.$check_status->id}}" method="post" onsubmit="changeAttendace(this); return  false;">
                                        {{csrf_field()}}
                                        <input type="hidden" name="status" value="absent">
                                        <button class="fa fa-times btn btn-danger btn-sm" title="Absent" style="font-size: 9px" onclick="return confirm('Are you sure to make absent for this period')"></button>
                                    </form>
                            </span>
                        </span>
    @elseif($check_status->status=='absent')
        <span class="main-menu" id="old_status_{{$check_status->id}}" >
                                <i class="fa fa-times btn btn-danger btn-sm" title="Absent from admin" style="font-size: 9px"></i>
                                    <span class="sub-menu">
                                    <form action="{{url('exist_attend_update').'/'.$check_status->id}}" method="post" onsubmit="changeAttendace(this); return  false;" >
                                        {{csrf_field()}}
                                        <input type="hidden" name="status" value="present">
                                        <button class="btn btn-success btn-sm" style="font-size: 9px" title="Present" onclick="return confirm('Are you sure to make present for this period')">0</button>
                                    </form>
                                <form action="{{url('exist_attend_update').'/'.$check_status->id}}" method="post"  onsubmit="changeAttendace(this); return  false;">
                                    {{csrf_field()}}
                                    <input type="hidden" name="status" value="late">
                                        <button class="btn btn-warning btn-sm" style="font-size: 9px" title="Late Present" onclick="return confirm('Are you sure to make late for this period')">△</button>
                                </form>
                                    </span>
                            </span>
    @endif
@endforeach
