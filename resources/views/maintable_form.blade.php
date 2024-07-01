<!doctype html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Settings</title>
    <style>
        body {
            background: black;
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .text {
            margin-bottom: 20px;
        }

        .s1, .s2 {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .s1 button, .s2 button, .s3 button {
            margin: 0 10px; /* Разделение кнопок на 20px */
        }

        .s3 {

        }
    </style>
</head>
<body>
<h1 class="text">Choose the action:</h1>
<div class="s1">
    <button class="btn btn-outline-success"
            onclick="window.location.href = 'http://127.0.0.1:8000/msap/add_new_server';">Add server
    </button>
    <button class="btn btn-outline-danger"
            onclick="window.location.href = 'http://127.0.0.1:8000/msap/delete_server';">Delete server
    </button>
</div>
<div class="s2">
    <button class="btn btn-outline-warning"
            onclick="window.location.href = 'http://127.0.0.1:8000/msap/change_config';">Change server
    </button>
    <button class="btn btn-outline-info"
            onclick="window.location.href = 'http://127.0.0.1:8000/msap/console';">Core of the terminal
    </button>
</div>
    <div class="s3">
        <button class="btn btn-outline-secondary"
                onclick="window.location.href = 'http://127.0.0.1:8000/msap/mainpage';">Back to the menu
        </button>
    </div>

</body>
</html>
