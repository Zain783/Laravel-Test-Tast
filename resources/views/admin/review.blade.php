<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .books-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .books-table th,
        .books-table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .books-table th {
            background-color: #f2f2f2;
        }

        .books-table tbody tr:hover {
            background-color: #f5f5f5;
        }

        .books-table td img {
            max-width: 100px;
            height: auto;
        }

        .card {
            width: 250px;
            height: 200px;
            background-color: #222D3D;
            border-radius: 10px;
            margin: 20px;
            padding: 20px;
            text-align: center;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2), 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            margin-bottom: 10px;
            background-color: red;
        }

        .card-header h3 {
            font-size: 18px;
            font-weight: 600;
            color: black;
        }

        .card-body h2 {
            font-size: 36px;
            font-weight: 700;
            color: #007bff;
        }

        .carditem {

            border-radius: 20px;

        }
    </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />



</head>

<body>
    @include('admin.header')
    @if (session()->has('message'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert"
                aria-hidden="true">x</button>{{ session()->get('message') }}
        </div>
    @endif
    <div class="card carditem">
        <div class="card-header">
            <h3>TOTAL Reviews</h3>
        </div>
        <div class="card-body">
            <h2>{{ count($all_reviews) }}</h2>
        </div>
    </div>
    <table class="books-table">
        <thead>
            <tr>
                <th>Like ID</th>
                <th>Book ID</th>
                <th>User Id</th>
                <th>Rating</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($all_reviews as $review)
                <tr>
                    <td>{{ $review->id }}</td>
                    <td>{{ $review->book_id }}</td>
                    <td>{{ $review->user_id }}</td>
                    <td>{{ $review->rating }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
