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
                @include('success.success')
                @include('error.error')
                <form method="POST" action="{{url('admin/manage_attendance')}}">
                    @csrf
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="student_name">{{__('language.Select_Running_Section')}}</label>
                                <select name="section" id="section" class="form-control" onchange="sectionChanged(this)" required>
                                    <option selected value="" disabled>Choose...</option>
                                    @foreach($sections as $section)
                                        <option @if(request('section') == $section->id) selected @endif value="{{$section->id}}">{{$section->class_room_batch->class_room->name}}-{{$section->class_room_batch->batch->name}}) {{$section->class_section->name}}-{{$section->shift}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4" id="student_show">
                                <label for="student">{{__('language.Student_Name')}}</label>
                                <select class="form-control">
                                    <option selected value="" disabled>Choose...</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4" id="student" style="display: none">
                                <label for="student_id">Student</label>
                                <select id="std" class="form-control student_id" required name="student_id">
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="type">{{__('language.Date')}} {{__('language.And')}} {{__('language.Time')}}</label>
                                <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                                    <input type="text"  name="date" required class="form-control datetimepicker-input" data-target="#datetimepicker1"/>
                                    <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class="form-group offset-5">
                        <button class="btn btn-primary btn-sm" type="submit">Submit</button>
                    </div>
                </form>
            </div>
            <div class="block-content block-content-full">
                <h5>
                    Make Student Absent
                    <span style="float: right;">Search By Name, Date & Time</span>
                </h5>
                <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                    <thead>
                    <tr>
                        <th>SN</th>
                        <th>Photo</th>
                        <th>Student Name</th>
                        <th>Attendance Date</th>
                        <th>Attendance Time</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $attendances = \App\Attendance::orderBy('id','DESC')->get(); @endphp
                    @foreach($attendances as $key=>$attendance)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>
                            @if(isset($attendance->student->photo))
                                <img src="{{url('public/photos/'.$attendance->student->photo)}}" alt="" style="background-color: #fff; width:65px;  border: 2px solid lightgrey; border-radius: 50%; padding:2px;">
                            @else
                                <img src="{{url('photos/avatar.jpg')}}" alt="" class="" style="background-color: #fff; width:65px;  border: 2px solid lightgrey; border-radius: 50%; padding:2px;">
                            @endif
                        </td>
                        <td>{{$attendance->student->last_student_name}} {{$attendance->student->first_student_name}}</td>
                        <td>{{date('d M-Y',strtotime($attendance->created_at))}}</td>
                        <td>{{date('H:i',strtotime($attendance->created_at))}}</td>
                        <td>
                            <a href="{{url('admin/manage_attendance').'/'.$attendance->id}}" onclick="return confirm('Are you sure to absent this student?')" class="btn btn-success btn-sm">Make Absent</a>
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
            var class_batch_section_id;
            class_batch_section_id = parseInt($("#section" ).val());
            $('#student_show').hide();
            $('#student').show();
            $('.student_id').removeAttr("required");
            $.ajax({
                url: Laravel.url +"/admin/get_students/"+class_batch_section_id,
                method:"GET",
                success:function(data){
                    var html = '<option selected value="" disabled>Choose...</option>';
                    for(var i = 0; i < data["students"].length; i++){
                        html += '<option value="'+data["students"][i]["student"]["id"]+'" class="rmv_student">'+data["students"][i]["student"]["first_student_name"]+' '+data["students"][i]["student"]["last_student_name"]+'</option>';
                    }
                    $('#std').attr("required","true");
                    $(btn).parents('.form-row').find('.student_id').html(html)
                }
            });
        }
    </script>
@endsection
