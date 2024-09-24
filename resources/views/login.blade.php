@session('message')
    <script>
        window.alert("{{ session('message') }}")
    </script>
@endsession
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <h1>Login Your Account</h1>
        <label for="">Username</label><br>
        <input type="text" name="name"><br>
        @error('name')
            <p>{{ $message }}</p>
        @enderror
        <label for="">Password</label><br>
        <input type="password" name="password"><br>
        @error('password')
            <p>{{ $message }}</p>
        @enderror
        <input type="submit" ><br>
        <a href="register">Don't Have Account?</a>
    </form>
</body>
</html>