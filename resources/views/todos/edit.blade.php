<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Edit Todo</h1>
<div>
    @if($errors->any())
        <ul> 
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
</div>
<form method="post" action="{{route('todo.update',['todo' => $todo])}}">
    @csrf
    @method('put')
    <div>
        <label>Name</label>
        <input type="text" name="name" placeholder="Name" value="{{$todo->name}}" />
    </div>
    <div>
        <label>Description</label>
        <input type="text" name="description" placeholder="Description" value="{{$todo->description}}"/>
    </div>
    <div>
        <label>Status</label>
        <select name="status" value="{{$todo->status}}">
            <option value="0">Incomplete</option>
            <option value="1">Complete</option>
        </select>
    </div>
    <div>
        <label>Due Date</label>
        <input type="date" name="due_date" value="{{$todo->due_date}}" />
    </div>
    <div>
        <input type="submit" value="Update Todo" />
    </div>
</form>

</body>
</html>