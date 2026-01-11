<!DOCTYPE html>
<html>
<head>
    <title>Tasks List</title>
</head>
<body>

    <h1>All Tasks</h1>

    <!-- Loop through tasks and display title -->
    @foreach($tasks as $task)
        <p>{{ $task->title }}</p>
    @endforeach

</body>
</html>
