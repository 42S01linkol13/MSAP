<!doctype html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add new server</title>
    <style>
        body {
            background: black;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            flex-direction: column;
            color: white;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        form input, form textarea {
            background: black;
            color: white;
        }

        form label {
            color: white; /* Цвет текста для меток */
        }

        button {
            margin-top: 20px;
        }

        .s {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<h1 class="s">Add new server</h1>
<form method="POST" action="/msap/add">
    @csrf
    <label for="site">Site name:</label>
    <input type="text" id="site" name="site"><br><br>
    <label for="user">Username:</label>
    <input type="text" id="user" name="user"><br><br>
    <label for="root">ROOT:</label>
    <input type="password" id="root" name="root"><br><br>
    <div>
        <button type="submit" class="btn btn-outline-success">Add new server</button>
        <button type="button" class="btn btn-outline-primary"
                onclick="window.location.href = 'http://127.0.0.1:8000/msap/settings';">Back</button>
    </div>
</form>
</body>
</html>
