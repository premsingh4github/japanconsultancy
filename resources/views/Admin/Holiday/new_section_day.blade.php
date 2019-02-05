@extends('Admin.index')
@section('body')
    <!-- Main Container -->
    <main id="main-container">
        <div class="content">
            <div class="block">
                <div class="block-header">
                    <h3 class="block-title">Create Section Wise Days</h3>
                    <div class="pull-right">
                        <a href="{{url('admin/section_day')}}" class="btn btn-primary btn-sm"><i class=" fa fa-list"></i> List Section Wise Days</a>
                    </div>
                </div>
                <div class="block-content block-content-full">
                    <form action="{{url('admin/post_section_wise_days')}}" method="post">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="form-group col-sm-2">
                                <label for="class_section_id">Class Section</label>
                            </div>
                            <div class="form-group col-sm-4">
                                <select name="class_section_id" id="class_section_id" class="form-control">
                                    <option value="">Choose</option>
                                    @foreach($class_section as $section)
                                        <option value="{{$section->id}}">
                                            {{$section->class_room_batch->class_room->name}}({{$section->class_room_batch->batch->name}})-{{$section->class_section->name}}-{{$section->shift}}
                                        </option>
                                        @endforeach
                                </select>
                            </div>
                            <div class="form-group col-sm-2">
                                <label for="day">Day</label>
                            </div>
                            <div class="form-group col-sm-4">
                                <input type="text" name="day" id="day" class="form-control">
                            </div>
                            <div class="form-group col-sm-3">
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <!-- END Main Container -->
@endsection