@extends('layouts.master')
@section('title')
    All Exams
@endsection
@section('content')
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">All Admissions</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Admissions</li>
                    </ul>
                </div>
                <div class="col-auto float-end ms-auto">
                    <a href="#" class="btn add-btn"data-toggle="modal" data-target="#insert"><i
                            class="fa fa-plus"></i> Add Admissions</a>
                </div>

            </div>
        </div>

        <div class="row">
            <div class=" col-sm-4 form-group form-focus select-focus focused" data-select2-id="select2-data-23-24uk">
                <select id="class_box" class="select floating select2-hidden-accessible"
                    data-select2-id="select2-data-1-nf6t" tabindex="-1" aria-hidden="true">
                    <option value="view_all">View All</option>
                    @foreach ($classes as $class)
                        <option value="{{ $class->id }}">{{ $class->class_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-12">
                <div>

                    <table id="data_table" class="table table-striped custom-table mb-0 datatable text-center">
                        <thead>
                            <tr>
                                <th style="width: 30px;">#</th>
                                <th>Student Id</th>
                                <th>Student Name</th>
                                <th>Class</th>
                                <th>Department</th>
                                <th>Admited By</th>
                                <th class="text-end">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($admissions as $admission)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $admission->student_id }}</td>
                                    <td>{{ $admission->student_personal_infos->student_name }}</td>
                                    <td>{{ $admission->class_model->class_name}}</td>
                                    @if($admission->department)
                                    <td>{{ $admission->department->department_name}}</td>
                                    @else
                                    <td>-</td>
                                    @endif
                                    <td>{{ $admission->admitted_by }}</td>
                                    <td class="text-end">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                                aria-expanded="false"><i class="material-icons">more_vert</i></a>

                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a id="{{ $admission->id }}" class="dropdown-item edit" href="#"
                                                    data-toggle="modal" data-target="#edit"><i
                                                        class="fa fa-pencil m-r-5"></i>
                                                    Edit</a>
                                                <a id="{{ $admission->id }}" class="dropdown-item delete" href="#"
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

{{--
    <div id="" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add admissions</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="insert_form">
                        @csrf

                        <div class="form-group">
                            <label>admissions Name <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="admission_name" id="admission_name">
                            <span class="text-danger error admission_name_error"></span>
                        </div>
                        <div class="form-group">
                            <label>admissions Mark <span class="text-danger">*</span></label>
                            <input class="form-control" type="number" name="admission_mark" id="admission_mark">
                            <span class="text-danger error admission_mark_error"></span>
                        </div>

                        <div class="form-group">
                            <label>Select Class <span class="text-danger">*</span></label>
                            <select class="select select2-hidden-accessible" name="ClassModel_id" id="ClassModel_id"
                                data-select2-id="select2-data-4-tqno" tabindex="-1" aria-hidden="true">
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
    </div> --}}
    <div id="insert" class="modal custom-modal fade" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Student Admission</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                       <form id="insert_form">
                        @csrf
                        <div class="row">
                            <div class="col-sm-3" >
                               <div class="row">
                                <div class="col-sm-12">
                                    <h4 style="text-decoration: underline">Administration Information</h4>
                                </div>
                                   <div class="col-sm-12">
                                       <div class="form-group">
                                           <label class="col-form-label">Select Class <span class="text-danger">*</span></label>
                                           <select class="form-control admission_class" name="class_id" id="class_id" >
                                               <option value="">Select Class</option>
                                               @foreach ($classes->where('is_admission', true) as $class )
                                                   <option value="{{$class->id}}">{{$class->class_name}}</option>
                                               @endforeach
                                           </select>
                                       </div>
                                   </div>
                                   <div class="col-sm-12 d-none" id="show_department">
                                       <div class="form-group">
                                           <label class="col-form-label">Department <span class="text-danger">*</span></label>
                                           <select class="form-control" name="department" id="department">
                                               <option value="">Select Department</option>
                                               @foreach ($departments as $department)
                                               <option value="{{$department->id}}">{{$department->department_name}}</option>
                                               @endforeach
                                           </select>

                                               <span class="text-danger error department_error"></span>

                                       </div>
                                   </div>
                                   <div class="col-sm-12">
                                       <div class="form-group">
                                           <label class="col-form-label">Admission Year</label>
                                           <input class="form-control" type="text" id="admission_year" name="admission_year">
                                       </div>
                                   </div>
                                   <div class="col-sm-12">
                                       <div class="form-group">
                                           <label class="col-form-label">Student Id <span class="text-danger">*</span></label>
                                           <input class="form-control" type="number" name="student_id" id="student_id">
                                               <span class="text-danger error student_id_error"></span>
                                       </div>
                                   </div>
                                   <div class="col-sm-12">
                                       <div class="form-group">
                                           <label class="col-form-label">Student Roll <span class="text-danger">*</span></label>
                                           <input class="form-control" type="number" name="student_roll" id="student_roll">
                                               <span class="text-danger error student_roll_error"></span>
                                       </div>
                                   </div>
                                    <input class="form-control" type="hidden" name="admitted_by" id="admitted_by" value="{{Auth()->user()->email}}">
                            </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="row">
                                    <div class="col-sm-12">
                                         <h4 style="text-decoration: underline">Personal Information</h4>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="col-form-label">Student Name <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" name="student_name" id="student_name">
                                            <span class="text-danger error student_name_error"></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="col-form-label">Student Father Name <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" name="student_f_name" id="student_f_name">
                                            <span class="text-danger error student_f_name_error"></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="col-form-label">Student Mother Name <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" name="student_m_name" id="student_m_name">
                                            <span class="text-danger error student_m_name_error"></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="col-form-label">Date Of Birth <span class="text-danger">*</span></label>
                                            <input class="form-control" type="date" name="date_of_birth" id="date_of_birth">
                                            <span class="text-danger error date_of_birth_error"></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="radio">
                                            <label class="col-form-label">Gender <span class="text-danger">*</span></label><br>
                                            <select class="form-control" name="gender" id="gender">
                                                <option>Select Gender</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                                <option value="Custom">Custom</option>
                                            </select>
                                                <span class="text-danger error gender_error"></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="col-form-label">Phone Number <span class="text-danger">(optional)</span></label>
                                            <input class="form-control" type="tel" name="phone_number" id="phone_number">
                                        </div>
                                    </div>
                                </div>
                            </div>

                         <div class="col-sm-3">
                            <div class="ro">
                                 <div class="col-sm-12">
                             <h4 style="text-decoration: underline">Student Address</h4>
                             </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="col-form-label">Country<span class="text-danger">*</span></label><br>
                                        <input class="form-control" type="text" name="country" id="country">
                                            <span class="text-danger error country_error"></span>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="col-form-label">State<span class="text-danger">*</span></label><br>
                                        <input class="form-control" type="text" name="state" id="state">
                                            <span class="text-danger error state_error"></span>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                        <div class="form-group">
                                        <label class="col-form-label">City<span class="text-danger">*</span></label><br>
                                        <input class="form-control" type="text" name="city" id="city">
                                            <span class="text-danger error country_error"></span>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                        <div class="form-group">
                                        <label class="col-form-label">Address<span class="text-danger">*</span></label><br>
                                        <textarea name="address" id='address' style="height:46px" rows="2" cols="5" class="form-control" placeholder="Enter Present Address"></textarea>
                                            <span class="text-danger error country_error"></span>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="col-form-label">Present Address <span class="text-danger">*</span></label><br>
                                        <input class="form-control" type="text" name="address" id="address">
                                                 <span class="text-danger error address_error"></span>

                                    </div>
                                </div>
                            </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="row">

                                 <div class="col-sm-12">
                                    <h4 style="text-decoration: underline">Guardian  Information</h4>
                                </div>
                                 <div class="col-sm-12">
                                       <div class="form-group">
                                           <label class="col-form-label">Guardian Name <span class="text-danger">*</span></label>
                                           <input class="form-control" type="text" name="guardian_name" id="guardian_name">
                                               <span class="text-danger error guardian_name_error"></span>
                                       </div>
                                   </div>
                                   <div class="col-sm-12">
                                       <div class="form-group">
                                           <label class="col-form-label">Phone Number <span class="text-danger">*</span></label>
                                           <input class="form-control" type="tel" name="guardian_phone_number" id="guardian_phone_number">

                                           <span class="text-danger error guardian_phone_number_error"></span>

                                        </div>
                                    </div>

                                </div>

                                <div class="col-sm-12">
                                    <h4 style="text-decoration: underline">Documents</h4>
                                </div>
                                   <div class="col-sm-12">
                                       <div class="form-group">
                                           <label class="col-form-label">Document<span class="text-danger">*</span></label>
                                           <input class="form-control" type="file" name="documents[]" id="documents" multiple>
                                               <span class="text-danger error department_error"></span>
                                       </div>
                                   </div>

                            </div>
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
                    <h5 class="modal-title">Edit admissions</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="edit_form">
                        @csrf
                        <input type="hidden" name="edit_id" value="" id="edit_id">
                        <div class="form-group">
                            <label>admissions Name <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="admission_name" id="edit_admission_name">

                            <span class="text-danger error admission_name_error"></span>

                        </div>
                        <div class="form-group">
                            <label>admissions Mark <span class="text-danger">*</span></label>
                            <input class="form-control" type="number" name="admission_mark" id="edit_admission_mark">
                            <span class="text-danger error admission_mark_error"></span>
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
                        <h3>Delete admissions</h3>
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
                    url: "{{ route('admission.store') }}",
                    data: insert_data,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        console.log(response);
                        if (response.success) {
                            $('#insert').modal('hide');
                            // $('#insert').find('input').val('');
                            $('#insert_form')[0].reset();
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
                    url: "{{ route('admission.show') }}",
                    data: {
                        'id': id
                    },
                    success: function(response) {
                        $('#edit_admission_name').val(response.admission.admission_name);
                        $('#edit_admission_mark').val(response.admission.admission_mark);
                        $('#edit_ClassModel_id option[value=' + response.admission
                            .ClassModel_id +
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
                    url: "{{ route('admission.update') }}",
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
                    url: "{{ route('admission.delete') }}",
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
            $(document).on('change', '#class_box', function() {
                var id = $(this).val();
                $.ajax({
                    type: 'get',
                    url: "{{ route('admission.search') }}",
                    data: {
                        'id': id
                    },
                    success: function(response) {
                        $('#data_table').html(response);
                        if (response.not_found) {
                            $('#data_table').html("<span class='text-danger'>" + response
                                .not_found + "</span>");
                        }
                    }
                });
            });

            //current year
            var date = new Date();
            var current_year = date.getFullYear();
            $('#admission_year').val(current_year);

            //show department base on class
            $(document).on('change','.admission_class', function(){
                var data = $(this).val();
                $.ajax({
                    type:'get',
                    url:"{{route('admission.show_department')}}",
                    data:{'data':data},
                    success:function(response){
                        if(response.show_department){
                            $('#show_department').removeClass('d-none');
                        }
                        if(response.hide_department){
                            $('#show_department').addClass('d-none');
                        }
                    }
                });
            });
        });
    </script>
@endsection
