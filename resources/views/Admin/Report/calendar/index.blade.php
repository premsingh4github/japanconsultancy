
@extends('Admin.index')
@section('body')

    <main id="main-container">


        <!-- Page Content -->
        <div class="content content-narrow">
            <!-- Stats -->
            <div class="row">
                <div class="col-12" style="background-color: #fff; padding:10px;">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h4> Calender </h4>
                                </div>
                                <div class="col-sm-6">
                                    <form action="" method="get">
                                        <div class="row">
                                            <div class="col-sm-9 form-group">
                                                <div class="row">
                                                    <div class="col-sm-4"><label for="">Select Grade</label></div>
                                                    <div class="col-sm-8">
                                                        <select name="grade_id" id="" class="form-control">
                                                            @foreach($grades as $grade)
                                                            <option value="{{$grade->id}}">{{$grade->year}}-{{$grade->grade->name}}</option>
                                                                @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3 form-group">
                                                <button type="submit" class="btn btn-primary">Show</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- END Stats -->
        </div>
        <!-- END Page Content -->

    </main>
    <!-- END Main Container -->

@endsection