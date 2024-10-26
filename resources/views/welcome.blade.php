<!-- resources/views/welcome.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Management App</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container text-center mt-5">
        <h1>Welcome to the Task Management App</h1>
        <p>Manage your tasks efficiently!</p>
        
        <div class="mt-4">
       
             <a href="{{route('addtask')}}" class="btn btn-primary">Add New Task</a>
            <a href="{{route('viewtask')}}" class="btn btn-secondary">View All Tasks</a>
        </div>
    </div>
</body>
</html>
