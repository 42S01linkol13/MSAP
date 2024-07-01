<!doctype html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login | MSAP</title>
    <style>
        body {
            background: black;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        form {
            color: white;
        }

        form input, form textarea {
           background: black;
            color: white;
        }

        form label {
            color: white; /* Цвет текста для меток */
        }
        button{
            justify-content: center;
            align-items: center;
            display: flex;
            margin: 0;
        }
    </style>
</head>

<body>

<form method="POST" action="/msap/login">
    @csrf
    <label for="user">Username</label>
    <input type="password" id="user" name="user"><br><br>
    <label for="root">Password</label>
    <input type="password" id="root" name="root"><br><br>
    <div>
        <button type="submit" class="btn btn-dark">Log in</button>
    </div>
</form>
</body>
</html>
