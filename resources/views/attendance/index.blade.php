@extends('layouts.master')
@section('title')
    Attendance
@endsection
@section('content')
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm-3">
                    <h3 class="page-title">Take Attendance</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Attendance</li>
                    </ul>
                </div>
                <div class="col-sm-9">
                    <form id="take_attendance">
                        <div class="row filter-row">
                            <div class="col-sm-4">
                                <div class="form-group form-focus select-focus focused">
                                    <select name="class" class="select floating select2-hidden-accessible"
                                        data-select2-id="select2-data-4-zh2k" tabindex="-1" aria-hidden="true">
                                        <option data-select2-id="select2-data-6-cyah">Select A Class</option>
                                        @foreach ($classes as $class)
                                            <option value="{{ $class->id }}">{{ $class->class_name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="class_error text-danger"></span>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input style="height: 50px;" type="date" class="form-control" id="attendance_date"
                                        name="attendance_date">

                                </div>
                            </div>
                            <div class="col-sm-4">
                                <button type="submit" href="#" class="btn btn-success"> Take Attendance </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>



        <div class="row">
            <div class="col-md-12">
                <div>
                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer text-center">
                        <form id="insert_form">
                            <div class="row">
                                <div class="col-sm-12 " id="attendance_data_table">



                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {

            // set max date in attendance_date

            var d = new Date();
            if(d.getMonth() < 10 && d.getDate() < 10){
                var make_date = d.getFullYear() + "-0" + (d.getMonth() + 1) + "-0" + d.getDate();
                   $('#attendance_date').attr('max', make_date);
            }else if(d.getMonth() < 10){
                var make_date = d.getFullYear() + "-0" + (d.getMonth() + 1) + "-" + d.getDate();
                   $('#attendance_date').attr('max', make_date);
            }else if(d.getDate() < 10){
                var make_date = d.getFullYear() + "-" + (d.getMonth() + 1) + "-0" + d.getDate();
                   $('#attendance_date').attr('max', make_date);
            }
            else{
                var make_date = d.getFullYear() + "-" + (d.getMonth() + 1) + "-" + d.getDate();
                   $('#attendance_date').attr('max', make_date);
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // show attendance
            $('#take_attendance').submit(function(e) {
                e.preventDefault();
                let insert_data = new FormData($('#take_attendance')[0]);
                $.ajax({
                    type: 'post',
                    url: "{{ route('attendance.take') }}",
                    data: insert_data,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        $('#attendance_data_table').html(response);
                    }
                });
            });

            // set attendance date
            $(document).on('change', '#attendance_date', function() {
                var date = $(this).val();
                $('.att_date').val(date);
            });



            // attendance store
            $('#insert_form').submit(function(e) {
                e.preventDefault();
                let insert_data = new FormData($('#insert_form')[0]);
                $.ajax({
                    type: 'post',
                    url: "{{ route('attendance.store') }}",
                    data: insert_data,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        console.log(response);
                        if (response.success) {
                            toastr.success(response.success);
                            $('#attendance_data_table').load(location.href +
                                ' #attendance_data_table');
                        }
                    }
                });
            });

            // set vlaue in checkbox
            $(document).on('click', '.attendance_checkbox', function() {
                var checkbox = $(this);
                if ($(this).prop('checked') == true) {
                    $(this).siblings().val('1');
                } else {
                    $(this).siblings().val('0');
                }
            });

        });
    </script>
@endsection
