@extends('Admin.index')
@section('body')
    <!-- Main Container -->
    <main id="main-container">
        <div class="content">
            <!-- Dynamic Table with Export Buttons -->
            <div class="block">
                <div class="block-header">
                    <h3 class="block-title">Section Wise Days</h3>
                    <div class="pull-right">
                        <a href="{{url('admin/new_section_day')}}" class="btn btn-primary btn-sm"><i class=" fa fa-plus"></i> Add Record</a>
                    </div>
                </div>
                <div class="block-content block-content-full">
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
                    <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                        <thead>
                        <tr>
                            <th>SN</th>
                            <th>Class Section</th>
                            <th>Day</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($section_days as $key=>$section_day)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>
                                    {{$section_day->class_section->class_room_batch->class_room->name}}({{$section_day->class_section->class_room_batch->batch->name}})-{{$section_day->class_section->class_section->name}}-{{$section_day->class_section->shift}}
                                </td>
                                <td>{{$section_day->day}}</td>
                                <td>
                                    <a href="#"><span class="badge badge-info">Edit</span></a>
                                    <a href=""><span class="badge badge-danger">Delete</span></a>
                                </td>
                            </tr>
                            <@endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END Dynamic Table with Export Buttons -->
        </div>
    </main>
    <!-- END Main Container -->
@endsection