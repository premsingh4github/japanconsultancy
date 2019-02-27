@extends('Admin.index')
@section('body')
    <!-- Main Container -->
    <main id="container">

        <!-- Page Content -->
        <div class="content" style="margin-top:50px;">

            <!-- Dynamic Table with Export Buttons -->
            <div class="block">
                <div class="block-header">
                    <h3 class="block-title">届　出　機　関　名:<small>　学校法人郡山学園　専門学校　中央美術学園</small></h3>
                </div>
                <div class="block-header">
                    <h3 class="block-title">Name of the organization:<small></small></h3>
                </div>
                <div class="block-content block-content-full">
                    <div class="block-content" style="margin-bottom: 20px;">
                        <form action="" method="post">
                            {{csrf_field()}}
                            <div class="row">
                                <div class="col-sm-3"><label for="">Choose Student Batch</label></div>
                                <div class="col-sm-3">
                                    <select name="class_room_batch_id" class="form-control form-control-sm" id="">
                                        <option value="">View All Year</option>
                                    @foreach($classRoomBatch as $batch)
                                            <option @if(request('class_room_batch_id') == $batch->id) selected="selected" @endif value="{{$batch->id}}">{{$batch->class_room->name}}-{{$batch->batch->name}}</option>
                                            @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    <button type="submit" class="btn btn-outline-primary btn-sm">Show</button>
                                </div>
                                <div class="col-sm-12">
                                    @if(count($list_students)>0)
                                        <i style="font-size: 15px; color:Green;">{{count($list_students)}} Students Found</i>
                                    </div>
                                @else
                                    <i style="font-size: 15px; color:Red;">Record Not Found</i>
                                    @endif
                            </div>
                        </form>

                    </div>
                    <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
                    <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons">
                        <thead>
                        <tr>
                            <th class="text-center" style="width: 80px;">SN</th>
                            <th class="d-none d-sm-table-cell" style="width: 30%;">Nationality/Region</th>
                            <th class="d-none d-sm-table-cell" style="width: 30%;">Name (English)</th>
                            {{--<th class="d-none d-sm-table-cell" style="width: 30%;">Name (Japanese)</th>--}}
                            <th class="d-none d-sm-table-cell" style="width: 30%;">Gender</th>
                            <th class="d-none d-sm-table-cell" style="width: 30%;">Date of Birth</th>
                            <th class="d-none d-sm-table-cell" style="width: 30%;">Address in Japan</th>
                            <th class="d-none d-sm-table-cell" style="width: 30%;">Residence Card No.</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($list_students as $key=>$students)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$students->country->name}}</td>
                            <td>{{$students->last_student_name}} {{$students->first_student_name}}</td>
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
                            <td>{{$students->address}}</td>
                            <td>{{$students->residensal_card}}</td>
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
