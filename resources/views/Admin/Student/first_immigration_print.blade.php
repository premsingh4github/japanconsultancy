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
                            <button type="submit" class="btn btn-outline-primary btn-sm print-hide">Show</button>
                        </div>

                        <div class="col-sm-2">
                            <button  class="form-control btn btn-primary" onclick="window.print()"> {{__('language.Print')}}/{{__('language.Pdf')}}</button>
                            {{--@if(request('class_room_batch_id')=='1')--}}
                            {{--<a href="{{url('public/uploads/1st-immigration-Batch-2019.pdf')}}"  class="form-control btn btn-primary" > {{__('language.Print')}}/{{__('language.Pdf')}}</a>--}}
                            {{--@elseif(request('class_room_batch_id')=='2')--}}
                            {{--<a href="{{url('public/uploads/1st-immigration-Batch-2018.pdf')}}"  class="form-control btn btn-primary" > {{__('language.Print')}}/{{__('language.Pdf')}}</a>--}}
                            {{--@else--}}
                            {{--<a href="{{url('public/uploads/1st-immigration-Batch-All.pdf')}}"  class="form-control btn btn-primary" > {{__('language.Print')}}/{{__('language.Pdf')}}</a>--}}
                            {{--@endif--}}
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
                <thead style="font-size: 10px">
                <tr class="table_bordered">
                    <th colspan="7" style="text-align: left">
                        <span>届 出 機 関 名<br></span>
                        <h2 class="first_immigration_h2"><span>学校法人郡山学園  専門学校  中央美術学園</span> </h2>
                        <span>Name of the organization</span>
                    </th>
                </tr>
                </thead>
                <thead>
                <tr class="table_bordered">
                    <th style="font-size: 9px;">{{__('language.SN')}}</th>
                    <th style="width:50px; font-size: 9px;">国籍・地域	<br>Nationality/Region</th>
                    <th style="font-size: 9px;">氏 名 <br> Name (English)</th>
                    {{--<th class="d-none d-sm-table-cell" style="width: 30%;">Name (Japanese)</th>--}}
                    <th style="font-size: 9px;">性別<br>Gender</th>
                    <th style="font-size: 9px;">生年月日 <br>Date of Birth</th>
                    <th rowspan="2" style="font-size: 9px;">居住地 <br> Address in Japan</th>
                    <th rowspan="1"  style="font-size: 9px;">在留カード番号<br>Residential Card No</th>
                </tr>
                </thead>

                <tbody style="font-size: 12px;">
                @foreach($list_students as $key=>$students)
                    <tr style="line-height: 0.8;">
                        <td class="table_bordered" style="font-size: 9px;">{{++$key}}</td>
                        <td class="table_bordered" style="font-size: 9px;">{{$students->country->name}}</td>
                        <td style="font-size: 9px;">{{$students->last_student_name}} {{$students->first_student_name}}</td>
                        {{--<td>{{$students->last_student_japanese_name}} {{$students->first_student_japanese_name}}</td>--}}
                        <td style="font-size: 9px;">
                            @if($students->student_sex == 'm')男
                            @elseif($students->student_sex == 'f')女
                            @else
                                その他の
                            @endif
                        </td>
                        <td style="font-size: 9px;">{{$students->date_of_birth}}</td>
                        <td style="font-size: 9px;">{{$students->address}}</td>
                        <td style="font-size: 9px;">{{$students->residensal_card}}</td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>

        <!-- END Page Content -->

    </main>
    <!-- END Main Container -->
@endsection
