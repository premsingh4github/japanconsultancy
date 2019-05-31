
@extends('Staff.index')
@section('body')

    <main id="main-container">

        <div class="container" style="background-color: #2196f300;">
            <!-- Hero -->
            <div class="block-content block-content-full" style="padding:2px;">
                <div class="row">
                    <div class="form-group col-sm-12">
                        <div class="row">
                            <div class="form-group"  style="width: 20%; margin:10px auto; text-align: center;">
                                <div class="student_image">
                                    <label for="unique_id">Student Code</label>
                                    <input type="url" name="unique_id" id="unique_id" class="form-control" onblur="this.focus()" autofocus onchange="studentChanged(this)" required="required">
                                </div>
                            </div>
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


                            @if(\Illuminate\Support\Facades\Session::has('student_id'))
                                @php $student=\App\Student::find(\Illuminate\Support\Facades\Session::get('student_id')); @endphp

                                <div class="col-sm-12">
                                    <table class="table table-bordered table-striped" style="text-align:center;">
                                        <thead>
                                        <tr>
                                            <th colspan="2">
                                                <img src="{{url('public/photos').'/'.$student->photo}}" alt="" class="img-thumbnail" style="width: 100px;">
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>Student Name</th>
                                            <th>{{$student->first_student_name}} {{$student->last_student_name}}</th>
                                        </tr>
                                        </thead>
                                    </table>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <script type="text/javascript" language="javascript">
        function studentChanged(btn) {
            window.location  = $(btn).val(); // url;
        }
    </script>

@endsection