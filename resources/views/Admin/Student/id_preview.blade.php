
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>
        @if(isset($title))
            {!! $title !!}
        @else
            Admin Panel
        @endif

    </title>
    <style>
        .id_card_section {
            width: 100mm;
            margin: 0 auto;
            position: relative;
            margin-bottom: 20mm;
            margin-top: 5mm;
        }
        .id-content{
            position: absolute;
            top: 46px;
            left: 110px;
            z-index: 11;
        }
        .id-content h4 {
            margin-left: 49px;
            font-size: 12px;
            margin-top: 9px;
            line-height: 0.3;
        }
        .issue-date{
            position: absolute;
            top: 112px;
            left:-90px;
            z-index:11;
        }
        .issue-date h4{
            margin-top: 21px;
            margin-left: 23px;
            font-size: 10px;
        }

        .id_photo {
            float: right;
            position: absolute;
            top: 2px;
            left: -90px;
            z-index: 11;
        }
        .id_photo_stamp{
            float: right;
            position: absolute;
            top: 60px;
            left: 1px;
            z-index: 11;
        }
        .qr_photo{
            float: right;
            position: absolute;
            top: -266px;
            left: 156px;
            z-index: 11;
        }

    </style>
</head>
<body>

<div class="id_card_section">
    <img src="{{asset('public/id-card/f-card.png')}}" alt="" style="width:100%;">
    <div class="id-content">
        <h4>{{$student->student_number}}</h4>
        <?php $countValue=strlen($student->last_student_name)+strlen($student->first_student_name) ?>
        @if($countValue>20)
            <h4 style="font-size: 6px;padding-bottom: 4px;">{{$student->last_student_name}} {{$student->first_student_name}}</h4>
        @else
        <h4>{{$student->last_student_name}} {{$student->first_student_name}}</h4>
        @endif
        <h4>{{$student->date_of_birth}}</h4>
        <h4>造形芸術科</h4>
        <h4>{{$student->student_of_year}}</h4>
        <h4>{{$student->expire_date}}</h4>
        {{--<h4>{{$student->entry_date}}</h4>--}}

        <div class="id_photo">
            @if(isset($student->photo))
                <img src="{{url('public/photos').'/'.$student->photo}}" alt="" class="" style="background-color: #fff; width:80px; height:85px;  border: 2px solid lightgrey; padding:2px;">
            @else
                <img src="{{url('public/photos/avatar.jpg')}}" alt="" class="" style="background-color: #fff; width:80px; height:85px;  border: 2px solid lightgrey; padding:2px;">
            @endif
            <div class="id_photo_stamp">

                <img src="{{url('public/photos/stamp.png')}}" alt="" style="width:70px;">
            </div>
            <div style="clear: both; margin-bottom:20px;"></div>
        </div>
        <div style="clear: both; margin-bottom:20px;"></div>
        <div class="issue-date">
            <h4>{{$student->entry_date}}</h4>

        </div>
        <div style="clear: both; margin-bottom:20px;"></div>

    </div>
</div>
<div style="clear: both; margin-bottom:20px;"></div>
<div class="id_card_section">
    <img src="{{asset('public/id-card/b-card.png')}}" alt="" style="width:100%;">
    <div class="id-content">
        <div class="qr_photo">
            {{--{{}}--}}
            {!! QrCode::size(100)->generate($student->unique_id); !!}
            {{--                <img src="{{url('public/QR-Student/qr-default.png')}}" alt="" class="" style="background-color: #fff; width:70px;">--}}
        </div>
        <div style="clear: both; margin-bottom:20px;"></div>
    </div>

</div>

</body>
</html>
