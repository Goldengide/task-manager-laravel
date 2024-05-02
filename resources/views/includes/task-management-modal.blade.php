<div class="modal fade" id="task-management" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add a new Task</h5>
                <button type="button" class="btn-close" data-mdb-ripple-init data-mdb-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column">
                            <div class="d-flex flex-row justify-content-start align-items-center my-2">
                                <input type="text" class="form-control form-control-lg me-2" name="name"
                                    id="taskName" placeholder="Add new..." required>
                                <div class="datepicker-wrapper">
                                    <input type="text" id="deadline"
                                        class="datepicker form-control form-control-lg" placeholder="Pick Date"
                                        name="deadline" readonly required>
                                    <span class="fas fa-calendar-alt"></span>
                                </div>
                                <input type="hidden" name="task_id" id="taskId" value="0">

                            </div>
                            <div class="d-flex flex-row justify-content-start align-items-center my-2">
                                <select class="form-control form-control-lg me-2" id="projectId" name="project_id"
                                    data-mdb-select-init required>
                                    <option value="" disabled selected>Select a Project</option>
                                    @foreach ($projects as $project)
                                        <option value="{{ $project->id }}">{{ $project->name }}</option>
                                    @endforeach
                                </select>
                                <select class="form-control form-control-lg ms-2" id="priority" name="priority"
                                    data-mdb-select-init required>
                                    <option value="" disabled selected>Select Priority</option>
                                    <option value="1">High</option>
                                    <option value="2">Medium</option>
                                    <option value="3">Low</option>
                                </select>

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