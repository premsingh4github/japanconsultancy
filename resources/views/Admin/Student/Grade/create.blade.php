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
                        <div class="form-group col-sm-3">
                            <label for="grade_id">{{__('language.Choose_Student_Grade')}}<font color="#ff0000">*</font></label>
                            <select name="grade_id" id="grade_id" class="form-control">
                                <option value="">{{__('language.Choose_Student_Grade')}}</option>
                                @foreach($grades as $grade)
                                    <option value="{{$grade->id}}">
                                        ({{$grade->year}})-{{$grade->grade->name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-7">
                            <label for="student_id">{{__('language.Students')}}<font color="#ff0000">*</font></label>
                            <table  class="table-striped table-bordered js-dataTable-full" style="width: 100%;">
                                <thead>
                                    <tr>
                                        {{--<th>{{__('language.SN')}}</th>--}}
                                        <th>{{__('language.Student_Name')}}</th>
                                        <th>{{__('language.Student_ID_No')}}</th>
                                        {{--<th>{{__('language.Address')}}</th>--}}
                                        <th>Choose</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($students as $key=>$Student)
                                    @php $check = \App\StudentGrade::where('student_id',$Student->id)->get(); @endphp
                                    @if(count($check)<=1)
                                        <tr>
                                        {{--<td>{{++$key}}</td>--}}
                                        <td>{{$Student->last_student_name}} {{$Student->first_student_name}}</td>
                                        <td>{{$Student->student_number}}</td>
                                        {{--<td>{{$Student->address}}</td>--}}
                                         <td>
                                         <input type="checkbox" class="select_self" name="student_id[{{$Student->id}}]" id="student_id" value="{{$Student->id}}">
                                         </td>
                                    </tr>
                                    @endif
                                @endforeach
                                </tbody>
                                <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        Choose All : <input id='checkall' type="checkbox" >
                                    </td>
                                </tr>

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
@section('script')
    <script>
        $(function() {

            $('#checkall').click(function() {
                if ($(this).prop('checked')) {
                    $('.select_self').prop('checked', true);
                } else {
                    $('.select_self').prop('checked', false);
                }
            });

        });
    </script>
@endsection

