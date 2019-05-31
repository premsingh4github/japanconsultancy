
@extends('Admin.index')
@section('style')

    @endsection
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
                                <div class="col-sm-12">
                                    <h4> Calender View <a href="{{url('admin/view_calendar')}}" class="btn btn-primary btn-sm" style="float: right;">Back</a> </h4>
                                </div>
                                <div class="col-sm-12">
                                    <table class="table table-striped" style="border: 1px solid darkgrey;">
                                        <tr>
                                            <th colspan="36">{{$year}} 年度学事日程表（アートビジネスコース）</th>
                                        </tr>
                                        <tr>
                                            @while ($date1 <= $date2)
                                                <td colspan="3" style="text-align:center;">{{date('m', $date1)}}月 ({{date('Y', $date1)}})</td>
                                                @php $date1 = strtotime('+1 month', $date1); @endphp
                                            @endwhile
                                        </tr>
                                        <tr>
                                            @php
                                                $month1 = strtotime($start);
                                                $month2 = strtotime($end);
                                            @endphp
                                        @while ($month1 <= $month2)
                                            <td colspan="3">
                                                <table class="table table-striped" style="border: 1px solid darkgrey;">
                                                    <tr>
                                                        <td colspan="2" style="text-align: center;">Date</td>
                                                        <td>Description</td>
                                                    </tr>
                                                    @php
                                                        $day1 = strtotime($start);
                                                        $day2 = strtotime($end);
                                                    @endphp
                                                    @while ($day1 <= $day2)
                                                        @if(date('m', $month1)==date('m',$day1))
                                                        <tr>
                                                            <td class="text-align-center">{{date('d', $day1)}}</td>
                                                            <td>{{date('D', $day1)}}</td>
                                                                @php $events = \App\Event::where('start_date',date('Y-m-d', $day1))->get(); @endphp
                                                                @if(count($events)>0 || date('D',$day1)=='Sat' || date('D',$day1)=='Sun')
                                                                    <td style="background-color:#4e83c3; color: #fff;">
                                                                        @foreach($events as $event)
                                                                     {{$event->title}}
                                                                        @endforeach
                                                                    </td>
                                                                    @else
                                                                    <td style="background-color: #e6b4b466;"></td>
                                                                    @endif
                                                        </tr>
                                                        @endif
                                                            @php $day1 = strtotime('+1 day', $day1); @endphp

                                                    @endwhile
                                                </table>
                                            </td>
                                                @php $month1 = strtotime('+1 month', $month1); @endphp
                                            @endwhile
                                        </tr>
                                    </table>
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