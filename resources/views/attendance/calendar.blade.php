<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{url('public/favcon(2).png')}}">
    <title>
        @if(isset($title))
            {!! $title !!}
        @else
            Admin Panel
        @endif
    </title>
    <style type="text/css">
        table.main {
            width: 300px;
            border: 1px solid black;
            background-color: #9dffff;
        }
        table.main td {
            vertical-align: top;
            font-family: verdana,arial, helvetica,  sans-serif;
            font-size: 11px;
        }
        table.main th {
            border-width: 1px 1px 1px 1px;
            padding: 0px 0px 0px 0px;
            background-color: #ccb4cd;
        }
        table.main a{TEXT-DECORATION: none;}
        table,td{ border: 1px solid #ffffff }
    </style>

    <link rel="stylesheet" href="{{asset('public/server')}}/assets/js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css" /> </head>


<link rel="stylesheet" href="{{asset('public/server')}}/assets/css/custom.css">
<link rel="stylesheet" href="{{asset('public/server')}}/assets/js/plugins/datatables/dataTables.bootstrap4.css">
<link rel="stylesheet" href="{{asset('public/server')}}/assets/js/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.css">
{{--<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">--}}

<!-- Icons -->
<!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
<link rel="apple-touch-icon" sizes="180x180" href="{{asset('public/server')}}/assets/media/favicons/apple-touch-icon-180x180.png">
<!-- END Icons -->
<!-- Page JS Plugins CSS -->
<link rel="stylesheet" href="{{asset('public/server')}}/assets/js/plugins/summernote/summernote-bs4.css">
<link rel="stylesheet" href="{{asset('public/server')}}/assets/js/plugins/simplemde/simplemde.min.css">

<!-- Stylesheets -->
<!-- Fonts and OneUI framework -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700">
<link rel="stylesheet" id="css-main" href="{{asset('public/server')}}/assets/css/oneui.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/css/tempusdominus-bootstrap-4.min.css" />
<style>
    .calendar_section{
        margin:30px 0;
        padding:10px;
        background-color: #fff;
        border:1px solid lightgrey;
        width: 100%;
    }
</style>
<body>


<div class="container-fluid">
    <div class="calendar_section">
        <div class="row">
            <div class="col-md-12">

                <?Php
                $year=request('year'); // change this to another year 2017 or  2018 or 2019 Or ...
                if(strlen($year)!= 4){
                    $year=date('Y'); // Current Year is taken if year is not set in above line.
                }


                $row=4;  //to set the number of rows and columns in yearly calendar ( 1 to 12 )
                ///// No Edit below //////
                $row_no=0; //
                echo "<table class='table table-striped table-bordered'>"; // Outer table
                ////// Starting of for loop///
                ///  Creating calendars for each month by looping 12 times ///
                for($m=1;$m<=12;$m++){
                    $month =date($m);  // Month
                    $dateObject = DateTime::createFromFormat('!m', $m);
                    $monthName = $dateObject->format('F'); // Month name to display at top



                    $d= 2; // To Finds today's date
//$no_of_days = date('t',mktime(0,0,0,$month,1,$year)); //This is to calculate number of days in a month
                    $no_of_days = cal_days_in_month(CAL_GREGORIAN, $month, $year);//calculate number of days in a month

                    $j= date('w',mktime(0,0,0,$month,1,$year)); // This will calculate the week day of the first day of the month
//echo $j;// Sunday=0 , Saturday =6
//// if starting day of the week is Monday then add following two lines ///
                    $j=$j-1;
                    if($j<0){$j=6;}  // if it is Sunday //
//// end of if starting day of the week is Monday ////


                    $adj=str_repeat("<td bgcolor='#ffff00'>*&nbsp;</td>",$j);  // Blank starting cells of the calendar
                    $blank_at_end=42-$j-$no_of_days; // Days left after the last day of the month
                    if($blank_at_end >= 7){$blank_at_end = $blank_at_end - 7 ;}
                    $adj2=str_repeat("<td bgcolor='#ffff00'>*&nbsp;</td>",$blank_at_end); // Blank ending cells of the calendar

/// Starting of top line showing year and month to select ///////////////
                    if(($row_no % $row)== 0){
                        echo "</tr><tr>";
                    }

                    echo "<td><table class='main' ><td colspan=7 align=center> $monthName $year


 </td></tr>";
//echo "<tr><th>Sun</th><th>Mon</th><th>Tue</th><th>Wed</th><th>Thu</th><th>Fri</th><th>Sat</th></tr><tr>";
                    echo "<tr><th>Mon</th><th>Tue</th><th>Wed</th><th>Thu</th><th>Fri</th><th>Sat</th><th>Sun</th></tr><tr>";
////// End of the top line showing name of the days of the week//////////

//////// Starting of the days//////////
                    for($i=1;$i<=$no_of_days;$i++){
                        $pv="'$month'".","."'$i'".","."'$year'";
                        echo $adj."<td><a href='#' onclick=\"post_value($pv);\">$i</a>"; // This will display the date inside the calendar cell
                        echo " </td>";
                        $adj='';
                        $j ++;
                        if($j==7){echo "</tr><tr>"; // start a new row
                            $j=0;}

                    }
                    echo $adj2;   // Blank the balance cell of calendar at the end
                    echo "</tr><tr><td colspan='7'><ul>";
                    echo "</ul></td></tr></table></td>";
                    $row_no=$row_no+1;
                } // end of for loop for 12 months
                echo "</table>";
                ?>
            </div>
        </div>
    </div>
</div>



<!-- END Page Container -->
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>


<script src="{{asset('public/js/custom.js')}}"></script>

{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>--}}

<script src="{{asset('public/server')}}/assets/js/oneui.core.min.js"></script>

<script src="{{asset('public/server')}}/assets/js/oneui.app.min.js"></script>
<script src="{{asset('public/server')}}/assets/js/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('public/server')}}/assets/js/plugins/datatables/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('public/server')}}/assets/js/plugins/datatables/buttons/dataTables.buttons.min.js"></script>
<script src="{{asset('public/server')}}/assets/js/plugins/datatables/buttons/buttons.print.min.js"></script>
<script src="{{asset('public/server')}}/assets/js/plugins/datatables/buttons/buttons.html5.min.js"></script>
<script src="{{asset('public/server')}}/assets/js/plugins/datatables/buttons/buttons.flash.min.js"></script>
<script src="{{asset('public/server')}}/assets/js/plugins/datatables/buttons/buttons.colVis.min.js"></script>

<!-- Page JS Code -->
<script src="{{asset('public/server')}}/assets/js/pages/be_tables_datatables.min.js"></script>
<script src="{{asset('public/server')}}/assets/js/custom.js"></script>
<!-- Page JS Plugins -->
<script src="{{asset('public/server')}}/assets/js/plugins/summernote/summernote-bs4.min.js"></script>
<script src="{{asset('public/server')}}/assets/js/plugins/ckeditor/ckeditor.js"></script>
<script src="{{asset('public/server')}}/assets/js/plugins/simplemde/simplemde.min.js"></script>
<!-- Page JS Plugins -->
<script src="{{asset('public/server')}}/assets/js/plugins/chart.js/Chart.bundle.min.js"></script>

<!-- Page JS Code -->
<script src="{{asset('public/server')}}/assets/js/pages/be_pages_dashboard.min.js"></script>
<script>jQuery(function(){ One.helpers(['summernote', 'ckeditor', 'simplemde']); });</script>
<script src="{{asset('public/server')}}/assets/js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
{{--<script>jQuery(function(){ One.helpers(['datepicker', 'colorpicker', 'maxlength', 'select2', 'masked-inputs', 'rangeslider']); });</script>--}}
{{--<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>--}}
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/js/tempusdominus-bootstrap-4.min.js"></script>
</body>
</html>



