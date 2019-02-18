@extends('Admin.index')
@section('style')
    <style>
        .row.row-deck>div>.block{
            min-width: unset;
        }
    </style>
@endsection
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

                            <div class="form-group col-sm-3">
                                <div class="student_image">
                                    <label for="student_name"></label>
                                    <select name="section" class="form-control" onchange="sectionChanged(this)">
                                        <option value="">Select Running Section</option>
                                        @foreach($sections as $section)
                                            <option @if(request('section') == $section->id) selected @endif value="{{$section->id}}">{{$section->class_section->name}}_{{$section->class_room_batch->batch->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>




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
                                    <?php
                                    $start_date = $class_section_student->start_date;
                                    $end_date = $class_section_student->end_date;
                                    ?>
                                    <?php
                                    $start_date = $class_section_student->start_date;
                                    $end_date = $class_section_student->end_date;
                                    ?>
                                    <td >{{date('D',strtotime($start_date))}}</td>
                                    @while($start_date != $end_date)
                                        @php $start_date = date('Y-m-d',strtotime("+1 day", strtotime($start_date)))  @endphp
                                        <td >{{date('D',strtotime($start_date))}}</td>
                                    @endwhile
                                </tr>
                                <tr>
                                    <th >SN</th>
                                    <th >Student NO.</th>
                                    <th class="font-w700">顔写真(PHOTO)</th>
                                    <th class="font-w700">名前(NAME)</th>
                                    <th class="font-w700">フリガナ(JAPANESE NAME)</th>
                                    <th class="font-w700">性別(SEX)</th>
                                    <th class="font-w700">時限(PERIOD)</th>
                                    <th class="font-w700">{{$class_section_student->start_date}}</th>
                                    <?php
                                    $start_date = $class_section_student->start_date;
                                    $end_date = $class_section_student->end_date;
                                    ?>
                                    @while($start_date != $end_date)
                                        @php $start_date = date('Y-m-d',strtotime("+1 day", strtotime($start_date)))  @endphp
                                        <th class="font-w700">{{date('d',strtotime($start_date))}}</th>
                                    @endwhile
                                </tr>
                                </thead>
                                <tbody>
                                @php $students = $class_section_student->class_section_students @endphp
                                    @foreach($students as $classSectionStudent)
                                        @php $student = $classSectionStudent->student @endphp
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$student->unique_id}}</td>
                                        <td>
                                            @if(isset($student->photo))
                                                <img src="{{url('public/photos').'/'.$student->photo}}" alt="" style="background-color: #fff; width:65px;  border: 2px solid lightgrey; border-radius: 50%; padding:2px;">
                                            @else
                                                <img src="{{url('public/photos/avatar.jpg')}}" alt="" class="" style="background-color: #fff; width:65px;  border: 2px solid lightgrey; border-radius: 50%; padding:2px;">
                                            @endif

                                        </td>
                                        <td>{{$student->last_student_name}} {{$student->first_student_name}}</td>
                                        <td>{{$student->last_student_japanese_name}} {{$student->first_student_japanese_name}}</td>
                                        <td>
                                        @if($student->student_sex == 'm')Male
                                            @elseif($student->student_sex == 'f')Female
                                            @else
                                            Others
                                        @endif
                                        </td>
                                        <td>
                                            {{--@foreach($students->classSections as $section)--}}
                                            {{--{{$section->class_section}}--}}
                                            {{--{{$section->class_section->class_section->name}}--}}
                                            {{--@endforeach--}}
                                           <table>
                                               <tr>
                                                   <td>A1</td>
                                               </tr>
                                               <tr>
                                                   <td>A2</td>
                                               </tr>
                                               <tr>
                                                   <td>A3</td>
                                               </tr>
                                               <tr>
                                                   <td>A4</td>
                                               </tr>
                                           </table>
                                        </td>
                                        <?php
                                        $start_date = $class_section_student->start_date;
                                        $end_date = $class_section_student->end_date;
                                        ?>
                                        <td >
                                            <table>
                                                <tr>
                                                    <td>{{$student->present(1,$class_section_student,$start_date)}}</td>
                                                </tr>
                                                <tr>
                                                    <td>{{$student->present(2,$class_section_student,$start_date)}}</td>
                                                </tr>
                                                <tr>
                                                    <td>{{$student->present(3,$class_section_student,$start_date)}}</td>
                                                </tr>
                                                <tr>
                                                    <td>{{$student->present(4,$class_section_student,$start_date)}}</td>
                                                </tr>
                                            </table>
                                        </td>

                                        @while($start_date != $end_date)
                                            @php $start_date = date('Y-m-d',strtotime("+1 day", strtotime($start_date)))  @endphp


                                            <td >
                                                <table>
                                                    <tr>
                                                        <td>{{$student->present(1,$class_section_student,$start_date)}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{$student->present(2,$class_section_student,$start_date)}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{$student->present(3,$class_section_student,$start_date)}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{$student->present(4,$class_section_student,$start_date)}}</td>
                                                    </tr>
                                                </table>
                                            </td>
                                        @endwhile

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
@section('script')
    <script>
        function sectionChanged(btn) {
            var url = '{{url('attendance_list')}}'
            if(parseInt($(btn).val()) > 0){
                 url += "?section="+parseInt($(btn).val());
            }
            window.location  = url;
        }
    </script>
@endsection