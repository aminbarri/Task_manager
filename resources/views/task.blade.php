@extends('main')
@section('main', 'Tasks List')


@section('content')

<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h4 class="text-center">Task Form</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('addtask') }}" method="POST">
                @csrf
                <!-- Title -->
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>

                <!-- Description -->
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                </div>

                <!-- Priority -->
                <div class="mb-3">
                    <label for="priority" class="form-label">Priority</label>
                    <select class="form-select" id="priority" name="priority">
                        <option value="Low">Low</option>
                        <option value="Medium">Medium</option>
                        <option value="High">High</option>
                    </select>
                </div>

                <!-- Status -->
                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="pending" value="0" checked>
                        <label class="form-check-label" for="pending">Pending</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="completed" value="1">
                        <label class="form-check-label" for="completed">Completed</label>
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-success w-100">Submit Task</button>
            </form>
        </div>
    </div>
</div>

@endsection