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
                                <label for="student">Student</label>
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
                                <label for="type">Date</label>
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
