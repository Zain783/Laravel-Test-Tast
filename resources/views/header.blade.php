<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Cart Icon Styling */
        #cart-icon {
            float: right;
            margin: 10px 20px;
            position: relative;
        }

        #cart-icon .count {
            background-color: red;
            border-radius: 50%;
            color: white;
            font-size: 14px;
            font-weight: bold;
            height: 20px;
            line-height: 20px;
            position: absolute;
            right: -8px;
            text-align: center;
            top: -8px;
            width: 20px;
        }

        /* //nav bar */
        nav {
            background-color: #f5f5f5;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
        }

        nav a {
            color: #333;
            /* background-color: #ddd; */
            font-weight: bold;
            text-decoration: none;
            padding: 10px 20px;
            transition: background-color 0.3s ease;
        }

        nav a:hover {
            background-color: #4caf50;
        }

        nav a.active {
            background-color: #4caf50;
            color: #fff;
        }

        #cart-icon {
            position: relative;
        }

        #cart-icon i {
            font-size: 1.5rem;
        }

        #cart-icon .count {
            position: absolute;
            top: -10px;
            right: -10px;
            background-color: #ff6f00;
            color: #fff;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            font-size: 0.8rem;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-btn {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 20px;
            border-radius: 4px;
            margin-left: auto;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: background-color 0.3s ease;
        }

        .login-btn:hover {
            background-color: #3e8e41;
        }

        .login-signup {
            background-color: #fff;
            margin-right: 5px;
            margin-left: 5px;
        }

        .login-signup a {
            color: #333;

        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <header>
        <nav>
            <a href="/dashboard" >Home</a>
            <a href="#">About</a>
            <a href="#">Contact</a>

            @if (session()->has('loginId'))
                <a href="/cart" id="cart-icon"><img src="/images/cart.png" alt="Cart Icon" class="cart-img "><span
                        class="count">{{ $total_cart_item }}</span></a>
            @else
                <a href="/cart" id="cart-icon"><img src="/images/cart.png" alt="Cart Icon" class="cart-img "><span
                        class="count">0</span></a>
            @endif

            @if (session()->has('loginId'))
                <a href="logout" class="login-btn">LogOut</a>
            @else
                <a href="/login" class="login-btn">Login</a>
                <a href="/registration" class="login-signup">Sign Up</a>
            @endif
        </nav>
    </header>
</body>

</html>
