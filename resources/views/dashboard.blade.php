<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Book Dashboard</title>
    <style>
        /* Global Styles */

        /* Center Content */
        main {
            text-align: center;
        }



        /* Cart Styles */
        section#cart {
            margin-bottom: 40px;
        }

        section#cart h2 {
            margin-bottom: 20px;
            font-size: 32px;
            font-weight: 600;
        }

        #cart {
            margin: 40px 0;
            padding: 40px 0;
            background-color: #f8f8f8;
        }

        .cart-item {
            margin-bottom: 20px;
            border-bottom: 1px solid #ccc;
            padding-bottom: 20px;
        }

        .cart-item:last-child {
            border-bottom: none;
        }

        .cart-item img {
            width: 100px;
            height: auto;
        }

        .cart-item .item-details {
            margin-left: 20px;
        }

        .cart-item .item-name {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .cart-item .item-description {
            font-size: 16px;
            margin-bottom: 10px;
        }

        .cart-item .item-price {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .cart-item .quantity {
            margin-top: 10px;
            font-size: 16px;
        }

        .cart-item .quantity input {
            padding: 10px;
            border-radius: 4px;
            border: 1px solid #ccc;
            margin-right: 10px;
            width: 60px;
            font-size: 16px;
        }

        .cart-item .remove-item {
            color: #dc3545;
            font-size: 16px;
            text-decoration: none;
            margin-left: 20px;
        }

        .cart-totals {
            margin-top: 20px;
        }

        .cart-totals h3 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .cart-totals .total-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            font-size: 18px;
        }

        .cart-totals .total-row:last-child {
            margin-top: 10px;
            border-top: 1px solid #ccc;
            padding-top: 10px;
        }

        .cart-totals .total-row .label {
            font-weight: bold;
        }

        .cart-totals .total-row .value {
            font-weight: bold;
        }

        .cart-buttons {
            margin-top: 20px;
        }

        .cart-buttons .btn {
            margin-right: 10px;
        }

        .cart-buttons .btn:last-child {
            margin-right: 0;
        }


        .btn-rate,
        .btn-add-to-cart {
            background-color: #008CBA;
            /* Set the background color */
            color: white;
            /* Set the text color */
            padding: 10px 20px;
            /* Add some padding to the button */
            border: none;
            /* Remove the border */
            border-radius: 5px;
            /* Add rounded corners */
            cursor: pointer;
            /* Add a pointer cursor on hover */
            transition: background-color 0.3s ease;
            /* Add a smooth transition */
        }

        .btn-rate:hover,
        .btn-add-to-cart:hover {
            background-color: #005F6B;
            /* Change the background color on hover */
        }

        .btn-add-to-cart {
            margin-left: 10px;
            /* Add some margin to the button */
        }

        .btn-like {
            display: inline-block;
            background-color: #fff;
            color: #444;
            border: 2px solid #444;
            padding: 8px 16px;
            font-size: 14px;
            font-weight: bold;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-like:hover,
        .btn-like:focus {
            background-color: #444;
            color: #fff;
        }

        .btn-like:active {
            transform: translateY(2px);
        }

        .cart-img {
            height: 4vh;
        }



        .star-rating {
            display: flex;
            flex-direction: row-reverse;
            font-size: 1.5rem;
            color: #d3d3d3;
            vertical-align: middle;

        }

        .star-rating input {
            display: none;
        }

        .star-rating {
            display: inline-block;
        }

        .star-rating input[type="radio"] {
            display: none;
        }

        .star-rating label {
            font-size: 30px;
            color: #ddd;
            cursor: pointer;
            display: inline-block;
            width: 35px;
            height: 35px;
            margin: 0;
            padding: 0;
            text-align: center;
            line-height: 35px;
        }

        .star-rating label:hover,
        .star-rating label:hover~label,
        .star-rating input[type="radio"]:checked~label {
            color: #ffca08;
        }

        .star-rating .fa {
            font-size: 20px;
        }

        /*  */
        .book {
            display: flex;
            flex-direction: column;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 34vw;
            padding: 50px;
            margin: 20px;

        }

        .book img {
            width: 100%;
            height: auto;
            object-fit: cover;
        }

        .book-info {
            padding: 10px;
            text-align: left;
        }

        .book-info h3 {
            font-size: 20px;
            margin: 10px 0;
        }

        .book-info p {
            font-size: 14px;
            margin: 5px 0;
        }

        .actions {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px;
        }

        .star-rating input[type="radio"] {
            display: none;
        }

        .star-rating label {
            color: #ddd;
            font-size: 24px;
            cursor: pointer;
            transition: all 0.2s;
        }

        .star-rating input[type="radio"]:checked~label {
            color: #ffcc00;
        }

        .btn-like,
        .btn-add-to-cart {
            padding: 8px 12px;
            border: none;
            border-radius: 3px;
            font-size: 14px;
            cursor: pointer;
        }

        .btn-like {
            background-color: #f5f5f5;
            color: #999;
            margin-right: 10px;
        }

        .btn-like:hover {
            background-color: #eee;
        }

        .btn-add-to-cart {
            background-color: #007bff;
            color: #fff;
        }

        .btn-add-to-cart:hover {
            background-color: #0069d9;
        }

        main {

            display: flex;
            justify-content: center;

        }

        .banner {
            background-image: url('images/baner.jpg');
            background-size: cover;
            background-position: center;
            height: 500px;
            display: flex;
            align-items: center;
        }

        .banner-text {
            color: #3e8e41;
            text-align: center;
            margin: 0 auto;
        }

        .banner-text h1 {
            font-size: 4rem;
            margin-bottom: 1rem;
        }

        .banner-text p {
            font-size: 1.5rem;
            margin-bottom: 2rem;
        }

        button {
            background-color: #fff;
            color: #000;
            font-size: 1.5rem;
            padding: 0.8rem 2rem;
            border-radius: 50px;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
        }

        button:hover {
            background-color: #3e8e41;
            color: #fff;
        }

        /* Style for grid view */
        .container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            grid-gap: 1rem;
        }

        .card {
            border: none;
            box-shadow: 0 0.25rem 0.5rem rgba(0, 0, 0, 0.15);
            border-radius: 0.25rem;
            overflow: hidden;
        }

        .card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .card-body {
            padding: 1rem;
        }

        .card-title {
            font-size: 1.25rem;
            margin-bottom: 0.5rem;
        }

        .card-text {
            font-size: 1rem;
            margin-bottom: 1rem;
        }

        .btn-cart {
            display: block;
            width: 100%;
            padding: 0.5rem 1rem;
            font-size: 1rem;
            text-align: center;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 0;
            outline: none;
            transition: background-color 0.2s;
        }

        .btn-cart:hover {
            background-color: #0069d9;
        }

        .quantity-container {
            display: flex;
            align-items: center;
            margin-top: 1rem;
        }

        .quantity-label {
            font-size: 1rem;
            margin-right: 1rem;
        }

        .quantity-input {
            width: 4rem;
            height: 2rem;
            padding: 0.25rem;
            font-size: 1rem;
            text-align: center;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            outline: none;
        }

        .star-rating {
            display: flex;
            align-items: center;
            margin-top: 1rem;
        }

        .star-rating input {
            display: none;
        }

        .star-rating label {
            cursor: pointer;
            font-size: 1.5rem;
            margin-right: 0.5rem;
            color: #e5e5e5;
            transition: color 0.2s;
        }

        .star-rating label:hover,
        .star-rating label:hover~label,
        .star-rating input:checked~label {
            color: #ffd700;
        }

        .like-btn {
            display: block;
            width: 100%;
            padding: 0.5rem 1rem;
            font-size: 1rem;
            text-align: center;
            background-color: #fff;
            color: #007bff;
            border: 1px solid #007bff;
            border-radius: 0;
            outline: none;
            transition: background-color 0.2s, color 0.2s;
            cursor: pointer;
        }

        .like-btn:hover {
            background-color: #007bff;
            color: #fff;
        }

        .like-btn.liked {
            background-color: #007bff;
            color: #fff;
        }

        .like-btn.liked:hover {
            background-color: #0069d9;
        }
    </style>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

</head>

<body>
    @include('header')
    <section>

        <div class="banner">
            <div class="banner-text">
                <h1>Welcome to our Bookstore!</h1>
                <p>Discover new worlds with our vast collection of books</p>
                <button>Shop Now</button>
            </div>
        </div>
    </section>
    <main>
        <div class="container">
            <div class="row">
                @foreach ($all_books as $book)
                    <div class="col-md-4">

                        <div class="card" style="margin-top: 40px;">
                            <img src="books/{{ $book->image }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <div class="book-info">
                                    <h3>Book Tile:{{ $book->name }}</h3>
                                    <p>Author Name:{{ $book->author }}</p>
                                    <p>Price: ${{ $book->price }}</p>
                                    <div class="actions">
                                        <form method="POST" action="{{ url('addratings', $book->id) }}">
                                            @csrf
                                            <div class="star-rating">
                                                <input id="star-{{ $book->id }}-5" type="radio" name="rating"
                                                    value="5" />
                                                <label for="star-{{ $book->id }}-5" title="5 stars">
                                                    <i class="active fa fa-star" aria-hidden="true"></i>
                                                </label>
                                                <input id="star-{{ $book->id }}-4" type="radio" name="rating"
                                                    value="4" />
                                                <label for="star-{{ $book->id }}-4" title="4 stars">
                                                    <i class="active fa fa-star" aria-hidden="true"></i>
                                                </label>
                                                <input id="star-{{ $book->id }}-3" type="radio" name="rating"
                                                    value="3" />
                                                <label for="star-{{ $book->id }}-3" title="3 stars">
                                                    <i class="active fa fa-star" aria-hidden="true"></i>
                                                </label>
                                                <input id="star-{{ $book->id }}-2" type="radio" name="rating"
                                                    value="2" />
                                                <label for="star-{{ $book->id }}-2" title="2 stars">
                                                    <i class="active fa fa-star" aria-hidden="true"></i>
                                                </label>
                                                <input id="star-{{ $book->id }}-1" type="radio" name="rating"
                                                    value="1" />
                                                <label for="star-{{ $book->id }}-1" title="1 star">
                                                    <i class="active fa fa-star" aria-hidden="true"></i>
                                                </label>
                                            </div>

                                            <button type="submit"
                                                style="border-radius: 12px;height:45px;display:block;">Submit</button>
                                        </form>
                                    </div>
                                    @php
                                        $likecounter = 1;
                                        $found = false;
                                    @endphp

                                    @foreach ($likes as $like)
                                        @if ($like->book_id == $book->id)
                                            @php($found = true)
                                            <a class="btn-like btn-danger"
                                                href="{{ Url('/like_book', $book->id) }}">Like {{ count($likes) }}</a>
                                        @endif
                                        @php($likecounter++)
                                    @endforeach
                                    @if ($found == false)
                                        <a class="btn-like btn-success" href="{{ Url('/like_book', $book->id) }}">Like
                                            {{ count($likes) }}</a>
                                    @endif
                                </div>
                                <form action="{{ url('addtocart', $book->id) }}" method="POST">
                                    @csrf
                                    <input type="number" id="quantity" class="form-control quantity-input"
                                        name="quantity" min="1" max="{{ $book->quantity }}" required
                                        placeholder="0">
                                    <input type="submit" value="Add To Cart"
                                        class="btn btn-success"style="margin-top:10px;" placeholder="Add to Cart">

                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        </div>
    </main>
    <script>
        const labels = document.querySelectorAll('.star-rating label');

        labels.forEach(label => {
            label.addEventListener('click', () => {
                labels.forEach(label => {
                    label.classList.remove('active');
                });
                label.classList.add('active');
            });
        });
        // Smooth scrolling to the shop section when the button is clicked
        const shopButton = document.querySelector('button');
        const shopSection = document.querySelector('#shop');

        shopButton.addEventListener('click', () => {
            shopSection.scrollIntoView({
                behavior: 'smooth'
            });
        });

        const buyBtns = document.querySelectorAll('.btn-primary');

        buyBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                window.open('https://example.com', '_blank');
            });
        });
        // Add click event listener to all like buttons
        const likeButtons = document.querySelectorAll('.like-btn');
        likeButtons.forEach(btn => {
            btn.addEventListener('click', () => {
                btn.classList.toggle('liked');
            });
        });

        // Add input event listener to all quantity inputs
        const quantityInputs = document.querySelectorAll('.quantity-input');
        const quantityInputs = document.querySelectorAll('.quantity-input');

        quantityInputs.forEach(input => {
            input.addEventListener('input', () => {
                // Get the parent element (the div that contains the quantity input and add to cart button)
                const parent = input.parentElement;

                // Get the add to cart button
                const addToCartButton = parent.querySelector('.add-to-cart-button');

                // Get the quantity value
                const quantity = parseInt(input.value);

                // Disable the add to cart button if quantity is 0 or NaN
                if (quantity <= 0 || isNaN(quantity)) {
                    addToCartButton.disabled = true;
                } else {
                    addToCartButton.disabled = false;
                }
            });
        });
    </script>
</body>

</html>
