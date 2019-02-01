
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
        .id_card_section{
            width:345px;
            /*height: 654px;*/
            margin:0 auto;
            position: relative;
        }
        .id-content{
            position: absolute;
            top:42px;
            left:100px;
            z-index:11;
        }
        .id-content h4{
            font-size: 11px;
            line-height: 0;
        }
        .issue-date{
            position: absolute;
            top: 112px;
            left:-90px;
            z-index:11;
        }
        .issue-date h4{
            font-size: 10px;
            line-height: 0;
        }

        .id_photo{
            float: right;
            position: absolute;
            top:30px;
            left:135px;
            z-index:11;
        }
        .id_photo_stamp{
            float: right;
            position: absolute;
            top:70px;
            left:15px;
            z-index:11;
        }
        .qr_photo{
            float: right;
            position: absolute;
            top:98px;
            left:160px;
            z-index:11;
        }

    </style>
</head>
<body>

    <div class="id_card_section">
        <img src="{{asset('public/id-card/id-front.jpg')}}" alt="" style="width:100%;">
        <div class="id-content">
            <h4>{{$student->unique_id}}</h4>
            <h4>{{$student->last_student_name}} {{$student->first_student_name}}</h4>
            <h4>{{$student->date_of_birth}}</h4>
                <h4 style="padding-bottom:1px;"></h4>
            @if(isset($student->class_room_batch_id))
            <h4>{{$student->class_room_batch->batch->name}}</h4>
            @endif
            <h4>{{$student->expire_date}}</h4>

            <div class="id_photo">
                @if(isset($student->photo))
                <img src="{{url('public/photos').'/'.$student->photo}}" alt="" class="" style="background-color: #fff; width:80px; height:85px;  border: 2px solid lightgrey; padding:2px;">
                @else
                <img src="{{url('public/photos/avatar.jpg')}}" alt="" class="" style="background-color: #fff; width:80px; height:85px;  border: 2px solid lightgrey; padding:2px;">
                @endif
                    <div class="id_photo_stamp">

                    <img src="{{url('public/photos/stamp.png')}}" alt="" style="width:60px;">
                </div>
                <div style="clear: both; margin-bottom:20px;"></div>
            </div>
            <div style="clear: both; margin-bottom:20px;"></div>
            <div class="issue-date">
                <h4>Issue:{{date('Y-m-d')}}</h4>
            </div>
            <div style="clear: both; margin-bottom:20px;"></div>

        </div>
    </div>
    <div style="clear: both; margin-bottom:20px;"></div>
    <div class="id_card_section">
        <img src="{{asset('public/id-card/id-back.jpg')}}" alt="" style="width:100%;">
        <div class="id-content">
            <div class="qr_photo">
                {{--{{}}--}}
                {!! QrCode::size(70)->generate($student->unique_id); !!}
{{--                <img src="{{url('public/QR-Student/qr-default.png')}}" alt="" class="" style="background-color: #fff; width:70px;">--}}
            </div>
            <div style="clear: both; margin-bottom:20px;"></div>
        </div>

    </div>

</body>
</html>
