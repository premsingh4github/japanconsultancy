@extends('Admin.index')
@section('body')
    <!-- Main Container -->
    <main id="main-container">

        <!-- Hero -->
        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-sm-fill h3 my-2">
                       {{__('language.GRADE_WISE_STUDENT')}} (Edit)
                    </h1>
                </div>
                <div class="col-sm-12 col-md-12 col-xs-12">
                    <p class="font-size-sm text-muted">
                        @if(session('success'))
                            <span class="alert alert-success"> {{session('success')}}</span>
                    @endif
                        @if(session('error'))
                            <span class="alert alert-danger"> {{session('error')}}</span>
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
            </div>
        </div>
        <!-- END Hero -->
        <!-- Page Content -->
        <div class="content">
            <!-- Partial Table -->
            <div class="block" style="padding:20px;">
                <form action="" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="form-group col-sm-2">
                            <label for="class_section_id">Year<font color="#ff0000">*</font></label>
                            <select name="year" class="form-control"  required="required" data-validation-error-msg="Year Required">
                                <option value="">Choose Year</option>
                                <option value="{{$students->year}}" selected>{{date('Y')}}</option>
                                <option value="2030">2030</option>
                                <option value="2029">2029</option>
                                <option value="2028">2028</option>
                                <option value="2027">2027</option>
                                <option value="2026">2026</option>
                                <option value="2025">2025</option>
                                <option value="2024">2024</option>
                                <option value="2023">2023</option>
                                <option value="2022">2022</option>
                                <option value="2021">2021</option>
                                <option value="2020">2020</option>
                                <option value="2019">2019</option>
                                <option value="2018">2018</option>
                                <option value="2017">2017</option>
                                <option value="2016">2016</option>
                                <option value="2015">2017</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="grade_id">{{__('language.Choose_Student_Grade')}}<font color="#ff0000">*</font></label>
                            <select name="grade_id" id="grade_id" class="form-control">
                                <option value="">{{__('language.Choose_Student_Grade')}}</option>
                                @foreach($grades as $grade)
                                    <option value="{{$grade->id}}" @if($grade->id == $students->grade_id) selected @endif>
                                        {{$grade->name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-7">
                            <label for="grade_id">Student<font color="#ff0000">*</font></label>
                            <input type="text" disabled class="form-control" value="{{$students->student->last_student_name}} {{$students->student->first_student_name}}">
                        </div>
                        <div class="form-group col-sm-12">
                            <button type="submit" class="btn  btn-success">Update</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- END Partial Table -->
        </div>
        <!-- END Page Content -->

    </main>
    <!-- END Main Container -->
@endsection
