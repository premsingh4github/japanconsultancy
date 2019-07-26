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
                        <div class="form-group col-sm-2">
                            <div class="student_img_show">
                                <label for="student_name"></label>
                                <img id="blah" src="{{asset('public/images')}}/logo/default-image.jpg"  class="img-fluid" alt="Student ID image" />
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
                            <label for="last_student_name">{{__('language.English_Last_Name')}}<font color="#ff0000">*</font></label>
                            <input type="text" class="form-control" id="last_student_name" name="last_student_name" placeholder="{{__('language.English_Last_Name')}}"  required="" data-validation-error-msg="Last Student Name">
                            {{$errors->first('last_student_name')}}
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="first_student_name">{{__('language.English_First_Name')}}</label>
                            <input type="text" class="form-control" id="first_student_name" name="first_student_name" placeholder="{{__('language.English_First_Name')}}"  required="" data-validation-error-msg="First Student Name">
                            {{$errors->first('first_student_name')}}
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="last_student_japanese_name">{{__('language.Japanese_Last_Name')}}<font color="#ff0000">*</font></label>
                            <input type="text" class="form-control" id="last_student_japanese_name" name="last_student_japanese_name" placeholder="{{__('language.Japanese_Last_Name')}}"  required="" data-validation-error-msg="Last Student Japanese Name">
                            {{$errors->first('last_student_japanese_name')}}
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="first_student_japanese_name">{{__('language.Japanese_First_Name')}}</label>
                            <input type="text" class="form-control" id="first_student_japanese_name" name="first_student_japanese_name" placeholder="{{__('language.Japanese_First_Name')}}"  required="" data-validation-error-msg="First Student Japanese Name">
                            {{$errors->first('first_student_japanese_name')}}
                        </div>

                        <div class="form-group col-sm-3">
                            <label for="student_sex">{{__('language.Gender')}} <font color="#ff0000">*</font></label>
                        </div>

                        <div class="form-group col-sm-9">
                            <input type="radio"  name="student_sex" value="m"> {{__('language.Male')}}
                            <input type="radio"  name="student_sex" value="f" > {{__('language.Female')}}
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="country_id">{{__('language.Country')}}<font color="#ff0000">*</font></label> <br>
                        </div>

                        <div class="form-group col-sm-3">
                            <select name="country_id" id="country_id" class="form-control">
                                <option value="">[{{__('language.Select_Country')}}]</option>
                                @foreach($countries as $country)
                                    <option value="{{$country->id}}">{{$country->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-6">
                        </div>

                        <div class="form-group col-sm-3">
                            <label for="date_of_birth">{{__('language.Date_of_Birth')}}<font color="#ff0000">*</font></label>
                        </div>

                        <div class="form-group col-sm-3">
                            <input type="text" class="js-datepicker form-control" id="example-datepicker3" name="date_of_birth" data-week-start="1" data-autoclose="true" data-today-highlight="true" data-date-format="yyyy-mm-dd" placeholder="{{__('language.Year_month_day')}}">
                            {{$errors->first('date_of_birth')}}
                        </div>
                        <div class="form-group col-sm-6">
                        </div>

                        <div class="form-group col-sm-3">
                            <label for="address">{{__('language.Address')}}<font color="#ff0000">*</font></label>
                        </div>

                        <div class="form-group col-sm-9">
                            <input type="text" class="form-control" id="address" name="address" placeholder="{{__('language.Address')}}"  data-validation-error-msg="Address">
                            {{$errors->first('address')}}
                        </div>

                        <div class="form-group col-sm-3">
                            <label for="nearest_station1">{{__('language.Nearest_station')}}<font color="#ff0000">*</font></label>
                        </div>

                        <div class="form-group col-sm-9">
                            <input type="text" class="form-control" id="nearest_station1" name="nearest_station1" placeholder="{{__('language.Nearest_station')}}">
                            {{$errors->first('nearest_station1')}}
                        </div>

                        <div class="form-group col-sm-3">
                            <label for="personal_phone_number">{{__('language.Phone_Number')}}<font color="#ff0000">*</font></label>
                        </div>

                        <div class="form-group col-sm-3">
                            <input type="text" class="form-control" id="personal_phone_number" name="personal_phone_number" placeholder="{{__('language.Phone_Number')}}"  required="" data-validation-error-msg="Phone Number">
                            {{$errors->first('personal_phone_number')}}
                        </div>
                        {{--<div class="form-group col-sm-3">--}}
                            {{--<input type="text" class="form-control" id="personal_phone_number" name="personal_phone_number_2" placeholder="Phone Number (Optional)">--}}
                            {{--{{$errors->first('personal_phone_number_2')}}--}}
                        {{--</div>--}}
                        {{--<div class="form-group col-sm-3">--}}
                            {{--<input type="text" class="form-control" id="personal_phone_number" name="personal_phone_number_3" placeholder="Phone Number (Optional)">--}}
                            {{--{{$errors->first('personal_phone_number_3')}}--}}
                        {{--</div>--}}

                        {{--<div class="form-group col-sm-3">--}}
                            {{--<input type="tel" class="form-control" id="phone_number" name="phone_number" placeholder="Phone Number"  required="" data-validation-error-msg="Phone Number">--}}
                            {{--{{$errors->first('phone_number')}}--}}
                        {{--</div>--}}

                        {{--<div class="form-group col-sm-3">--}}
                            {{--<input type="tel" class="form-control" id="phone_number" name="phone_number" placeholder="Phone Number"  required="" data-validation-error-msg="Phone Number">--}}
                            {{--{{$errors->first('phone_number')}}--}}
                        {{--</div>--}}

                        <div class="border_bottom"></div>

                        <div class="form-group col-sm-4">
                            <label for="class_room_batch_id">{{__('language.Class')}}</label>
                            <select name="class_room_batch_id" class="form-control" id="class_room_batch_id">
                                <option value="">[{{__('language.Select')}}]</option>
                                @foreach($class_batch as $classBatch)
                                    <option value="{{$classBatch->id}}">{{$classBatch->class_room->name}} ({{$classBatch->batch->name}})</option>
                                @endforeach
                            </select>
                            <i style="font-size: 14px; color:Red;">Not Found? <a href="{{url('admin/add_record')}}" target="_blank">Click here</a></i>
                        </div>
                        {{--<div class="form-group col-sm-2">--}}
                            {{--<label for="class_room_batch_id">{{__('language.Opt_Subject')}}</label>--}}
                            {{--<select name="subject_optional_id" class="form-control" id="subject_optional_id">--}}
                                {{--<option value="">[{{__('language.Select')}}]</option>--}}
                                {{--@foreach($subjects as $subject)--}}
                                    {{--<option value="{{$subject->id}}">{{$subject->name}}</option>--}}
                                {{--@endforeach--}}
                            {{--</select>--}}
                            {{--<i style="font-size: 14px; color:Red;">Not Found? <a href="{{url('admin/add_subject')}}" target="_blank">Click here</a></i>--}}
                        {{--</div>--}}
                        <div class="form-group col-sm-4">
                            <label>{{__('language.Batch')}}<font color="#ff0000">*</font></label>
                            <select name="batch_default" class="form-control"  required="required" data-validation-error-msg="Batch Required">
                                <option value="{{date('y')}}">{{date('Y')}}</option>
                                <option value="30" <?php if (date('y')=='30') echo 'selected'?>>2030</option>
                                <option value="29" <?php if (date('y')=='29') echo 'selected'?>>2029</option>
                                <option value="28" <?php if (date('y')=='28') echo 'selected'?>>2028</option>
                                <option value="27" <?php if (date('y')=='27') echo 'selected'?>>2027</option>
                                <option value="26" <?php if (date('y')=='26') echo 'selected'?>>2026</option>
                                <option value="25" <?php if (date('y')=='25') echo 'selected'?>>2025</option>
                                <option value="24" <?php if (date('y')=='24') echo 'selected'?>>2024</option>
                                <option value="23" <?php if (date('y')=='23') echo 'selected'?>>2023</option>
                                <option value="22" <?php if (date('y')=='22') echo 'selected'?>>2022</option>
                                <option value="21" <?php if (date('y')=='21') echo 'selected'?>>2021</option>
                                <option value="20" <?php if (date('y')=='20') echo 'selected'?>>2020</option>
                                <option value="19" <?php if (date('y')=='19') echo 'selected'?>>2019</option>
                                <option value="18">2018</option>
                                <option value="17">2017</option>
                                <option value="16">2016</option>
                                <option value="15">2017</option>
                            </select>
                        </div>

                        {{--<div class="form-group col-sm-2">--}}
                            {{--<label for="student_of_year">{{__('language.Student_of_Year')}}</label>--}}
                            {{--<select name="student_of_year" class="form-control" id="student_of_year">--}}
                                {{--<option value="">[{{__('language.Select')}}]</option>--}}
                                {{--<option value="第1学年">第1学年</option>--}}
                                {{--<option value="第2学年">第2学年</option>--}}

                            {{--</select>--}}
                        {{--</div>--}}

                        <div class="form-group col-sm-4">
                            <label for="student_number">{{__('language.Student_Number')}}<font color="#ff0000">*</font></label>
                            <input type="tel" class="form-control" id="student_number" name="student_number" placeholder="{{__('language.Student_Number')}}"  required="" data-validation-error-msg="Studnet Number">
                            {{$errors->first('student_number')}}
                        </div>

                        <div class="form-group col-sm-4">
                            <label for="residensal_card">{{__('language.Resi_id_No')}}<font color="#ff0000">*</font></label>
                            <input type="text" class="form-control" id="residensal_card" name="residensal_card" placeholder="{{__('language.Resi_id_No')}}"  required="" data-validation-error-msg="Residensal Card Number">
                            {{$errors->first('residensal_card')}}
                        </div>

                        <div class="form-group col-sm-4">
                            <label for="entry_date">{{__('language.Entry_Date')}}<font color="#ff0000">*</font></label>
                            <input type="text" class="js-datepicker form-control" id="example-datepicker3" name="entry_date" data-week-start="1" data-autoclose="true" data-today-highlight="true" data-date-format="yyyy-mm-dd" placeholder="{{__('language.Year_month_day')}}">
                            {{$errors->first('entry_date')}}
                        </div>

                        <div class="form-group col-sm-4">
                            <label for="expire_date">{{__('language.Expire_Date')}}<font color="#ff0000">*</font></label>
                            <input type="text" class="js-datepicker form-control" id="example-datepicker3" name="expire_date" data-week-start="1" data-autoclose="true" data-today-highlight="true" data-date-format="yyyy-mm-dd" placeholder="{{__('language.Year_month_day')}}">
                            {{$errors->first('expire_date')}}
                        </div>

                        <div class="form-group col-sm-3">
                            <label for="residensal_card_time">{{__('language.Residensal_card_Time_Period')}}<font color="#ff0000">*</font></label>
                        </div>

                        <div class="form-group col-sm-4">
                            <select name="residensal_card_time" class="form-control" id="residensal_card_time">
                                <option value="">[{{__('language.Select')}}]</option>
                                @foreach($list_residensal as $residensal)
                                    <option value="{{$residensal->id}}">{{$residensal->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-5">
                        </div>

                        <div class="form-group col-sm-3">
                            <label for="residensal_card_expire"> {{__('language.Residenal_card_Expiry')}}<font color="#ff0000">*</font></label>
                        </div>

                        <div class="form-group col-sm-4">
                            <input type="text" class="js-datepicker form-control" id="example-datepicker3" name="residensal_card_expire" data-week-start="1" data-autoclose="true" data-today-highlight="true" data-date-format="yyyy-mm-dd" placeholder="{{__('language.Year_month_day')}}">
                            {{$errors->first('residensal_card_expire')}}
                        </div>
                        <div class="form-group col-sm-5">
                        </div>

                        <div class="border_bottom"></div>

                        <div class="form-group col-sm-6">
                            <label for="part_time_job_name">{{__('language.Part_time_job_name')}}</label>
                            <input type="text" class="form-control" id="part_time_job_name" name="part_time_job_name" placeholder="{{__('language.Part_time_job_name')}}">
                            {{$errors->first('part_time_job_name')}}
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="phone_where_they_works">{{__('language.Phone_where_they_works')}}</label>
                            <input type="text" class="form-control" id="phone_where_they_works" name="phone_where_they_works" placeholder="{{__('language.Phone_where_they_works')}}">
                            {{$errors->first('phone_where_they_works')}}
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="address_where_they_works">{{__('language.Address_where_they_work')}}</label>
                            <input type="text" class="form-control" id="address_where_they_works" name="address_where_they_works" placeholder="{{__('language.Address_where_they_work')}}">
                            {{$errors->first('address_where_they_works')}}
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="nearest_station">{{__('language.Nearest_station_where_they_work')}}</label>
                            <input type="text" class="form-control" id="nearest_station" name="nearest_station" placeholder="{{__('language.Nearest_station_where_they_work')}}">
                            {{$errors->first('nearest_station')}}
                        </div>

                        <div class="form-group col-sm-12">
                            <label for="student_note">{{__('language.Student_Note')}}</label>
                            <textarea class="form-control content" name="student_note"></textarea>
                            {{$errors->first('student_note')}}
                        </div>

                        <div class="row">
                            <div class="form-group  col-xs-offset-4  col-sm-4">
                                <button type="submit" class="btn  btn-success">{{__('language.Save_Student')}}</button>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </main>

    <!-- END Main Container -->
@endsection