<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .add-book-form {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            margin-bottom: 10px;
        }

        .form-group label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-group input[type="text"],
        .form-group input[type="number"],
        .form-group input[type="file"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
        }

        button[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        button[type="submit"]:hover {
            background-color: #0062cc;
        }

        select.text_color {
            color: #333;
            /* Change the text color */
            font-size: 16px;
            /* Change the font size */
            padding: 10px;
            /* Add some padding */
            border-radius: 4px;
            /* Round the corners */
            border: 1px solid #ccc;
            /* Add a border */
            background-color: #fff;
            /* Set the background color */
        }

        select.text_color option:first-child {
            color: #999;
            /* Change the color of the first option */
        }

        select.text_color option:not(:first-child):hover {
            background-color: #f2f2f2;
            /* Change the background color of the other options on hover */
        }
    </style>
</head>

<body>
    @include('admin.header')
    @if (session()->has('message'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert"
                aria-hidden="true">x</button>{{ session()->get('message') }}
        </div>
    @endif
    <form class="add-book-form" action="{{ url('addBookinTable') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="book-name">Book Name:</label>
            <input type="text" id="book-name" name="title" required>
        </div>

        <div class="form-group">
            <label for="author">Author:</label>
            <input type="text" id="author" name="author" required>
            <select name="catagory" class="text_color" required="">
                <option value="">Add Author here</option>
                @foreach ($authors as $author)
                    <option value="{{ $author->name }}">{{ $author->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="price">Price:</label>
            <input type="number" id="price" name="price" min="0" step=".01" required>
        </div>

        <div class="form-group">
            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity" min="0" required>
        </div>

        <div class="form-group">
            <label for="image">Book Image:</label>
            <input type="file" id="image" name="image" accept="image/*" required>
        </div>
        <button type="submit">Add Book</button>
    </form>

</body>

</html>
