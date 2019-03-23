@extends('Admin.index')
@section('body')
    <!-- Main Container -->
    <main id="main-container">
        <!-- Page Content -->
        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-sm-fill h3 my-2">
                        {{$teacher->last_teacher_japanese_name}} {{$teacher->first_teacher_japanese_name}} <small class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted">Profile</small>
                    </h1>
                    <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-alt">
                            <li class="breadcrumb-item">{{__('language.Teacher_Profile')}}</li>
                            <li class="breadcrumb-item" aria-current="page">
                                <a class="link-fx" href="{{url('admin/list_teacher')}}">{{__('language.List_of_Teacher')}}</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="content">
            <!-- Your Block -->
            <div class="block">
                <div class="block-content">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="teacher_profile">
                                @if(isset($teacher->photo))
                                    <img id="blah" src="{{url('public/photos/teacher').'/'.$teacher->photo}}" class="img-fluid" alt="Student Photo">
                                @else
                                    <img id="blah" src="{{asset('public/images')}}/logo/default-image.jpg"  class="img-fluid" alt="Student ID image" />
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="teacher_details">
                                <h3 class="block-title"><b>Name(in English):</b> {{$teacher->last_teacher_name}} {{$teacher->first_teacher_name}}</h3>
                                <h3 class="block-title"><b>Name(in Japanese):</b> {{$teacher->last_teacher_japanese_name}} {{$teacher->first_teacher_japanese_name}}</h3>
                                {{--<h3 class="block-title"><b>{{__('language.Address')}}:</b> {{$teacher->address}}</h3>--}}
                                <h3 class="block-title"><b>{{__('language.Gender')}}:</b> {{$teacher->teacher_sex}}</h3>
                                {{--<h3 class="block-title"><b>{{__('language.Country')}}:</b> </h3>--}}
                                <h3 class="block-title"><b>{{__('language.Subject_Teacher')}}:</b> </h3><br>
                                <ul>
                                    @foreach($subject as $sub)
                                        <li>{{$sub->subject->name}}</li>
                                        @endforeach
                                </ul>
                                {{--<h3 class="block-title"><b>{{__('language.Date_of_Birth')}}: </b> {{$teacher->date_of_birth}}</h3>--}}
                                {{--<h3 class="block-title"><b>{{__('language.Phone_Number')}}:. </b> {{$teacher->personal_phone_number1}},{{$teacher->personal_phone_number2}},{{$teacher->personal_phone_number3}}</h3>--}}
                                {{--<h3 class="block-title"><b>{{__('language.About_Teacher')}}: </b> {{$teacher->teacher_note}}</h3>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Your Block -->
        </div>
        <!-- END Page Content -->

    </main>
    <!-- END Main Container -->
@endsection
