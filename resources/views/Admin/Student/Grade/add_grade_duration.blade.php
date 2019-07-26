@extends('Admin.index')
@section('body')
    <!-- Main Container -->
    <main id="main-container">

        <!-- Hero -->
        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-sm-fill h3 my-2">
                        {{__('language.Grade-Duration-Manage')}}
                    </h1>
                    <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-alt">
                            <li class="breadcrumb-item">{{__('language.Grade-Duration-Manage')}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- END Hero -->


            <p class="font-size-sm text-muted">
                @if(session('success'))
                    <span class="alert alert-success"> {{session('success')}}</span>
            @endif
                @if(session('error'))
                    <span class="alert alert-danger"> {{session('error')}}</span>
            @endif
            @if($errors->any())
                <ul  class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
                @endif
                </p>

        <!-- Page Content -->
        <div class="content">
            <!-- Partial Table -->
            <div class="block" style="padding:20px;">
                <form action="" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="form-group col-sm-3">
                            <label for="shift">{{__('language.Batch_Year')}}<font color="#ff0000">*</font></label>
                            <select name="year" class="form-control"  required="required" data-validation-error-msg="Year Required">
                                <option value="">{{__('language.Batch_Year')}}</option>
                                <option value="{{date('Y')}}">{{date('Y')}}</option>
                                <option value="2030" <?php if (date('y')=='30') echo 'selected'?>>2030</option>
                                <option value="2029" <?php if (date('y')=='29') echo 'selected'?>>2029</option>
                                <option value="2028" <?php if (date('y')=='28') echo 'selected'?>>2028</option>
                                <option value="2027" <?php if (date('y')=='27') echo 'selected'?>>2027</option>
                                <option value="2026" <?php if (date('y')=='26') echo 'selected'?>>2026</option>
                                <option value="2025" <?php if (date('y')=='25') echo 'selected'?>>2025</option>
                                <option value="2024" <?php if (date('y')=='24') echo 'selected'?>>2024</option>
                                <option value="2023" <?php if (date('y')=='23') echo 'selected'?>>2023</option>
                                <option value="2022" <?php if (date('y')=='22') echo 'selected'?>>2022</option>
                                <option value="2021" <?php if (date('y')=='21') echo 'selected'?>>2021</option>
                                <option value="2020" <?php if (date('y')=='20') echo 'selected'?>>2020</option>
                                <option value="2019" <?php if (date('y')=='19') echo 'selected'?>>2019</option>
                                <option value="2018">2018</option>
                                <option value="2017">2017</option>
                                <option value="2016">2016</option>
                                <option value="2015">2017</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="grade_id">{{__('language.grade_year')}}<font color="#ff0000">*</font></label>
                            <select name="grade_id" class="form-control" id="grade_id">
                                <option value="">[Choose]</option>
                                @foreach($grades as $grade)
                                    <option value="{{$grade->id}}">{{$grade->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="start_at">{{__('language.start_date')}}<font color="#ff0000">*</font></label>
                            <input type="date" class="form-control" name="start_at">
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="end_at">{{__('language.end_date')}}<font color="#ff0000">*</font></label>
                            <input type="date" class="form-control" name="end_at">
                        </div>
                        <div class="form-group col-sm-4">
                            <button type="submit" class="btn  btn-success">{{__('language.save')}}</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- END Partial Table -->

            <!-- Customers and Latest Orders -->
            <div class="row row-deck">
                <!-- Latest Orders -->
                <div class="col-lg-12">
                    <div class="block block-mode-loading-oneui">
                        <div class="block-header border-bottom">
                            <h3 class="block-title">{{__('language.grade_duration_list')}}</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                    <i class="si si-refresh"></i>
                                </button>
                                <button type="button" class="btn-block-option">
                                    <i class="si si-settings"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content block-content-full">
                            <table class="table table-striped table-hover table-borderless table-vcenter font-size-sm mb-0">
                                <thead class="thead-dark">
                                <tr>
                                    <th class="font-w700">SN</th>
                                    <th class="font-w700">{{__('language.Batch_Year')}}</th>
                                    <th class="font-w700">{{__('language.grade_year')}}</th>
                                    <th class="font-w700">{{__('language.start_date')}}</th>
                                    <th class="font-w700">{{__('language.end_date')}}</th>
                                    <th class="font-w700">{{__('language.Action')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($grade_durations as $key=>$grade_duration)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$grade_duration->year}}</td>
                                    <td>{{$grade_duration->grade->name}}</td>
                                    <td>{{$grade_duration->start_at}}</td>
                                    <td>{{$grade_duration->end_at}}</td>
                                    <td>
                                        <a href="{{url('admin/add_grade_duration').'/'.$grade_duration->id.'/edit'}}" class="fa fa-edit"></a>
                                        {{--<a href="{{url('admin/list_subject/subject_id=').$subject->id}}.'/delete" onclick="return confirm('Are you sure you want to delete this Record?');"  class="fa fa-trash-alt" style="color: red;"></a>--}}
                                    </td>


                                </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- END Latest Orders -->
            </div>
            <!-- END Customers and Latest Orders -->
        </div>
        <!-- END Page Content -->

    </main>
    <!-- END Main Container -->
@endsection