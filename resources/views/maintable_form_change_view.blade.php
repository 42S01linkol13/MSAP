<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Change the config</title>
</head>
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

    .ds{
        height: 90%;
    }
    form{
        height: 90%;
    }
</style>
<body>
<div class="ds">
    <h2>Change values here! If you dont want to change sth, just duplicate value.</h2>
</div>
<form>
    @csrf
    <input type="hidden" id="ID" name="id" value={{$id}}><br><br>
    <label for="site">New Site url: </label>
    <input type="text" id="site" name="site"><br><br>
    <label for="user">New Site user: </label>
    <input type="password" id="user" name="user"><br><br>
    <label for="root">New Site root: </label>
    <input type="password" id="root" name="root"><br><br>
    <div>
        <button type="submit" class="btn btn-dark">Log in</button>
    </div>
</form>
</body>
</html>
