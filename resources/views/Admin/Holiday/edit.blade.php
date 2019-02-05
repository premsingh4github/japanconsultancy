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
                                <label for="date">Date</label>
                            </div>
                            <div class="form-group col-sm-4">
                                <input type="text" class="js-datepicker form-control" value="{{$holiday->date}}" id="example-datepicker3" name="date" data-week-start="1" data-autoclose="true" data-today-highlight="true" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd">
                            </div>
                            <div class="form-group col-sm-2">
                                <label for="title">Title</label>
                            </div>
                            <div class="form-group col-sm-4">
                                <input type="text" class="form-control" value="{{$holiday->title}}" name="title">
                            </div>
                            <div class="form-group col-sm-2">
                                <label for="description">Description</label>
                            </div>
                            <div class="form-group col-sm-10">
                                <textarea type="text" id="js-ckeditor" class="form-control" name="description">{{$holiday->description}}</textarea>
                            </div>
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