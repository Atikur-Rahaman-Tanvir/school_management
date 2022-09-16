<table class="table table-striped custom-table mb-0 datatable dataTable no-footer "
                                        id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                        <thead>
                                            <th>Student Roll</th>
                                            <th>Student Name</th>
                                            <th>Action</th>
                                        </thead>
                                        <tbody>


                                            @foreach ($attendances as $attendance)
                                                <tr>
                                                    <td>

                                                        {{ $attendance->student_personal_info->admission->student_roll }}
                                                      <input type="hidden" name="class[]" value="{{ $attendance->student_personal_info->admission->class_model_id}}">

                                                        <input class="att_date" type="hidden" name="date[]" value="{{$date}}">

                                                    </td>
                                                    <td>

                                                         {{ $attendance->student_personal_info->student_name }}
                                                        <input type="hidden" name="student[]"
                                                            value="{{ $attendance->student_id}}">
                                                    </td>
                                                    <td>

                                                
                                                        @if($attendance->attendance == 0)
                                                        <input class="attendance_checkbox" style="width:25px;height:25px" type="checkbox"
                                                            id="attendance">
                                                            <input type="hidden" name="attendance[]" value="0">
                                                        @else
                                                        <input class="attendance_checkbox" style="width:25px;height:25px" type="checkbox"
                                                            id="attendance" checked>
                                                            <input type="hidden" name="attendance[]" value="1">
                                                        @endif
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
