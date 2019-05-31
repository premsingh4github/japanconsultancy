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
                        <div class="block-header border-bottom">
                            <h3 class="block-title">{{__('language.student_record')}}
                            </h3>
                            <div class="block-options">
                                {{--<button type="button" class="btn-block-option">--}}
                                    {{--{{ $list_students->links() }}--}}
                                {{--</button>--}}
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

                                @foreach($grades as $key=>$grade)
                                    <h4>{{$grade->grade->name}}({{$grade->year}})</h4>
                                <table class="table table-striped table-hover table-borderless table-vcenter js-dataTable-full">
                                <thead class="thead-dark" >
                                <style>
                                    .block-content .thead-dark th{
                                       text-transform: none;
                                    }
                                </style>
                                <tr>
                                    <th class="font-w700">{{__('language.SN')}}</th>
                                    <th class="font-w700">{{__('language.Photo')}}</th>
                                    <th class="font-w700">{{__('language.Download')}}</th>
                                    {{--<th class="font-w700">{{__('language.Residential_ID')}}</th>--}}
                                    <th class="font-w700">{{__('language.Student_Name')}}</th>
                                    <th class="font-w700">{{__('language.Japanese_Name')}}</th>
                                    <th class="font-w700">{{__('language.Student_ID_No')}}</th>
                                    <th class="font-w700">{{__('language.Address')}}</th>
                                    <th class="font-w700">{{__('language.Gender')}}</th>
                                    <th class="font-w700">{{__('language.Action')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $list_students = \App\StudentGrade::where('grade_id',$grade->id)->get(); @endphp
                                @if(count($list_students)>0)
                                @foreach($list_students as $key=>$students)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>
                                        @if(isset($students->photo))
                                        <img src="{{url('public/photos').'/'.$students->student->photo}}" alt="" style="background-color: #fff; width:65px;  border: 2px solid lightgrey; border-radius: 50%; padding:2px;">
                                        @else
                                            <img src="{{url('public/photos/avatar.jpg')}}" alt="" class="" style="background-color: #fff; width:65px;  border: 2px solid lightgrey; border-radius: 50%; padding:2px;">
                                        @endif
                                    </td>
                                    <td>
                                        <div class="dropdown d-inline-block ml-2">
                                            <button type="button" class="btn btn-sm btn-dual" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="d-none d-sm-inline-block ml-1"><i class="fa fa-download"></i>{{__('language.Download')}}</span>
                                                <i class="fa fa-fw fa-angle-down d-none d-sm-inline-block"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-left p-0 border-0 font-size-sm" aria-labelledby="page-header-user-dropdown">
                                                <div class="p-2">
                                                    <a class="dropdown-item d-flex align-items-center justify-content-between" onclick="window.open('{{url('admin/list_student/'.$students->student->id)}}', 'popup', 'height=600,width=700,scrollbars=yes,resize=no,status=no,left=100,top=100');">
                                                    <span>ID Card</span> <i class="fa fa-eye"></i>
                                                    </a>
                                                    {{--<a class="dropdown-item d-flex align-items-center justify-content-between" href="{{ url('admin/list_student/pdf').'/'.$students->id }}">--}}
                                                        {{--<span>ID Card</span>  <i class="fa fa-download"></i>--}}
                                                    {{--</a>--}}
                                                    <a class="dropdown-item d-flex align-items-center justify-content-between" onclick="window.open('{{url('admin/graduation_prospect_certificate/'.$students->student->id)}}', 'popup', 'height=1122,width=994,scrollbars=yes,resize=no,status=no,left=100,top=100');">
                                                        <span>{{__('language.Graduation_Prospect_Certificate')}}</span> <i class="fa fa-eye"></i>
                                                    </a>
                                                    <a class="dropdown-item d-flex align-items-center justify-content-between" onclick="window.open('{{url('admin/Graduation_certificate/'.$students->student->id)}}', 'popup', 'height=1122,width=994,scrollbars=yes,resize=no,status=no,left=100,top=100');">
                                                        <span>{{__('language.Graduation_Certificate')}}</span>  <i class="fa fa-eye"></i>
                                                    </a>
                                                    <a class="dropdown-item d-flex align-items-center justify-content-between" onclick="window.open('{{url('admin/certificate_of_student_status/'.$students->student->id)}}', 'popup', 'height=1122,width=994,scrollbars=yes,resize=no,status=no,left=100,top=100');">
                                                        <span>{{__('language.Certificate_of_Student_Status')}}</span> <i class="fa fa-eye"></i>
                                                    </a>
                                                    <a href="{{url('admin/list_student/'.$students->student->id.'/report')}}" class="dropdown-item d-flex align-items-center justify-content-between">
                                                        <span>Student Report</span> <i class="fa fa-eye"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    {{--<td>{{$students->student->residensal_card}}</td>--}}
                                    <td>{{$students->student->last_student_name}} {{$students->student->first_student_name}}</td>
                                    <td>{{$students->student->last_student_japanese_name}} {{$students->student->first_student_japanese_name}}</td>
                                    <td>{{$students->student->student_number}}</td>
                                    <td>{{$students->student->address}}</td>
                                    <td>
                                        @if($students->student->student_sex == 'm')男
                                        @elseif($students->student->student_sex == 'f')女
                                        @else
                                            その他の
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{url('admin/view_grade_wise/student_id=').$students->id}}" class="fa fa-edit"></a>
                                        {{--<a href="#" onclick="return confirm('Are you sure you want to transfer this Student another batch?');"  class="fa fa-exchange-alt" style="color: red;"></a>--}}
                                        <a href="{{url('admin/view_grade_wise/student_id=').$students->id.'/delete'}}" onclick="return confirm('Are you sure to delete?');"  class="fa fa-trash" style="color: red;"></a>
                                    </td>
                                </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                                <tbody>
                                </tbody>
                            </table>
                                @endforeach
                        </div>
                    </div>
                </div>
                <!-- END Latest Orders -->
            </div>
            <!-- END Customers and Latest Orders -->
        </div>
        <!-- END Page Content -->

    </main>
    <!-- END Main Container -->
@endsection
