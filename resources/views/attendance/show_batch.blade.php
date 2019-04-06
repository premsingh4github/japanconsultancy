@extends('Admin.index')
@section('style')
    <style>
        .row.row-deck>div>.block{
            min-width: unset;
        }
        /*.attend table{*/
            /*display: inline-block;*/
        /*}*/
        /*.attend div{*/
            /*display: inline-block;*/
            /*text-align: center;*/
            /*width: 40px;*/
        /*}*/
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
                <table class="table table-sm table-bordered table-striped table-hover table-borderless table-vcenter font-size-sm mb-0 js-dataTable-buttons">
                    <thead  class="thead-dark">
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
                        <th class="font-w700" width="20px">{{$class_section_student->start_date}} @php $daycount = 1; @endphp </th>
                        <?php
                        $start_date = $class_section_student->start_date;
                        $end_date = $class_section_student->end_date;
                        ?>
                        @while($start_date != $end_date)
                            @php $start_date = date('Y-m-d',strtotime("+1 day", strtotime($start_date)))  @endphp
                            <th class="font-w700" width="20px">{{date('d',strtotime($start_date))}}</th>
                            @php $daycount += 1; @endphp
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
                                {{--@if(isset($student->photo))--}}
                                    {{--<img src="{{url('public/photos/'.$student->photo)}}" alt="" style="background-color: #fff; width:65px;  border: 2px solid lightgrey; border-radius: 50%; padding:2px;">--}}
                                {{--@else--}}
                                    {{--<img src="{{url('photos/avatar.jpg')}}" alt="" class="" style="background-color: #fff; width:65px;  border: 2px solid lightgrey; border-radius: 50%; padding:2px;">--}}
                                {{--@endif--}}
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
                                    @foreach($class_section_student->class_batch_section_periods as $section_period)
                                    <tr>
                                        <td>{{$section_period->period->name}}</td>
                                    </tr>
                                    @endforeach
                                </table>
                            </td>
                            <td colspan="{{$daycount}}">
                                <table>
                                    <tr>
                                        <div id="attend_{{$student->id}}" class="attend" data-student_id="{{$student->id}}">Loading</div>

                                    </tr>
                                </table>
                            </td>
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
        $(document).ready(function () {
            // $('.attendance').each(function (i,ls) {
            //     $.ajax({
            //        url: Laravel.url + "/getattendace/"+$(ls).attr('id'),
            //         method:"GET",
            //         success: function (data) {
            //            $("#"+data['id']).html(data['status']);
            //         },
            //         error: function (error) {
            //             debugger;
            //         }
            //
            //     });
            // })

            $('.attend').each(function (i,ls) {
                var section = "{{request('section')}}";
                $(ls).data('student_id');
                $.ajax({
                    url: Laravel.url + "/getattendacelist/"+section+"/"+$(ls).data('student_id'),
                    method:"GET",
                    success: function (data, textStatus, request) {

                        $('#attend_'+request.getResponseHeader('id')).html(data);
                        // $("#"+data['id']).html(data['status']);
                    },
                    error: function (error) {
                        debugger;
                    }

                });
            });
        });
    </script>
@endsection