<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CONSOLE | MSAP</title>
    <style>
        body {
            background: black;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: flex-start;
            height: 100vh;
            margin: 0;
            padding: 10px;
            position: relative;
            overflow: hidden;
        }

        form {
            color: white;
            width: 50%;
            margin-right: auto;
            display: flex;
            align-items: center;
        }

        form input {
            background: rgba(30, 30, 30, 0.85);
            color: white;
            border: none;
            flex: 1;
        }

        form label {
            color: white; /* Цвет текста для меток */
        }

        button {
            margin-left: 10px;
            width: auto;
        }

        .chat-area {
            flex: 1;
            overflow-y: auto;
            color: white;
            padding: 10px;
            margin-top: 10px;
            background: #0c0c0c;
            width: 100%;
        }

        .line-bottom, .line-up, .line-idk, .line-right {
            position: absolute;
            width: 100%;
            height: 1px;
            background: #2a2a2a;
        }

        .line-bottom {
            bottom: 5%;
        }

        .line-up {
            top: 6%;
        }

        .line-idk {
            top: 0;
            right: 0;
            transform: rotate(180deg);
        }

        .line-right {
            top: 0;
            right: 0;
            transform: rotate(90deg);
            left: 15%;
        }

        .s1, .s2 {
            text-align: center;
            color: green;
        }

        .s2 {
            position: absolute;
            right: 10px;
        }

        .log_cons, .log_log {
            position: absolute;
            background: black;
            border: black;
            color: #0e5300;
            resize: none;
        }

        .log_log {
            right: 1%;
            top: 51.5%;
            transform: translateY(-50%);
        }
    </style>
</head>
<body>
<div class="s1"><h1>Console</h1></div>
<div class="s2"><h1>Logged</h1></div>
<div class="chat-area">
    @foreach($console_data as $data)
        <textarea id='w' class="log_cons" rows="33" cols="136" spellcheck="false" dir="auto" readonly>
            |-----------------------------------------------------------Start-----------------------------------------------------------|
                {{$data}}
            |------------------------------------------------------------END---------------------------------------------------------------|
             Hello! My name is linkol13 ( aka creator of this project ), thank you for using mine console! Also, do you think, that
             its will be more interesting to listen a music and watch some videos?... If your answer is 'Yes', just DM me in discord
             Discord: linkol13#0
            |___________________________________________________________________________________________________________________________|
        </textarea>
    @endforeach
</div>
<div class="line-bottom"></div>
<div class="line-up"></div>
<div class="line-idk"></div>
@foreach($all as $data2)
    <textarea id='d' class="log_log" rows="33" cols="68" spellcheck="false" dir="auto" readonly>
            {{$data2}}
        </textarea>
@endforeach
<div class="line-right"></div>
<form method="POST" action="/msap/log">
    @csrf
    <label for="command"></label>
    <input type="text" id="command" name="command">
    <button type="submit" class="btn btn-outline-secondary">
        Post this command
    </button>
    <button type="button" class="btn btn-outline-secondary"
            onclick="window.location.href = 'http://127.0.0.1:8000/msap/mainpage';">Back to the main page
    </button>
</form>

<script>
    var textarea = document.getElementById('w');
    var textarea2 = document.getElementById('d');
    textarea.scrollTop = textarea.scrollHeight;
    textarea2.scrollTop = textarea2.scrollHeight;
</script>
</body>
</html>
