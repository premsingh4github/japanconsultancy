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

            <div class="block">
                <div class="block-header">
                    <h3 class="block-title">{{__('language.Create_Holiday')}}</h3>
                    <div class="pull-right">
                        <a href="{{url('admin/holiday')}}" class="btn btn-primary btn-sm"><i class=" fa fa-list"></i>{{__('language.List_Exist_Holiday')}}</a>
                    </div>
                </div>
                <div class="block-content block-content-full">
                    <form action="{{url('admin/post_holiday')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="form-group col-sm-2">
                                <label for="date">{{__('language.Date')}}</label>
                            </div>
                            <div class="form-group col-sm-3">
                                <input type="date" class="js-datepicker form-control" id="example-datepicker3" name="start_date" data-week-start="1" data-autoclose="true" data-today-highlight="true" data-date-format="yyyy-mm-dd" placeholder="{{__('language.Year_month_day')}}">From
                            </div>
                            <div class="form-group col-sm-3">
                                <input type="date" class="js-datepicker form-control"  name="end_date" data-week-start="1" data-autoclose="true" data-today-highlight="true" data-date-format="yyyy-mm-dd" placeholder="{{__('language.Year_month_day')}}">To
                            </div>
                            <div class="form-group col-sm-1">
                                <label for="title">{{__('language.Title')}}</label>
                            </div>
                            <div class="form-group col-sm-3">
                                <input type="text" class="form-control" name="title">
                            </div>
                            {{--<div class="form-group col-sm-2">--}}
                                {{--<label for="description">{{__('language.Description')}}</label>--}}
                            {{--</div>--}}
                            {{--<div class="form-group col-sm-10">--}}
                                {{--<textarea type="text" id="js-ckeditor" class="form-control" name="description"></textarea>--}}
                            {{--</div>--}}
                            <div class="form-group col-sm-3">
                                <button type="submit" class="btn btn-primary">{{__('language.Create_Holiday')}}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <!-- END Main Container -->
@endsection