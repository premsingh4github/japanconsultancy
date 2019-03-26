@extends('Admin.index')
@section('body')
    <!-- Main Container -->
    <main id="main-container">

        <!-- Hero -->
        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-sm-fill h3 my-2">
                       {{__('language.Section_Wise_Students2')}}
                    </h1>
                    <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-alt">
                            <li class="breadcrumb-item"> {{__('language.Section_Wise_Students2')}}</li>
                            {{--<li class="breadcrumb-item" aria-current="page">--}}
                                {{--<a class="link-fx" href="{{url('admin/list_section')}}">List Section</a>--}}
                            {{--</li>--}}
                        </ol>
                    </nav>
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
                <form action="" method="post">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-sm-3">
                            <label for="class_section_id">Choose Class Batch Group</label>
                            <select name="class_section_id" id="class_section_id" class="form-control">
                                <option value="">[Choose Class Batch Group]</option>
                                @foreach($class_section as $section)
                                    <option value="{{$section->id}}" @if($section->id == $classSectionStudent->class_section_id) selected @endif>({{$section->class_room_batch->class_room->name}}-{{$section->class_room_batch->batch->name}}) {{$section->class_section->name}}-{{$section->shift}}</option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="col-sm-7">
                            <label>Student Name</label>
                            <input disabled="disabled" value="{{$classSectionStudent->student->first_student_japanese_name}} {{$classSectionStudent->student->last_student_japanese_name}} || {{$classSectionStudent->student->first_student_name}} {{$classSectionStudent->student->last_student_name}}" class="form-control">
                        </div>
                        <div class="col-sm-2 form-group">
                            <label>Student Number</label>
                            <input disabled="disabled" value="{{$classSectionStudent->student->student_number}}" class="form-control">
                        </div>
                        <div class="col-sm-12">
                            <button class="btn btn-success btn-xs">Update</button>
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