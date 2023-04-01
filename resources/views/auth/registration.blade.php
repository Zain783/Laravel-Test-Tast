<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous" />
    <link rel="stylesheet" href="/css/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <style>
        .profile-image {
            position: relative;
            width: 150px;
            height: 150px;
            overflow: hidden;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            margin: auto;
        }

        .profile-image label {
            display: block;
            width: 100%;
            height: 100%;
            cursor: pointer;

        }

        .profile-image #profile-image-preview {
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            border-radius: 50%;
        }

        .profile-image input[type="file"] {
            position: absolute;
            top: 0;
            left: 0;
            opacity: 0;
            width: 100%;
            height: 100%;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-4 mx-auto my-5">
                <div class="card border-0 shadow">
                    <div class="card-header bg-white text-center py-4">
                        <h4>Registration</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ url('/register') }}">

                            @if (Session::has('success'))
                                <div class="alert alert-success">{{ Session::get('success') }}</div>
                            @endif
                            @if (Session::has('fail'))
                                <div class="alert alert-success">{{ Session::get('fail') }}</div>
                            @endif
                            @csrf
                            <div style="margin: auto;display:flex;justify-content:center;">Select Image</div>
                            <div class="profile-image">
                                <input type="file" id="profile-image-upload" name="profile-image-upload"
                                    onchange="previewImage()">
                                <label for="profile-image-upload">
                                    <div class="plus-icon">
                                        <i class="fas fa-plus"></i>
                                    </div>
                                    <div id="profile-image-preview"
                                        style="background-image: url('images/profile_holder.jpg')"></div>
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Full Name</label>
                                <input type="text" class="form-control" placeholder="Enter Full Name" name="name"
                                    value="{{ old('name') }}" />
                                <span class="text-danger">
                                    @error('name')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" placeholder="Enter Full Email" name="email"
                                    value="{{ old('email') }}" />
                                <span class="text-danger">
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" placeholder="Enter Full Password"
                                    name="password" value="{{ old('password') }}" />
                                <span class="text-danger">
                                    @error('password')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary w-100" type="submit">
                                    Add Registration
                                </button>
                            </div>
                        </form>
                        <div class="text-center">
                            <a href="login">Already Registered !! Login Here.</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function previewImage() {
            var preview = document.querySelector('#profile-image-preview');
            var file = document.querySelector('#profile-image-upload').files[0];
            var reader = new FileReader();

            reader.onloadend = function() {
                preview.style.backgroundImage = 'url(' + reader.result + ')';
            }

            if (file) {
                reader.readAsDataURL(file);
            } else {
                preview.style.backgroundImage = 'url(default-profile-image.png)';
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous">
    </script>
</body>

</html>
