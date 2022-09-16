<table class="table table-striped custom-table mb-0 datatable dataTable no-footer "
                                        id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                        <thead>
                                            <th>Student Roll</th>
                                            <th>Student Name</th>
                                            <th>Action</th>
                                        </thead>
                                        <tbody>


                                            @foreach ($admissions as $admission)
                                                <tr>
                                                    <td>{{ $admission->student_roll }}
                                                        <input type="hidden" name="class[]"
                                                            value="{{ $admission->class_model->id }}">
                                                        <input class="att_date" type="hidden" name="date[]"
                                                            value="{{$date}}">
                                                    </td>
                                                    <td>{{ $admission->student_personal_infos->student_name }}
                                                        <input type="hidden" name="student[]"
                                                            value="{{ $admission->student_personal_infos->id }}">
                                                    </td>
                                                    <td>


                                                        <input id="" class="attendance_checkbox" style="width:25px;height:25px" type="checkbox"
                                                            id="attendance">

                                                            <input type="hidden" name="attendance[]" value="0">




                                                        </td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td><button class="btn btn-primary">Submit</button></td>
                                            </tr>

                                        </tbody>
                                    </table>
