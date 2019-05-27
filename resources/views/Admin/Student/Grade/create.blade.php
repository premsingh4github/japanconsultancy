@extends('Admin.index')
@section('body')
    <!-- Main Container -->
    <main id="main-container">

        <!-- Hero -->
        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-sm-fill h3 my-2">
                       {{__('language.GRADE_WISE_STUDENT')}} (Add)
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
                            <label for="class_section_id">Join Year<font color="#ff0000">*</font></label>
                            <select name="year" class="form-control"  required="required" data-validation-error-msg="Year Required">
                                <option value="">Choose Year</option>
                                <option value="{{date('Y')}}">{{date('Y')}}</option>
                                <option value="2030" <?php if (date('y')=='30') echo 'selected'?>>2030</option>
                                <option value="2029" <?php if (date('y')=='29') echo 'selected'?>>2029</option>
                                <option value="2028" <?php if (date('y')=='28') echo 'selected'?>>2028</option>
                                <option value="2027" <?php if (date('y')=='27') echo 'selected'?>>2027</option>
                                <option value="2026" <?php if (date('y')=='26') echo 'selected'?>>2026</option>
                                <option value="2025" <?php if (date('y')=='25') echo 'selected'?>>2025</option>
                                <option value="2024" <?php if (date('y')=='24') echo 'selected'?>>2024</option>
                                <option value="2023" <?php if (date('y')=='23') echo 'selected'?>>2023</option>
                                <option value="2022" <?php if (date('y')=='22') echo 'selected'?>>2022</option>
                                <option value="2021" <?php if (date('y')=='21') echo 'selected'?>>2021</option>
                                <option value="2020" <?php if (date('y')=='20') echo 'selected'?>>2020</option>
                                <option value="2019" <?php if (date('y')=='19') echo 'selected'?>>2019</option>
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
                                    <option value="{{$grade->id}}">
                                        {{$grade->name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-7">
                            <label for="student_id">{{__('language.Students')}}<font color="#ff0000">*</font></label>
                            <table  class="table-striped table-bordered js-dataTable-full" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th>{{__('language.SN')}}</th>
                                        <th>{{__('language.Student_Name')}}</th>
                                        <th>{{__('language.Student_ID_No')}}</th>
                                        {{--<th>{{__('language.Address')}}</th>--}}
                                        <th>Choose</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($students as $key=>$Student)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{$Student->last_student_name}} {{$Student->first_student_name}}</td>
                                        <td>{{$Student->student_number}}</td>
                                        {{--<td>{{$Student->address}}</td>--}}
                                        <td><input type="checkbox" name="student_id[{{$Student->id}}]" id="student_id" value="{{$Student->id}}"></td>
                                    </tr>

                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="form-group col-sm-4">
                            <button type="submit" class="btn  btn-success">Save</button>
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
