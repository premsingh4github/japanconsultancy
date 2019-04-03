@extends('Admin.index')
@section('body')
    <!-- Main Container -->
    <main id="container">

        <!-- Page Content -->
        <div class="content" style="margin-top:50px;">

            <!-- Dynamic Table with Export Buttons -->
            <div class="block">
                <div class="i_float_left">
                    <b>別記第3号様式の2</b>
                </div>
                <div class="i_float_right">
                    <b>{{ date('Y') }}年
                        {{ date('m') }}月
                        {{ date('d') }}日</b>
                </div>
                <div class="block-header printView">
                    <h3 class="block-title">当該機関で受け入れている外国人リスト</h3>
                </div>
                <div class="i_float_right_b">
                    <b>受け入れ機関名学）専門学校中央美術学園</b>
                </div>
                <div class="block-header hidden-print">
                    <h3 class="block-title">{{__('language.Name_of_the_organization')}}<small></small></h3>
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



                        <div class="block-content hidden-print" style="margin-bottom: 20px;">
                        <form action="" method="post">
                            {{csrf_field()}}
                            <div class="row">
                                <div class="col-sm-3"><label for="">{{__('language.Choose_student_batch')}}</label></div>
                                <div class="col-sm-3">
                                    <select name="class_room_batch_id" class="form-control form-control-sm" id="">
                                        <option value="">{{__('language.View_All_Year')}}</option>
                                    @foreach($classRoomBatch as $batch)
                                            <option @if(request('class_room_batch_id') == $batch->id) selected="selected" @endif value="{{$batch->id}}">{{$batch->class_room->name}}-{{$batch->batch->name}}</option>
                                            @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    <button type="submit" class="btn btn-outline-primary btn-sm">Show</button>
                                </div>
                                <div class="col-sm-2">
                                    <button  class="form-control btn btn-primary" onclick="window.print()"> {{__('language.Print')}}/{{__('language.Pdf')}}
                                    </button>
                                </div>
                                <div class="col-sm-12">
                                    @if(count($list_students)>0)
                                        <i style="font-size: 15px; color:Green;">{{count($list_students)}} {{__('language.Students_Found')}}</i>
                                    </div>
                                @else
                                    <i style="font-size: 15px; color:Red;">{{__('language.Record_Not_Found')}}</i>
                                    @endif
                            </div>
                        </form>

                    </div>
                    <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
                    <table class="table-bordered">
                        <thead style="font-size: 12px">
                        <tr>
                            <th>{{__('language.SN')}}</th>
                            <th>{{__('language.Residential_Card_No')}}</th>
                            <th>{{__('language.Nationality')}}</th>
                            <th>{{__('language.student_name')}}</th>
                            {{--<th class="d-none d-sm-table-cell" style="width: 30%;">Name (Japanese)</th>--}}
                            <th>{{__('language.student_gender')}}</th>
                            <th>{{__('language.student_dob')}}</th>
                            <th>{{__('language.Entry_Date')}}</th>
                            <th>{{__('language.student_Status')}}</th>
                            <th>{{__('language.Card_Period')}}</th>
                            <th>{{__('language.Card_Expire')}}</th>
                            <th>{{__('language.student_remarks')}}</th>
                        </tr>
                        </thead>
                        <tbody style="font-size: 12px;">
                        @foreach($list_students as $key=>$students)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$students->residensal_card}}</td>
                            <td>{{$students->country->name}}</td>
                            <td><a href="{{url('admin/list_student/student_id=').$students->id.'/remarks'}}" title="Click here to update">{{$students->last_student_name}} {{$students->first_student_name}}</a></td>
                            {{--<td>{{$students->last_student_japanese_name}} {{$students->first_student_japanese_name}}</td>--}}
                            <td>
                                @if($students->student_sex == 'f')
                                    Female
                                @elseif($students->student_sex == 'm')
                                    Male
                                    @else
                                    Other
                                    @endif
                            </td>
                            <td>{{$students->date_of_birth}}</td>
                            <td>{{$students->entry_date}}</td>
                            <td>{{$students->student_status}}</td>
                            <td>@if(isset($students->residensal->name)){{$students->residensal->name}}@endif</td>
                            <td>{{$students->residensal_card_expire}}</td>
                            <td>
                                <a href="{{url('admin/list_student/student_id=').$students->id.'/remarks'}}" title="Click here to edit">{!! $students->student_note !!}</a>
                            </td>
                        </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END Dynamic Table with Export Buttons -->
        </div>
        <!-- END Page Content -->

    </main>
    <!-- END Main Container -->
@endsection
