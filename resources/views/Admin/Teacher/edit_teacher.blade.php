@extends('Admin.index')
@section('body')
    <!-- Main Container -->
    <main id="main-container">
        <div class="content">
            <div class="block" style="padding:20px;">
                <div class="col-sm-12 col-md-12 col-xs-12">
                    <p class="font-size-sm text-muted">
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
                </div>

                <form action="" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row">
                        {{--<div class="form-group col-sm-2">--}}
                            {{--<div class="student_img_show">--}}
                                {{--<label for="student_name"></label>--}}
                                {{--@if(isset($teacher->photo))--}}
                                    {{--<img id="blah" src="{{url('public/photos/teacher').'/'.$teacher->photo}}" class="img-fluid" alt="Student Photo">--}}
                                {{--@else--}}
                                    {{--<img id="blah" src="{{asset('public/images')}}/logo/default-image.jpg"  class="img-fluid" alt="Student ID image" />--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group col-sm-3">--}}
                            {{--<div class="student_image">--}}
                                {{--<label for="student_name"></label>--}}
                                {{--<input type='file' class="form-control" id="photo" name="photo" onchange="readURL(this);" />--}}
                                {{--<i style="color:Red; font-size: 14px;">(Note : Width:80px Height:85px)</i>--}}
                                {{--{{$errors->first('student_name')}}--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        <div class="form-group col-sm-7">
                            <img src="{{asset('public/images')}}/logo/logo.png" alt="">
                        </div>

                        <div class="border_bottom"></div>

                        <div class="form-group col-sm-6">
                            <label for="last_teacher_name">{{__('language.English_Last_Name')}}<font color="#ff0000">*</font></label>
                            <input type="text" class="form-control" id="last_teacher_name" name="last_teacher_name" value="{{$teacher->last_teacher_name}}"  required="" data-validation-error-msg="Last Student Name">
                            {{$errors->first('last_teacher_name')}}
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="first_teacher_name">{{__('language.English_First_Name')}}</label>
                            <input type="text" class="form-control" id="first_teacher_name" name="first_teacher_name" value="{{$teacher->first_teacher_name}}" required="" data-validation-error-msg="First Student Name">
                            {{$errors->first('first_teacher_name')}}
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="last_teacher_japanese_name">{{__('language.Japanese_Last_Name')}}<font color="#ff0000">*</font></label>
                            <input type="text" class="form-control" id="last_teacher_japanese_name" name="last_teacher_japanese_name" value="{{$teacher->last_teacher_japanese_name}}"  required="" data-validation-error-msg="Last Student Japanese Name">
                            {{$errors->first('last_teacher_japanese_name')}}
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="first_teacher_japanese_name">{{__('language.Japanese_First_Name')}}</label>
                            <input type="text" class="form-control" id="first_teacher_japanese_name" name="first_teacher_japanese_name" value="{{$teacher->first_teacher_japanese_name}}"  required="" data-validation-error-msg="First Student Japanese Name">
                            {{$errors->first('first_teacher_japanese_name')}}
                        </div>

                        <div class="form-group col-sm-3">
                            <label for="teacher_sex">{{__('language.Gender')}}<font color="#ff0000">*</font></label>
                        </div>

                        <div class="form-group col-sm-9">
                            <input type="radio"  name="teacher_sex" value="m" <?php if ($teacher->teacher_sex == 'm') echo 'checked'?>> Male
                            <input type="radio"  name="teacher_sex" value="f"  <?php if ($teacher->teacher_sex == 'f') echo 'checked'?>> Female
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="country_id">{{__('language.Subject_Name')}}<font color="#ff0000">*</font></label> <br>
                        </div>
                        <div class="form-group col-sm-3">
                            <select name="subject_id" id="subject_id" class="form-control">
                                <option value="">[{{__('language.Subject_Name')}}]</option>
                                @foreach($Subjects as $subject)
                                    <option value="{{$subject->id}}"<?php if ($teacher->subject_id === $subject->id) echo 'selected'?>>{{$subject->subject_type}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-6">

                        </div>

                        {{--<div class="form-group col-sm-3">--}}
                            {{--<label for="date_of_birth">{{__('language.Date_of_Birth')}}<font color="#ff0000">*</font></label>--}}
                        {{--</div>--}}

                        {{--<div class="form-group col-md-3">--}}
                            {{--<input type="text" class="js-datepicker form-control" id="example-datepicker3" name="date_of_birth" value="{{$teacher->date_of_birth}}" data-week-start="1" data-autoclose="true" data-today-highlight="true" data-date-format="yyyy-mm-dd">--}}
                            {{--{{$errors->first('date_of_birth')}}--}}
                        {{--</div>--}}
                        {{--<div class="form-group col-md-6">--}}
                        {{--</div>--}}

                        {{--<div class="form-group col-sm-3">--}}
                            {{--<label for="address">{{__('language.Address')}}<font color="#ff0000">*</font></label>--}}
                        {{--</div>--}}


                        {{--<div class="form-group col-sm-9">--}}
                            {{--<input type="text" class="form-control" id="address" name="address" value="{{$teacher->address}}"  required="" data-validation-error-msg="Address">--}}
                            {{--{{$errors->first('address')}}--}}
                        {{--</div>--}}

                        {{--<div class="form-group col-sm-3">--}}
                            {{--<label for="personal_phone_number1">{{__('language.Phone_Number')}}<font color="#ff0000">*</font></label>--}}
                        {{--</div>--}}
                        {{--<div class="form-group col-sm-3">--}}
                            {{--<input type="text" class="form-control" id="personal_phone_number1" name="personal_phone_number1" value="{{$teacher->personal_phone_number1}}" data-validation-error-msg="Phone Number">--}}
                            {{--{{$errors->first('personal_phone_number1')}}--}}
                        {{--</div>--}}
                        {{--<div class="form-group col-sm-3">--}}
                            {{--<input type="text" class="form-control" id="personal_phone_number2" name="personal_phone_number2" value="{{$teacher->personal_phone_number12}}" data-validation-error-msg="Phone Number">--}}
                            {{--{{$errors->first('personal_phone_number2')}}--}}
                        {{--</div>--}}
                        {{--<div class="form-group col-sm-3">--}}
                            {{--<input type="text" class="form-control" id="personal_phone_number3" name="personal_phone_number3" value="{{$teacher->personal_phone_number3}}"  data-validation-error-msg="Phone Number">--}}
                            {{--{{$errors->first('personal_phone_number3')}}--}}
                        {{--</div>--}}

                        {{--<div class="border_bottom"></div>--}}

                        {{--<div class="form-group col-sm-12">--}}
                            {{--<label for="teacher_note">Student Note / 学生メモ</label>--}}
                            {{--<textarea class="form-control content" id="js-ckeditor" name="teacher_note">{{$teacher->teacher_note}}</textarea>--}}
                            {{--{{$errors->first('teacher_note')}}--}}
                        {{--</div>--}}

                        <div class="row">
                            <div class="form-group  col-xs-offset-4  col-sm-4">
                                <button type="submit" class="btn  btn-success">Save Teacher</button>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </main>

    <!-- END Main Container -->
@endsection