<div class="graduation_prospect_certificate">
    <div class="container">
        <style>
            .graduation_prospect_certificate_main b {
                margin-left: 15px;
            }
            h1.graduation_prospect_certificate_h2 {
             margin-bottom: 65px;
            }
        </style>
        <div class="row">
            <div class="graduation_prospect_certificate_main" style="padding:120px 80px;">
                <h5 style="border-bottom: 1px solid #000; padding-bottom: 2px;width: 100px;float: right;">No</h5> <br><br><br>
                <h1 class="graduation_prospect_certificate_h2" style="text-align: center">
                    卒業見込証明書
                </h1>
                <h3>氏  名 &nbsp; &nbsp;<b>{{$student->last_student_name}} {{$student->first_student_name	}}</b></h3>
                <h3>年月日 <b>{{$student->date_of_birth}}</b></h3>
                <h3>現住所 <b>{{$student->address}}</b></h3>
                <h3>学科名 <b>@if(isset($student->subject->name)){{$student->subject->name}}@endif</b></h3>
                {{--<h3>学科名	造形芸術科（アートビギネスコズ）</h3>--}}
                <h3> 学年 &nbsp; &nbsp; <b>{{$student->student_of_year}}</b></h3>
                <div class="gradution_prospect_content">
                    <h3>上記の者は本学園造型専門課程造形芸術科を
                        平成31年3月に卒業見込であることを証明する本学の専門課程の修了者（卒業者）には、「専門士」の称号が付与されます
                    </h3>
                </div>
             <div class="graduation_prospect_right" style="float: right;text-align: right;">
                 <h3> 平成31年1月7日</h3>
                 <h3> 東京都練馬区関町北2丁目34番12号</h3>
                 <h3>学校法人郡山学園	専門学校</h3>
                 <h3> 中央美術学園　学校長　副田勝久</h3>
             </div>
            </div>
        </div>
    </div>
</div>