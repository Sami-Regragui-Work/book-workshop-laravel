<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All User</title>
</head>
<body>
    @if(session('sucess'))
    <p style="background-color: aquamarine;padding:8px;width:fit-content">{{ session('sucess') }}</p>
    @endif
    <nav>
        <a href="{{route('admin.index')}}">home page</a>
        <a href="{{route('admin.create')}}">Add new user</a>
        <a href="{{route('admin.archive')}}">Archive</a>
    </nav>
    @forelse ($users as $user)
    <div>
        <span>{{$user->name}} | </span>
        <span>{{$user->role->name}} |</span>
        <form style="display: inline" action="{{route('admin.edit',$user)}}" method="post">
            @csrf
            <input type="submit" value="update">
        </form>
        <form style="display: inline" action="{{ route('admin.delete',$user) }}" method="post">
            @csrf
            <input type="submit" value="delete">
        </form>
    </div><br>
    @empty
    <p>no user added it</p>
    @endforelse
</body>
</html>