@extends('Admin.index')
@section('body')
    <!-- Main Container -->
    <main id="main-container">
        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-sm-fill h3 my-2">
                        {{__('language.List_Exist_Holiday')}}
                    </h1>
                    <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-alt">
                            <li class="breadcrumb-item">{{__('language.List_Exist_Holiday')}}</li>
                            <li class="breadcrumb-item" aria-current="page">
                                <a href="{{url('admin/new_holiday')}}" class="btn btn-primary btn-sm"><i class=" fa fa-plus"></i> {{__('language.Add_New_Holiday')}}</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Page Content -->
        <div class="content">
            <!-- Dynamic Table with Export Buttons -->
            <div class="block">
                <div class="block-content block-content-full">
                    <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
                    <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons">
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
                                    <a href="{{url('admin/holiday/delete=').$holiday->id}}"><span class="badge badge-danger">Delete</span></a>
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
