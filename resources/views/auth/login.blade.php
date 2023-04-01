<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
     <link rel="stylesheet" href="{{ asset('css/style.css', true) }}">
<style>
    /* Custom styles for login form */
.container {
    margin-top: 50px;
  }
  .col-md-4 {
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.3);
    padding: 30px;
  }
  h4 {
    text-align: center;
  }
  hr {
    border-top: 1px solid #ccc;
    margin-top: 20px;
    margin-bottom: 20px;
  }
  form {
    display: flex;
    flex-direction: column;
  }
  .form-group {
    margin-bottom: 20px;
  }
  label {
    font-weight: bold;
    margin-bottom: 5px;
  }
  input[type="email"], input[type="password"] {
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 10px;
    width: 100%;
    font-size: 16px;
  }
  .text-danger {
    color: red;
  }
  button[type="submit"] {
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    padding: 10px;
    font-size: 16px;
    cursor: pointer;
  }
  button[type="submit"]:hover {
    background-color: #0069d9;
  }
  
</style>
</head>

<body>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-4 col-md-offset-4" style="margin-top:20px">
                <h4>Login Here</ h4>

                    <hr>
                    <form action="{{ url('login-user') }}" method="POST">
                        @if (Session::has('success'))
                            <div class="alert alert-success">{{ Session::get('success') }}</div>
                        @endif
                        @if (Session::has('fail'))
                            <div class="alert alert-success">{{ Session::get('fail') }}</div>
                        @endif
                        @csrf
                        <div class="form-group">
                            <label for="Email">Email</label>
                            <input type="email" class="form-control" placeholder="Enter Full Email" name="email"
                                value="{{ old('email') }}">
                        </div>
                        <div class="form-group">
                            <label for="name">Password</label>
                            <input type="password" class="form-control" placeholder="Enter Full Password"
                                name="password" value="{{ old('password') }}">
                            <span class="text-denger">
                                @error('password')
                                    {{ $message }}
                                @enderror
                            </span>

                        </div><br>
                        <div class="form-group">
                            <button class="btn btn-block btn-primary" type="sub
                        ">Login</button>

                        </div>


                    </form>

            </div>
        </div>
    </div>
</body>
</html>
