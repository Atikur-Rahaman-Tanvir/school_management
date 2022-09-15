@extends('layouts.master')
@section('title')
    All Exams
@endsection
@section('content')
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">All Subjects</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Subjects</li>
                    </ul>
                </div>
                <div class="col-auto float-end ms-auto">
                    <a href="#" class="btn add-btn"data-toggle="modal" data-target="#insert"><i
                            class="fa fa-plus"></i> Add Subjects</a>
                </div>

            </div>
        </div>

        <div class="row">
            <div class=" col-sm-4 form-group form-focus select-focus focused" data-select2-id="select2-data-23-24uk">
                <select id="class_box" class="select floating select2-hidden-accessible" data-select2-id="select2-data-1-nf6t"
                    tabindex="-1" aria-hidden="true">
                    <option value="view_all">View All</option>
                 @foreach ($classes as $class )
                 <option value="{{$class->id}}">{{$class->class_name}}</option>

                 @endforeach
                </select>
            </div>
            <div class="col-md-12">
                <div>

                    <table id="data_table" class="table table-striped custom-table mb-0 datatable text-center">
                        <thead>
                            <tr>
                                <th style="width: 30px;">#</th>
                                <th>Subjects Name</th>
                                <th>Subjects Mark</th>
                                <th>Class</th>
                                <th class="text-end">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subjects as $subject)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $subject->subject_name }}</td>
                                    <td>{{ $subject->subject_mark }}</td>
                                    <td>{{ $subject->class_model->class_name }}</td>
                                    <td class="text-end">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                                aria-expanded="false"><i class="material-icons">more_vert</i></a>

                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a id="{{ $subject->id }}" class="dropdown-item edit" href="#"
                                                    data-toggle="modal" data-target="#edit"><i
                                                        class="fa fa-pencil m-r-5"></i>
                                                    Edit</a>
                                                <a id="{{ $subject->id }}" class="dropdown-item delete" href="#"
                                                    data-toggle="modal" data-target="#delete"><i
                                                        class="fa fa-trash-o m-r-5"></i>
                                                    Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="row">

        </div>
    </div>


    <div id="insert" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Subjects</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="insert_form">
                        @csrf

                        <div class="form-group">
                            <label>Subjects Name <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="subject_name" id="subject_name">
                            <span class="text-danger error subject_name_error"></span>
                        </div>
                        <div class="form-group">
                            <label>Subjects Mark <span class="text-danger">*</span></label>
                            <input class="form-control" type="number" name="subject_mark" id="subject_mark">
                            <span class="text-danger error subject_mark_error"></span>
                        </div>

                        <div class="form-group">
                            <label>Select Class <span class="text-danger">*</span></label>
                            <select class="form-control" name="ClassModel_id" id="ClassModel_id"
                           >
                                <option value="">Select Class</option>
                                @foreach ($classes as $class)
                                    <option value="{{ $class->id }}">{{ $class->class_name }}</option>
                                @endforeach

                            </select>

                            <span class="text-danger error ClassModel_id_error"></span>
                        </div>


                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div id="edit" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Subjects</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="edit_form">
                        @csrf
                        <input type="hidden" name="edit_id" value="" id="edit_id">
                        <div class="form-group">
                            <label>Subjects Name <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="subject_name" id="edit_subject_name">

                            <span class="text-danger error subject_name_error"></span>

                        </div>
                        <div class="form-group">
                            <label>Subjects Mark <span class="text-danger">*</span></label>
                            <input class="form-control" type="number" name="subject_mark" id="edit_subject_mark">
                            <span class="text-danger error subject_mark_error"></span>
                        </div>

                        <div class="form-group">
                            <label>Select Class <span class="text-danger">*</span></label>
                            <select class=" form-control" name="ClassModel_id" id="edit_ClassModel_id">
                                @foreach ($classes as $class)
                                    <option value="{{ $class->id }}">{{ $class->class_name }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger error ClassModel_id_error"></span>
                        </div>

                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="modal custom-modal fade" id="delete" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <input type="hidden" name="delete_id" value="" id="delete_id">
                    <div class="form-header">
                        <h3>Delete Subjects</h3>
                        <p>Are you sure want to delete?</p>
                    </div>
                    <div class="modal-btn delete-action">
                        <div class="row">
                            <div class="col-6">
                                <a id="delete_btn" href="javascript:void(0);"
                                    class="btn btn-primary continue-btn">Delete</a>
                            </div>
                            <div class="col-6">
                                <a href="javascript:void(0);" data-dismiss="modal"
                                    class="btn btn-primary cancel-btn">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // insert data
            $('#insert_form').submit(function(e) {
                e.preventDefault();

                let insert_data = new FormData($('#insert_form')[0]);
                $.ajax({
                    type: 'post',
                    url: "{{ route('subject.store') }}",
                    data: insert_data,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.success) {
                            $('#insert').modal('hide');
                            $('#insert').find('input').val('');

                            $('.error').text('');
                            toastr.success(response.success);
                            $('#data_table').load(location.href + ' #data_table');
                        }

                        if (response.errors) {
                            $.each(response.errors, function(key, value) {
                                $('.' + key + '_error').text(value);
                            });
                        }
                    }
                });
            });

            // show data in edit form
            $(document).on('click', '.edit', function(e) {
                e.preventDefault();
                var id = $(this).attr('id');
                $('#edit_id').val(id);
                $.ajax({
                    type: 'get',
                    url: "{{ route('subject.show') }}",
                    data: {
                        'id': id
                    },
                    success: function(response) {
                        $('#edit_subject_name').val(response.subject.subject_name);
                        $('#edit_subject_mark').val(response.subject.subject_mark);
                        $('#edit_ClassModel_id option[value=' + response.subject.ClassModel_id +
                            ']').attr('selected', 'selected');

                    }
                });
            });

            //edit
            $('#edit_form').submit(function(e) {
                e.preventDefault();
                let edit_data = new FormData($('#edit_form')[0]);
                var id = $('#edit_id').val();
                $.ajax({
                    type: 'post',
                    url: "{{ route('subject.update') }}",
                    data: edit_data,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        console.log(response);
                        if (response.success) {
                            $('#edit').modal('hide');
                            $('#edit').find('input').val('');
                            $('.error').text('');
                            toastr.success(response.success);
                            $('#data_table').load(location.href + ' #data_table');
                        }

                        if (response.errors) {
                            $.each(response.errors, function(key, value) {
                                $('.' + key + '_error').text(value);

                            });
                        }
                    }
                });
            });

            // add delete id
            $(document).on('click', '.delete', function(e) {
                e.preventDefault();
                var id = $(this).attr('id');
                $('#delete_id').val(id);
            });
            // delete
            $(document).on('click', '#delete_btn', function(e) {
                e.preventDefault();
                var id = $('#delete_id').val();
                $.ajax({
                    type: 'get',
                    url: "{{ route('subject.delete') }}",
                    data: {
                        'id': id
                    },
                    success: function(response) {
                        $('#delete').modal('hide');
                        $('#delete').find('input').val('');
                        toastr.success(response.success);
                        $('#data_table').load(location.href + ' #data_table');
                    }
                });
            });

            //serch using class
            $(document).on('change', '#class_box',function(){
                var id = $(this).val();
                $.ajax({
                    type:'get',
                    url:"{{route('subject.search')}}",
                    data:{'id':id},
                    success:function(response){
                        $('#data_table').html(response);
                        if(response.not_found){
                                $('#data_table').html("<span class='text-danger'>" + response
                                .not_found + "</span>");
                        }
                    }
                });
            });

        });
    </script>
@endsection
