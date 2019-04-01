@extends('Admin.index')
@section('body')
    <!-- Main Container -->
    <main id="main-container">
        <div class="content">
            <div class="block">
                <div class="block-header">
                    <h3 class="block-title">Edit Holiday</h3>
                    <div class="pull-right">
                        <a href="{{url('admin/holiday')}}" class="btn btn-primary btn-sm"><i class=" fa fa-list"></i> List Holiday</a>
                    </div>
                    <div class="pull-right">
                        <a href="{{url('admin/new_holiday')}}" class="btn btn-primary btn-sm"><i class=" fa fa-plus"></i> Create Holiday</a>
                    </div>
                </div>
                <div class="block-content block-content-full">
                    <form action="" method="post">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="form-group col-sm-2">
                                <label for="date">{{__('language.Date')}}</label>
                            </div>
                            <div class="form-group col-sm-3">
                                <input type="date" class="js-datepicker form-control" value="{{$holiday->start_date}}" id="example-datepicker3" name="start_date" data-week-start="1" data-autoclose="true" data-today-highlight="true" data-date-format="yyyy-mm-dd" placeholder="{{__('language.Year_month_day')}}">From
                            </div>
                            <div class="form-group col-sm-3">
                                <input type="date" class="js-datepicker form-control"  value="{{$holiday->end_date}}" name="end_date" data-week-start="1" data-autoclose="true" data-today-highlight="true" data-date-format="yyyy-mm-dd" placeholder="{{__('language.Year_month_day')}}">To
                            </div>
                            <div class="form-group col-sm-1">
                                <label for="title">{{__('language.Title')}}</label>
                            </div>
                            <div class="form-group col-sm-3">
                                <input type="text" class="form-control" value="{{$holiday->title}}" name="title">
                            </div>
                            {{--<div class="form-group col-sm-2">--}}
                            {{--<label for="description">{{__('language.Description')}}</label>--}}
                            {{--</div>--}}
                            {{--<div class="form-group col-sm-10">--}}
                            {{--<textarea type="text" id="js-ckeditor" class="form-control" name="description"></textarea>--}}
                            {{--</div>--}}
                            <div class="form-group col-sm-3">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <!-- END Main Container -->
@endsection