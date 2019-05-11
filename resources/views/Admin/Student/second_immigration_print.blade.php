@extends('Admin.index')
@section('body')
    <style>

        .table thead th{
            font-size: 12px;
        }
        .table td, .table th {
            padding: 5px;
            vertical-align: top;
            border-top: 1px solid #ebebeb;
        }
        h2.first_immigration_h2{
            font-weight: bold;
            text-align: center;
            font-family:"ヒラギノ角ゴ Pro W3", "Hiragino Kaku Gothic Pro",Osaka, "メイリオ", Meiryo, "ＭＳ Ｐゴシック", "MS PGothic", sans-serif;
            font-size: 14px;
        }
        h2.second_immigration_h2{
            font-weight: bold;
            text-align: center;
            font-family:"ヒラギノ角ゴ Pro W3", "Hiragino Kaku Gothic Pro",Osaka, "メイリオ", Meiryo, "ＭＳ Ｐゴシック", "MS PGothic", sans-serif;
            font-size: 14px;
        }
        table thead th {
            text-align: center;
            font-weight: 600;
            font-size: .875rem;
            text-transform: none!important;
            letter-spacing: .0625rem;
        }
    </style>
    <!-- Main Container -->
    <main id="container">
        <!-- Page Content -->
        <div class="content" style="margin-top:50px;">
            <div class="block-content hidden-print" style="margin-bottom: 20px;">
                <form action="" method="post">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-sm-3"><label for="">{{__('language.Choose_student_batch')}}</label></div>
                        <div class="col-sm-3">
                            <select name="class_room_batch_id" class="form-control form-control-sm" id="">
                                <option value="">{{__('language.View_All_Year')}}</option>
                                @foreach($classRoomBatch as $batch)
                                    <option @if(request('class_room_batch_id') == $batch->id) selected="selected" @endif value="{{$batch->id}}">{{$batch->class_room->name}}-{{$batch->batch->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <button type="submit" class="btn btn-outline-primary btn-sm">Show</button>
                        </div>
                        <div class="col-sm-2">
                            <button  class="form-control btn btn-primary" onclick="window.print()"> {{__('language.Print')}}/{{__('language.Pdf')}}
                            {{--@if(request('class_room_batch_id')=='1')--}}
                            {{--<a href="{{url('public/uploads/2nd-immigration-Batch-2019.pdf')}}"  class="form-control btn btn-primary" > {{__('language.Print')}}/{{__('language.Pdf')}}</a>--}}
                            {{--@elseif(request('class_room_batch_id')=='2')--}}
                            {{--<a href="{{url('public/uploads/2nd-immigration-Batch-2018.pdf')}}"  class="form-control btn btn-primary" > {{__('language.Print')}}/{{__('language.Pdf')}}</a>--}}
                            {{--@else--}}
                            {{--<a href="{{url('public/uploads/2nd-immigration-Batch-All.pdf')}}"  class="form-control btn btn-primary" > {{__('language.Print')}}/{{__('language.Pdf')}}</a>--}}
                            {{--@endif--}}
                            </button>
                        </div>
                        <div class="col-sm-12">
                            @if(count($list_students)>0)
                                <i style="font-size: 15px; color:Green;">{{count($list_students)}} {{__('language.Students_Found')}}</i>
                        </div>
                        @else
                            <i style="font-size: 15px; color:Red;">{{__('language.Record_Not_Found')}}</i>
                        @endif
                    </div>
                </form>
            </div>
            <table class="table table-bordered">
                <thead>
                <tr class="table_bordered">
                    <th colspan="11" style="text-align: left">
                        <div class="i_float_left">
                            <b>(別記第3号様式の2)</b>
                        </div>
                        <div class="i_float_right">
                            <b>{{ date('Y') }}年
                                {{ date('m') }}月
                                {{ date('d') }}日 現在</b>
                        </div>
                        <div class="block-header printView">
                            <h3 class="block-title">当該機関で受け入れている外国人リスト</h3>
                        </div>
                        <div class="i_float_right_b">
                            <b>受け入れ機関名　学）専門学校　中央美術学園</b>
                        </div>
                        <div class="i_float_left">
                            <b></b>
                        </div>
                    </th>
                </tr>
                </thead>
                <thead>
                <tr class="table_bordered" style="line-height: 0.8">
                    <th style="font-size: 10px;">{{__('language.SN')}}</th>
                    <th style="font-size: 10px;">{{__('language.Residential_Card_No')}}</th>
                    <th style="font-size: 10px;">{{__('language.Nationality')}}</th>
                    <th style="font-size: 10px;">{{__('language.student_name')}}</th>
                    {{--<th class="d-none d-sm-table-cell" style="width: 30%;">Name (Japanese)</th>--}}
                    <th style="font-size: 10px;">{{__('language.student_gender')}}</th>
                    <th style="font-size: 10px;">{{__('language.student_dob')}}</th>
                    <th style="font-size: 10px;">{{__('language.Entry_Date')}}</th>
                    <th style="font-size: 10px;">{{__('language.student_Status')}}</th>
                    <th style="font-size: 10px;">{{__('language.Card_Period')}}</th>
                    <th style="font-size: 10px;">{{__('language.Card_Expire')}}</th>
                    <th style="font-size: 10px;">{{__('language.student_remarks')}}</th>
                </tr>
                </thead>

                <tbody class="table_bordered" style="font-size: 12px;">
                @foreach($list_students as $key=>$students)
                    <tr class="table_bordered" style="line-height: 0.8;">
                        <td style="font-size: 9px;">{{++$key}}</td>
                        <td style="font-size: 9px;">{{$students->residensal_card}}</td>
                        <td style="font-size: 9px;">{{$students->country->name}}</td>
                        <td style="font-size: 9px;"><a class="second_immi_a" href="{{url('admin/list_student/student_id=').$students->id.'/remarks'}}" title="Click here to update">{{$students->last_student_name}} {{$students->first_student_name}}</a></td>
                        {{--<td>{{$students->last_student_japanese_name}} {{$students->first_student_japanese_name}}</td>--}}
                        <td style="font-size: 9px;">
                            @if($students->student_sex == 'm')男
                            @elseif($students->student_sex == 'f')女
                            @else
                                その他の
                            @endif
                        </td>
                        <td style="font-size: 9px;">{{$students->date_of_birth}}</td>
                        <td style="font-size: 9px;">{{$students->entry_date}}</td>
                        <td style="font-size: 9px;">{{$students->student_status}}</td>
                        <td style="font-size: 9px;">@if(isset($students->residensal->name)){{$students->residensal->name}}@endif</td>
                        <td style="font-size: 9px;">{{$students->residensal_card_expire}}</td>
                        <td style="font-size: 9px;">
                            <a class="second_immi_a" href="{{url('admin/list_student/student_id=').$students->id.'/remarks'}}" title="Click here to edit">{!! $students->student_note !!}</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>

        <!-- END Page Content -->

    </main>
    <!-- END Main Container -->
@endsection
