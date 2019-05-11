
@extends('Admin.index')
@section('body')

    <main id="main-container">


        <!-- Page Content -->
        <div class="content content-narrow">
            <!-- Stats -->
            <div class="row">
                <div class="col-12" style="background-color: #fff; padding:10px;">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h4> Calender </h4>
                                </div>
                                <div class="col-sm-6">
                                    <form action="" method="get">
                                        <div class="row">
                                            <div class="col-sm-9 form-group">
                                                <div class="row">
                                                    <div class="col-sm-4"><label for="">Select Year</label></div>
                                                    <div class="col-sm-8">
                                                        <select name="year" id="" class="form-control">
                                                            <option value="{{date('y')}}">{{date('Y')}}</option>
                                                            <option value="2030" <?php if (date('y')=='30') echo 'selected'?>>2030</option>
                                                            <option value="2029" <?php if (date('y')=='29') echo 'selected'?>>2029</option>
                                                            <option value="2028" <?php if (date('y')=='28') echo 'selected'?>>2028</option>
                                                            <option value="2027" <?php if (date('y')=='27') echo 'selected'?>>2027</option>
                                                            <option value="2026" <?php if (date('y')=='26') echo 'selected'?>>2026</option>
                                                            <option value="2025" <?php if (date('y')=='25') echo 'selected'?>>2025</option>
                                                            <option value="2024" <?php if (date('y')=='24') echo 'selected'?>>2024</option>
                                                            <option value="2023" <?php if (date('y')=='23') echo 'selected'?>>2023</option>
                                                            <option value="2022" <?php if (date('y')=='22') echo 'selected'?>>2022</option>
                                                            <option value="2021" <?php if (date('y')=='21') echo 'selected'?>>2021</option>
                                                            <option value="2020" <?php if (date('y')=='20') echo 'selected'?>>2020</option>
                                                            <option value="2019" <?php if (date('y')=='19') echo 'selected'?>>2019</option>
                                                            <option value="2018">2018</option>
                                                            <option value="2017">2017</option>
                                                            <option value="2016">2016</option>
                                                            <option value="2015">2017</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3 form-group">
                                                <button type="submit" class="btn btn-primary">Show</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- END Stats -->
        </div>
        <!-- END Page Content -->

    </main>
    <!-- END Main Container -->

@endsection