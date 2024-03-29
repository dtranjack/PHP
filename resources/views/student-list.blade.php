<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
</style>
<body>
<div>
    <table>
        <tr>
            <th>ID</th>
            <th>name</th>
            <th>address</th>
        </tr>
        @foreach($students as $pp)
            <tr>
                <td>
                    {{$pp->id}}
                </td>
                <td>
                    {{$pp->name}}
                </td>
                <td>
                    {{$pp->address}}
                </td>
            </tr>
        @endforeach
    </table>
</div>
</body>
</html>
