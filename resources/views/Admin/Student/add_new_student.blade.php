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
                            <label for="last_student_name">Last Name / 氏名 (English)<font color="#ff0000">*</font></label>
                            <input type="text" class="form-control" id="last_student_name" name="last_student_name" placeholder=" Last Name / 氏名 "  required="" data-validation-error-msg="Last Student Name">
                            {{$errors->first('last_student_name')}}
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="first_student_name">First Name (English)</label>
                            <input type="text" class="form-control" id="first_student_name" name="first_student_name" placeholder=" First Name / 氏名 "  required="" data-validation-error-msg="First Student Name">
                            {{$errors->first('first_student_name')}}
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="last_student_japanese_name">Last Name /フリガナ(Japanese)<font color="#ff0000">*</font></label>
                            <input type="text" class="form-control" id="last_student_japanese_name" name="last_student_japanese_name" placeholder="Last Name / フリガナ"  required="" data-validation-error-msg="Last Student Japanese Name">
                            {{$errors->first('last_student_japanese_name')}}
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="first_student_japanese_name">First Name(Japanese)</label>
                            <input type="text" class="form-control" id="first_student_japanese_name" name="first_student_japanese_name" placeholder=" First Name / フリガナ"  required="" data-validation-error-msg="First Student Japanese Name">
                            {{$errors->first('first_student_japanese_name')}}
                        </div>

                        <div class="form-group col-sm-3">
                            <label for="student_sex">Gender / 性別 <font color="#ff0000">*</font></label>
                        </div>

                        <div class="form-group col-sm-9">
                            <input type="radio"  name="student_sex" value="m"> Male
                            <input type="radio"  name="student_sex" value="f" > Female
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="country_id">Country / 国籍・地域 <font color="#ff0000">*</font></label> <br>
                        </div>

                        <div class="form-group col-sm-9">
                            <select name="country_id" id="country_id" class="form-control">
                                <option value="">[Select Country]</option>
                                @foreach($countries as $country)
                                    <option value="{{$country->id}}">{{$country->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-sm-3">
                            <label for="date_of_birth">Date of Birth / 生年月日<font color="#ff0000">*</font></label>
                        </div>

                        <div class="form-group col-sm-9">
                            <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" placeholder="生年月日"  required="" data-validation-error-msg="Date of Birth">
                            {{$errors->first('date_of_birth')}}
                        </div>

                        <div class="form-group col-sm-3">
                            <label for="address">Address / 居住地<font color="#ff0000">*</font></label>
                        </div>

                        <div class="form-group col-sm-9">
                            <input type="text" class="form-control" id="address" name="address" placeholder="Address / 居住地"  required="" data-validation-error-msg="Address">
                            {{$errors->first('address')}}
                        </div>

                        <div class="form-group col-sm-3">
                            <label for="personal_phone_number">Phone Number /学績番号<font color="#ff0000">*</font></label>
                        </div>

                        <div class="form-group col-sm-3">
                            <input type="text" class="form-control" id="personal_phone_number_1" name="personal_phone_number_1" placeholder="Phone Number (Required)"  required="" data-validation-error-msg="Phone Number">
                            {{$errors->first('personal_phone_number_1')}}
                        </div>
                        <div class="form-group col-sm-3">
                            <input type="text" class="form-control" id="personal_phone_number" name="personal_phone_number_2" placeholder="Phone Number (Optional)">
                            {{$errors->first('personal_phone_number_2')}}
                        </div>
                        <div class="form-group col-sm-3">
                            <input type="text" class="form-control" id="personal_phone_number" name="personal_phone_number_3" placeholder="Phone Number (Optional)">
                            {{$errors->first('personal_phone_number_3')}}
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

                        <div class="form-group col-sm-2">
                            <label for="class_room_batch_id">Class / クラス</label>
                            <select name="class_room_batch_id" class="form-control" id="class_room_batch_id">
                                <option value="">[Selectt]</option>
                                @foreach($class_batch as $classBatch)
                                    <option value="{{$classBatch->id}}">{{$classBatch->class_room->name}} ({{$classBatch->batch->name}})</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-2">
                            <label for="class_room_batch_id">Opt. Subject</label>
                            <select name="subject_optional_id" class="form-control" id="subject_optional_id">
                                <option value="">[Select]</option>
                                @foreach($subjects as $subject)
                                    <option value="{{$subject->id}}">{{$subject->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-2">
                            <label>Batch<font color="#ff0000">*</font></label>
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

                        <div class="form-group col-sm-3">
                            <label for="student_number">Student Number / 学績番号<font color="#ff0000">*</font></label>
                            <input type="tel" class="form-control" id="student_number" name="student_number" placeholder="Student Number"  required="" data-validation-error-msg="Studnet Number">
                            {{$errors->first('student_number')}}
                        </div>

                        <div class="form-group col-sm-3">
                            <label for="residensal_card">Resi.. id No. / 在留カード番号<font color="#ff0000">*</font></label>
                            <input type="text" class="form-control" id="residensal_card" name="residensal_card" placeholder=" 在留カード番号"  required="" data-validation-error-msg="Residensal Card Number">
                            {{$errors->first('residensal_card')}}
                        </div>

                        <div class="form-group col-sm-5">
                            <label for="entry_date">Entry Date / 入学年月日<font color="#ff0000">*</font></label>
                            <input type="date" class="form-control" id="entry_date" name="entry_date" placeholder="入学年月日"  required="" data-validation-error-msg="Entry Date / 入学年月日">
                            {{$errors->first('entry_date')}}
                        </div>

                        <div class="form-group col-sm-5">
                            <label for="expire_date">Expire Date / 入学年月日<font color="#ff0000">*</font></label>
                            <input type="date" class="form-control" id="expire_date" name="expire_date">
                            {{$errors->first('expire_date')}}
                        </div>

                        <div class="form-group col-sm-5">
                            <label for="residensal_card_time">Residensal card Time Period / 在留期間<font color="#ff0000">*</font></label>
                        </div>

                        <div class="form-group col-sm-7">
                            <input type="date" class="form-control" id="residensal_card_time" name="residensal_card_time" placeholder="在留期間"  required="" data-validation-error-msg="Residensal card Time Period / 在留期間">
                            {{$errors->first('residensal_card_time')}}
                        </div>

                        <div class="form-group col-sm-5">
                            <label for="residensal_card_expire"> Residenal card Expiry / 在留満了日<font color="#ff0000">*</font></label>
                        </div>

                        <div class="form-group col-sm-7">
                            <input type="date" class="form-control" id="residensal_card_expire" name="residensal_card_expire" placeholder="在留満了日"  required="" data-validation-error-msg="Residenal card Expiry / 在留満了日">
                            {{$errors->first('residensal_card_expire')}}
                        </div>

                        <div class="border_bottom"></div>

                        <div class="form-group col-sm-6">
                            <label for="part_time_job_name">Part time job name / アルバイト先</label>
                            <input type="text" class="form-control" id="part_time_job_name" name="part_time_job_name" placeholder="アルバイト先">
                            {{$errors->first('part_time_job_name')}}
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="phone_where_they_works">Phone where  they works / アルバイト先電話番号</label>
                            <input type="text" class="form-control" id="phone_where_they_works" name="phone_where_they_works" placeholder="アルバイト先電話番号">
                            {{$errors->first('phone_where_they_works')}}
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="address_where_they_works">Address where they work / アルバイト先住所</label>
                            <input type="text" class="form-control" id="address_where_they_works" name="address_where_they_works" placeholder="アルバイト先住所">
                            {{$errors->first('address_where_they_works')}}
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="nearest_station">Nearest station where they work / バイト先最寄駅</label>
                            <input type="text" class="form-control" id="nearest_station" name="nearest_station" placeholder="バイト先最寄駅">
                            {{$errors->first('nearest_station')}}
                        </div>

                        <div class="form-group col-sm-12">
                            <label for="student_note">Student Note</label>
                            <textarea class="form-control content" id="js-ckeditor" name="student_note"></textarea>
                            {{$errors->first('student_note')}}
                        </div>

                        <div class="row">
                            <div class="form-group  col-xs-offset-4  col-sm-4">
                                <button type="submit" class="btn  btn-success">Save Student</button>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </main>

    <!-- END Main Container -->
@endsection