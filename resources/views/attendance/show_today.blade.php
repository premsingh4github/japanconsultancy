@extends('Admin.index')
@section('style')
    <style>
        .row.row-deck>div>.block{
            min-width: unset;
        }
    </style>
@endsection
@section('body')
    <!-- Main Container -->
    <main id="main-container">

        <div class="container" style="background-color: #2196f300;">
            <!-- Hero -->
            <div class="block-content block-content-full">
                <div class="row">
                    <div class="form-group col-sm-4">
                        <div class="student_image">
                            <label for="student_name">{{__('language.Select_Running_Section')}}</label>
                            <select name="section" class="form-control " onchange="sectionChanged(this)" id="section">
                                @foreach($sections as $section)
                                    <option @if(request('section') == $section->id) selected @endif value="{{$section->id}}">{{$section->class_room_batch->class_room->name}}-{{$section->class_room_batch->batch->name}}) {{$section->class_section->name}}-{{$section->shift}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <table border="1">
                    <thead  class="thead-dark">
                    {{--<tr>--}}
                        {{--<td colspan="6"> &nbsp;</td>--}}
                        {{--<td >{{__('language.Day')}}</td>--}}
                       {{----}}
                    {{--</tr>--}}
                    <tr>
                        <th >{{__('language.SN')}}</th>
                        <th >{{__('language.Student_ID_No')}}</th>
                        <th class="font-w700">{{__('language.Photo')}}</th>
                        <th class="font-w700">{{__('language.Student_Name')}}</th>
                        <th class="font-w700">{{__('language.Japanese_Name')}}</th>
                        <th class="font-w700">{{__('language.Sex')}}</th>
{{--                        <th class="font-w700">{{__('language.Period')}}</th>--}}
                        <th class="font-w700">
                            Time
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($attendances as $attendance)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$attendance->student->unique_id}} / {{$attendance->my_id}}</td>
                            <td>
                                @if(isset($attendance->student->photo))
                                    <img src="{{url('public/photos/'.$attendance->student->photo)}}" alt="" style="background-color: #fff; width:65px;  border: 2px solid lightgrey; border-radius: 50%; padding:2px;">
                                @else
                                    <img src="{{url('photos/avatar.jpg')}}" alt="" class="" style="background-color: #fff; width:65px;  border: 2px solid lightgrey; border-radius: 50%; padding:2px;">
                                @endif
                            </td>
                            <td>{{$attendance->student->last_student_name}} {{$attendance->student->first_student_name}}</td>
                            <td>{{$attendance->student->last_student_japanese_name}} {{$attendance->student->first_student_japanese_name}}</td>
                            <td>
                                @if($attendance->student->student_sex == 'm')男
                                @elseif($attendance->student->student_sex == 'f')女
                                @else
                                    その他の
                                @endif
                            </td>
                            <td>
                                {{$attendance->time}}
                            </td>
                            <?php
                            $start_date = $class_section_student->start_date;
                            $end_date = $class_section_student->end_date;
                             $student = $attendance->student;
                            ?>
                        </tr>


                    @endforeach

                    </tbody>
                </table>
            </div>

        </div>
        <!-- END Main Container -->
    </main>
@endsection
@section('script')
    <script>
        function sectionChanged(btn) {
            var url = '{{url('attendance_list')}}'
            if(parseInt($(btn).val()) > 0){
                url += "?section="+parseInt($(btn).val());
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
    </script>
@endsection