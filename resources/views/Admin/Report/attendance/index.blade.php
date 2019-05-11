@extends('Admin.index')
@section('body')
    <!-- Main Container -->
    <main id="main-container">

        <!-- Hero -->
        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-sm-fill h3 my-2">
                        {{__('language.report_attendance')}}
                    </h1>
                </div>
            </div>
        </div>
        <!-- END Hero -->

        <!-- Page Content -->
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

        <!-- Partial Table -->
            <div class="block" style="padding:20px;">
                <form action="" method="post">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="form-group col-sm-3">
                            <label for="c_b_s_id">{{__('language.Select_Running_Section')}}</label>
                            <select name="c_b_s_id" class="form-control" id="c_b_s_id">
                                @foreach($sections as $section)
                                    <option @if(request('c_b_s_id') == $section->id) selected @endif value="{{$section->id}}">({{$section->class_room_batch->class_room->name}}-{{$section->class_room_batch->batch->name}}) {{$section->class_section->name}}-{{$section->shift}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="period_id">Date Duration</label>
                            <div class="row">
                                <div class="col-sm-6">
                                    <input type="text" name="from_date" class="js-datepicker form-control" placeholder="From Date" required>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text"  name="to_date" class="js-datepicker form-control" placeholder="To Date" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="student_number">Student Number</label>
                            <input type="number" class="form-control" name="student_number">
                        </div>
                        <div class="form-group col-sm-4">
                            <button type="submit" class="btn  btn-primary btn-xs">Show</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- END Partial Table -->
        </div>
        <!-- END Page Content -->

    </main>
    <!-- END Main Container -->
@endsection
