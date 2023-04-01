<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .users-table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 5vh;
        }

        .users-table th,
        .users-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .users-table th {
            background-color: #222D3D;
            color: #fff;
        }

        .users-table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .edit-btn,
        .delete-btn {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            padding: 8px;
            margin-right: 5px;
            transition: background-color 0.3s ease-in-out;
        }

        .edit-btn:hover,
        .delete-btn:hover {
            background-color: #0062cc;
        }
    </style>
</head>

<body>
    @include('admin.header')
    <table class="users-table">
        <thead>
            <tr>
                <th>User ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Role</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($all_users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->address}}</td>
                    <td>{{$user->usertype}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
