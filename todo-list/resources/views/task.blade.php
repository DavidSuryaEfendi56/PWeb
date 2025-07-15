<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Tugas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="d-flex min-vh-100">
        <!-- Sidebar -->
        <div class="sidebar p-3 d-flex flex-column">
            <h4 class="text-white mb-4">MyTask</h4>
            <ul class="nav flex-column">
                <li class="nav-item mb-2"><a href="#" class="nav-link">Dashboard</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link">All Tasks</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link">Completed</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link">Settings</a></li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3>Tasks Feed</h3>
                <button id="toggleFormBtn" class="btn btn-success">+ Add Task</button>
            </div>

            <!-- Form -->
            <div id="taskFormWrapper" class="card p-4 shadow-sm mb-4 form-wrapper" style="display: none;">
                <form method="POST" action="{{ route('task.store') }}">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="title" class="form-label">Title</label>
                            <input name="title" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for="type" class="form-label">Type</label>
                            <select name="type" class="form-select" required>
                                <option value="Work">Work</option>
                                <option value="Personal">Personal</option>
                                <option value="Health">Health</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" rows="2" class="form-control"></textarea>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="due_date" class="form-label">Due Date</label>
                            <input type="date" name="due_date" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="priority" class="form-label">Priority</label>
                            <select name="priority" class="form-select">
                                <option value="Low">Low</option>
                                <option value="Medium" selected>Medium</option>
                                <option value="High">High</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="location" class="form-label">Location</label>
                            <input name="location" class="form-control">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="reminder_at" class="form-label">Reminder At</label>
                            <input type="datetime-local" name="reminder_at" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="is_urgent" class="form-label">Is Urgent?</label><br>
                            <div class="form-check form-switch">
                                <input type="checkbox" class="form-check-input" name="is_urgent" value="1" id="isUrgentSwitch">
                                <label class="form-check-label" for="isUrgentSwitch">Yes</label>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="notes" class="form-label">Notes</label>
                        <textarea name="notes" rows="2" class="form-control"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Save Task</button>
                </form>
                
            </div>

            <!-- Feed -->
            <div class="row">
            @foreach ($tasks as $task)
                <div class="col-md-6 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">{{ $task->title }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">
                                Type: {{ $task->type }} | Priority: {{ $task->priority }}
                            </h6>
                            <p class="card-text">{{ $task->description }}</p>
                            <p class="mb-1"><strong>Due:</strong> {{ \Carbon\Carbon::parse($task->due_date)->format('Y-m-d') }}</p>
                            <p><strong>Location:</strong> {{ $task->location }}</p>
                            <a href="#" class="btn btn-sm btn-outline-primary">Edit</a>
                            <a href="#" class="btn btn-sm btn-outline-danger">Delete</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        </div>
    </div>

    <script>
        document.getElementById('toggleFormBtn').addEventListener('click', function () {
            const formWrapper = document.getElementById('taskFormWrapper');
            const isHidden = formWrapper.style.display === 'none';

            formWrapper.style.display = isHidden ? 'block' : 'none';
            this.textContent = isHidden ? 'Close Form' : '+ Add Task';
            this.classList.toggle('btn-success', !isHidden);
            this.classList.toggle('btn-secondary', isHidden);
        });
    </script>
</body>
</html>
<style>
    html, body {
        height: 100%;
        margin: 0;
    }

    .sidebar {
        background-color: #1e1f26;
        color: #fff;
        min-width: 200px;
    }

    .sidebar .nav-link {
        color: #ccc;
    }

    .sidebar .nav-link:hover {
        color: #fff;
    }

    .main-content {
        padding: 2rem;
        flex: 1;
        overflow-y: auto;
    }

    .form-wrapper {
        transition: all 0.3s ease-in-out;
    }

    body {
        background-color: #f8f9fa;
    }
</style>
