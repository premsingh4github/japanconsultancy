@extends('Admin.index')
@section('body')
    <!-- Main Container -->
    <main id="main-container">
        <div class="content">
            @if(session('success'))
                <div class="col-sm-12">
                    <div class="alert  alert-success alert-dismissible fade show" role="alert">
                        <span class="badge badge-pill badge-success">Success</span> {{session('success')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
                <div style="clear: both;"></div>
            @endif
            @if($errors->any())
                <div class="col-sm-12">
                    <div class="alert  alert-success alert-dismissible fade show" role="alert">
                        @foreach($errors->all() as $error)
                            <span class="badge badge-pill badge-danger">Error</span> {{$error}}<br>
                        @endforeach
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
                <div style="clear: both;"></div>
        @endif

        <!-- Dynamic Table with Export Buttons -->
            <div class="block">

                <div class="block-header">
                    <h3 class="block-title">{{__('language.List_Exist_Holiday')}}</h3>
                    <div class="pull-right">
                        <a href="{{url('admin/new_holiday')}}" class="btn btn-primary btn-sm"><i class=" fa fa-plus"></i> {{__('language.Add_New_Holiday')}}</a>
                    </div>
                </div>
                <div class="block-content block-content-full">
                    <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                        <thead>
                        <tr>
                            <th>{{__('language.SN')}}</th>
                            <th>{{__('language.Date')}}</th>
                            <th>{{__('language.Title')}}</th>
                            <th>{{__('language.Action')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($list_holiday as $key=>$holiday)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>@if(isset($holiday->end_date)) From: {{$holiday->start_date}} To: {{$holiday->end_date}} @else {{$holiday->start_date}} @endif</td>
                                <td>{{$holiday->title}}</td>
                                <td>
                                    <a href="{{url('admin/holiday/edit=').$holiday->id}}"><span class="badge badge-info">Edit</span></a>
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