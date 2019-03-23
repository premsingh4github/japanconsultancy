@extends('Admin.index')
@section('body')
    <!-- Main Container -->
    <main id="main-container">

        <!-- Hero -->
        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-sm-fill h3 my-2">
                        {{__('language.Residential_card_time_manager')}}
                    </h1>
                    <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-alt">
                            <li class="breadcrumb-item">{{__('language.List_Card_Time')}}</li>
                            <li class="breadcrumb-item" aria-current="page">
                                <a class="link-fx" href="{{url('admin/add-residensal')}}">{{__('language.Add_Card_Time')}}</a>
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
                        <h3 class="block-title">{{__('language.section_record')}}</h3>
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
                                <th class="font-w700">{{__('language.Residential_card_time_Period')}}</th>
                                <th class="font-w700">{{__('language.Action')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($list_residensal as $key=>$residensal)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$residensal->name}}</td>
                                    <td>
                                        <a href="{{url('admin/list-residensal=').$residensal->id}}" class="fa fa-edit" title="Edit"></a>
                                        {{--<a href="{{url('admin/list-residensal=').$residensal->id}}.'/delete" onclick="return confirm('Are you sure you want to delete this Record?');"  class="fa fa-trash-alt" style="color: red;"></a>--}}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

        </div>
        <!-- END Page Content -->

    </main>
    <!-- END Main Container -->
@endsection