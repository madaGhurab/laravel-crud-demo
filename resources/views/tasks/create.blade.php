<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Task</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include Tailwind CSS -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans antialiased">
    <div class="container mt-5">
        <h1 class="text-primary mb-4">Create Task</h1>
        <form action="{{ route('tasks.store') }}" method="POST" class="bg-white p-6 rounded shadow-md">
            @csrf
            <div class="form-group mb-4">
                <label for="title" class="form-label">Title:</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>
            <div class="form-group mb-4">
                <label for="description" class="form-label">Description:</label>
                <textarea name="description" id="description" class="form-control" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
        <a href="{{ route('tasks.index') }}" class="btn btn-secondary mt-4">Back to Tasks</a>
    </div>
</body>
</html>
