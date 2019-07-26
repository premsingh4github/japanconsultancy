@extends('Admin.index')
@section('body')
    <!-- Main Container -->
    <main id="main-container">

        <!-- Hero -->
        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-sm-fill h3 my-2">
                        {{__('language.Residensal_Card_Time')}}
                    </h1>
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
            <!-- Partial Table -->
            <div class="block" style="padding:20px;">
                <form action="" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <label for="student_name">{{__('language.Residensal_Card_Time')}} <font color="#ff0000">*</font></label>
                            <input type="text" class="form-control" id="name" name="name" required="" data-validation-error-msg="section is required">
                            {{$errors->first('name')}}
                        </div>
                        <div class="form-group col-sm-4">
                            <button type="submit" class="btn  btn-success">{{__('language.Save_section')}}</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- END Partial Table -->
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
        <!-- END Page Content -->

    </main>
    <!-- END Main Container -->
@endsection