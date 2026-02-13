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

    <form action="{{ route('admin.store') }}" method="post">
        @csrf
        <input type="text" placeholder="Full Name" name="name"><br><br>
        <input type="email" placeholder="Address Email" name="email"><br><br>
        <input type="password" placeholder="Password" name="password"><br><br>
        <input type="password" placeholder="Confirm Password" name="password_confirmation"><br><br>
        <label for="role">Role Of User</label>
        <select name="role" id="role">
            <option value="" disabled>Select Role</option>
            <option value="3">Reader</option>
            <option value="2">Author</option>
            <option value="1">Admin</option>
        </select><br><br>
        <input type="submit" >
    </form>
</body>
</html>