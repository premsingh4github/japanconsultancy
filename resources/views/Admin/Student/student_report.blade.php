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
                            <table class="table">

                            </table>
                        </div>
                </div>
            </div>
            <!-- END Dynamic Table with Export Buttons -->
        </div>
        <!-- END Page Content -->

    </main>
    <!-- END Main Container -->
@endsection
