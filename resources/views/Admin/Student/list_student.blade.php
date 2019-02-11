@extends('Admin.index')
@section('body')
    <!-- Main Container -->
    <main id="main-container">


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

            <!-- Page Content -->
            <div class="content">
                <!-- Full Table -->
                <div class="block">
                    <div class="block-header">
                        <h3 class="block-title">Full Table</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option">
                                <i class="si si-settings"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-vcenter">
                                <thead>
                                <tr>
                                    <th class="text-center" style="width: 100px;">
                                        <i class="far fa-user"></i>
                                    </th>
                                    <th>Name</th>
                                    <th>Email</th>

                                    <th style="width: 15%;">Access</th>
                                    <th style="width: 15%;">Access</th>
                                    <th style="width: 15%;">Access</th>
                                    <th style="width: 15%;">Access</th>
                                    <th style="width: 15%;">Access</th>
                                    <th style="width: 15%;">Access</th>
                                    <th style="width: 15%;">Access</th>
                                    <th class="text-center" style="width: 100px;">Actions</th>
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
                                        @endforeach
                                    <td class="font-w600 font-size-sm">
                                        <a href="be_pages_generic_profile.html">Alice Moore</a>
                                    </td>
                                    <td class="font-size-sm">client1<em class="text-muted">@example.com</em></td>
                                    <td>
                                        <span class="badge badge-warning">Trial</span>
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Edit">
                                                <i class="fa fa-fw fa-pencil-alt"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Delete">
                                                <i class="fa fa-fw fa-times"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">
                                        <img class="img-avatar img-avatar48" src="assets/media/avatars/avatar7.jpg" alt="">
                                    </td>
                                    <td class="font-w600 font-size-sm">
                                        <a href="be_pages_generic_profile.html">Carol Ray</a>
                                    </td>
                                    <td class="font-size-sm">client2<em class="text-muted">@example.com</em></td>
                                    <td>
                                        <span class="badge badge-primary">Personal</span>
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Edit">
                                                <i class="fa fa-fw fa-pencil-alt"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Delete">
                                                <i class="fa fa-fw fa-times"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">
                                        <img class="img-avatar img-avatar48" src="assets/media/avatars/avatar8.jpg" alt="">
                                    </td>
                                    <td class="font-w600 font-size-sm">
                                        <a href="be_pages_generic_profile.html">Sara Fields</a>
                                    </td>
                                    <td class="font-size-sm">client3<em class="text-muted">@example.com</em></td>
                                    <td>
                                        <span class="badge badge-success">VIP</span>
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Edit">
                                                <i class="fa fa-fw fa-pencil-alt"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Delete">
                                                <i class="fa fa-fw fa-times"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">
                                        <img class="img-avatar img-avatar48" src="assets/media/avatars/avatar2.jpg" alt="">
                                    </td>
                                    <td class="font-w600 font-size-sm">
                                        <a href="be_pages_generic_profile.html">Sara Fields</a>
                                    </td>
                                    <td class="font-size-sm">cliedasssssssssssssssssssssssssssssssssssnt4<em class="text-muted">@example.com</em></td>
                                    <td>
                                        <span class="badge badge-primary">Personal</span>
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Edit">
                                                <i class="fa fa-fw fa-pencil-alt"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Delete">
                                                <i class="fa fa-fw fa-times"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">
                                        <img class="img-avatar img-avatar48" src="assets/media/avatars/avatar1.jpg" alt="">
                                    </td>
                                    <td class="font-w600 font-size-sm">
                                        <a href="be_pages_generic_profile.html">Lisa Jenkins</a>
                                    </td>
                                    <td class="font-size-sm">client5<em class="text-muted">@example.com</em></td>
                                    <td>
                                        <span class="badge badge-warning">Trial</span>
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Edit">
                                                <i class="fa fa-fw fa-pencil-alt"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Delete">
                                                <i class="fa fa-fw fa-times"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- END Full Table -->
            </div>
            <!-- END Page Content -->


        <!-- Page Content -->
        <div class="content">
            <!-- Customers and Latest Orders -->
            <div class="row row-deck">
                <!-- Latest Orders -->
                <div class="col-lg-12">
                    <div class="block block-mode-loading-oneui">
                        <div class="block-header border-bottom">
                            <h3 class="block-title">Students Record</h3>
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
                                <thead class="thead-dark" >
                                <style>
                                    .block-content .thead-dark th{
                                       text-transform: none;
                                    }
                                </style>
                                <tr>
                                    <th class="font-w700">SN</th>
                                    <th class="font-w700">Photo</th>
                                    <th class="font-w700">ID Card</th>
                                    <th class="font-w700">Residential ID</th>
                                    <th class="font-w700">Student Name</th>
                                    <th class="font-w700">Student Name (In Japanese)</th>
                                    <th class="font-w700">ID</th>
                                    <th class="font-w700">Student Class/Batch</th>
                                    <th class="font-w700">Address</th>
                                    <th class="font-w700">Gender</th>
                                    <th class="font-w700">Action</th>
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
                                        <a title="View ID Card"  onclick="window.open('{{url('admin/list_student/'.$students->id)}}', 'popup', 'height=600,width=700,scrollbars=yes,resize=no,status=no,left=100,top=100');">
                                            <span class="fa fa-eye"></span>
                                        </a>
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
                                        @if($students->student_sex == 'm')Male
                                            @elseif($students->student_sex == 'f')Female
                                            @else
                                            Others
                                        @endif
                                    </td>
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