@section('aside')
    <div id="page-container" class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed print-hide">
        <!-- Side Overlay-->
        <aside id="side-overlay" class="font-size-sm">
            <!-- Side Header -->
            <div class="content-header border-bottom">
                <!-- Staff Avatar -->
                <a class="img-link mr-1" href="javascript:void(0)">
                    <img class="img-avatar img-avatar32" src="{{asset('public/server')}}/assets/media/avatars/avatar10.jpg" alt="">
                </a>
                <!-- END Staff Avatar -->

                <!-- Staff Info -->
                <div class="ml-2">
                    <a class="link-fx text-dark font-w600" href="javascript:void(0)">{{__('language.admin')}}</a>
                </div>
                <!-- END Staff Info -->

                <!-- Close Side Overlay -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <a class="ml-auto btn btn-sm btn-dual" href="javascript:void(0)" data-toggle="layout" data-action="side_overlay_close">
                    <i class="fa fa-fw fa-times text-danger"></i>
                </a>
                <!-- END Close Side Overlay -->
            </div>
            <!-- END Side Header -->

            <!-- Side Content -->
        </aside>
        <!-- END Side Overlay -->

        <!-- Sidebar -->
        <nav id="sidebar" aria-label="Main Navigation">
            <!-- Side Header -->
            <div class="content-header bg-white-5">
                <!-- Logo -->
                <a class="font-w600 text-dual" href="{{url('')}}" title="Redirect to home page">
                    <i class="fa fa-circle-notch text-primary"></i>
                    <span class="smini-hide">
                            <span class="font-w700 font-size-h6">Chubi</span> <span class="font-w400" style="font-size:14px; color:#5c80d1;">Management</span>
                        </span>
                </a>
                <!-- END Logo -->

                <!-- Options -->
                <div>
                    <!-- Color Variations -->
                    <div class="dropdown d-inline-block ml-3">
                        <a class="text-dual font-size-sm" id="sidebar-themes-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">
                            <i class="si si-drop"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right font-size-sm smini-hide border-0" aria-labelledby="sidebar-themes-dropdown">
                            <!-- Color Themes -->
                            <!-- Layout API, functionality initialized in Template._uiHandleTheme() -->
                            <a class="dropdown-item d-flex align-items-center justify-content-between" data-toggle="theme" data-theme="default" href="#">
                                <span>Default</span>
                                <i class="fa fa-circle text-default"></i>
                            </a>
                            <a class="dropdown-item d-flex align-items-center justify-content-between" data-toggle="theme" data-theme="{{asset('public/server')}}/assets/css/themes/amethyst.min.css" href="#">
                                <span>Amethyst</span>
                                <i class="fa fa-circle text-amethyst"></i>
                            </a>
                            <a class="dropdown-item d-flex align-items-center justify-content-between" data-toggle="theme" data-theme="{{asset('public/server')}}/assets/css/themes/city.min.css" href="#">
                                <span>City</span>
                                <i class="fa fa-circle text-city"></i>
                            </a>
                            <a class="dropdown-item d-flex align-items-center justify-content-between" data-toggle="theme" data-theme="{{asset('public/server')}}/assets/css/themes/flat.min.css" href="#">
                                <span>Flat</span>
                                <i class="fa fa-circle text-flat"></i>
                            </a>
                            <a class="dropdown-item d-flex align-items-center justify-content-between" data-toggle="theme" data-theme="assets/css/themes/modern.min.css" href="#">
                                <span>Modern</span>
                                <i class="fa fa-circle text-modern"></i>
                            </a>
                            <a class="dropdown-item d-flex align-items-center justify-content-between" data-toggle="theme" data-theme="{{asset('public/server')}}/assets/css/themes/smooth.min.css" href="#">
                                <span>Smooth</span>
                                <i class="fa fa-circle text-smooth"></i>
                            </a>
                            <!-- END Color Themes -->

                            <div class="dropdown-divider"></div>

                            <!-- Sidebar Styles -->
                            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                            <a class="dropdown-item" data-toggle="layout" data-action="sidebar_style_light" href="#">
                                <span>Sidebar Light</span>
                            </a>
                            <a class="dropdown-item" data-toggle="layout" data-action="sidebar_style_dark" href="#">
                                <span>Sidebar Dark</span>
                            </a>
                            <!-- Sidebar Styles -->

                            <div class="dropdown-divider"></div>

                            <!-- Header Styles -->
                            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                            <a class="dropdown-item" data-toggle="layout" data-action="header_style_light" href="#">
                                <span>Header Light</span>
                            </a>
                            <a class="dropdown-item" data-toggle="layout" data-action="header_style_dark" href="#">
                                <span>Header Dark</span>
                            </a>
                            <!-- Header Styles -->
                        </div>
                    </div>
                    <!-- END Themes -->

                    <!-- Close Sidebar, Visible only on mobile screens -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                    <a class="d-lg-none text-dual ml-3" data-toggle="layout" data-action="sidebar_close" href="javascript:void(0)">
                        <i class="fa fa-times"></i>
                    </a>
                    <!-- END Close Sidebar -->
                </div>
                <!-- END Options -->
            </div>
            <!-- END Side Header -->

            <!-- Side Navigation -->
            <div class="content-side content-side-full">
                <ul class="nav-main">
                    <li class="nav-main-item">
                        <a class="nav-main-link <?php if(request()->segment('2') ==''){ echo 'active' ;} ?>" href="{{url('login')}}">
                            <i class="nav-main-link-icon si si-speedometer"></i>
                            <span class="nav-main-link-name">{{__('language.Admin_Panel')}} </span>
                        </a>
                    </li>
                    <!---------
                    <li class="nav-main-heading ">{{__('language.User_Manager')}}</li>
                    <li class="nav-main-item">
                        <a class="nav-main-link nav-main-link-submenu <?php if(request()->segment('2') =='superAdmin' || request()->segment('2') =='generalAdmin' || request()->segment('2') =='moderator'){ echo 'active' ;} ?>" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                            <i class="nav-main-link-icon si si-user"></i>
                            <span class="nav-main-link-name">{{__('language.User_controller')}}</span>
                        </a>
                    </li>
                    ----------->
                    <li class="nav-main-heading ">Getting Start </li>
                    <li class="nav-main-item <?php if(request()->segment('2') =='list_record' || request()->segment('2') =='add_record'){ echo 'open' ;} ?>">
                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                            <i class="nav-main-link-icon fa fa-layer-group"></i>
                            <span class="nav-main-link-name">{{__('language.Class_Batch')}}</span>
                        </a>
                        <ul class="nav-main-submenu">
                            <li class="nav-main-item">
                                <a class="nav-main-link <?php if(request()->segment('2') =='list_record'){ echo 'active' ;} ?>" href="{{url('admin/list_record')}}">
                                    <span class="nav-main-link-name">{{__('language.List_Class_Batch')}}</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link <?php if(request()->segment('2') =='add_record'){ echo 'active' ;} ?>" href="{{url('admin/add_record')}}">
                                    <span class="nav-main-link-name">{{__('language.Add_Record')}}</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-main-item <?php if(request()->segment('2') =='list_section' || request()->segment('2') =='section_period' || request()->segment('2') =='add_section' || request()->segment('2') =='add_section' || request()->segment('2') =='class_section'){ echo 'open' ;} ?>">
                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                            <i class="nav-main-link-icon fa fa-object-group"></i>
                            <span class="nav-main-link-name">{{__('language.Section')}}</span>
                        </a>
                        <ul class="nav-main-submenu">
                            <li class="nav-main-item">
                                <a class="nav-main-link <?php if(request()->segment('2') =='list_section'){ echo 'active' ;} ?>" href="{{url('admin/list_section')}}">
                                    <span class="nav-main-link-name">{{__('language.List_Exist_Section')}}</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link <?php if(request()->segment('2') =='add_section'){ echo 'active' ;} ?>" href="{{url('admin/add_section')}}">
                                    <span class="nav-main-link-name">{{__('language.Add_New_Section')}}</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link <?php if(request()->segment('2') =='class_section'){ echo 'active' ;} ?>" href="{{url('admin/class_section')}}">
                                    <span class="nav-main-link-name">{{__('language.Class_Wise_Section')}}</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link <?php if(request()->segment('2') =='section_period'){ echo 'active' ;} ?>" href="{{url('admin/section_period')}}">
                                    <span class="nav-main-link-name">{{__('language.Section_Wise_Period')}}</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-main-item <?php if(request()->segment('2') =='add_grade_duration'){ echo 'open' ;} ?>">
                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                            <i class="nav-main-link-icon si si-user"></i>
                            <span class="nav-main-link-name">{{__('language.Grade-Manage')}}</span>
                        </a>
                        <ul class="nav-main-submenu">
                            <li class="nav-main-item">
                                <a class="nav-main-link <?php if(request()->segment('2') =='add_grade_duration'){ echo 'active' ;} ?>" href="{{url('admin/add_grade_duration')}}">
                                    <span class="nav-main-link-name">{{__('language.Grade-Duration-Manage')}}</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-main-item <?php if(request()->segment('2') =='list-residensal' || request()->segment('2') =='add-residensal'){ echo 'open' ;} ?>">
                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                            <i class="nav-main-link-icon far fa-calendar-alt"></i>
                            <span class="nav-main-link-name">{{__('language.Residensal_Card_Time')}}</span>
                        </a>
                        <ul class="nav-main-submenu">
                            <li class="nav-main-item">
                                <a class="nav-main-link <?php if(request()->segment('2') =='add-residensal'){ echo 'active' ;} ?>" href="{{url('admin/add-residensal')}}">
                                    <span class="nav-main-link-name">{{__('language.Residensal_card_Time_Period')}}</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-main-heading ">{{__('language.STUDENT_MANAGER')}}</li>
                    <li class="nav-main-item <?php if(request()->segment('2') =='add_student' || request()->segment('2') =='mark_obtained' || request()->segment('2') =='list_student' || request()->segment('2') =='section_wise_student_edit' || request()->segment('2') =='section_wise_student' ||request()->segment('2') =='add_grade_wise' || request()->segment('2') =='view_grade_wise'){ echo 'open' ;} ?>">
                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                            <i class="nav-main-link-icon si si-user"></i>
                            <span class="nav-main-link-name">{{__('language.Students')}}</span>
                        </a>
                        <ul class="nav-main-submenu">
                            <li class="nav-main-item">
                                <a class="nav-main-link <?php if(request()->segment('2') =='add_student'){ echo 'active' ;} ?>" href="{{url('admin/add_student')}}">
                                    <span class="nav-main-link-name">{{__('language.Add_New_Students')}}</span>
                                </a>
                            </li>

                            <li class="nav-main-item">
                                <a class="nav-main-link <?php if(request()->segment('2') =='list_student'){ echo 'active' ;} ?>" href="{{url('admin/list_student')}}">
                                    <span class="nav-main-link-name">{{__('language.List_All_Students')}}</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link <?php if(request()->segment('2') =='mark_obtained'){ echo 'active' ;} ?>" href="{{url('admin/mark_obtained')}}">
                                    <span class="nav-main-link-name">{{__('language.mark_obtained')}}</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link <?php if(request()->segment('2') =='section_wise_student'){ echo 'active' ;} ?>" href="{{url('admin/section_wise_student')}}">
                                    <span class="nav-main-link-name">{{__('language.Section_Wise_Students1')}}</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link <?php if(request()->segment('2') =='section_wise_student_edit'){ echo 'active' ;} ?>" href="{{url('admin/section_wise_student_edit')}}">
                                    <span class="nav-main-link-name">{{__('language.Section_Wise_Students2')}}</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link <?php if(request()->segment('2') =='add_grade_wise'){ echo 'active' ;} ?>" href="{{url('admin/add_grade_wise')}}">
                                    <span class="nav-main-link-name">{{__('language.Student_Grade_Manage')}}</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link <?php if(request()->segment('2') =='view_grade_wise'){ echo 'active' ;} ?>" href="{{url('admin/view_grade_wise')}}">
                                    <span class="nav-main-link-name">{{__('language.View_Grade_Manage')}}</span>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="nav-main-heading ">Subject Manage</li>
                    <li class="nav-main-item <?php if(request()->segment('2') =='list_subject' || request()->segment('2') =='add_subject' || request()->segment('2') =='batch_wise_subject'){ echo 'open' ;} ?>">
                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                            <i class="nav-main-link-icon fa fa-book-open"></i>
                            <span class="nav-main-link-name">{{__('language.Subjects')}}</span>
                        </a>
                        <ul class="nav-main-submenu">
                            <li class="nav-main-item">
                                <a class="nav-main-link <?php if(request()->segment('2') =='list_subject'){ echo 'active' ;} ?>" href="{{url('admin/list_subject')}}">
                                    <span class="nav-main-link-name">{{__('language.List_Exist_Subject')}}</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link <?php if(request()->segment('2') =='add_subject'){ echo 'active' ;} ?>" href="{{url('admin/add_subject')}}">
                                    <span class="nav-main-link-name">{{__('language.Add_New_Subject')}}</span>
                                </a>
                            </li>
                            <!-----------
                            <li class="nav-main-item">
                                <a class="nav-main-link <?php if(request()->segment('2') =='batch_wise_subject'){ echo 'active' ;} ?>" href="{{url('admin/batch_wise_subject')}}">
                                    <span class="nav-main-link-name">{{__('language.Batch_Wise_Subject')}}</span>
                                </a>
                            </li>
                            ---------------->
                        </ul>
                    </li>


                    <li class="nav-main-heading ">{{__('language.TEACHER_MANAGER')}}</li>
                    <li class="nav-main-item <?php if(request()->segment('2') =='list_teacher' || request()->segment('2') =='add_teacher'){ echo 'open' ;} ?>">
                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu"  href="#">
                            <i class="nav-main-link-icon si si-user"></i>
                            <span class="nav-main-link-name">{{__('language.Teachers')}}</span>
                        </a>
                        <ul class="nav-main-submenu">
                            <li class="nav-main-item">
                                <a class="nav-main-link <?php if(request()->segment('2') =='list_teacher'){ echo 'active' ;} ?>" href="{{url('admin/list_teacher')}}">
                                    <span class="nav-main-link-name">{{__('language.List_of_Teacher')}}</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link <?php if(request()->segment('2') =='add_teacher'){ echo 'active' ;} ?>" href="{{url('admin/add_teacher')}}">
                                    <span class="nav-main-link-name">{{__('language.Add_New_Teacher')}}</span>
                                </a>
                            </li>
                        </ul>
                    </li>


                    <li class="nav-main-heading ">{{__('language.Days_Holiday_Manager')}}</li>
                    <li class="nav-main-item <?php if(request()->segment('2') =='holiday' || request()->segment('2') =='new_holiday'){ echo 'open' ;} ?>">
                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                            <i class="nav-main-link-icon fa fa-birthday-cake"></i>
                            <span class="nav-main-link-name">{{__('language.Holiday')}}</span>
                        </a>
                        <ul class="nav-main-submenu">
                            <li class="nav-main-item">
                                <a class="nav-main-link <?php if(request()->segment('2') =='holiday'){ echo 'active' ;} ?>" href="{{url('admin/holiday')}}">
                                    <span class="nav-main-link-name">{{__('language.List_Exist_Holiday')}}</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link <?php if(request()->segment('2') =='new_holiday'){ echo 'active' ;} ?>" href="{{url('admin/new_holiday')}}">
                                    <span class="nav-main-link-name">{{__('language.Add_New_Holiday')}}</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-----------
                    <li class="nav-main-item <?php if(request()->segment('2') =='holiday' || request()->segment('2') =='new_holiday'){ echo 'open' ;} ?>">
                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                            <i class="nav-main-link-icon si si-calendar"></i>
                            <span class="nav-main-link-name">{{__('language.Section_Wise_Days')}}</span>
                        </a>
                        <ul class="nav-main-submenu">
                            <li class="nav-main-item">
                                <a class="nav-main-link <?php if(request()->segment('2') =='section_day'){ echo 'active' ;} ?>" href="{{url('admin/section_day')}}">
                                    <span class="nav-main-link-name">{{__('language.Class_Section_Days')}}</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    -->
                    <li class="nav-main-heading ">{{__('language.Attendance')}}</li>
                    <li class="nav-main-item">
                        <a class="nav-main-link <?php if(request()->segment('1') =='attendance_list'){ echo 'active' ;} ?>" href="{{url('attendance_list')}}">
                            <i class="nav-main-link-icon fa fa-th-list"></i>
                            <span class="nav-main-link-name">{{__('language.List_Attendance')}}</span>
                        </a>
                        {{--<a class="nav-main-link" href="{{url('attendance')}}" >--}}
                            {{--<i class="nav-main-link-icon si si-reload"></i>--}}
                            {{--<span class="nav-main-link-name">{{__('language.QR_Scanner')}}</span>--}}
                        {{--</a>--}}
                         <a class="nav-main-link <?php if(request()->segment('1') =='attendance_form'){ echo 'active' ;} ?>" href="{{url('attendance_form')}}" >
                            <i class="nav-main-link-icon si si-reload"></i>
                            <span class="nav-main-link-name">{{__('language.attend-form')}}</span>
                        </a>
                        <a class="nav-main-link <?php if(request()->segment('2') =='manage_attendance'){ echo 'active' ;} ?>" href="{{url('admin/manage_attendance')}}" >
                            <i class="nav-main-link-icon si si-reload"></i>
                            <span class="nav-main-link-name">{{__('language.attend-by-admin')}}</span>
                        </a>
                    </li>
                    <li class="nav-main-heading ">{{__('language.main_reports')}}</li>
                    <li class="nav-main-item <?php if(request()->segment('2') =='second_immigration' || request()->segment('2') =='first_immigration'){ echo 'open' ;} ?>">
                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                            <i class="nav-main-link-icon si si-user"></i>
                            <span class="nav-main-link-name">{{__('language.Student_immigration')}}</span>
                        </a>
                        <ul class="nav-main-submenu">
                            <li class="nav-main-item">
                                <a class="nav-main-link <?php if(request()->segment('2') =='first_immigration'){ echo 'active' ;} ?>" href="{{url('admin/first_immigration')}}">
                                    <span class="nav-main-link-name">{{__('language.Students_1st_Immigration')}}</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link <?php if(request()->segment('2') =='second_immigration'){ echo 'active' ;} ?>" href="{{url('admin/second_immigration')}}">
                                    <span class="nav-main-link-name">{{__('language.Students_2nd_Immigration')}}</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-main-item <?php if(request()->segment('2') =='attendance_report' || request()->segment('2') =='report_batch_wise'){ echo 'open' ;} ?>">
                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                            <i class="nav-main-link-icon fa fa-list"></i>
                            <span class="nav-main-link-name">{{__('language.report_attendance')}}</span>
                        </a>
                        <ul class="nav-main-submenu">
                            <li class="nav-main-item">
                                <a class="nav-main-link <?php if(request()->segment('2') =='attendance_report'){ echo 'active' ;} ?>" href="{{url('admin/attendance_report')}}">
                                    <span class="nav-main-link-name">{{__('language.report_attendance')}}</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link <?php if(request()->segment('2') =='report_batch_wise'){ echo 'active' ;} ?>" href="{{url('days')}}">
                                    <span class="nav-main-link-name">{{__('language.batch_wise_report')}}</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-main-item <?php if(request()->segment('2') =='view_calendar' || request()->segment('2') =='calendar_list'){ echo 'open' ;} ?>">
                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                            <i class="nav-main-link-icon fa fa-calendar"></i>
                            <span class="nav-main-link-name">{{__('language.calendar')}}</span>
                        </a>
                        <ul class="nav-main-submenu">
                            <li class="nav-main-item">
                                <a class="nav-main-link <?php if(request()->segment('2') =='view_calendar'){ echo 'active' ;} ?>" href="{{url('admin/view_calendar')}}">
                                    <span class="nav-main-link-name">{{__('language.view-calendar')}}</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>
            <!-- END Side Navigation -->
        </nav>
        <!-- END Sidebar -->

        <!-- Header -->
        <header id="page-header">
            <!-- Header Content -->
            <div class="content-header">
                <!-- Left Section -->
                <div class="d-flex align-items-center">
                    <!-- Toggle Sidebar -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
                    <button type="button" class="btn btn-sm btn-dual mr-2 d-lg-none" data-toggle="layout" data-action="sidebar_toggle">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>
                    <!-- END Toggle Sidebar -->

                    <!-- Toggle Mini Sidebar -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
                    <button type="button" class="btn btn-sm btn-dual mr-2 d-none d-lg-inline-block" data-toggle="layout" data-action="sidebar_mini_toggle">
                        <i class="fa fa-fw fa-ellipsis-v"></i>
                    </button>
                    <!-- END Toggle Mini Sidebar -->

                    <!-- Apps Modal -->
                    <!-- Opens the Apps modal found at the bottom of the page, after footer’s markup -->
                    {{--<button type="button" class="btn btn-sm btn-dual mr-2" data-toggle="modal" data-target="#one-modal-apps">--}}
                        {{--<i class="si si-grid"></i>--}}
                    {{--</button>--}}
                    <!-- END Apps Modal -->

                    <!-- Open Search Section (visible on smaller screens) -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                    <button type="button" class="btn btn-sm btn-dual d-sm-none" data-toggle="layout" data-action="header_search_on">
                        <i class="si si-magnifier"></i>
                    </button>
                    <!-- END Open Search Section -->

                    <!-- Search Form (visible on larger screens) -->
                    <form class="d-none d-sm-inline-block" action="be_pages_generic_search.html" method="POST">
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control form-control-alt" placeholder="Search.." id="page-header-search-input2" name="page-header-search-input2">
                            <div class="input-group-append">
                                    <span class="input-group-text bg-body border-0">
                                        <i class="si si-magnifier"></i>
                                    </span>
                            </div>
                        </div>
                    </form>
                    <!-- END Search Form -->
                </div>
                <!-- END Left Section -->

                <!-- Right Section -->
                <div class="d-flex align-items-center">
                    {{--language--}}
                    {{--<div class="input-group-prepend">--}}
                        {{--<button type="button" class="btn btn-primary btn-sm">Language</button>--}}
                        {{--<button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                            {{--<span class="sr-only">Language Dropdown</span>--}}
                        {{--</button>--}}
                        {{--<div class="dropdown-menu">--}}
                            {{--<a class="dropdown-item" href="{{url('admin/lang/en')}}">--}}
                                {{--<i class="fa fa-download"></i> English--}}
                            {{--</a>--}}
                            {{--<a class="dropdown-item" href="{{url('admin/lang/jv')}}">--}}
                                {{--<i class="fa fa-download"></i> Japanese--}}
                            {{--</a>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    <div class="dropdown d-inline-block ml-2">
                        <a href="{{url('attendance_form')}}" class="btn btn-sm btn-dual">{{__('language.attend-form')}}</a>
                    </div>
                    <div class="dropdown d-inline-block ml-2">
                        <a href="{{url('admin/manage_attendance')}}" class="btn btn-sm btn-dual">{{__('language.attend-by-admin')}}</a>
                    </div>
                    <div class="dropdown d-inline-block ml-2">
                        <button type="button" class="btn btn-sm btn-dual" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-language" style="width: 20px; color:blue;"></i>
                            <span class="d-none d-sm-inline-block ml-1">{{__('language.Language')}}</span>
                            <i class="fa fa-fw fa-angle-down d-none d-sm-inline-block"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-left p-0 border-0 font-size-sm" aria-labelledby="page-header-user-dropdown">
                            <div class="p-2">
                                <a class="dropdown-item d-flex align-items-center justify-content-between" href="{{url('admin/lang/jv')}}">
                                    <span>{{__('language.Japanese')}}</span>
                                </a>
                                <a class="dropdown-item d-flex align-items-center justify-content-between" href="{{url('admin/lang/en')}}">
                                    <span>{{__('language.English')}}</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    {{--language--}}
                    <!-- Staff Dropdown -->
                    <div class="dropdown d-inline-block ml-2">
                        <button type="button" class="btn btn-sm btn-dual" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="rounded" src="{{asset('public/server')}}/assets/media/avatars/avatar10.jpg" alt="Header Avatar" style="width: 18px;">
                            <span class="d-none d-sm-inline-block ml-1">{{ Auth::user()->name }}</span>
                            <i class="fa fa-fw fa-angle-down d-none d-sm-inline-block"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right p-0 border-0 font-size-sm" aria-labelledby="page-header-user-dropdown">
                            <div class="p-3 text-center bg-primary">
                                <img class="img-avatar img-avatar48 img-avatar-thumb" src="assets/media/avatars/avatar10.jpg" alt="">
                            </div>
                            <div class="p-2">
                                {{--<h5 class="dropdown-header text-uppercase">User Options</h5>--}}
                                {{--<a class="dropdown-item d-flex align-items-center justify-content-between" href="">--}}
                                    {{--<span>Inbox</span>--}}
                                    {{--<span>--}}
                                            {{--<span class="badge badge-pill badge-primary"></span>--}}
                                            {{--<i class="si si-envelope-open ml-1"></i>--}}
                                        {{--</span>--}}
                                {{--</a>--}}
                                {{--<a class="dropdown-item d-flex align-items-center justify-content-between" href="be_pages_generic_profile.html">--}}
                                    {{--<span>Profile</span>--}}
                                    {{--<span>--}}
                                            {{--<span class="badge badge-pill badge-success">1</span>--}}
                                            {{--<i class="si si-user ml-1"></i>--}}
                                        {{--</span>--}}
                                {{--</a>--}}
                                {{--<a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">--}}
                                    {{--<span>Settings</span>--}}
                                    {{--<i class="si si-settings"></i>--}}
                                {{--</a>--}}
                                {{--<div role="separator" class="dropdown-divider"></div>--}}
                                {{--<h5 class="dropdown-header text-uppercase">Actions</h5>--}}
                                {{--<a class="dropdown-item d-flex align-items-center justify-content-between" href="op_auth_lock.html">--}}
                                    {{--<span>Lock Account</span>--}}
                                    {{--<i class="si si-lock ml-1"></i>--}}
                                {{--</a>--}}
                                <a class="dropdown-item d-flex align-items-center justify-content-between" href="{{url('logout')}}">
                                    <span>{{__('language.Logout')}}</span>
                                    <i class="si si-logout ml-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- END Staff Dropdown -->

                    <!-- Notifications Dropdown -->
                    <div class="dropdown d-inline-block ml-2">
                        <button type="button" class="btn btn-sm btn-dual" id="page-header-notifications-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="si si-bell"></i>
                            <span class="badge badge-primary badge-pill"></span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0 border-0 font-size-sm" aria-labelledby="page-header-notifications-dropdown">
                            <div class="p-2 bg-primary text-center">
                                <h5 class="dropdown-header text-uppercase text-white">{{__('language.Notifications')}}</h5>
                            </div>
                            {{--<ul class="nav-items mb-0">--}}
                                        {{--<li>--}}
                                            {{--<a class="text-dark media py-2" href="">--}}
                                                {{--<div class="mr-2 ml-3">--}}
                                                    {{--<i class="fa fa-fw fa-check-circle text-success"></i>--}}
                                                {{--</div>--}}
                                                {{--<div class="media-body pr-2">--}}
                                                    {{--<div class="font-w600">someone Claimed Listing</div>--}}
                                                    {{--<small class="text-muted"></small>--}}
                                                {{--</div>--}}
                                            {{--</a>--}}
                                        {{--</li>--}}
                            {{--</ul>--}}
                            <div class="p-2 border-top">
                                <a class="btn btn-sm btn-light btn-block text-center" href="javascript:void(0)">
                                    <i class="fa fa-fw fa-arrow-down mr-1"></i> {{__('language.Load_More')}}..
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- END Notifications Dropdown -->

                    <!-- Toggle Side Overlay -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                    <button type="button" class="btn btn-sm btn-dual ml-2" data-toggle="layout" data-action="side_overlay_toggle">
                        <i class="fa fa-fw fa-list-ul fa-flip-horizontal"></i>
                    </button>
                    <!-- END Toggle Side Overlay -->
                </div>
                <!-- END Right Section -->
            </div>
            <!-- END Header Content -->

            <!-- Header Search -->
            <div id="page-header-search" class="overlay-header bg-white">
                <div class="content-header">
                    <form class="w-100" action="be_pages_generic_search.html" method="POST">
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                                <button type="button" class="btn btn-danger" data-toggle="layout" data-action="header_search_off">
                                    <i class="fa fa-fw fa-times-circle"></i>
                                </button>
                            </div>
                            <input type="text" class="form-control" placeholder="Search or hit ESC.." id="page-header-search-input" name="page-header-search-input">
                        </div>
                    </form>
                </div>
            </div>
            <!-- END Header Search -->

            <!-- Header Loader -->
            <!-- Please check out the Loaders page under Components category to see examples of showing/hiding it -->
            <div id="page-header-loader" class="overlay-header bg-white">
                <div class="content-header">
                    <div class="w-100 text-center">
                        <i class="fa fa-fw fa-circle-notch fa-spin"></i>
                    </div>
                </div>
            </div>
            <!-- END Header Loader -->
        </header>
        <!-- END Header -->
@stop