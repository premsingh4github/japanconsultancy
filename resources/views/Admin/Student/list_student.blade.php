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
                            <form action="" method="post">
                                {{csrf_field()}}
                            <div class="row">
                                    <div class="col-sm-5">
                                        <input type="text" name="student_number" @if(request('student_number')) value="{{request('student_number')}}" @endif  class="form-control" placeholder="{{__('language.Enter_student_number')}}">
                                    </div>
                                    <div class="col-sm-4">
                                        <select  name="student_of_year"  class="form-control">
                                            <option value="">{{__('language.student_year')}}</option>
                                            <option @if(request('student_of_year') == '第1学年') selected @endif value="第1学年">第1学年</option>
                                            <option @if(request('student_of_year') == '第2学年') selected @endif value="第2学年">第2学年</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <button type="submit" class="btn btn-outline-primary">{{__('language.Search')}}</button>
                                    </div>
                            </div>
                            </form>

                        </div>
                    </div>
                </div>
                <!-- Latest Orders -->
                <div class="col-lg-12">
                    <div class="block block-mode-loading-oneui">
                        <div class="block-header border-bottom">
                            <h3 class="block-title">{{__('language.student_record')}}
                                <b style="color: blue"> 総学生 ({{__('language.Total_Students')}})
                                    {{count($list_students)}}
                                </b>
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


                                <table class="table table-striped table-hover table-borderless table-vcenter font-size-sm mb-0">
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
                                    <th class="font-w700">{{__('language.Residential_ID')}}</th>
                                    <th class="font-w700">{{__('language.Student_Name')}}</th>
                                    <th class="font-w700">{{__('language.Japanese_Name')}}</th>
                                    <th class="font-w700">{{__('language.Student_ID_No')}}</th>
                                    <th class="font-w700">{{__('language.Student_Class_Batch')}}</th>
                                    <th class="font-w700">{{__('language.Address')}}</th>
                                    <th class="font-w700">{{__('language.Gender')}}</th>
                                    <th class="font-w700">{{__('language.Action')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($list_students as $key=>$students)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>
                                        @if(isset($students->photo))
                                        <img src="{{url('public/photos').'/'.$students->photo}}" alt="" style="background-color: #fff; width:65px;  border: 2px solid lightgrey; border-radius: 50%; padding:2px;">
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
                                                    <a class="dropdown-item d-flex align-items-center justify-content-between" onclick="window.open('{{url('admin/list_student/'.$students->id)}}', 'popup', 'height=600,width=700,scrollbars=yes,resize=no,status=no,left=100,top=100');">
                                                    <span>ID Card</span> <i class="fa fa-eye"></i>
                                                    </a>
                                                    {{--<a class="dropdown-item d-flex align-items-center justify-content-between" href="{{ url('admin/list_student/pdf').'/'.$students->id }}">--}}
                                                        {{--<span>ID Card</span>  <i class="fa fa-download"></i>--}}
                                                    {{--</a>--}}
                                                    <a class="dropdown-item d-flex align-items-center justify-content-between" onclick="window.open('{{url('admin/graduation_prospect_certificate/'.$students->id)}}', 'popup', 'height=1122,width=994,scrollbars=yes,resize=no,status=no,left=100,top=100');">
                                                        <span>{{__('language.Graduation_Prospect_Certificate')}}</span> <i class="fa fa-eye"></i>
                                                    </a>
                                                    <a class="dropdown-item d-flex align-items-center justify-content-between" onclick="window.open('{{url('admin/Graduation_certificate/'.$students->id)}}', 'popup', 'height=1122,width=994,scrollbars=yes,resize=no,status=no,left=100,top=100');">
                                                        <span>{{__('language.Graduation_Certificate')}}</span>  <i class="fa fa-eye"></i>
                                                    </a>
                                                    <a class="dropdown-item d-flex align-items-center justify-content-between" onclick="window.open('{{url('admin/certificate_of_student_status/'.$students->id)}}', 'popup', 'height=1122,width=994,scrollbars=yes,resize=no,status=no,left=100,top=100');">
                                                        <span>{{__('language.Certificate_of_Student_Status')}}</span> <i class="fa fa-eye"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        {{--<div class="input-group-prepend">--}}
                                            {{--<button type="button" class="btn btn-primary btn-sm">Choose</button>--}}
                                            {{--<button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                                                {{--<span class="sr-only">Toggle Dropdown</span>--}}
                                            {{--</button>--}}
                                            {{--<div class="dropdown-menu">--}}
                                                {{--<a title="View ID Card" class="dropdown-item" onclick="window.open('{{url('admin/list_student/'.$students->id)}}', 'popup', 'height=600,width=700,scrollbars=yes,resize=no,status=no,left=100,top=100');">--}}
                                                    {{--<i class="fa fa-download"></i> ID Card--}}
                                                {{--</a>--}}
                                                {{--<a class="dropdown-item" href="#">--}}
                                                    {{--<i class="fa fa-download"></i> Certificate--}}
                                                {{--</a>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    </td>
                                    <td>{{$students->residensal_card}}</td>
                                    <td>{{$students->last_student_name}} {{$students->first_student_name}}</td>
                                    <td>{{$students->last_student_japanese_name}} {{$students->first_student_japanese_name}}</td>
                                    <td>{{$students->student_number}}</td>
                                    @if(isset($students->class_room_batch_id))
                                    <td>{{$students->class_room_batch->class_room->name}} ({{$students->class_room_batch->batch->name}})</td>
                                    @else
                                    <td></td>
                                    @endif
                                    <td>{{$students->address}}</td>
                                    <td>
                                        @if($students->student_sex == 'm')男
                                        @elseif($students->student_sex == 'f')女
                                        @else
                                            その他の
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{url('admin/list_student/student_id=').$students->id}}" class="fa fa-edit"></a>
                                        <a href="#" onclick="return confirm('Are you sure you want to transfer this Student another batch?');"  class="fa fa-exchange-alt" style="color: red;"></a>
                                    </td>
                                </tr>
                                    @endforeach
                                </tbody>
                                <tbody>
                                {{--<tr>--}}
                                    {{--<th colspan="11">--}}
                                        {{--{{ $list_students->links() }}--}}

                                    {{--</th>--}}
                                {{--</tr>--}}
                                </tbody>
                            </table>
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
