@extends('Admin.index')
@section('body')
    <!-- Main Container -->
    <main id="main-container">
        <div class="content">
            <div class="block">
                <div class="block-header">
                    <h3 class="block-title">{{__('language.Create_Holiday')}}</h3>
                    <div class="pull-right">
                        <a href="{{url('admin/holiday')}}" class="btn btn-primary btn-sm"><i class=" fa fa-list"></i>{{__('language.List_Exist_Holiday')}}</a>
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

                    <form action="{{url('admin/post_holiday')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="form-group col-sm-2">
                                <label for="date">{{__('language.Date')}}</label>
                            </div>
                            <div class="form-group col-sm-4">
                                <input type="text" class="js-datepicker form-control" id="example-datepicker3" name="date" data-week-start="1" data-autoclose="true" data-today-highlight="true" data-date-format="yyyy-mm-dd" placeholder="{{__('language.Year_month_day')}}">
                            </div>
                            <div class="form-group col-sm-2">
                                <label for="title">{{__('language.Title')}}</label>
                            </div>
                            <div class="form-group col-sm-4">
                                <input type="text" class="form-control" name="title">
                            </div>
                            <div class="form-group col-sm-2">
                                <label for="description">{{__('language.Description')}}</label>
                            </div>
                            <div class="form-group col-sm-10">
                                <textarea type="text" id="js-ckeditor" class="form-control" name="description"></textarea>
                            </div>
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