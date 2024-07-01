<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <style>
        body {

            background: black;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            flex-direction: column;
            color: white;

        }
    </style>
</head>
<body>
Welcome to MSAP, and.... <span style="color: red">PLEASE! Upgrade the security!!!!!! I havent got completed it!!!!!!! So everything on your risk!!!!!! </span>

<form method="POST" action="/post">
    @csrf
    <label for="user">Username</label>
    <input type="text" id="user" name="user"><br><br>
    <label for="root">Password</label>
    <input type="password" id="root" name="root"><br><br>
    <div>
        <button type="submit" class="btn btn-dark">Log in</button>
    </div>
</form>
</body>
</html>
