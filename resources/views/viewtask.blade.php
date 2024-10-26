<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Tasks</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Task List</h1>
        
        <!-- Display Success Message -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Tasks Table -->
        <table class="table table-bordered table-hover mt-4">
            <thead class="table-dark">
                <tr>
                    <th>Sl</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Due Date</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Example data rows -->
                 @php
                 $i=1;
                  @endphp
               @foreach($datas as $data)
               <tr>
                <td>{{$i}}</td>
                 <td>{{$data->title}}</td>
                  <td>{{$data->description}}</td>
                   <td>{{$data->due_date}}</td>
                    <td>{{$data->status}}</td>
                    <td>{{ \Carbon\Carbon::parse($data->created_at)->setTimezone('Asia/Dhaka')->format('Y-m-d H:i:s') }}
</td>
                    <td>
                        <a href="{{ route('edit_task', ['task_id' => $data->task_id]) }}" class="btn btn-info btn-sm">Edit</a>

                         <form action="{{ route('task.delete', $data->task_id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE') 
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this task?');">Delete</button>
                        </form>
                    </td>
               </tr>
                @php
                 $i++;                     
                @endphp
               @endforeach
            </tbody>
        </table>
        <div class="text-center mt-4">
            <a href="{{ route('addtask') }}" class="btn btn-primary">Add New Task</a>
        </div>
    </div>
</body>
</html>
