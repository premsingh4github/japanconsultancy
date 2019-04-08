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
                                <i style="color:Red; font-size: 14px;">(Note : Width:80px Height:85px)</i>
                                {{$errors->first('student_name')}}
                            </div>
                        </div>
                        <div class="form-group col-sm-7">
                            <img src="{{asset('public/images')}}/logo/logo.png" alt="">
                        </div>

                        <div class="border_bottom"></div>

                        <div class="form-group col-sm-3">
                            <label for="last_student_name">Last Name (in En)</label><br>
                            {{$student->last_student_name}}
                        </div>

                        <div class="form-group col-sm-3">
                            <label for="first_student_name">First Name (in En)</label><br>
                            {{$student->first_student_name}}
                        </div>

                        <div class="form-group col-sm-3">
                            <label for="last_student_japanese_name">Last Name (in Jp)</label><br>
                            {{$student->last_student_japanese_name}}
                        </div>

                        <div class="form-group col-sm-3">
                            <label for="first_student_japanese_name">First Name (in Jp)</label><br>
                            {{$student->first_student_japanese_name}}
                        </div>

                        <div class="form-group col-sm-3">
                            <label for="student_status">Student Status</label>
                            <input type="text" name="student_status" class="form-control" value="{{$student->student_status}}" required="required">
                        </div>
                        <div class="form-group col-sm-9">
                            <label for="student_note">Remarks <font color="#ff0000">*</font></label>
                            <textarea class="form-control content" name="student_note">{!! $student->student_note !!}</textarea>
                            {{$errors->first('student_note')}}
                        </div>

                        <div class="row">
                            <div class="form-group  col-xs-offset-4  col-sm-4">
                                <button type="submit" class="btn  btn-success">Update Record</button>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </main>

    <!-- END Main Container -->
@endsection