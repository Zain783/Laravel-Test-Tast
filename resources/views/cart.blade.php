<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Center Content */
        main {
            text-align: center;
        }

        .cart-img {

            height: 4vh;
        }

        /* Table styles */
        table {
            border-collapse: collapse;
            margin: 20px auto;
        }

        th,
        td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ccc;
        }

        th {
            background-color: #f2f2f2;
        }

        td img {
            width: 80px;
            height: 120px;
            object-fit: cover;
        }

        td input[type="number"] {
            width: 50px;
            text-align: center;
            border: none;
            background-color: #f2f2f2;
            font-size: 14px;
        }

        td input[type="number"]:focus {
            outline: none;
        }

        /* Remove button style */
        .btn-remove {
            background-color: #f44336;
            border: none;
            color: white;
            padding: 6px 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-remove:hover {
            background-color: #d50000;
        }

        /* Checkout button style */
        .btn-checkout {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 14px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-checkout:hover {
            background-color: #3e8e41;
        }

        /* Cart count style */
        .count {
            background-color: red;
            border-radius: 50%;
            color: white;
            font-size: 10px;
            font-weight: bold;
            height: 15px;
            line-height: 20px;
            position: absolute;
            right: -18px;
            text-align: center;
            top: 12px;
            width: 20px;
        }

        /* Cart icon style */
        .cart-img {
            height: 20px;
            margin-top: 5px;
        }

        #cart-icon {
            float: right;
            margin: 10px 20px;
            position: relative;
            cursor: pointer;
        }

        .checkout-btn-container {
            text-align: right;
            margin-top: 20px;
        }

        /* Responsive styles */
        @media screen and (max-width: 600px) {
            table {
                font-size: 14px;
            }

            td img {
                height: 100px;
            }

            td input[type="number"] {
                width: 40px;
                font-size: 12px;
            }

            .checkout-btn-container {
                text-align: center;
            }
        }
    </style>
</head>

<body>
    @include('header')
    @if (session()->has('message'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert"
                aria-hidden="true">x</button>{{ session()->get('message') }}
        </div>
    @endif
    <main>
        @if (!session()->has('loginId'))
            <h1>Cart Empty</h1>
        @else
            <h1>Shopping Cart</h1>
        @endif

        <table>
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Remove</th>
                </tr>
            </thead>
            @if (session()->has('loginId'))
                <tbody>

                    @foreach ($cart_books as $item)
                        <tr>
                            <td><img src="books/{{ $item->image }}" alt="Book 1"></td>
                            <td>Book Title:{{ $item->name }}</td>
                            <td>${{ $item->price }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td><a href="{{ url('/removechartItem', $item->id) }}" class="btn-remove">Remove</a></td>
                        </tr>
                    @endforeach


                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4" class="text-right">Total:</td>
                        <td>${{ $totalprice }}</td>
                        <td> <a href="/CashOnDelivery" class="btn-checkout">Cash On Delivery</a></td>
                        <td> <a href="/PayNow" class="btn-checkout">Pay Now</a></td>
                    </tr>
                </tfoot>
            @endif
        </table>
    </main>
</body>

</html>
