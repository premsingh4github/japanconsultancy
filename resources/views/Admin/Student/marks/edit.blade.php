@extends('Admin.index')
@section('body')
    <!-- Main Container -->
    <main id="container">
        <!-- Page Content -->
        <div class="content" style="margin-top:50px;">

                <!-- Customers and Latest Orders -->
            <div class="row row-deck">

                <div class="col-lg-12">
                    <div class="block block-mode-loading-oneui">
                        <div class="block-header border-bottom"  data-toggle="modal" data-target="#modal-block-large">
                            <h3 class="block-title">{{__('language.mark_obtained')}}
                            </h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option">
                                    {{--{{ $students->links() }}--}}
                                </button>
                                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                    <i class="si si-refresh"></i>
                                </button>
                                <button type="button" class="btn-block-option">
                                    <i class="si si-settings"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content block-content-full">
                            <p class="font-size-sm text-muted">
                                @if(session('error'))
                                    <span class="alert alert-danger"> {{session('error')}}</span>
                            @endif
                                @if(session('success'))
                                    <span class="alert alert-success"> {{session('success')}}</span>
                            @endif
                            @if($errors->any())
                                <ul  class="alert alert-danger">
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                                @endif
                                </p>

                                <form action="{{url('admin/mark_obtained/store')}}" method="post">{{csrf_field()}}
                                    <div class="block-content font-size-sm">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <label for="">Student</label>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <select name="" id="" disabled class="form-control">
                                                                <option>{{$students->first_student_name}} {{$students->last_student_name}}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <label for="">Exam Term</label>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <select  disabled class="form-control">
                                                                <option>{{$exams->name}}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div  class="col-sm-12" style="margin:5px 0;"></div>
                                            <div class="col-sm-12">
                                                <table class="table table-bordered">
                                                    <thead>
                                                    <tr>
                                                        <th>Subjects</th>
                                                        <th>Marks</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($subjects as $subject_first)
                                                        <tr>
                                                            <td>
                                                                <select disabled class="form-control">
                                                                    <option value="{{$subject_first->id}}">{{$subject_first->name}}</option>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <select type="text" name="marks_id{{$subject_first->id}}" class="form-control">
                                                                        @foreach($marksheets as $marksheet)
                                                                            <option value="{{$marksheet->id}}" @if($marksheet->class_id == $subject_first->id) selected @endif>{{$marksheet->marks->name}}</option>
                                                                        @endforeach
                                                                </select>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="block-content block-content-full text-right border-top">
                                        <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-check mr-1"></i>Submit</button>
                                    </div>
                                </form>

                        </div>
                    </div>
                </div>
                <!-- END Latest Orders -->
            </div>
            <!-- END Customers and Latest Orders -->
        </div>
        <!-- END Page Content -->

    </main>
    {{--<!-- END Main Container -->--}}
    {{--<!-- Large Block Modal -->--}}
    {{--<div class="modal" id="modal-block-large" tabindex="-1" role="dialog" aria-labelledby="modal-block-large" aria-hidden="true">--}}
        {{--<div class="modal-dialog modal-lg" role="document">--}}
            {{--<div class="modal-content">--}}
                {{--<div class="block block-themed block-transparent mb-0">--}}
                    {{--<div class="block-header bg-primary-dark">--}}
                        {{--<h3 class="block-title">Student Marks Entry Form</h3>--}}
                        {{--<div class="block-options">--}}
                            {{--<button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">--}}
                                {{--<i class="fa fa-fw fa-times"></i>--}}
                            {{--</button>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<form action="{{url('admin/mark_obtained/store')}}" method="post">{{csrf_field()}}--}}
                    {{--<div class="block-content font-size-sm">--}}
                        {{--<div class="row">--}}
                            {{--<div class="col-sm-6">--}}
                                {{--<div class="row">--}}
                                    {{--<div class="col-sm-4">--}}
                                        {{--<label for="">Student</label>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-sm-8">--}}
                                        {{--<select name="student_id" id="student_id" class="form-control">--}}
                                            {{--<option value="">Choose Student..</option>--}}
                                            {{--@foreach($students as $student)--}}
                                                {{--<option value="{{$student->id}}">{{$student->first_student_name}} {{$student->last_student_name}}</option>--}}
                                            {{--@endforeach--}}
                                        {{--</select>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="col-sm-6">--}}
                                {{--<div class="row">--}}
                                    {{--<div class="col-sm-4">--}}
                                        {{--<label for="">Exam Term</label>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-sm-8">--}}
                                        {{--<select name="exam_id" id="exam_id" class="form-control">--}}
                                            {{--<option value="">Choose Exam Term</option>--}}
                                            {{--@foreach($exams as $exam)--}}
                                                {{--<option value="{{$exam->id}}">{{$exam->name}}</option>--}}
                                            {{--@endforeach--}}
                                        {{--</select>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div  class="col-sm-12" style="margin:5px 0;"></div>--}}
                            {{--<div class="col-sm-12">--}}
                                {{--<table class="table table-bordered">--}}
                                    {{--<thead>--}}
                                    {{--<tr>--}}
                                        {{--<th>Subjects</th>--}}
                                        {{--<th>Marks</th>--}}
                                    {{--</tr>--}}
                                    {{--</thead>--}}
                                    {{--<tbody>--}}
                                    {{--@foreach($subjects as $subject_first)--}}
                                    {{--<tr>--}}
                                        {{--<td>--}}
                                            {{--<select name="class_id{{$subject_first->id}}" id="" class="form-control">--}}
                                                    {{--<option value="{{$subject_first->id}}">{{$subject_first->name}}</option>--}}
                                            {{--</select>--}}
                                        {{--</td>--}}
                                        {{--<td>--}}
                                            {{--<select type="text" name="marks_id{{$subject_first->id}}" class="form-control">--}}
                                                {{--@foreach($marks as $mark)--}}
                                                {{--<option value="{{$mark->id}}">{{$mark->name}}</option>--}}
                                                    {{--@endforeach--}}
                                            {{--</select>--}}
                                        {{--</td>--}}
                                    {{--</tr>--}}
                                        {{--@endforeach--}}
                                    {{--</tbody>--}}
                                {{--</table>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="block-content block-content-full text-right border-top">--}}
                        {{--<button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Close</button>--}}
                        {{--<button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-check mr-1"></i>Submit</button>--}}
                    {{--</div>--}}
                    {{--</form>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<!-- END Large Block Modal -->--}}

@endsection
