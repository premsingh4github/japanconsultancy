<?php
$start_date = $class_section_student->start_date;
$end_date = $class_section_student->end_date;
?>
<td >
    <table>
        <tr>
            <td>{{$student->present(1,$class_section_student,$start_date)}}</td>
        </tr>
        <tr>
            <td>{{$student->present(2,$class_section_student,$start_date)}}</td>
        </tr>
        <tr>
            <td>{{$student->present(3,$class_section_student,$start_date)}}</td>
        </tr>
        <tr>
            <td>
                @if($student->present(4,$class_section_student,$start_date)=='F')
                    P
                @else
                    A
                @endif
            </td>
        </tr>
    </table>
</td>

@while($start_date != $end_date)
    @php $start_date = date('Y-m-d',strtotime("+1 day", strtotime($start_date)))  @endphp


    <td >
        <table>
            <tr>
                <td>
                    @if($student->present(1,$class_section_student,$start_date)=='F' || $student->present(1,$class_section_student,$start_date)=='P')
                        P
                    @else
                        A
                    @endif

                </td>
            </tr>
            <tr>
                <td>
                    @if($student->present(2,$class_section_student,$start_date)=='F' || $student->present(2,$class_section_student,$start_date)=='P')
                        P
                    @else
                        A
                    @endif

                </td>
            </tr>
            <tr>
                <td>
                    @if($student->present(3,$class_section_student,$start_date)=='F' || $student->present(3,$class_section_student,$start_date)=='P')
                        P
                    @else
                        A
                    @endif
                </td>
            </tr>
            <tr>
                <td>
                    @if($student->present(4,$class_section_student,$start_date)=='F')
                        P
                    @else
                        A
                    @endif
                </td>
            </tr>
        </table>
    </td>
@endwhile


appppp
if((Attendance::where('student_id',$this->id)->whereBetween('updated_at',array($day.' 00:00:00',$day.' 23:59:59',))->count())==1){
return "P" ;
}
elseif((Attendance::where('student_id',$this->id)->whereBetween('updated_at',array($day.' 00:00:00',$day.' 23:59:59',))->count())>1){
return "F" ;
}
else{
return "A";
}
