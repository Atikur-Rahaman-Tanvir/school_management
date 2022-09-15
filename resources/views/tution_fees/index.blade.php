@extends('layouts.master')
@section('title')
    Tution Fees
@endsection
@section('content')
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Tution Fees Settings</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Tution Fees Settings</li>
                    </ul>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-12">
                <div>
                    <table id="data_table" class="table table-striped custom-table mb-0 datatable text-center ">
                        <thead>
                            <tr>
                                <th style="width: 30px;">#</th>
                                <th>Class Name</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($classes as $class)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $class->class_name }}</td>
                                    @if ($class->departments->count() == 0)

                                    <td class="text-center">
                                        <a id="{{ $class->id }}" class="btn btn-danger settings_tution_fees"
                                            href="#" data-toggle="modal"
                                            data-target="#tution_fees_{{ $class->id }}"><i class="fa fa-cog m-r-5"></i>
                                            Tution Fees Setting</a>

                                            <a id="{{ $class->id }}" class="btn btn-success tution_fees_details_show"
                                                href="#" ><i
                                                class="fa fa-eye m-r-5"></i>
                                                Show Tution Fees </a>
                                        </td>
                                        @else
                                        <td class="text-center">
                                         @foreach ($class->departments as $department )

                                          <a id="{{ $class->id }}" class="btn btn-danger settings_tution_fees m-2"
                                            href="" data-toggle="modal"
                                            data-target="#tution_fees_{{ $class->id }}_{{$department->id}}"><i class="fa fa-cog m-r-5"></i>
                                          {{$department->department_name}}  Tution Fees Setting</a>

                                            <a id="{{ $class->id }}" class="{{$department->id}} btn btn-success department_tution_fees_details_show m-2"
                                                href="#" ><i
                                                class="fa fa-eye m-r-5"></i>
                                              {{$department->department_name}}  Show Tution Fees </a> <br>
                                        @endforeach
                                        </td>
                                    @endif
                                    <td>
                                        {{-- @foreach ($class->departments as $department )

                                        <button style="display: block">{{$department->department_name}}</button>
                                        @endforeach --}}
                                        {{$class->departments->count()}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- settings tution fees --}}
        {{-- @foreach ($classes as $class)
            <div id="tution_fees_{{ $class->id }}" class="modal custom-modal fade" style="display: none;"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Set {{ $class->class_name }} Tutions Fees</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body ">
                            <form class="tution_fees_form">
                                <div id="item_row" class="item_row model_body_{{ $class->id }}">
                                    <button id="{{ $class->id }}" class="mb-2 btn btn-success add">Add Fees</button>

                                    @foreach ($tutions->where('ClassModel_id', $class->id) as $tution)
                                        <div class="row">
                                            <input name="class_id[]" type="hidden" value="{{ $class->id }}">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <input class="form-control" type="text" placeholder="Enter Fees Name"
                                                        name="fees_name[]" value="{{ $tution->fees_name }}" disabled>
                                                </div>
                                            </div>
                                            <div class="col-sm-5">
                                                <div class="form-group">
                                                    <input class="form-control" type="number" name="amount[]"
                                                        placeholder="Enter Amount" value="{{ $tution->amount }}" disabled>
                                                </div>
                                            </div>
                                            <div class="col-sm-1">
                                                <div class="form-group">
                                                    <button id="{{ $tution->id }}" class="btn btn-danger remove"><i
                                                            class="fa fa-minus"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="submit-section mb-3">
                                    <button class="btn btn-primary submit-btn submit_btn">Submit</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        @endforeach --}}
        {{-- show tution fees --}}
        {{-- @foreach ($classes as $class)
            <div id="show_tution_fees_{{ $class->id }}" class="modal custom-modal fade" style="display: none;"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="col-auto float-end ms-auto">
                                <div class="btn-group btn-group-sm">

                                    <button id="{{$class->id}}" class="btn btn-white print_btn" ><i class="fa fa-print fa-lg"></i> Print</button>
                                </div>
                            </div>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body ">
                            <div class="card-body tution_fees_details_{{$class->id}} ">
                                <div class="text-center"><img src="{{ asset('assets') }}/img/logo.png" width="60"
                                        height="60" alt=""></div>
                                <div class="text-center p-3">
                                    <h4 style="text-transform: uppercase"> {{ $class->class_name }} Tution Fees Details
                                    </h4>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Fees Name</th>
                                                <th>Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($tutions->where('ClassModel_id', $class->id) as $tution)
                                                <tr>
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td>{{ $tution->fees_name }}</td>
                                                    <td>${{ $tution->amount }}</td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td></td>
                                                <td style="font-weight: bold">Total</td>
                                                <td style="font-weight: bold">${{ $tutions->where('ClassModel_id', $class->id)->sum('amount') }}</td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                                <div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        @endforeach --}}

        {{-- <div class="row">
            <div class="col-md-12">
                <div>
                    <table id="data_table" class="table table-striped custom-table mb-0 datatable text-center ">
                        <thead>
                            <tr>
                                <th style="width: 30px;">#</th>
                                <th>Class Name</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($classes as $class)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $class->class_name }}</td>
                                    @if ($class->departments)
                                    <td>
                                       {{$departments}}
                                    </td>
                                    @else
                                        <td>no department</td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div> --}}

        {{-- settings tution fees --}}
        @foreach ($classes as $class)
                @if ($class->departments->count() == 0)
                <div id="tution_fees_{{ $class->id }}" class="modal custom-modal fade" style="display: none;"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Set {{ $class->class_name }} Tutions Fees</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body ">
                                <form class="tution_fees_form">
                                    <div id="item_row" class="item_row model_body_{{ $class->id }}">
                                        <button id="{{ $class->id }}" class="mb-2 btn btn-success add">Add Fees</button>

                                        @foreach ($tutions->where('ClassModel_id', $class->id) as $tution)
                                            <div class="row">
                                                <input name="class_id[]" type="hidden" value="{{ $class->id }}">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <input class="form-control" type="text" placeholder="Enter Fees Name"
                                                            name="fees_name[]" value="{{ $tution->fees_name }}" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-sm-5">
                                                    <div class="form-group">
                                                        <input class="form-control" type="number" name="amount[]"
                                                            placeholder="Enter Amount" value="{{ $tution->amount }}" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-sm-1">
                                                    <div class="form-group">
                                                        <button id="{{ $tution->id }}" class="btn btn-danger remove"><i
                                                                class="fa fa-minus"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                    <div class="submit-section mb-3">
                                        <button class="btn btn-primary submit-btn submit_btn">Submit</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                @else
                {{-- dipartmetn tution feesh  --}}
                 @foreach ($class->departments as $department )
                 <div id="tution_fees_{{ $class->id }}_{{$department->id}}" class="modal custom-modal fade" style="display: none;"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Set {{ $class->class_name }} Tutions Fees</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body ">
                                <form class="department_tution_fees_form">
                                    <div id="item_row" class="item_row tution_fees_row_{{ $class->id }}_{{$department->id}}">
                                        <button id="{{ $class->id }}" class="{{$department->id}} mb-2 btn btn-success add_department_tution">Add Fees</button>
                                        @foreach ($tutions->where('ClassModel_id', $class->id)->where('department_id', $department->id) as $tution)
                                            <div class="row">
                                                <input name="class_id[]" type="hidden" value="{{ $class->id }}">
                                                <input name="department_id[]" type="hidden" value="{{$department->id}}">

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <input class="form-control" type="text" placeholder="Enter Fees Name"
                                                            name="fees_name[]" value="{{ $tution->fees_name }}" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-sm-5">
                                                    <div class="form-group">
                                                        <input class="form-control" type="number" name="amount[]"
                                                            placeholder="Enter Amount" value="{{ $tution->amount }}" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-sm-1">
                                                    <div class="form-group">
                                                        <button id="{{ $tution->id }}" class="btn btn-danger remove"><i
                                                                class="fa fa-minus"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                    <div class="submit-section mb-3">
                                        <button class="btn btn-primary submit-btn submit_btn">Submit</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                @endforeach
            @endif
        @endforeach

        {{-- show tution fees --}}
         @foreach ($classes as $class)
            @if ($class->departments->count() == 0)
            <div id="show_tution_fees_{{ $class->id }}" class="modal custom-modal fade" style="display: none;"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="col-auto float-end ms-auto">
                                <div class="btn-group btn-group-sm">

                                    <button id="{{$class->id}}" class="btn btn-white print_btn" ><i class="fa fa-print fa-lg"></i> Print</button>
                                </div>
                            </div>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body ">
                            <div class="card-body tution_fees_details_{{$class->id}} ">
                                <div class="text-center"><img src="{{ asset('assets') }}/img/logo.png" width="60"
                                        height="60" alt=""></div>
                                <div class="text-center p-3">
                                    <h4 style="text-transform: uppercase"> {{ $class->class_name }} Tution Fees Details
                                    </h4>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Fees Name</th>
                                                <th>Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($tutions->where('ClassModel_id', $class->id) as $tution)
                                                <tr>
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td>{{ $tution->fees_name }}</td>
                                                    <td>${{ $tution->amount }}</td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td></td>
                                                <td style="font-weight: bold">Total</td>
                                                <td style="font-weight: bold">${{ $tutions->where('ClassModel_id', $class->id)->sum('amount') }}</td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                                <div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            @else
            @foreach ($class->departments as $department )
            <div id="show_tution_fees_{{ $class->id }}_{{$department->id}}" class="modal custom-modal fade" style="display: none;"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="col-auto float-end ms-auto">
                                <div class="btn-group btn-group-sm">

                                    <button id="{{$class->id}}" class="{{$department->id}} btn btn-white department_print_btn" ><i class="fa fa-print fa-lg"></i> Print</button>
                                </div>
                            </div>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body ">
                            <div class="card-body tution_fees_details_{{$class->id}}_{{$department->id}} ">
                                <div class="text-center"><img src="{{ asset('assets') }}/img/logo.png" width="60"
                                        height="60" alt=""></div>
                                <div class="text-center p-3">
                                    <h4 style="text-transform: uppercase"> {{ $class->class_name }} {{$department->department_name}} Department Tution Fees Details
                                    </h4>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Fees Name</th>
                                                <th>Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($tutions->where('ClassModel_id', $class->id)->where('department_id', $department->id) as $tution)
                                                <tr>
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td>{{ $tution->fees_name }}</td>
                                                    <td>${{ $tution->amount }}</td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td></td>
                                                <td style="font-weight: bold">Total</td>
                                                <td style="font-weight: bold">${{ $tutions->where('ClassModel_id', $class->id)->sum('amount') }}</td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                                <div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            @endforeach
            @endif
        @endforeach
    @endsection
    @section('scripts')
        <script>
            $(document).ready(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }

                });
                $('.submit_btn').hide();
                //add more
                $(document).on('click', '.add', function(e) {
                    e.preventDefault();
                    var class_id = $(this).attr('id');
                    var item_row = $(this).parent();
                    $(item_row).append(`<div class="row">
                          <input name="class_id[]" type="hidden" value="` + class_id + `">

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="fees_name[]" placeholder="Enter Fees Name"
                                            required>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <input class="form-control" type="number" name="amount[]"
                                            placeholder="Enter Amount" required>
                                    </div>
                                </div>
                                <div class="col-sm-1">
                                    <div class="form-group">
                                        <button id="remove" class="btn btn-danger remove"><i class="fa fa-minus"></i></button>
                                    </div>
                                </div>
                            </div>`);
                    $('.submit_btn').show();

                });
                //remove
                $(document).on('click', '.remove', function(e) {
                    e.preventDefault();
                    var item_row = $(this).parent().parent().parent();
                    $(item_row).remove();
                    var id = $(this).attr('id');
                    $.ajax({
                        type: 'get',
                        url: "{{ route('tutionfees.remove') }}",
                        data: {
                            'id': id
                        },
                        success: function(response) {
                            console.log(response);
                            toastr.success(response.success);
                        }
                    });

                });

                //submit tutiton fees
                $('.tution_fees_form').submit(function(e) {
                    e.preventDefault();;
                    var data = $(this).serialize();
                    $.ajax({
                        type: 'post',
                        url: "{{ route('tutionfees.store') }}",
                        data: data,
                        dataType: 'JSON',
                        success: function(response) {
                            console.log(response);
                            if (response.success) {
                                $('.submit_btn').hide();
                                toastr.success(response.success);
                                var id = '.model_body_' + response.class_id;
                                $(id).load(location.href + ' ' + id);

                            }
                        }
                    });

                });

                //tution_fees_details_show
                $(document).on('click', '.tution_fees_details_show', function(e){
                    e.preventDefault();
                    var id = $(this).attr('id');
                    $('#show_tution_fees_'+id).modal('show');
                    $('.tution_fees_details_'+id).load(location.href + ' .tution_fees_details_'+id);

                });

                // print tution fees details
                $('.print_btn').click(function(){
                    var id = $(this).attr('id');
                    $('.tution_fees_details_'+id).print();
                });


                //add add_department_tution more
                $(document).on('click', '.add_department_tution', function(e) {
                    e.preventDefault();
                    var class_array = $(this).attr('class');
                    var department_id = class_array.split(' ')[0];
                    var class_id = $(this).attr('id');
                    var item_row = $(this).parent();
                    $(item_row).append(`<div class="row">
                        <input name="class_id[]" type="hidden" value="` + class_id + `">
                        <input name="department_id[]" type="hidden" value="` + department_id + `">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input class="form-control" type="text" name="fees_name[]" placeholder="Enter Fees Name"
                                required>
                                </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <input class="form-control" type="number" name="amount[]"
                                        placeholder="Enter Amount" required>
                                        </div>
                                        </div>
                                        <div class="col-sm-1">
                                            <div class="form-group">
                                                <button id="remove" class="btn btn-danger remove"><i class="fa fa-minus"></i></button>
                                                </div>
                                                </div>
                                                </div>`);
                    $('.submit_btn').show();

                });


                    //submit department tutiton fees
                $('.department_tution_fees_form').submit(function(e) {
                    e.preventDefault();;
                    var data = $(this).serialize();
                    $.ajax({
                        type: 'post',
                        url: "{{ route('tutionfees.store') }}",
                        data: data,
                        dataType: 'JSON',
                        success: function(response) {
                            console.log(response);
                            if (response.success) {
                                $('.submit_btn').hide();
                                toastr.success(response.success);
                                var id = '.tution_fees_row_' + response.class_id+'_' + response.department_id;
                                $(id).load(location.href + ' ' + id);

                            }
                        }
                    });

                });

                //department tution fees show
                $(document).on('click', '.department_tution_fees_details_show', function(e){
                    e.preventDefault();
                    var id = $(this).attr('id');
                    var class_array = $(this).attr('class');
                    var department_id = class_array.split(' ')[0];
                    $('#show_tution_fees_'+id+'_'+department_id).modal('show');
                    $('.tution_fees_details_'+id+'_'+department_id).load(location.href + ' .tution_fees_details_'+id+'_'+department_id);
                });

                // department tution fees print
                $('.department_print_btn').click(function(){
                    var id = $(this).attr('id');
                    var class_array = $(this).attr('class');
                     var department_id = class_array.split(' ')[0];

                    $('.tution_fees_details_'+id+'_'+department_id).print();
                });
            });
            </script>
    @endsection

