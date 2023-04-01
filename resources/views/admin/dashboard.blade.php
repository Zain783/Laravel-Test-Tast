<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Panel | Book Selling Website</title>
    <link rel="stylesheet" href="style.css">
    <style>
   

        /* Table styles */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        td {
            border-bottom: 1px solid #ddd;
        }

        /* Status label styles */
        .status {
            display: inline-block;
            padding: 5px 10px;
            font-size: 14px;
            font-weight: bold;
            text-transform: uppercase;
            border-radius: 5px;
        }

        .pending {
            color: #f39c12;
            background-color: #f7dc6f;
        }

        .completed {
            color: #2ecc71;
            background-color: #a9df9c;
        }

        .canceled {
            color: #e74c3c;
            background-color: #f5b7b1;
        }

        /* Sidebar styles */
        .sidebar {
            background-color: #2c3e50;
            color: #fff;
            padding: 20px;
            width: 300px;
            height: 100%;
            position: fixed;
            top: 0;
            left: 0;
        }

        .sidebar h3 {
            margin-top: 0;
            margin-bottom: 20px;
        }

        .sidebar ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .sidebar li {
            margin-bottom: 10px;
        }

        .sidebar a {
            color: #fff;
            text-decoration: none;
        }

        .sidebar a:hover {
            color: #f39c12;
        }

        /* Content styles */
        .content {
            margin-left: 300px;
            padding: 20px;
        }

        .content h2 {
            margin-top: 0;
            margin-bottom: 20px;
        }

        .alert {
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        .alert-success {
            background-color: #dff0d8;
            border-color: #d6e9c6;
            color: #3c763d;
        }

        .alert-danger {
            background-color: #f2dede;
            border-color: #ebccd1;
            color: #a94442;
        }

        .cards {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .cards {
            display: flex;
            justify-content: center;
            align-items: center;
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
        }

        .card-header h3 {
            font-size: 18px;
            font-weight: 600;
            color: white;
        }

        .card-body h2 {
            font-size: 36px;
            font-weight: 700;
            color: #007bff;
        }
    </style>
</head>

<body>
    @include('admin.header')
    <main>
        <h1>Dashboard</h1>
        <div class="cards">
            <div class="card">
                <div class="card-header">
                    <h3>Total Books</h3>
                </div>
                <div class="card-body">
                    <h2>{{$all_books}}</h2>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3>Total Sales</h3>
                </div>

                <div class="card-body">
                    <h2>$10,000</h2>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3>Total Users</h3>
                </div>
                <div class="card-body">
                    <h2>{{$all_users}}</h2>
                </div>
            </div>
        </div>
        <div class="table-wrapper">
            <h2>Recent Orders</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Order ID</th>
                        <th scope="col">Customer Name</th>
                        <th scope="col">Book Title</th>
                        <th scope="col">Order Date</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>#1001</td>
                        <td>John Doe</td>
                        <td>The Great Gatsby</td>
                        <td>01/01/2022</td>
                        <td><span class="status pending">Pending</span></td>
                    </tr>
                    <tr>
                        <td>#1002</td>
                        <td>Jane Smith</td>
                        <td>To Kill a Mockingbird</td>
                        <td>01/02/2022</td>
                        <td><span class="status shipped">Shipped</span></td>
                    </tr>
                    <tr>
                        <td>#1003</td>
                        <td>Bob Johnson</td>
                        <td>1984</td>
                        <td>01/03/2022</td>
                        <td><span class="status delivered">Delivered</span></td>
                    </tr>
                    <tr>
                        <td>#1004</td>
                        <td>Alice Brown</td>
                        <td>The Catcher in the Rye</td>
                        <td>01/04/2022</td>
                        <td><span class="status cancelled">Cancelled</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
</body>

</html>
