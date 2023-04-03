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
    </style>
</head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />


<body>
    @include('admin.header')
    @if (session()->has('message'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert"
                aria-hidden="true">x</button>{{ session()->get('message') }}
        </div>
    @endif
    <table class="books-table">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>User id</th>
                <th>Book Id</th>
                <th>Book Title</th>
                <th>Book Quantity</th>
                <th>Price</th>
                <th>Image</th>
                <th>Payment Status</th>
                <th>Delivery Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($Orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->email }}</td>
                    <td>{{ $order->address }}</td>
                    <td>{{ $order->user_id }}</td>
                    <td>{{ $order->book_id }}</td>
                    <td>{{ $order->booktitle }}</td>
                    <td>{{ $order->quantity }}</td>
                    <td>{{ $order->price }}</td>
                    <td><img src="books/{{ $order->image }}" alt="" height="200" width="200"></td>
                    <td>{{ $order->payment_status }}</td>
                    <td><a class="btn {{ $order->delivery_status == 'processing' ? 'btn-success' : 'btn-secondary' }} "
                            href="{{ url('/changeDeliveryStatus', $order->id) }}">{{ $order->delivery_status }}</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
