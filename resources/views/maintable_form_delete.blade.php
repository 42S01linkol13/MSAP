<!doctype html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Main page</title>
    <style>
        body {
            background: black;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            flex-direction: column;
        }
        form{
            .button {
                display: flex;
                justify-content: center;
                margin-bottom: 20px;
            }

            table {
                width: 150%;
                color: white;
                border-collapse: collapse;
                border: 2px solid white;
            }

            th, td {
                padding: 10px;
                text-align: center;
                border: 1px solid white;
            }
        }


        .Text {
            color: white;
        }

    </style>
</head>
<body>

<div class="Text">
    <h1>Delete the server / servers</h1>
</div>
<form method="POST" action="/msap/delete">
    @csrf
    <div class="button">
        <button type="submit" class="btn btn-outline-danger">Delete selected</button>
        <button type="button" class="btn btn-outline-primary"
                onclick="window.location.href = 'http://127.0.0.1:8000/msap/settings';">Back</button>
    </div>
    <table>
        <thead>
        <tr>
            <th></th>
            <th>ID</th>
            <th>SITE NAME</th>
            <th>user</th>
            <th>root</th>
            <th>ADDED_AT</th>
        </tr>
        </thead>
        <tbody>
        @foreach($allData as $row)
            <tr>
                <td><input type="checkbox" name="selected[]" value="{{ $row['ID'] }}"></td>
                <td>{{ $row['ID'] }}</td>
                <td>{{ $row['Site'] }}</td>
                <td>{{ $row['user'] }}</td>
                <td>{{ $row['root'] }}</td>
                <td>{{ $row['Added_at'] }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</form>

</body>
</html>
