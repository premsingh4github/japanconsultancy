@extends('Admin.index')
@section('body')
    <!-- Main Container -->
    <main id="main-container">
        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-sm-fill h3 my-2">
                        {{__('language.List_of_Teacher')}} <small class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted">{{__('language.Details')}}</small>
                    </h1>
                    <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-alt">
                            <li class="breadcrumb-item">{{__('language.List_of_Teacher')}}</li>
                            <li class="breadcrumb-item" aria-current="page">
                                <a class="link-fx" href="{{url('admin/add_teacher')}}"> {{__('language.Add_New_Teacher')}}</a>
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
                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                        <thead>
                        <tr>
                            <th class="text-center">SN</th>
                            <th class="d-none d-sm-table-cell">{{__('language.Name_of_Teacher')}}</th>
                            <th class="d-none d-sm-table-cell">{{__('language.Address')}}</th>
                            <th class="d-none d-sm-table-cell">{{__('language.Phone_Number')}}</th>
                            <th class="d-none d-sm-table-cell">{{__('language.Action')}}<th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($TeacherData as $key=>$Teacher)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$Teacher->last_teacher_name}} {{$Teacher->first_teacher_name}}</td>
                                <td>{{$Teacher->address}}</td>
                                <td>{{$Teacher->personal_phone_number1}}</td>
                                <td>
                                    <a href="{{url('admin/list_teacher/teacher_id=').$Teacher->id}}" class="fa fa-edit" title="Edit"></a>
                                    <a href="{{url('admin/list_teacher/teacher_view=').$Teacher->id}}" class="fa fa-eye" title="View"></a>
                                </td>
                                <td></td>
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
