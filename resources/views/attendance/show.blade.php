@extends('Admin.index')
@section('body')
    <!-- Main Container -->
    <main id="main-container">

        <!-- Hero -->
        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-sm-fill h3 my-2">
                        Attendance
                    </h1>
                    <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-alt">
                            <li class="breadcrumb-item">Student Attendance</li>
                            <li class="breadcrumb-item" aria-current="page">
                                <a class="link-fx" href="{{url('admin/add_record')}}">Export</a>
                            </li>
                        </ol>
                    </nav>
                </div>
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
            </div>
        </div>
        <!-- END Hero -->
        <!-- Page Content -->
        <div class="content">
            <!-- Customers and Latest Orders -->
            <div class="row row-deck">
                <!-- Latest Orders -->
                <div class="col-lg-12">
                    <div class="block block-mode-loading-oneui">
                        <div class="block-header border-bottom">
                            <h3 class="block-title">Students Attendance</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                    <i class="si si-refresh"></i>
                                </button>
                                <button type="button" class="btn-block-option">
                                    <i class="si si-settings"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content block-content-full">




                            <table class="table table-striped table-hover table-borderless table-vcenter font-size-sm mb-0">
                                <thead  >
                                <style>
                                    .block-content .thead-dark th{
                                        text-transform: none;
                                    }
                                </style>
                                <tr>
                                    <td colspan="6"> &nbsp;</td>
                                    <td > 曜日(DAYS)</td>
                                    <td > 月(MON))</td>
                                </tr>
                                <tr>
                                    <th >SN</th>
                                    <th >Student NO.</th>
                                    <th class="font-w700">顔写真(PHOTO)</th>
                                    <th class="font-w700">名前(NAME)</th>
                                    <th class="font-w700">フリガナ(JAPANESE NAME)</th>
                                    <th class="font-w700">性別(SEX)</th>
                                    <th class="font-w700">時限(PERIOD)</th>
                                    <th class="font-w700">ID</th>
                                    <th class="font-w700">Student Class/Batch</th>
                                    <th class="font-w700">Address</th>
                                    <th class="font-w700">Gender</th>
                                    <th class="font-w700">Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($attendaces as $key=>$value)
                                    @php $students = $value->student @endphp
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$value->student->unique_id}}</td>
                                        <td>
                                            @if(isset($students->photo))
                                                <img src="{{url('public/photos').'/'.$students->photo}}" alt="" style="background-color: #fff; width:65px;  border: 2px solid lightgrey; border-radius: 50%; padding:2px;">
                                            @else
                                                <img src="{{url('public/photos/avatar.jpg')}}" alt="" class="" style="background-color: #fff; width:65px;  border: 2px solid lightgrey; border-radius: 50%; padding:2px;">
                                            @endif

                                        </td>
                                        <td>{{$students->last_student_name}} {{$students->first_student_name}}</td>
                                        <td>{{$students->last_student_japanese_name}} {{$students->first_student_japanese_name}}</td>
                                        <td>
                                        @if($students->student_sex == 'm')Male
                                            @elseif($students->student_sex == 'f')Female
                                            @else
                                            Others
                                        @endif
                                        </td>
                                        <td>
                                            {{$students->classBatchSections}}
                                           <table>
                                               <tr>
                                                   <td>A1</td>
                                               </tr>
                                           </table>
                                        </td>
                                        <td>{{$students->residensal_card}}</td>
                                        <td>{{$students->last_student_name}} {{$students->first_student_name}}</td>
                                        <td>{{$students->last_student_japanese_name}} {{$students->first_student_japanese_name}}</td>
                                        <td>{{$students->unique_id}}</td>
                                        @if(isset($students->class_room_batch_id))
                                            <td>{{$students->class_room_batch->class_room->name}} ({{$students->class_room_batch->batch->name}})</td>
                                        @else
                                            <td></td>
                                        @endif
                                        <td>{{$students->address}}</td>

                                        <td>
                                            <a href="{{url('admin/list_student/student_id=').$students->id}}" class="fa fa-edit"></a>
                                            <a href="{{url('admin/list_student/student_id=').$students->id}}.'/delete" onclick="return confirm('Are you sure you want to delete this Record?');"  class="fa fa-trash-alt" style="color: red;"></a>
                                        </td>


                                    </tr>
                                @endforeach
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