@extends('Admin.index')
@section('body')
    <!-- Main Container -->
    <main id="main-container">
        <div class="content">
            <div class="block" style="padding:20px;">
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

                    <form action="" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="form-group col-sm-2">
                            <div class="student_img_show">
                                <label for="student_name"></label>
                                @if(isset($student->photo))
                                    <img id="blah" src="{{url('public/photos').'/'.$student->photo}}" class="img-fluid" alt="Student Photo">
                                    @else
                                <img id="blah" src="{{asset('public/images')}}/logo/default-image.jpg"  class="img-fluid" alt="Student ID image" />
                                @endif
                            </div>
                        </div>

                        <div class="form-group col-sm-3">
                            <div class="student_image">
                                <label for="student_name"></label>
                                <input type='file' class="form-control" id="photo" name="photo" onchange="readURL(this);" />
                                <i style="color:Red; font-size: 14px;">(Note : Width:80px Height:85px)</i>
                                {{$errors->first('student_name')}}
                            </div>
                        </div>
                        <div class="form-group col-sm-7">
                            <img src="{{asset('public/images')}}/logo/logo.png" alt="">
                        </div>

                        <div class="border_bottom"></div>

                        <div class="form-group col-sm-6">
                            <label for="last_student_name">Student Last Name / 氏名<font color="#ff0000">*</font></label>
                            <input type="text" class="form-control" id="last_student_name" name="last_student_name" value="{{$student->last_student_name}}"  required="" data-validation-error-msg="Last Student Name">
                            {{$errors->first('last_student_name')}}
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="first_student_name">Student First Name</label>
                            <input type="text" class="form-control" id="first_student_name" name="first_student_name"  value="{{$student->first_student_name}}"   required="" data-validation-error-msg="First Student Name">
                            {{$errors->first('first_student_name')}}
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="last_student_japanese_name">Student Japanese Last Name /フリガナ<font color="#ff0000">*</font></label>
                            <input type="text" class="form-control" id="last_student_japanese_name" name="last_student_japanese_name"  value="{{$student->last_student_japanese_name}}"  required="" data-validation-error-msg="Last Student Japanese Name">
                            {{$errors->first('last_student_japanese_name')}}
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="first_student_japanese_name">Student Japanese First Name</label>
                            <input type="text" class="form-control" id="first_student_japanese_name" name="first_student_japanese_name"  value="{{$student->first_student_japanese_name}}"  required="" data-validation-error-msg="First Student Japanese Name">
                            {{$errors->first('first_student_japanese_name')}}
                        </div>

                        <div class="form-group col-sm-3">
                            <label for="student_sex">Gender / 性別 <font color="#ff0000">*</font></label>
                        </div>

                        <div class="form-group col-sm-9">
                            <input type="radio"  name="student_sex" value="m" <?php if ($student->student_sex == 'm') echo 'checked'?>> Male
                            <input type="radio"  name="student_sex" value="f"  <?php if ($student->student_sex == 'f') echo 'checked'?>> Female
                        </div>

                        <div class="form-group col-sm-3">
                            <label for="country_id">Country / 国籍・地域 <font color="#ff0000">*</font></label> <br>
                        </div>

                        <div class="form-group col-sm-9">
                            <select name="country_id" id="country_id" class="form-control">
                                <option value="">[Select Country]</option>
                                @foreach($countries as $country)
                                    <option value="{{$country->id}}" <?php if ($student->country_id == $country->id) echo 'selected'?>>{{$country->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-sm-3">
                            <label for="date_of_birth">Date of Birth / 生年月日<font color="#ff0000">*</font></label>
                        </div>

                        <div class="form-group col-sm-9">
                            <input type="text" class="js-datepicker form-control" id="example-datepicker3" value="{{$student->date_of_birth}}" name="date_of_birth" data-week-start="1" data-autoclose="true" data-today-highlight="true" data-date-format="yyyy-mm-dd">
                            {{$errors->first('date_of_birth')}}
                        </div>

                        <div class="form-group col-sm-3">
                            <label for="address">Address / 居住地<font color="#ff0000">*</font></label>
                        </div>

                        <div class="form-group col-sm-9">
                            <input type="text" class="form-control" id="address" name="address" value="{{$student->address}}"  required="" data-validation-error-msg="Address">
                            {{$errors->first('address')}}
                        </div>

                        <div class="form-group col-sm-3">
                            <label for="personal_phone_number">Phone Number /学績番号<font color="#ff0000">*</font></label>
                        </div>

                        <div class="form-group col-sm-3">
                            <input type="text" class="form-control" id="personal_phone_number" name="personal_phone_number" value="{{$student->personal_phone_number}}"  data-validation-error-msg="Phone Number">
                            {{$errors->first('personal_phone_number')}}
                        </div>

                        {{--<div class="form-group col-sm-3">--}}
                        {{--<input type="tel" class="form-control" id="phone_number" name="phone_number" placeholder="Phone Number"  required="" data-validation-error-msg="Phone Number">--}}
                        {{--{{$errors->first('phone_number')}}--}}
                        {{--</div>--}}

                        {{--<div class="form-group col-sm-3">--}}
                        {{--<input type="tel" class="form-control" id="phone_number" name="phone_number" placeholder="Phone Number"  required="" data-validation-error-msg="Phone Number">--}}
                        {{--{{$errors->first('phone_number')}}--}}
                        {{--</div>--}}

                        <div class="border_bottom"></div>

                        <div class="form-group col-sm-3">
                            <label for="class_room_batch_id">Class / クラス<font color="#ff0000">*</font></label>
                            <select name="class_room_batch_id" class="form-control" id="class_room_batch_id">
                                <option value="">[Select Class Group]</option>
                                @foreach($class_batch as $classBatch)
                                    <option value="{{$classBatch->id}}" <?php if ($classBatch->id == $student->class_room_batch_id) echo 'selected'?>>{{$classBatch->class_room->name}} ({{$classBatch->batch->name}})</option>
                                @endforeach

                            </select>
                            <i style="font-size: 14px; color:Red;">Not Found? <a href="{{url('admin/add_record')}}" target="_blank">Click here</a> to add</i>
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="class_room_batch_id">Opt. Subject / 件名</label>
                            <select name="subject_optional_id" class="form-control" id="subject_optional_id">
                                <option value="">[Select]</option>
                                @foreach($opt_subject as $optional)
                                    <option value="{{$optional->id}}"<?php if ($optional->id == $student->subject_optional_id) echo 'selected'?>>{{$optional->name}}</option>
                                    @endforeach
                            </select>
                            <i style="font-size: 14px; color:Red;">Not Found? <a href="{{url('admin/add_subject')}}" target="_blank">Click here</a> to add</i>
                        </div>

                        <div class="form-group col-sm-3">
                            <label for="student_of_year">Student of Year</label>
                            <select name="student_of_year" class="form-control" id="student_of_year">
                                <option value="第1学年" <?php if ($student->student_of_year == '第1学年' ) echo 'selected'?>>第1学年</option>
                                <option value="第2学年" <?php if ($student->student_of_year == '第2学年' ) echo 'selected'?>>第2学年</option>
                            </select>
                        </div>

                        <div class="form-group col-sm-3">
                            <label for="student_number">Student Number / 学績番号<font color="#ff0000">*</font></label>
                            <input type="tel" class="form-control" id="student_number" name="student_number" value="{{$student->student_number}}"  required="" data-validation-error-msg="Studnet Number">
                            {{$errors->first('student_number')}}
                        </div>

                        <div class="form-group col-sm-4">
                            <label for="residensal_card">Resi.. card Number / 在留カード番号<font color="#ff0000">*</font></label>
                            <input type="text" class="form-control" id="residensal_card" name="residensal_card"  value="{{$student->residensal_card}}"   required="" data-validation-error-msg="Residensal Card Number">
                            {{$errors->first('residensal_card')}}
                        </div>

                        <div class="form-group col-sm-4">
                            <label for="entry_date">Entry Date / 入学年月日<font color="#ff0000">*</font></label>
                            <input type="text" class="js-datepicker form-control" id="example-datepicker3" value="{{$student->entry_date}}" name="entry_date" data-week-start="1" data-autoclose="true" data-today-highlight="true" data-date-format="yyyy-mm-dd">
                            {{$errors->first('entry_date')}}
                        </div>

                        <div class="form-group col-sm-4">
                            <label for="expire_date">Expire Date / 有効期限<font color="#ff0000">*</font></label>
                            <input type="text" class="js-datepicker form-control" id="example-datepicker3" value="{{$student->expire_date}}" name="expire_date" data-week-start="1" data-autoclose="true" data-today-highlight="true" data-date-format="yyyy-mm-dd">
                            {{$errors->first('expire_date')}}
                        </div>

                        <div class="form-group col-sm-5">
                            <label for="residensal_card_time">Residensal card Time Period / 在留期間<font color="#ff0000">*</font></label>
                        </div>

                        <div class="form-group col-sm-7">
                            <select name="residensalCardTime" class="form-control" id="residensal_card_time">
                                <option value="">[Select]</option>
                                @foreach($list_residensal as $Residensal)
                                    <option value="{{$Residensal->id}}" <?php if ($Residensal->id == $student->residensalCardTime) echo 'selected'?>>{{$Residensal->name}}</option>
                                @endforeach

                            </select>
                        </div>

                        <div class="form-group col-sm-5">
                            <label for="residensal_card_expire"> Residenal card Expiry / 在留満了日<font color="#ff0000">*</font></label>
                        </div>

                        <div class="form-group col-sm-7">
                            <input type="text" class="js-datepicker form-control" id="example-datepicker3" value="{{$student->residensal_card_expire}}" name="residensal_card_expire" data-week-start="1" data-autoclose="true" data-today-highlight="true" data-date-format="yyyy-mm-dd">
                            {{$errors->first('residensal_card_expire')}}
                        </div>

                        <div class="border_bottom"></div>

                        <div class="form-group col-sm-6">
                            <label for="part_time_job_name">Part time job name / アルバイト先</label>
                            <input type="text" class="form-control" id="part_time_job_name" name="part_time_job_name"  value="{{$student->part_time_job_name}}">
                            {{$errors->first('part_time_job_name')}}
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="phone_where_they_works">Phone where  they works / アルバイト先電話番号</label>
                            <input type="text" class="form-control" id="phone_where_they_works" name="phone_where_they_works"  value="{{$student->phone_where_they_works}}">
                            {{$errors->first('phone_where_they_works')}}
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="address_where_they_works">Address where they work / アルバイト先住所</label>
                            <input type="text" class="form-control" id="address_where_they_works" name="address_where_they_works"  value="{{$student->address_where_they_works}}">
                            {{$errors->first('address_where_they_works')}}
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="nearest_station">Nearest station where they work / バイト先最寄駅</label>
                            <input type="text" class="form-control" id="nearest_station" name="nearest_station"  value="{{$student->nearest_station}}">
                            {{$errors->first('nearest_station')}}
                        </div>

                        <div class="form-group col-sm-12" id="Remarks">
                            <label for="student_note">Student Note</label>
                            <textarea class="form-control content" name="student_note">{{$student->student_note}}</textarea>
                            {{$errors->first('student_note')}}
                        </div>

                        <div class="row">
                            <div class="form-group  col-xs-offset-4  col-sm-4">
                                <button type="submit" class="btn  btn-success">Update Student</button>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </main>

    <!-- END Main Container -->
@endsection