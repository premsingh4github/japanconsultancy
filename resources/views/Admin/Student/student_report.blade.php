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
                                    <table border="1" class="full-width-table">
                                        <tr>
                                            <td class="text-align-left" colspan="4">No.</td>
                                            <td colspan="10">学業成績及び出席日数状況表</td>
                                            <td class="text-align-right">{{$student->student_number}}クラス</td>
                                            <td class="text-align-right" colspan="2">{{$student->student_number}}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-align-right" colspan="17">{{date('d M-Y')}}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-align-center" colspan="17"> ({{date('M d, Y',strtotime($first_attend->created_at))}} to {{date('M d, Y')}})</td>
                                        </tr>
                                        <tr>
                                            <td class="text-align-center" colspan="4">国籍/母国語</td>
                                            <td class="text-align-center" colspan="9">氏  名</td>
                                            <td>
                                                性別
                                            </td>
                                            <td class="text-align-center" colspan="4">生年月日</td>
                                        </tr>
                                        <tr>
                                            <td class="text-align-center" colspan="2">{{$student->country->name}}</td>
                                            <td class="text-align-center" colspan="2">/NA</td>
                                            <td class="text-align-center" colspan="9">{{$student->first_student_japanese_name}} {{$student->last_student_japanese_name}} </td>
                                            <td>
                                                @if($student->student_sex=='m')男
                                                @elseif($student->student_sex=='f')女
                                                @endif
                                            </td>
                                            <td class="text-align-center" colspan="4">{{date('M d, Y',strtotime($student->date_of_birth))}}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-align-center" colspan="2">住所</td>
                                            <td class="text-align-center" colspan="12">{{$student->address}}</td>
                                            <td class="text-align-center">学年</td>
                                            <td class="text-align-center" colspan="3">{{$student->student_of_year}}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-align-center" colspan="5">在留資格</td>
                                            <td class="text-align-center" colspan="6">入国年月日</td>
                                            <td class="text-align-center" colspan="6">在留期限</td>
                                        </tr>
                                        <tr>
                                            <td class="text-align-center" colspan="5">留　　学</td>
                                            <td class="text-align-center" colspan="6">{{date('M d, Y',strtotime($student->entry_date))}}</td>
                                            <td class="text-align-center" colspan="4">{{$student->residensal->name}}</td>
                                            <td class="text-align-center" colspan="2">{{$student->residensal_card_expire}}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-align-center" colspan="4">在留カード番号</td>
                                            <td class="text-align-center" colspan="13">{{$student->residensal_card}}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-align-center" colspan="7">入学年月日</td>
                                            <td class="text-align-center" colspan="7">終了予定日</td>
                                            <td class="text-align-center" colspan="3">課程名</td>
                                        </tr>
                                        <tr>
                                            <td class="text-align-center" colspan="7">{{date('M d, Y',strtotime($student->entry_date))}}</td>
                                            <td class="text-align-center" colspan="7">{{date('M d, Y',strtotime($student->expire_date))}}</td>
                                            <td class="text-align-center" colspan="3">造形芸術科</td>
                                        </tr>
                                        <tr>
                                            <td class="blank_td" colspan="17"></td>
                                        </tr>
                                        <tr>
                                            <td class="text-align-center" colspan="2">出席状況</td>
                                            <td class="text-align-center">月別</td>
                                            <td>４月</td>
                                            <td>5月</td>
                                            <td>6月</td>
                                            <td>7月</td>
                                            <td>8月</td>
                                            <td>9月</td>
                                            <td>10月</td>
                                            <td>11月</td>
                                            <td>12月</td>
                                            <td>1月</td>
                                            <td>2月</td>
                                            <td>3月</td>
                                            <td class="text-align-right" colspan="2">合計・出席率</td>
                                        </tr>
                                        <tr>
                                            <td class="text-align-center">1</td>
                                            <td class="text-align-center" colspan="2">授業時数</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="text-align-right">0</td>
                                            <td class="text-align-right">h</td>
                                        </tr>
                                        <tr>
                                            <td class="text-align-center">年</td>
                                            <td class="text-align-center" colspan="2">出席時数</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="text-align-right">0</td>
                                            <td class="text-align-right">h</td>
                                        </tr>
                                        <tr>
                                            <td class="text-align-center">次</td>
                                            <td class="text-align-center" colspan="2">授業日数</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="text-align-right">0</td>
                                            <td class="text-align-right">h</td>
                                        </tr>
                                        <tr>
                                            <td class="text-align-center"></td>
                                            <td class="text-align-center" colspan="2">出席日数</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="text-align-right">0</td>
                                            <td class="text-align-right">h</td>
                                        </tr>
                                        <tr>
                                            <td class="blank_td" colspan="17"></td>
                                        </tr>
                                        <tr>
                                            <td class="text-align-center">2</td>
                                            <td class="text-align-center" colspan="2">授業時数</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="text-align-right">0</td>
                                            <td class="text-align-right">h</td>
                                        </tr>
                                        <tr>
                                            <td class="text-align-center">年</td>
                                            <td class="text-align-center" colspan="2">出席時数</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="text-align-right">0</td>
                                            <td class="text-align-right">h</td>
                                        </tr>
                                        <tr>
                                            <td class="text-align-center">次</td>
                                            <td class="text-align-center" colspan="2">授業日数</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="text-align-right">0</td>
                                            <td class="text-align-right">h</td>
                                        </tr>
                                        <tr>
                                            <td class="text-align-center"></td>
                                            <td class="text-align-center" colspan="2">出席日数</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="text-align-right">0</td>
                                            <td class="text-align-right">h</td>
                                        </tr>
                                        <tr>
                                            <td class="text-align-left" colspan="17">◎時数の増えている箇所は学校行事等による</td>
                                        </tr>
                                        <tr>
                                            <td class="text-align-center" colspan="2">科目名</td>
                                            @foreach($subjects as $subject)
                                            <td class="text-align-center" colspan="3">{{$subject->name}}</td>
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <td class="text-align-center" colspan="2">成績</td>
                                            <td class="text-align-center" colspan="3">----</td>
                                            <td class="text-align-center" colspan="3">----</td>
                                            <td class="text-align-center" colspan="3">----</td>
                                            <td class="text-align-center" colspan="3">----</td>
                                            <td class="text-align-center" colspan="3">----</td>
                                        </tr>
                                        <tr>
                                            <td class="text-align-center" colspan="2"></td>
                                            <td class="text-align-center" colspan="3">----</td>
                                            <td class="text-align-center" colspan="3">----</td>
                                            <td class="text-align-center" colspan="3">----</td>
                                            <td class="text-align-center" colspan="3">----</td>
                                            <td class="text-align-center" colspan="3">----</td>
                                        </tr>
                                        <tr>
                                            <td class="text-align-center" colspan="2"></td>
                                            <td class="text-align-center" colspan="3">----</td>
                                            <td class="text-align-center" colspan="3">----</td>
                                            <td class="text-align-center" colspan="3">----</td>
                                            <td class="text-align-center" colspan="3">----</td>
                                            <td class="text-align-center" colspan="3">----</td>
                                        </tr>
                                        <tr>
                                            <td class="text-align-center" colspan="2"></td>
                                            <td class="text-align-center" colspan="3">----</td>
                                            <td class="text-align-center" colspan="3">----</td>
                                            <td class="text-align-center" colspan="3">----</td>
                                            <td class="text-align-center" colspan="3">----</td>
                                            <td class="text-align-center" colspan="3">----</td>
                                        </tr>
                                        <tr>
                                            <td class="text-align-center" colspan="2"></td>
                                            <td class="text-align-center" colspan="3">----</td>
                                            <td class="text-align-center" colspan="3">----</td>
                                            <td class="text-align-center" colspan="3">----</td>
                                            <td class="text-align-center" colspan="3">----</td>
                                            <td class="text-align-center" colspan="3">----</td>
                                        </tr>
                                        <tr>
                                            <td class="text-align-center" colspan="2"></td>
                                            <td class="text-align-center" colspan="3">----</td>
                                            <td class="text-align-center" colspan="3">----</td>
                                            <td class="text-align-center" colspan="3">----</td>
                                            <td class="text-align-center" colspan="3">----</td>
                                            <td class="text-align-center" colspan="3">----</td>
                                        </tr>
                                        <tr>
                                            <td class="text-align-center" colspan="2"></td>
                                            <td class="text-align-center" colspan="3">----</td>
                                            <td class="text-align-center" colspan="3">----</td>
                                            <td class="text-align-center" colspan="3">----</td>
                                            <td class="text-align-center" colspan="3">----</td>
                                            <td class="text-align-center" colspan="3">----</td>
                                        </tr>
                                        <tr>
                                            <td class="text-align-center" colspan="2"></td>
                                            <td class="text-align-center" colspan="3">卒業課題①</td>
                                            <td class="text-align-center" colspan="3">卒業課題②</td>
                                            <td class="text-align-center" colspan="3">卒業課題③</td>
                                            <td class="text-align-center" colspan="3">卒業課題④</td>
                                            <td class="text-align-center" colspan="3">卒業課題⑤</td>
                                        </tr>
                                        <tr>
                                            <td class="text-align-center" colspan="2"></td>
                                            <td class="text-align-center" colspan="3">----</td>
                                            <td class="text-align-center" colspan="3">----</td>
                                            <td class="text-align-center" colspan="3">----</td>
                                            <td class="text-align-center" colspan="3">----</td>
                                            <td class="text-align-center" colspan="3">----</td>
                                        </tr>
                                        <tr>
                                            <td class="blank_td" colspan="17"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"></td>
                                            <td class="text-align-left" colspan="7">◎　１週間５日　授業（　１日　45分×4）</td>
                                            <td class="text-align-center" colspan="8">総合出席率・評価</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"></td>
                                            <td class="text-align-left" colspan="7">◎　成績評価　AA≧AB≧AC≧</td>
                                            <td class="text-align-center" colspan="4">#DIV/0!</td>
                                            <td class="text-align-center" colspan="4">D</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"></td>
                                            <td class="text-align-right" colspan="7">BA≧BB≧BC≧</td>
                                            <td class="text-align-center" colspan="8"> 合  格</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"></td>
                                            <td class="text-align-right" colspan="7">CA≧CB≧CC＞</td>
                                            <td class="text-align-right" colspan="8"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"></td>
                                            <td class="text-align-right" colspan="7">D（不合格）</td>
                                            <td class="text-align-right" colspan="8"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="10"></td>
                                            <td class="text-align-left" colspan="7">学校法人郡山学園</td>
                                        </tr>
                                        <tr>
                                            <td colspan="10"></td>
                                            <td class="text-align-left" colspan="7">専門学校 中央美術学園</td>
                                        </tr>
                                        <tr>
                                            <td colspan="10"></td>
                                            <td class="text-align-left" colspan="7">理事長・学校長</td>
                                        </tr>
                                        <tr>
                                            <td colspan="10"></td>
                                            <td class="text-align-left" colspan="7">副    田    勝    久</td>
                                        </tr>
                                    </table>
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
