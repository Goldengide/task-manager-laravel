@extends('app')
@section('content')
    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <div class="card" id="list1" style="border-radius: .75rem; background-color: #eff1f2;">
                        <div class="card-body py-4 px-4 px-md-5">

                            <p class="h1 text-center mt-3 mb-4 pb-3 text-primary">
                                <i class="fas fa-check-square me-1"></i>
                                <u>My Todo-s List</u>
                            </p>

                            <div class="pb-2">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex flex-row align-items-center justify-content-between">

                                            <button type="button" data-mdb-button-init data-mdb-ripple-init
                                                data-mdb-modal-init data-mdb-target="#project-management"
                                                class="btn btn-primary">Add a new Project</button>
                                            <button type="button" id="add-button" data-mdb-button-init data-mdb-ripple-init
                                                data-mdb-modal-init data-mdb-target="#task-management"
                                                class="btn btn-primary">Add a new Task</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr class="my-4">

                            <div class="d-flex justify-content-end align-items-center mb-4 pt-2 pb-3">
                                <p class="small mb-0 me-2 text-muted">Filter</p>
                                <select class="form-control form-control-lg me-2" id="statusId" name="status"
                                    data-mdb-select-init>
                                    <option value="1">All</option>
                                    <option value="2">Completed</option>
                                    <option value="3">Active</option>
                                    <option value="4">Has due date</option>
                                </select>
                                <p class="small mb-0 ms-4 me-2 text-muted">Project</p>
                                <select class="form-control form-control-lg me-2" id="projectSortId" name="project_id"
                                    data-mdb-select-init>
                                    <option value="">Select All</option>
                                    @foreach ($projects as $project)
                                        <option value="{{ $project->id }}">{{ $project->name }}</option>
                                    @endforeach
                                </select>
                                {{-- <a href="#!" style="color: #23af89;" data-mdb-tooltip-init title="Project"><i
                                        class="fas fa-briefcase-clock ms-2"></i></a> --}}
                            </div>

                            <div class="todo-list-group">
                                @foreach ($tasks as $task)
                                    <ul class="list-group list-group-horizontal rounded-0 bg-transparent"
                                        task-data-id ='{{ $task->id }}' task-project-id ='{{ $task->project_id }}'>
                                        <li
                                            class="list-group-item d-flex align-items-center ps-0 pe-3 py-1 rounded-0 border-0 bg-transparent">
                                            <div class="form-check">
                                                <input class="form-check-input task-checkbox me-0" type="checkbox"
                                                    value="" id="flexCheckChecked{{ $task->id }}"
                                                    @if ($task->status) checked @endif
                                                    aria-label="{{ $task->name }}" />
                                            </div>
                                        </li>
                                        <li
                                            class="list-group-item px-3 py-1 d-flex align-items-center flex-grow-1 border-0 bg-transparent">
                                            <p class="lead fw-normal mb-0">{{ $task->name }}</p>
                                        </li>
                                        <li class="list-group-item ps-3 pe-0 py-1 rounded-0 border-0 bg-transparent">
                                            <div class="d-flex flex-row justify-content-end mb-1">
                                                <a href="#!" class="text-info edit-button" data-mdb-tooltip-init
                                                    data-mdb-modal-init data-mdb-target="#task-management"
                                                    data-task-name="{{ $task->name }}" data-task-id="{{ $task->id }}"
                                                    data-deadline="{{ $task->deadline }}"
                                                    data-project-id="{{ $task->project_id }}"
                                                    data-priority="{{ $task->priority }}" title="Edit todo"><i
                                                        class="fas fa-pencil-alt me-3"></i></a>
                                                <a href="#!" class="text-danger delete-button" data-mdb-tooltip-init
                                                    title="Delete todo" data-task-id="{{ $task->id }}"><i
                                                        class="fas fa-trash-alt"></i></a>
                                            </div>
                                            <div class="text-end text-muted">
                                                <a href="#!" class="text-muted" data-mdb-tooltip-init
                                                    title="Created date">
                                                    <p class="small mb-0"><i
                                                            class="fas fa-info-circle me-2"></i>{{ $task->formatted_created_at }}
                                                    </p>
                                                </a>
                                            </div>
                                        </li>
                                    </ul>
                                @endforeach

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('includes.task-management-modal')

        <div class="modal fade" id="project-management" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add a new Project</h5>
                        <button type="button" class="btn-close" data-mdb-ripple-init data-mdb-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-column">
                                    <div class="d-flex flex-row justify-content-start align-items-center my-2">
                                        <input type="text" class="form-control form-control-lg me-2" name="name"
                                            id="projectName" placeholder="Add new...">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-mdb-ripple-init
                            data-mdb-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" data-mdb-ripple-init>Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @push('css')
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">
        <style>
            .datepicker-wrapper {
                position: relative;
            }

            .datepicker-wrapper .fa-calendar-alt {
                position: absolute;
                right: 10px;
                top: 50%;
                transform: translateY(-50%);
                pointer-events: none;
                /* Prevents the icon from interfering with input focus */
            }

            .datepicker {
                padding-right: 30px;
                /* Adjust this value to make space for the icon */
            }
        </style>
    @endpush
    @push('js')
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"
            integrity="sha256-lSjKY0/srUM9BE3dPm+c4fBo1dky2v27Gdjm2uoZaL0=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>

        <script>
            $(document).ready(function() {
                $('#task-management .btn-primary').click(function() {
                    var task_id = $('#taskId').val();
                    var name = $('#taskName').val();
                    var project_id = $('#projectId').val();
                    var deadline = $('#deadline').val();

                    $.ajax({
                        url: '{{ route('tasks.store') }}',
                        method: 'POST',
                        data: {
                            task_id,
                            name,
                            project_id,
                            deadline
                        },
                        success: function(response) {
                            var taskItem = `
                            <ul class="list-group list-group-horizontal rounded-0 bg-transparent"
                                        task-data-id ='${ response.id }' task-project-id ='${ response.project_id }'>
                                        <li
                                            class="list-group-item d-flex align-items-center ps-0 pe-3 py-1 rounded-0 border-0 bg-transparent">
                                            <div class="form-check">
                                                <input class="form-check-input task-checkbox me-0" type="checkbox"
                                                    value="" id="flexCheckChecked${response.id}"
                                                    aria-label="${response.name}" />
                                            </div>
                                        </li>
                                        <li
                                            class="list-group-item px-3 py-1 d-flex align-items-center flex-grow-1 border-0 bg-transparent">
                                            <p class="lead fw-normal mb-0">${response.name }</p>
                                        </li>
                                        <li class="list-group-item ps-3 pe-0 py-1 rounded-0 border-0 bg-transparent">
                                            <div class="d-flex flex-row justify-content-end mb-1">
                                                <a href="#!" class="text-info edit-button" data-mdb-tooltip-init
                                                    data-mdb-modal-init data-mdb-target="#task-management"
                                                    data-task-name="${ response.name }" data-task-id="${ response.id }"
                                                    data-deadline="${ response.deadline }"
                                                    data-project-id="${ response.project_id }"
                                                    data-priority="{{ $task->priority }}" title="Edit todo"><i
                                                        class="fas fa-pencil-alt me-3"></i></a>
                                                <a href="#!" class="text-danger delete-button" data-mdb-tooltip-init
                                                    title="Delete todo" data-task-id="${ response.id }"><i
                                                        class="fas fa-trash-alt"></i></a>
                                            </div>
                                            <div class="text-end text-muted">
                                                <a href="#!" class="text-muted" data-mdb-tooltip-init
                                                    title="Created date">
                                                    <p class="small mb-0"><i
                                                            class="fas fa-info-circle me-2"></i>${response.formatted_created_at}
                                                    </p>
                                                </a>
                                            </div>
                                        </li>
                                    </ul>
                                    `;
                            if (task_id > 0) {
                                var taskElement = $('[task-data-id="' + task_id + '"]');
                                var taskNameElement = taskElement.find('.lead');
                                taskNameElement.text(response.name);
                            } else {
                                $('.todo-list-group').append(taskItem);
                            }


                            $('#taskName').val('');
                            $('#deadline').val('');
                            $('#projectId').val('').trigger('change');
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                });
                $('#add-button').click(function() {
                    console.log('task-add')
                    $('#task-management .modal-title').text('Add a new Task');

                    $('#taskName').val('');
                    $('#deadline').val('');
                    $('#projectId').val('').trigger('change');
                });
                $('.edit-button').click(function() {
                    var taskId = $(this).data('task-id');
                    var taskName = $(this).data('task-name');
                    var deadline = $(this).data('deadline');
                    var projectId = $(this).data('project-id');

                    $('#task-management .modal-title').text('Edit Task');


                    $('#taskId').val(taskId);
                    $('#taskName').val(taskName);
                    $('#deadline').val(deadline);
                    $('#projectId').val(projectId).trigger('change');

                    // Open the modal
                    $('#task-management').modal('show');
                });
                $('.delete-button').click(function(e) {
                    e.preventDefault();
                    var taskId = $(this).data('task-id');
                    var taskElement = $(this).closest('.list-group-item').parent();


                    $.ajax({
                        url: '{{ route('tasks.destroy', ':id') }}'.replace(':id', taskId),
                        type: 'DELETE',
                        success: function(response) {
                            taskElement.remove();
                        },
                        error: function(xhr, status, error) {

                        }
                    });
                });
                $('#project-management .btn-primary').click(function() {
                    var name = $('#projectName').val();

                    $.ajax({
                        url: '{{ route('projects.store') }}',
                        method: 'POST',
                        data: {
                            name,
                        },
                        success: function(response) {
                            var projectItem =
                                `<option value="${response.id}">${response.name}</option>`;
                            $('#projectSortId').append(projectItem);
                            $('#projectId').append(projectItem);

                            $('#projectName').val('');
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                });

                $('.datepicker').datepicker({
                    format: 'yyyy-mm-dd',
                    autoclose: true,
                    startDate: '0d'
                });

                $('#projectSortId').change(function() {
                    var projectId = $(this).val();

                    $('.todo-list-group > ul').each(function() {
                        var taskProjectId = $(this).attr(
                            'task-project-id');

                        if (projectId === '' || taskProjectId === projectId) {
                            $(this).show();
                        } else {
                            $(this).hide();
                        }
                    });
                });

                $('.todo-list-group').sortable({
                    axis: 'y', // Allow dragging only in the vertical direction
                    handle: '.list-group', // Specify the handle for dragging
                    containment: 'parent', // Constrain the dragging within the parent element
                    tolerance: 'pointer', // Activate the sorting when the pointer is over the sortable item
                    update: function(event, ui) {
                        // Handle the update event to save the new order to the database if needed
                        console.log('Updated order:', $(this).sortable('toArray'));
                    }
                });

                $('.task-checkbox').change(function() {
                    var taskItem = $(this).closest('ul');
                    var isChecked = $(this).prop('checked') ? 1 : 0;
                    console.log(isChecked)
                    var taskId = $(this).closest('ul').attr('task-data-id'); 

                    $.ajax({
                        url: '{{ route('tasks.update-status', ':id') }}'.replace(':id', taskId),
                        method: 'POST',
                        data: {
                            isChecked: isChecked
                        },
                        success: function(response) {
                            console.log(response);
                            if (isChecked) {
                                taskItem.insertAfter($('.todo-list-group ul:last-child'));
                            } else if (!isChecked) {
                                taskItem.insertBefore($('.todo-list-group ul:first-child'));
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                });

            });
        </script>
    @endpush
@endsection
