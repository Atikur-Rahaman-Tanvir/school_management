
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

