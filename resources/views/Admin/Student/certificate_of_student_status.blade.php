<div class="graduation_prospect_certificate">
    <div class="container">
        <style>
            .graduation_prospect_certificate_main strong {
                margin-left: 8px;
            }
            .graduation_prospect_certificate_main b {
                margin-left: 25px;
            }
            h1.graduation_prospect_certificate_h2 {
                margin-bottom: 55px;
            }
        </style>
        <div class="row">
            <div class="graduation_prospect_certificate_main" style="padding: 80px">
                <h5 style="border-bottom: 1px solid #000; padding-bottom: 2px;width: 100px;float: right;">No</h5> <br><br><br>
                <h1 class="graduation_prospect_certificate_h2" style="text-align: center">
                    在学証明書
                </h1>
                <h3>氏  名 &nbsp; &nbsp;<b>{{$student->last_student_name}} {{$student->first_student_name	}}</b></h3>
                <h3>生年月日  &nbsp;<strong>{{$student->date_of_birth}}</strong></h3>
                <h3>現住所 <b>{{$student->address}}</b></h3>
                <h3>学科名 <b>造形芸術科（アートビジネスコ-ス)</b></h3>
                {{--<h3>学科名	造形芸術科（アートビギネスコズ）</h3>--}}
                <h3> 学年 &nbsp; &nbsp; <b>{{$student->student_of_year}}</b></h3>
                <div class="gradution_prospect_content">
                    <h3>
                        上記の者は本学園に在学することを証明する
                    </h3>
                </div>
                <div class="graduation_prospect_right" style="float: right;text-align: right;">
                    {{--<h3>平成31年1月10日</h3>--}}
                    <h3>{{ date('Y') }}年
                        {{ date('m') }}月
                        {{ date('d') }}日
                    </h3>
                    <h3>東京都練馬区関町北2丁目34番12号</h3>
                    <h3>学校法人郡山学園専門学校中央美術学園</h3>
                    <h3>理事長カドカ インドラ バハドゥル</h3>
                </div>
            </div>
        </div>
    </div>
</div>