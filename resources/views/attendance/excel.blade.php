<table border="1">
    <thead>
    <tr>
        <td colspan="6"> &nbsp;</td>
        <td>Day</td>
        <?php
        $start_date = $class_section_student->start_date;
        $end_date = $class_section_student->end_date;
        ?>
        <?php
        $start_date = $class_section_student->start_date;
        $end_date = $class_section_student->end_date;
        ?>
        <td>{{date('D',strtotime($start_date))}}</td>
        @while($start_date != $end_date)
            @php $start_date = date('Y-m-d',strtotime("+1 day", strtotime($start_date)))  @endphp
            <td>{{date('D',strtotime($start_date))}}</td>
        @endwhile
    </tr>
    <tr>
        <th>SN</th>
        <th>Student_ID_No</th>
        <th>Student Name</th>
        <th>Japanese Name</th>
        <th>Sex</th>
        <th>Period</th>
        <th>{{$class_section_student->start_date}}</th>
        <?php
        $start_date = $class_section_student->start_date;
        $end_date = $class_section_student->end_date;
        ?>
        @while($start_date != $end_date)
            @php $start_date = date('Y-m-d',strtotime("+1 day", strtotime($start_date)))  @endphp
            <th>{{date('d',strtotime($start_date))}}</th>
        @endwhile
    </tr>
    </thead>
    <tbody>
    @php $students = $class_section_student->class_section_students @endphp
    @foreach($students as $classSectionStudent)
        @php $student = $classSectionStudent->student @endphp
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$student->unique_id}}</td>
            <td>{{$student->last_student_name}} {{$student->first_student_name}}</td>
            <td>{{$student->last_student_japanese_name}} {{$student->first_student_japanese_name}}</td>
            <td>
                @if($student->student_sex == 'm')Male
                @elseif($student->student_sex == 'f')Female
                @else
                    Others
                @endif
            </td>
            <td>
                <table>
                    <tr><td>aa</td></tr>
                </table>
            </td>
            <td>
                <table>
                    <tr><td>bb</td></tr>
                </table>
            </td>
            {{--as;ldkfjs--}}
            {{--<td>--}}
                {{--@foreach($students->classSections as $section)--}}
                {{--{{$section->class_section}}--}}
                {{--{{$section->class_section->class_section->name}}--}}
                {{--@endforeach--}}
                {{--<table>--}}
                    {{--<tr>--}}
                        {{--<td>A1</td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<td>A2</td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<td>A3</td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<td>A4</td>--}}
                    {{--</tr>--}}
                {{--</table>--}}
            {{--</td>--}}
           {{--akjfhsdk;ljdf--}}
            <?php
            $start_date = $class_section_student->start_date;
            $end_date = $class_section_student->end_date;
            ?>
            <td>
                <table>
                    <tr>
                        <td>A1</td>
                    </tr>
                    <tr>
                        <td>A2</td>
                    </tr>
                    <tr>
                        <td>A3</td>
                    </tr>
                    <tr>
                        <td>A4</td>
                    </tr>
                </table>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

