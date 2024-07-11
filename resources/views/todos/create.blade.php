<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Create a Todo</h1>
<div>
    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
</div>
<form method="post" action="{{ route('todo.store') }}">
    @csrf
    <div>
        <label>Name</label>
        <input type="text" name="name" placeholder="Name" />
    </div>
    <div>
        <label>Description</label>
        <textarea name="description" placeholder="Description"></textarea>
    </div>
    <div>
        <label>Status</label>
        <select name="status">
            <option value="0">Incomplete</option>
            <option value="1">Complete</option>
        </select>
    </div>
    <div>
        <label>Due Date</label>
        <input type="date" name="due_date" />
    </div>
    <div>
        <input type="submit" value="Save Todo" />
    </div>
</form>

</body>
</html>