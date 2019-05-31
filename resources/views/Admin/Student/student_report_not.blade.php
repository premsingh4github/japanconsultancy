@extends('Admin.index')
@section('body')
    <!-- Main Container -->
    <main id="container">

        <!-- Page Content -->
        <div class="content" style="margin-top:50px;">

            <!-- Dynamic Table with Export Buttons -->
            <div class="block">
                <div class="block-header">
                    <h3 class="block-title">Student Report</h3>
                </div>
                <div class="block-content block-content-full">
                        <div class="block-content" style="margin-bottom: 20px;">
                            <div class="row">
                                <div class="col-lg-12">
                                    <button class="btn btn-danger">Record Not Found !!</button><br><br>
                                    <a href="{{url('admin/list_student')}}" class="btn btn-primary"><i class="fa fa-backward"></i> Back</a>
                                </div>
                                <div class="col-lg-5"></div>
                            </div>
                        </div>
                </div>
            </div>
            <!-- END Dynamic Table with Export Buttons -->
        </div>
        <!-- END Page Content -->

    </main>
    <!-- END Main Container -->
@endsection
