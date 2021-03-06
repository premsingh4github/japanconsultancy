
@extends('Admin.index')
@section('style')
    <style>
        .fc-event-container .fc-day-grid-event .fc-title{
            color:#fff;
        }
    </style>
    @endsection
@section('body')

    <main id="main-container">

        <!-- Hero -->
        <div class="bg-image overflow-hidden" style="background-image: url('{{url('assets/media/photos/photo3@2x.jpg')}}');">
            <div class="bg-primary-dark-op">
                <div class="content content-narrow content-full">
                    <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center mt-5 mb-2 text-center text-sm-left">
                        <div class="flex-sm-fill">
                            <h1 class="font-w600 text-white mb-0 invisible" data-toggle="appear">{{__('language.Admin_Dashboard')}}</h1>
                            <h2 class="h4 font-w400 text-white-75 mb-0 invisible" data-toggle="appear" data-timeout="250">{{__('language.Welcome_Administrator')}}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Hero -->
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif


        <!-- Page Content -->
        <div class="content content-narrow">
            <!-- Stats -->
            <div class="row">
                <div class="col-6 col-md-3 col-lg-6 col-xl-3">
                    <a class="block block-rounded block-link-pop border-left border-primary border-4x" href="javascript:void(0)">
                        <div class="block-content block-content-full">
                            <div class="font-size-sm font-w600 text-uppercase text-muted">{{__('language.Teachers')}}</div>
                            <div class="font-size-h2 font-w400 text-dark"><i class="fa fa-chalkboard-teacher"></i> {{$teacher}}</div>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-3 col-lg-6 col-xl-3">
                    <a class="block block-rounded block-link-pop border-left border-primary border-4x" href="javascript:void(0)">
                        <div class="block-content block-content-full">
                            <div class="font-size-sm font-w600 text-uppercase text-muted">{{__('language.Total_Students')}}</div>
                            <?php $totalStudent = \App\Student::all()?>
                            <div class="font-size-h2 font-w400 text-dark"><i class="fa fa-users"></i> {{count($totalStudent)}}</div>
                            <?php ; ?>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-3 col-lg-6 col-xl-3">
                    <a class="block block-rounded block-link-pop border-left border-primary border-4x" href="javascript:void(0)">
                        <div class="block-content block-content-full">
                            <div class="font-size-sm font-w600 text-uppercase text-muted">{{__('language.Students')}} ({{__('language.Male')}})</div>
                            <?php $totalUser = \App\Student::where('student_sex','m')->get()?>
                            <div class="font-size-h2 font-w400 text-dark"> <i class="fa fa-male"></i> {{count($totalUser)}}</div>
                            <?php ; ?>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-3 col-lg-6 col-xl-3">
                    <a class="block block-rounded block-link-pop border-left border-primary border-4x" href="javascript:void(0)">
                        <div class="block-content block-content-full">
                            <div class="font-size-sm font-w600 text-uppercase text-muted">{{__('language.Students')}} ({{__('language.Female')}})</div>
                            <?php $totalUser = \App\Student::where('student_sex','f')->get()?>
                            <div class="font-size-h2 font-w400 text-dark"> <i class="fa fa-female"></i> {{count($totalUser)}}</div>
                            <?php ; ?>
                        </div>
                    </a>
                </div>

                <!--
                <div class="col-6 col-md-3 col-lg-6 col-xl-3">
                    <a class="block block-rounded block-link-pop border-left border-primary border-4x" href="javascript:void(0)">
                        <div class="block-content block-content-full">
                            <div class="font-size-sm font-w600 text-uppercase text-muted">{{__('language.Absent_Student')}}</div>
                            <div class="font-size-h2 font-w400 text-dark"><i class="fa fa-users"></i> 0</div>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-3 col-lg-6 col-xl-3">
                    <a class="block block-rounded block-link-pop border-left border-primary border-4x" href="javascript:void(0)">
                        <div class="block-content block-content-full">
                            <div class="font-size-sm font-w600 text-uppercase text-muted">{{__('language.Total_Users')}}</div>
                            <?php $totalUser = \App\User::all()?>
                            <div class="font-size-h2 font-w400 text-dark"> <i class="fa fa-users"></i> {{count($totalUser)}}</div>
                            <?php ; ?>
                        </div>
                    </a>
                </div>
                @foreach($batch as $countBatch)
                    @if(count($countBatch->students)>0)
                <div class="col-6 col-md-3 col-lg-6 col-xl-3">
                    <a class="block block-rounded block-link-pop border-left border-primary border-4x" href="javascript:void(0)">
                        <div class="block-content block-content-full">
                            <div class="font-size-sm font-w600 text-uppercase text-muted">{{__('language.Student_In_Batch')}} {{$countBatch->batch->name}}</div>
                            <div class="font-size-h2 font-w400 text-dark"> <i class="fa fa-users"></i> {{count($countBatch->students)}}</div>
                        </div>
                    </a>
                </div>
                    @endif
                    @endforeach
                -->
                <div class="col-12" style="background-color: #fff; padding:10px;">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h4> {{__('language.calendar')}} </h4>
                                </div>
                                <div class="col-sm-6">
                                    <form action="{{url('admin/view_calendar')}}" method="get">
                                        <div class="row">
                                            <div class="col-sm-9 form-group">
                                                <div class="row">
                                                    <div class="col-sm-4"><label for="">{{__('language.Choose_Student_Grade')}}</label></div>
                                                    <div class="col-sm-8">
                                                        <select name="grade_id" id="grade_id" class="form-control">
                                                            @foreach($grades as $grade)
                                                            <option value="{{$grade->id}}">{{$grade->year}}-{{$grade->grade->name}}</option>
                                                                @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3 form-group">
                                                <button type="submit" class="btn btn-primary">View</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body"> {!! $calendar->calendar() !!} {!! $calendar->script() !!} </div>
                    </div>
                </div>

            </div>
            <!-- END Stats -->

            <!-- Dashboard Charts -->
            {{--<div class="row">--}}
                {{--<div class="col-lg-6">--}}
                    {{--<div class="block block-rounded block-mode-loading-oneui">--}}
                        {{--<div class="block-header">--}}
                            {{--<h3 class="block-title">Earnings in $</h3>--}}
                            {{--<div class="block-options">--}}
                                {{--<button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">--}}
                                    {{--<i class="si si-refresh"></i>--}}
                                {{--</button>--}}
                                {{--<button type="button" class="btn-block-option">--}}
                                    {{--<i class="si si-settings"></i>--}}
                                {{--</button>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="block-content p-0 bg-body-light text-center">--}}
                            {{--<!-- Chart.js is initialized in js/pages/be_pages_dashboard.min.js which was auto compiled from _es6/pages/be_pages_dashboard.js) -->--}}
                            {{--<!-- For more info and examples you can check out http://www.chartjs.org/docs/ -->--}}
                            {{--<div class="pt-3" style="height: 360px;"><canvas class="js-chartjs-dashboard-earnings"></canvas></div>--}}
                        {{--</div>--}}
                        {{--<div class="block-content">--}}
                            {{--<div class="row items-push text-center py-3">--}}
                                {{--<div class="col-6 col-xl-3">--}}
                                    {{--<i class="fa fa-wallet fa-2x text-muted"></i>--}}
                                    {{--<div class="text-muted mt-3">$148,000</div>--}}
                                {{--</div>--}}
                                {{--<div class="col-6 col-xl-3">--}}
                                    {{--<i class="fa fa-angle-double-up fa-2x text-muted"></i>--}}
                                    {{--<div class="text-muted mt-3">+9% Earnings</div>--}}
                                {{--</div>--}}
                                {{--<div class="col-6 col-xl-3">--}}
                                    {{--<i class="fa fa-ticket-alt fa-2x text-muted"></i>--}}
                                    {{--<div class="text-muted mt-3">+20% Tickets</div>--}}
                                {{--</div>--}}
                                {{--<div class="col-6 col-xl-3">--}}
                                    {{--<i class="fa fa-users fa-2x text-muted"></i>--}}
                                    {{--<div class="text-muted mt-3">+46% Clients</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-lg-6">--}}
                    {{--<div class="block block-rounded block-mode-loading-oneui">--}}
                        {{--<div class="block-header">--}}
                            {{--<h3 class="block-title">Sales</h3>--}}
                            {{--<div class="block-options">--}}
                                {{--<button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">--}}
                                    {{--<i class="si si-refresh"></i>--}}
                                {{--</button>--}}
                                {{--<button type="button" class="btn-block-option">--}}
                                    {{--<i class="si si-settings"></i>--}}
                                {{--</button>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="block-content p-0 bg-body-light text-center">--}}
                            {{--<!-- Chart.js is initialized in js/pages/be_pages_dashboard.min.js which was auto compiled from _es6/pages/be_pages_dashboard.js) -->--}}
                            {{--<!-- For more info and examples you can check out http://www.chartjs.org/docs/ -->--}}
                            {{--<div class="pt-3" style="height: 360px;"><canvas class="js-chartjs-dashboard-sales"></canvas></div>--}}
                        {{--</div>--}}
                        {{--<div class="block-content">--}}
                            {{--<div class="row items-push text-center py-3">--}}
                                {{--<div class="col-6 col-xl-3">--}}
                                    {{--<i class="fab fa-wordpress fa-2x text-muted"></i>--}}
                                    {{--<div class="text-muted mt-3">+20% Themes</div>--}}
                                {{--</div>--}}
                                {{--<div class="col-6 col-xl-3">--}}
                                    {{--<i class="fa fa-font fa-2x text-muted"></i>--}}
                                    {{--<div class="text-muted mt-3">+25% Fonts</div>--}}
                                {{--</div>--}}
                                {{--<div class="col-6 col-xl-3">--}}
                                    {{--<i class="fa fa-archive fa-2x text-muted"></i>--}}
                                    {{--<div class="text-muted mt-3">-10% Icons</div>--}}
                                {{--</div>--}}
                                {{--<div class="col-6 col-xl-3">--}}
                                    {{--<i class="fa fa-paint-brush fa-2x text-muted"></i>--}}
                                    {{--<div class="text-muted mt-3">+8% Graphics</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            <!-- END Dashboard Charts -->

            <!-- Customers and Latest Orders -->
            {{--<div class="row row-deck">--}}
                {{--<!-- Latest Customers -->--}}
                {{--<div class="col-lg-6">--}}
                    {{--<div class="block block-mode-loading-oneui">--}}
                        {{--<div class="block-header border-bottom">--}}
                            {{--<h3 class="block-title">Latest Customers</h3>--}}
                            {{--<div class="block-options">--}}
                                {{--<button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">--}}
                                    {{--<i class="si si-refresh"></i>--}}
                                {{--</button>--}}
                                {{--<button type="button" class="btn-block-option">--}}
                                    {{--<i class="si si-settings"></i>--}}
                                {{--</button>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="block-content block-content-full">--}}
                            {{--<table class="table table-striped table-hover table-borderless table-vcenter font-size-sm mb-0">--}}
                                {{--<thead class="thead-dark">--}}
                                {{--<tr class="text-uppercase">--}}
                                    {{--<th class="font-w700" style="width: 80px;">ID</th>--}}
                                    {{--<th class="d-none d-sm-table-cell font-w700 text-center" style="width: 100px;">Photo</th>--}}
                                    {{--<th class="font-w700">Name</th>--}}
                                    {{--<th class="d-none d-sm-table-cell font-w700 text-center" style="width: 80px;">Orders</th>--}}
                                    {{--<th class="font-w700 text-center" style="width: 60px;"></th>--}}
                                {{--</tr>--}}
                                {{--</thead>--}}
                                {{--<tbody>--}}
                                {{--<tr>--}}
                                    {{--<td>--}}
                                        {{--<span class="font-w600">#01368</span>--}}
                                    {{--</td>--}}
                                    {{--<td class="d-none d-sm-table-cell text-center">--}}
                                        {{--<img class="img-avatar img-avatar32" src="assets/media/avatars/avatar15.jpg" alt="">--}}
                                    {{--</td>--}}
                                    {{--<td class="font-w600">--}}
                                        {{--Thomas Riley                                </td>--}}
                                    {{--<td class="d-none d-sm-table-cell text-center">--}}
                                        {{--<a class="link-fx font-w600" href="javascript:void(0)">5</a>--}}
                                    {{--</td>--}}
                                    {{--<td class="text-center">--}}
                                        {{--<a href="javascript:void(0)" data-toggle="tooltip" data-placement="left" title="Edit">--}}
                                            {{--<i class="fa fa-fw fa-pencil-alt"></i>--}}
                                        {{--</a>--}}
                                    {{--</td>--}}
                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<td>--}}
                                        {{--<span class="font-w600">#01368</span>--}}
                                    {{--</td>--}}
                                    {{--<td class="d-none d-sm-table-cell text-center">--}}
                                        {{--<img class="img-avatar img-avatar32" src="assets/media/avatars/avatar2.jpg" alt="">--}}
                                    {{--</td>--}}
                                    {{--<td class="font-w600">--}}
                                        {{--Melissa Rice                                </td>--}}
                                    {{--<td class="d-none d-sm-table-cell text-center">--}}
                                        {{--<a class="link-fx font-w600" href="javascript:void(0)">14</a>--}}
                                    {{--</td>--}}
                                    {{--<td class="text-center">--}}
                                        {{--<a href="javascript:void(0)" data-toggle="tooltip" data-placement="left" title="Edit">--}}
                                            {{--<i class="fa fa-fw fa-pencil-alt"></i>--}}
                                        {{--</a>--}}
                                    {{--</td>--}}
                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<td>--}}
                                        {{--<span class="font-w600">#01368</span>--}}
                                    {{--</td>--}}
                                    {{--<td class="d-none d-sm-table-cell text-center">--}}
                                        {{--<img class="img-avatar img-avatar32" src="assets/media/avatars/avatar15.jpg" alt="">--}}
                                    {{--</td>--}}
                                    {{--<td class="font-w600">--}}
                                        {{--Jose Wagner                                </td>--}}
                                    {{--<td class="d-none d-sm-table-cell text-center">--}}
                                        {{--<a class="link-fx font-w600" href="javascript:void(0)">15</a>--}}
                                    {{--</td>--}}
                                    {{--<td class="text-center">--}}
                                        {{--<a href="javascript:void(0)" data-toggle="tooltip" data-placement="left" title="Edit">--}}
                                            {{--<i class="fa fa-fw fa-pencil-alt"></i>--}}
                                        {{--</a>--}}
                                    {{--</td>--}}
                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<td>--}}
                                        {{--<span class="font-w600">#01368</span>--}}
                                    {{--</td>--}}
                                    {{--<td class="d-none d-sm-table-cell text-center">--}}
                                        {{--<img class="img-avatar img-avatar32" src="assets/media/avatars/avatar3.jpg" alt="">--}}
                                    {{--</td>--}}
                                    {{--<td class="font-w600">--}}
                                        {{--Megan Fuller                                </td>--}}
                                    {{--<td class="d-none d-sm-table-cell text-center">--}}
                                        {{--<a class="link-fx font-w600" href="javascript:void(0)">36</a>--}}
                                    {{--</td>--}}
                                    {{--<td class="text-center">--}}
                                        {{--<a href="javascript:void(0)" data-toggle="tooltip" data-placement="left" title="Edit">--}}
                                            {{--<i class="fa fa-fw fa-pencil-alt"></i>--}}
                                        {{--</a>--}}
                                    {{--</td>--}}
                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<td>--}}
                                        {{--<span class="font-w600">#01368</span>--}}
                                    {{--</td>--}}
                                    {{--<td class="d-none d-sm-table-cell text-center">--}}
                                        {{--<img class="img-avatar img-avatar32" src="assets/media/avatars/avatar12.jpg" alt="">--}}
                                    {{--</td>--}}
                                    {{--<td class="font-w600">--}}
                                        {{--Albert Ray                                </td>--}}
                                    {{--<td class="d-none d-sm-table-cell text-center">--}}
                                        {{--<a class="link-fx font-w600" href="javascript:void(0)">3</a>--}}
                                    {{--</td>--}}
                                    {{--<td class="text-center">--}}
                                        {{--<a href="javascript:void(0)" data-toggle="tooltip" data-placement="left" title="Edit">--}}
                                            {{--<i class="fa fa-fw fa-pencil-alt"></i>--}}
                                        {{--</a>--}}
                                    {{--</td>--}}
                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<td>--}}
                                        {{--<span class="font-w600">#01368</span>--}}
                                    {{--</td>--}}
                                    {{--<td class="d-none d-sm-table-cell text-center">--}}
                                        {{--<img class="img-avatar img-avatar32" src="assets/media/avatars/avatar1.jpg" alt="">--}}
                                    {{--</td>--}}
                                    {{--<td class="font-w600">--}}
                                        {{--Betty Kelley                                </td>--}}
                                    {{--<td class="d-none d-sm-table-cell text-center">--}}
                                        {{--<a class="link-fx font-w600" href="javascript:void(0)">1</a>--}}
                                    {{--</td>--}}
                                    {{--<td class="text-center">--}}
                                        {{--<a href="javascript:void(0)" data-toggle="tooltip" data-placement="left" title="Edit">--}}
                                            {{--<i class="fa fa-fw fa-pencil-alt"></i>--}}
                                        {{--</a>--}}
                                    {{--</td>--}}
                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<td>--}}
                                        {{--<span class="font-w600">#01368</span>--}}
                                    {{--</td>--}}
                                    {{--<td class="d-none d-sm-table-cell text-center">--}}
                                        {{--<img class="img-avatar img-avatar32" src="assets/media/avatars/avatar11.jpg" alt="">--}}
                                    {{--</td>--}}
                                    {{--<td class="font-w600">--}}
                                        {{--Jose Wagner                                </td>--}}
                                    {{--<td class="d-none d-sm-table-cell text-center">--}}
                                        {{--<a class="link-fx font-w600" href="javascript:void(0)">12</a>--}}
                                    {{--</td>--}}
                                    {{--<td class="text-center">--}}
                                        {{--<a href="javascript:void(0)" data-toggle="tooltip" data-placement="left" title="Edit">--}}
                                            {{--<i class="fa fa-fw fa-pencil-alt"></i>--}}
                                        {{--</a>--}}
                                    {{--</td>--}}
                                {{--</tr>--}}
                                {{--</tbody>--}}
                            {{--</table>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<!-- END Latest Customers -->--}}

                {{--<!-- Latest Orders -->--}}
                {{--<div class="col-lg-6">--}}
                    {{--<div class="block block-mode-loading-oneui">--}}
                        {{--<div class="block-header border-bottom">--}}
                            {{--<h3 class="block-title">Latest Orders</h3>--}}
                            {{--<div class="block-options">--}}
                                {{--<button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">--}}
                                    {{--<i class="si si-refresh"></i>--}}
                                {{--</button>--}}
                                {{--<button type="button" class="btn-block-option">--}}
                                    {{--<i class="si si-settings"></i>--}}
                                {{--</button>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="block-content block-content-full">--}}
                            {{--<table class="table table-striped table-hover table-borderless table-vcenter font-size-sm mb-0">--}}
                                {{--<thead class="thead-dark">--}}
                                {{--<tr class="text-uppercase">--}}
                                    {{--<th class="font-w700">ID</th>--}}
                                    {{--<th class="d-none d-sm-table-cell font-w700">Date</th>--}}
                                    {{--<th class="font-w700">State</th>--}}
                                    {{--<th class="d-none d-sm-table-cell font-w700 text-right" style="width: 120px;">Price</th>--}}
                                    {{--<th class="font-w700 text-center" style="width: 60px;"></th>--}}
                                {{--</tr>--}}
                                {{--</thead>--}}
                                {{--<tbody>--}}
                                {{--<tr>--}}
                                    {{--<td>--}}
                                        {{--<span class="font-w600">#07835</span>--}}
                                    {{--</td>--}}
                                    {{--<td class="d-none d-sm-table-cell">--}}
                                        {{--<span class="font-size-sm text-muted">today</span>--}}
                                    {{--</td>--}}
                                    {{--<td>--}}
                                        {{--<span class="font-w600 text-warning">Pending..</span>--}}
                                    {{--</td>--}}
                                    {{--<td class="d-none d-sm-table-cell text-right">--}}
                                        {{--$999,99--}}
                                    {{--</td>--}}
                                    {{--<td class="text-center">--}}
                                        {{--<a href="javascript:void(0)" data-toggle="tooltip" data-placement="left" title="Manage">--}}
                                            {{--<i class="fa fa-fw fa-pencil-alt"></i>--}}
                                        {{--</a>--}}
                                    {{--</td>--}}
                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<td>--}}
                                        {{--<span class="font-w600">#07834</span>--}}
                                    {{--</td>--}}
                                    {{--<td class="d-none d-sm-table-cell">--}}
                                        {{--<span class="font-size-sm text-muted">today</span>--}}
                                    {{--</td>--}}
                                    {{--<td>--}}
                                        {{--<span class="font-w600 text-warning">Pending..</span>--}}
                                    {{--</td>--}}
                                    {{--<td class="d-none d-sm-table-cell text-right">--}}
                                        {{--$2.299,00--}}
                                    {{--</td>--}}
                                    {{--<td class="text-center">--}}
                                        {{--<a href="javascript:void(0)" data-toggle="tooltip" data-placement="left" title="Manage">--}}
                                            {{--<i class="fa fa-fw fa-pencil-alt"></i>--}}
                                        {{--</a>--}}
                                    {{--</td>--}}
                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<td>--}}
                                        {{--<span class="font-w600">#07833</span>--}}
                                    {{--</td>--}}
                                    {{--<td class="d-none d-sm-table-cell">--}}
                                        {{--<span class="font-size-sm text-muted">today</span>--}}
                                    {{--</td>--}}
                                    {{--<td>--}}
                                        {{--<span class="font-w600 text-success">Completed</span>--}}
                                    {{--</td>--}}
                                    {{--<td class="d-none d-sm-table-cell text-right">--}}
                                        {{--$1200,00--}}
                                    {{--</td>--}}
                                    {{--<td class="text-center">--}}
                                        {{--<a href="javascript:void(0)" data-toggle="tooltip" data-placement="left" title="Manage">--}}
                                            {{--<i class="fa fa-fw fa-pencil-alt"></i>--}}
                                        {{--</a>--}}
                                    {{--</td>--}}
                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<td>--}}
                                        {{--<span class="font-w600">#07832</span>--}}
                                    {{--</td>--}}
                                    {{--<td class="d-none d-sm-table-cell">--}}
                                        {{--<span class="font-size-sm text-muted">today</span>--}}
                                    {{--</td>--}}
                                    {{--<td>--}}
                                        {{--<span class="font-w600 text-danger">Cancelled</span>--}}
                                    {{--</td>--}}
                                    {{--<td class="d-none d-sm-table-cell text-right">--}}
                                        {{--$399,00--}}
                                    {{--</td>--}}
                                    {{--<td class="text-center">--}}
                                        {{--<a href="javascript:void(0)" data-toggle="tooltip" data-placement="left" title="Manage">--}}
                                            {{--<i class="fa fa-fw fa-pencil-alt"></i>--}}
                                        {{--</a>--}}
                                    {{--</td>--}}
                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<td>--}}
                                        {{--<span class="font-w600">#07831</span>--}}
                                    {{--</td>--}}
                                    {{--<td class="d-none d-sm-table-cell">--}}
                                        {{--<span class="font-size-sm text-muted">yesterday</span>--}}
                                    {{--</td>--}}
                                    {{--<td>--}}
                                        {{--<span class="font-w600 text-success">Completed</span>--}}
                                    {{--</td>--}}
                                    {{--<td class="d-none d-sm-table-cell text-right">--}}
                                        {{--$349,00--}}
                                    {{--</td>--}}
                                    {{--<td class="text-center">--}}
                                        {{--<a href="javascript:void(0)" data-toggle="tooltip" data-placement="left" title="Manage">--}}
                                            {{--<i class="fa fa-fw fa-pencil-alt"></i>--}}
                                        {{--</a>--}}
                                    {{--</td>--}}
                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<td>--}}
                                        {{--<span class="font-w600">#07830</span>--}}
                                    {{--</td>--}}
                                    {{--<td class="d-none d-sm-table-cell">--}}
                                        {{--<span class="font-size-sm text-muted">yesterday</span>--}}
                                    {{--</td>--}}
                                    {{--<td>--}}
                                        {{--<span class="font-w600 text-success">Completed</span>--}}
                                    {{--</td>--}}
                                    {{--<td class="d-none d-sm-table-cell text-right">--}}
                                        {{--$999,00--}}
                                    {{--</td>--}}
                                    {{--<td class="text-center">--}}
                                        {{--<a href="javascript:void(0)" data-toggle="tooltip" data-placement="left" title="Manage">--}}
                                            {{--<i class="fa fa-fw fa-pencil-alt"></i>--}}
                                        {{--</a>--}}
                                    {{--</td>--}}
                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<td>--}}
                                        {{--<span class="font-w600">#07829</span>--}}
                                    {{--</td>--}}
                                    {{--<td class="d-none d-sm-table-cell">--}}
                                        {{--<span class="font-size-sm text-muted">yesterday</span>--}}
                                    {{--</td>--}}
                                    {{--<td>--}}
                                        {{--<span class="font-w600 text-success">Completed</span>--}}
                                    {{--</td>--}}
                                    {{--<td class="d-none d-sm-table-cell text-right">--}}
                                        {{--$39,99--}}
                                    {{--</td>--}}
                                    {{--<td class="text-center">--}}
                                        {{--<a href="javascript:void(0)" data-toggle="tooltip" data-placement="left" title="Manage">--}}
                                            {{--<i class="fa fa-fw fa-pencil-alt"></i>--}}
                                        {{--</a>--}}
                                    {{--</td>--}}
                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<td>--}}
                                        {{--<span class="font-w600">#07828</span>--}}
                                    {{--</td>--}}
                                    {{--<td class="d-none d-sm-table-cell">--}}
                                        {{--<span class="font-size-sm text-muted">yesterday</span>--}}
                                    {{--</td>--}}
                                    {{--<td>--}}
                                        {{--<span class="font-w600 text-success">Completed</span>--}}
                                    {{--</td>--}}
                                    {{--<td class="d-none d-sm-table-cell text-right">--}}
                                        {{--$499,00--}}
                                    {{--</td>--}}
                                    {{--<td class="text-center">--}}
                                        {{--<a href="javascript:void(0)" data-toggle="tooltip" data-placement="left" title="Manage">--}}
                                            {{--<i class="fa fa-fw fa-pencil-alt"></i>--}}
                                        {{--</a>--}}
                                    {{--</td>--}}
                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<td>--}}
                                        {{--<span class="font-w600">#07827</span>--}}
                                    {{--</td>--}}
                                    {{--<td class="d-none d-sm-table-cell">--}}
                                        {{--<span class="font-size-sm text-muted">yesterday</span>--}}
                                    {{--</td>--}}
                                    {{--<td>--}}
                                        {{--<span class="font-w600 text-success">Completed</span>--}}
                                    {{--</td>--}}
                                    {{--<td class="d-none d-sm-table-cell text-right">--}}
                                        {{--$325,00--}}
                                    {{--</td>--}}
                                    {{--<td class="text-center">--}}
                                        {{--<a href="javascript:void(0)" data-toggle="tooltip" data-placement="left" title="Manage">--}}
                                            {{--<i class="fa fa-fw fa-pencil-alt"></i>--}}
                                        {{--</a>--}}
                                    {{--</td>--}}
                                {{--</tr>--}}
                                {{--</tbody>--}}
                            {{--</table>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<!-- END Latest Orders -->--}}
            {{--</div>--}}
            <!-- END Customers and Latest Orders -->
        </div>
        <!-- END Page Content -->

    </main>
    <!-- END Main Container -->

@endsection