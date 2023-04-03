<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            font-size: 16px;
            line-height: 1.5;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        ul {
            list-style: none;
        }

        header,
        nav,
        main,
        footer {
            display: block;
        }

        /* Header styles */

        header {
            background-color: #222D3D;
            color: #fff;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem;
        }

        .logo a {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .search-bar {
            display: flex;
        }

        .search-bar input[type="text"] {
            padding: 0.5rem;
            border: none;
            border-radius: 0.25rem;
            margin-right: 0.5rem;
        }

        .search-bar button {
            background-color: #fff;
            border: none;
            border-radius: 0.25rem;
            padding: 0.5rem;
            cursor: pointer;
        }

        .search-bar button i {
            color: #333;
        }

        .user-profile {
            display: flex;
            align-items: center;
            cursor: pointer;
        }

        .user-profile img {
            border-radius: 50%;
            margin-right: 0.5rem;
        }

        .user-profile span {
            font-weight: bold;
            margin-right: 0.5rem;
        }

        .user-profile i {
            margin-left: 0.5rem;
        }

        .dropdown-menu {
            display: none;
            position: absolute;
            top: 3rem;
            right: 1rem;
            background-color: #fff;
            padding: 0.5rem;
            border: 1px solid #ccc;
            border-radius: 0.25rem;
        }

        .dropdown-menu li {
            margin: 0.25rem 0;
        }

        .dropdown-menu li a {
            color: #333;
            display: block;
            padding: 0.25rem;
        }

        .dropdown-menu li a:hover {
            background-color: #ccc;
        }

        .user-profile:hover .dropdown-menu {
            display: block;
        }

        /* Navigation styles */

        nav {
            background-color: #F5371D;
            color: #fff;
        }

        nav ul {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem;
        }

        nav li {
            margin-right: 1rem;
        }

        nav a {
            color: #fff;
            display: flex;
            align-items: center;
        }

        nav a.active {
            font-weight: bold;
        }

        nav a i {
            margin-right: 0.5rem;
        }
    </style>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
</head>

<body>
    <header>
        <div class="logo">
            <a href="#">Book Selling Website</a>
        </div>
        <div class="search-bar">
            <input type="text" placeholder="Search books...">
            <button><i class="fas fa-search"></i></button>
        </div>
        <div class="user-profile">
            <img height="100px"
                src="https://png.pngtree.com/png-vector/20191101/ourmid/pngtree-cartoon-color-simple-male-avatar-png-image_1934459.jpg"
                alt="Profile picture">
            <span>{{ $loginuser }}</span>
            <i class="fas fa-angle-down"></i>
            <ul class="dropdown-menu">
                {{-- <li><a href="#">Profile</a></li>
                <li><a href="#">Settings</a></li> --}}
                <li><a href="/logout">Logout</a></li>
            </ul>
        </div>
    </header>
    <nav>
        <ul>
            <li><a href="/admindashboard" class="active"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
            <li><a href="/OrdersView"><i class="fas fa-shopping-cart"></i> Orders</a></li>
            <li><a href="/showbooks"><i class="fas fa-book"></i>Books</a></li>
            <li><a href="/addbook"><i class="fas fa-book"></i> Add Book</a></li>
            <li><a href="/users"><i class="fas fa-user"></i> Users</a></li>
            <li><a href="/addauthor"><i class="fa-light fa-plus"></i>Add Author</a></li>
            <li><a href="/showreviews"><i class="fas fa-comments"></i> Reviews</a></li>
            <li><a href="/showlikes"><i class="fas fa-thumbs-up"></i> Likes</a></li>
        </ul>
    </nav>
</body>

</html>
