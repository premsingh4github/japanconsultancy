@extends('Admin.index')
@section('body')
    <!-- Main Container -->
    <main id="main-container">

        <!-- Hero -->
        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-sm-fill h3 my-2">
                        {{__('language.Class_batch_manger')}}
                    </h1>
                    <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-alt">
                            <li class="breadcrumb-item">{{__('language.Add_Class_Batch')}}</li>
                            <li class="breadcrumb-item" aria-current="page">
                                <a class="link-fx" href="{{url('admin/list_record')}}">{{__('language.List_Class_Batch')}}</a>
                            </li>
                        </ol>
                    </nav>
                </div>
                <div class="col-sm-12 col-md-12 col-xs-12">
                    <p class="font-size-sm text-muted">
                        @if(session('success'))
                            <span class="alert alert-success"> {{session('success')}}</span>
                    @endif
                    @if($errors->any())
                        <ul  class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                        @endif
                        </p>
                </div>
            </div>
        </div>
        <!-- END Hero -->
        <!-- Page Content -->
        <div class="content">
            <!-- Partial Table -->
            <div class="block" style="padding:10px;">
                <div class="row">
                    <!--<div class="col-sm-3">-->
                    <!--    <span><h4>{{__('language.Create_Class_Room')}}</h4></span>-->
                    <!--<form action="{{url('admin/post_class_record')}}" method="post" enctype="multipart/form-data">-->
                    <!--{{csrf_field()}}-->
                    <!--        <label for="name"> {{__('language.Create_Class')}}<font color="#ff0000">*</font></label>-->
                    <!--        <input type="text" class="form-control" id="name" name="name" required="" data-validation-error-msg="news title is required">-->
                    <!--            <button type="submit" class="btn  btn-success">{{__('language.Create_Class')}}</button>-->
                    <!--    <ul>-->
                    <!--      <li> {{__('language.Allready_Listed_Class')}}</li>-->
                    <!--        @foreach($class as $classRoom)-->
                    <!--        <li>{{$classRoom->name}}</li>-->
                    <!--            @endforeach-->
                    <!--    </ul>-->
                    <!--</form>-->
                    <!--</div>-->
                        <div class="col-sm-4">
                            <span><h4>{{__('language.Create_Batch_Year')}}</h4></span>
                            <form action="{{url('admin/post_batch_record')}}" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <label for="name"> {{__('language.Create_Batch_Year')}}<font color="#ff0000">*</font></label>
                                <input type="text" class="form-control" id="name" name="name"  required="" data-validation-error-msg="news title is required">
                                <button type="submit" class="btn  btn-success">{{__('language.Create_Batch')}}</button>
                                <ul>
                                    @foreach($batch as $batchYear)
                                        <li>{{$batchYear->name}}</li>
                                    @endforeach
                                </ul>

                            </form>
                        </div>
                        <div class="col-md-5">
                            <span><h4>{{__('language.Create_Group')}}</h4></span>
                            <form action="{{url('admin/post_classbatch_record')}}" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                    
                                    <label for="batch_id"> {{__('language.Select_Batch')}}<font color="#ff0000">*</font></label>
                                <select name="batch_id" class="form-control"  id="">
                                    <option value="">[{{__('language.Select')}}]</option>
                                    @foreach($batch as $batchyear)
                                        <option value="{{$batchyear->id}}">Batch-{{$batchyear->name}}</option>
                                    @endforeach
                                </select>
                                <div style="clear: both;"></div>
                                <button type="submit" class="btn  btn-success">{{__('language.Create_Group')}}</button>
                                <ul>
                                    <li>{{__('language.Allready_Listed_Batch_Wise_Class')}}</li>
                                    @foreach($ClassRoomBatch as $ClassRoomBatches)
                                        <li>{{$ClassRoomBatches->class_room->name}}-{{$ClassRoomBatches->batch->name}}</li>
                                    @endforeach
                                </ul>

                            </form>
                        </div>
                    </div>
            </div>
            <!-- END Partial Table -->
        </div>
        <!-- END Page Content -->

    </main>
    <!-- END Main Container -->
@endsection