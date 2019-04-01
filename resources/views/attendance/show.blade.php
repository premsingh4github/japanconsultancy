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
                        <select name="section" class="form-control" onchange="sectionChanged(this)">
                            @foreach($sections as $section)
                                <option @if(request('section') == $section->id) selected @endif value="{{$section->id}}">{{$section->class_room_batch->class_room->name}}-{{$section->class_room_batch->batch->name}}) {{$section->class_section->name}}-{{$section->shift}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group col-sm-1">
                    <div class="student_image">
                        <label for="student_name" style="color: transparent;"> Pdf</label>
                        <button name="section" class="form-control btn btn-primary"> Pdf
                            <a href="#"></a>
                        </button>
                    </div>
                </div>
                <div class="form-group col-sm-1">
                    <div class="student_image">
                        <label for="student_name" style="color: transparent;"> Excel</label>
                        <button name="section" class="form-control btn btn-primary"> Excel
                            <a href="#"></a>
                        </button>
                    </div>
                </div>
            </div>
            <table border="1">
                <thead  >
                <style>
                    .block-content .thead-dark th{
                        text-transform: none;
                    }
                </style>

                <tr>
                    <td colspan="6"> &nbsp;</td>
                    <td >{{__('language.Day')}}</td>
                    <?php
                    $start_date = $class_section_student->start_date;
                    $end_date = $class_section_student->end_date;
                    ?>
                    <?php
                    $start_date = $class_section_student->start_date;
                    $end_date = $class_section_student->end_date;
                    ?>
                    <td >{{date('D',strtotime($start_date))}}</td>
                    @while($start_date != $end_date)
                        @php $start_date = date('Y-m-d',strtotime("+1 day", strtotime($start_date)))  @endphp
                        <td >{{date('D',strtotime($start_date))}}</td>
                    @endwhile
                </tr>
                <tr>
                    <th >{{__('language.SN')}}</th>
                    <th >{{__('language.Student_ID_No')}}</th>
                    <th class="font-w700">{{__('language.Photo')}}</th>
                    <th class="font-w700">{{__('language.Student_Name')}}</th>
                    <th class="font-w700">{{__('language.Japanese_Name')}}</th>
                    <th class="font-w700">{{__('language.Sex')}}</th>
                    <th class="font-w700">{{__('language.Period')}}</th>
                    <th class="font-w700">{{$class_section_student->start_date}}</th>
                    <?php
                    $start_date = $class_section_student->start_date;
                    $end_date = $class_section_student->end_date;
                    ?>
                    @while($start_date != $end_date)
                        @php $start_date = date('Y-m-d',strtotime("+1 day", strtotime($start_date)))  @endphp
                        <th class="font-w700">{{date('d',strtotime($start_date))}}</th>
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
                        <td>
                            @if(isset($student->photo))
                                <img src="{{url('public/photos').'/'.$student->photo}}" alt="" style="background-color: #fff; width:65px;  border: 2px solid lightgrey; border-radius: 50%; padding:2px;">
                            @else
                                <img src="{{url('public/photos/avatar.jpg')}}" alt="" class="" style="background-color: #fff; width:65px;  border: 2px solid lightgrey; border-radius: 50%; padding:2px;">
                            @endif

                        </td>
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
                            {{--@foreach($students->classSections as $section)--}}
                            {{--{{$section->class_section}}--}}
                            {{--{{$section->class_section->class_section->name}}--}}
                            {{--@endforeach--}}
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
                        <?php
                        $start_date = $class_section_student->start_date;
                        $end_date = $class_section_student->end_date;
                        ?>
                        <td >
                            <table>
                                    <tr>
                                        <td>
                                            @if($student->present(1,$class_section_student,$start_date)=='F' || $student->present(1,$class_section_student,$start_date)=='P')
                                                P
                                            @elseif($student->present(1,$class_section_student,$start_date)=='H')
                                                H
                                                @else
                                                A
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            @if($student->present(2,$class_section_student,$start_date)=='F' || $student->present(2,$class_section_student,$start_date)=='P')
                                                P
                                            @elseif($student->present(2,$class_section_student,$start_date)=='H')
                                                H
                                            @else
                                                A
                                            @endif

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            @if($student->present(3,$class_section_student,$start_date)=='F' || $student->present(3,$class_section_student,$start_date)=='P')
                                                P
                                            @elseif($student->present(3,$class_section_student,$start_date)=='H')
                                                H
                                            @else
                                                A
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            @if($student->present(4,$class_section_student,$start_date)=='F')
                                                P
                                            @elseif($student->present(4,$class_section_student,$start_date)=='H')
                                                H
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
                                            @elseif($student->present(1,$class_section_student,$start_date)=='H')
                                                H
                                            @else
                                                A
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            @if($student->present(2,$class_section_student,$start_date)=='F' || $student->present(2,$class_section_student,$start_date)=='P')
                                                P
                                            @elseif($student->present(2,$class_section_student,$start_date)=='H')
                                                H
                                            @else
                                                A
                                            @endif

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            @if($student->present(3,$class_section_student,$start_date)=='F' || $student->present(3,$class_section_student,$start_date)=='P')
                                                P
                                            @elseif($student->present(3,$class_section_student,$start_date)=='H')
                                                H
                                            @else
                                                A
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            @if($student->present(4,$class_section_student,$start_date)=='F')
                                                P
                                            @elseif($student->present(4,$class_section_student,$start_date)=='H')
                                                H
                                            @else
                                                A
                                            @endif
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        @endwhile

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
    </script>
@endsection