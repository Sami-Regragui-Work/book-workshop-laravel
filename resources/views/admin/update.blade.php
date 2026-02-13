<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add New User</title>
</head>
<body>
    @if($errors->any())
    @foreach ($errors->all() as $error)
    <ul>
        <li><mark>{{ $error }}</mark></li>
    </ul>
    @endforeach
    @endif

    <form action="{{ route('admin.update') }}" method="post">
        @csrf
        @method('put')
        <input type="text" placeholder="Full Name" name="name" value="{{$user->name}}"><br><br>
        <input type="email" placeholder="Address Email" name="email" value="{{$user->email}}"><br><br>
        <input type="password" placeholder="New Password" name="password"><br><br>
        <input type="password" placeholder="Confirm Password" name="password_confirmation"><br><br>
        <label for="role">Role Of User</label>
        <select name="role" id="role">
            <option value="3" {{ old('role_id', $user->role_id) == 3 ? 'selected' : '' }}>Reader</option>
            <option value="2" {{ old('role_id', $user->role_id) == 2 ? 'selected' : '' }}>Author</option>
            <option value="1" {{ old('role_id', $user->role_id) == 1 ? 'selected' : '' }}>Admin</option>
        </select><br><br>
        <a href="{{ route('admin.index') }}">Cancel</a>
        <input type="submit">
    </form>
</body>
</html>