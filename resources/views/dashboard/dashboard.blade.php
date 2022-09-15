@extends('layouts.master')
@section('title')
    Dashboard
@endsection

@section('styles')
    <style>
        .eaBhby {
            width: 160px;
            height: 150px;
            margin: 18px 10px 5px;
            padding: 15px;
            text-align: center;
            border-radius: 8px;
            cursor: pointer;
            position: relative;
            display: inline-block;
            background-color: initial;
            border: none;
            font-size: inherit;
        }

        .rounded {
            border-radius: 0.42rem !important;
        }

        .border {
            border: 1px solid #ff9b44 !important;
        }



        .shortcuts-title {
            color: black;
            font-weight: bolder;
        }
    </style>

    <link rel="stylesheet" href="{{ asset('assets') }}/css/multi-select.css">
@endsection

@section('content')
    <div class="content container-fluid">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                <div class="card dash-widget">
                    <div class="card-body">
                        <span class="dash-widget-icon"><i class="fa fa-cubes"></i></span>
                        <div class="dash-widget-info">
                            <h3>112</h3>
                            <span>Projects</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                <div class="card dash-widget">
                    <div class="card-body">
                        <span class="dash-widget-icon"><i class="fa fa-usd"></i></span>
                        <div class="dash-widget-info">
                            <h3>44</h3>
                            <span>Clients</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                <div class="card dash-widget">
                    <div class="card-body">
                        <span class="dash-widget-icon"><i class="fa fa-diamond"></i></span>
                        <div class="dash-widget-info">
                            <h3>37</h3>
                            <span>Tasks</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                <div class="card dash-widget">
                    <div class="card-body">
                        <span class="dash-widget-icon"><i class="fa fa-user"></i></span>
                        <div class="dash-widget-info">
                            <h3>218</h3>
                            <span>Employees</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 ">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Set Up</h3>
                        <div class="row">
                            <div class="col-md-2">
                                <a href="{{ route('class.index') }}" style="position:relative;"
                                    class="sc-gPEVay eaBhby border rounded  ">
                                    <div style=""><i
                                            style="background:rgba(255, 155, 68, 0.2); color: #ff9b44;padding: 10px; border-radius: 40px;"
                                            class="fa fa-home fa-3x"></i></div>
                                    <div style="margin-top:15px " class="shortcuts-title  text-black">Classes</div>
                                </a>
                            </div>
                            <div class="col-md-2">
                                <a href="{{ route('department.index') }}" style="position:relative;"
                                    class="sc-gPEVay eaBhby border rounded  ">
                                    <div style=""><i
                                            style="background:rgba(255, 155, 68, 0.2); color: #ff9b44;padding: 10px; border-radius: 40px;"
                                            class="fa fa-cubes fa-3x"></i></div>
                                    <div style="margin-top:15px " class="shortcuts-title  text-black">Department</div>
                                </a>
                            </div>
                            <div class="col-md-2">
                                <a href="{{ route('tutionfees.index') }}" style="position:relative;"
                                    class="sc-gPEVay eaBhby border rounded  ">
                                    <div style=""><i
                                            style="background:rgba(255, 155, 68, 0.2); color: #ff9b44;padding: 10px; border-radius: 40px;"
                                            class="fa fa-money fa-3x"></i></div>
                                    <div style="margin-top:15px " class="shortcuts-title  text-black">Tution Fees</div>
                                </a>
                            </div>
                            <div class="col-md-2">
                                <a href="{{ route('exam.index') }}" style="position:relative;"
                                    class="sc-gPEVay eaBhby border rounded  ">
                                    <div style=""><i
                                            style="background:rgba(255, 155, 68, 0.2); color: #ff9b44;padding: 10px; border-radius: 40px;"
                                            class="fa fa-edit fa-3x"></i></div>
                                    <div style="margin-top:15px " class="shortcuts-title  text-black">All Exam</div>
                                </a>
                            </div>
                            <div class="col-md-2">
                                <a href="{{ route('subject.index') }}" style="position:relative;"
                                    class="sc-gPEVay eaBhby border rounded  ">
                                    <div style=""><i
                                            style="background:rgba(255, 155, 68, 0.2); color: #ff9b44;padding: 10px; border-radius: 40px;"
                                            class="fa fa-book fa-3x"></i></div>
                                    <div style="margin-top:15px " class="shortcuts-title  text-black">All Subject</div>
                                </a>
                            </div>
                            <div class="col-md-2">
                                <a href="{{ route('admission.index') }}" style="position:relative;"
                                    class="sc-gPEVay eaBhby border rounded  ">
                                    <div style=""><i
                                            style="background:rgba(255, 155, 68, 0.2); color: #ff9b44;padding: 10px; border-radius: 40px;"
                                            class="fa fa-university fa-3x"></i></div>
                                    <div style="margin-top:15px " class="shortcuts-title  text-black">Admission</div>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('assets') }}/js/jquery.multi-select.js"></script>
    <script>
        $('#my-select').multiSelect()
    </script>
@endsection
