<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Details</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include Tailwind CSS -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans antialiased">
    <div class="container mt-5">
        <h1 class="text-primary mb-4">{{ $task->title }}</h1>
        <p class="mb-4">{{ $task->description }}</p>

        <a href="{{ route('tasks.index') }}" class="btn btn-secondary mb-3">Back to Task List</a>
        
        <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="mb-3">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>

        <a href="{{ route('tasks.edit', $task) }}" class="btn btn-warning">Edit Task</a>
        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Back to Tasks</a>
    </div>
</body>
</html>
