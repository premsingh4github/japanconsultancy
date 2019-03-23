@extends('Admin.index')
@section('body')
    <!-- Main Container -->
    <main id="main-container">

        <!-- Hero -->
        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-sm-fill h3 my-2">
                        {{__('language.Subject_Manager')}}
                    </h1>
                    <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-alt">
                            <li class="breadcrumb-item">{{__('language.List_Exist_Section')}}</li>
                            <li class="breadcrumb-item" aria-current="page">
                                <a class="link-fx" href="{{url('admin/add_section')}}">{{__('language.Add_New_Section')}}</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- END Hero -->
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

                <div class="block block-mode-loading-oneui">
                    <div class="block-header border-bottom">
                        <h3 class="block-title">{{__('language.Section_Record')}}</h3>
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
                            <thead class="thead-dark">
                            <tr>
                                <th class="font-w700">{{__('language.SN')}}</th>
                                <th class="font-w700">{{__('language.Section')}}</th>
                                <th class="font-w700">{{__('language.Action')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($list_subject as $key=>$subject)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$subject->name}}</td>
                                    <td>
                                        <a href="{{url('admin/list_section/section_id=').$subject->id}}" class="fa fa-edit"></a>
                                        {{--<a href="{{url('admin/list_subject/subject_id=').$subject->id}}.'/delete" onclick="return confirm('Are you sure you want to delete this Record?');"  class="fa fa-trash-alt" style="color: red;"></a>--}}
                                    </td>


                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>

    </main>
    <!-- END Main Container -->
@endsection