<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .btn-purple {
            background-color: #7400a1;
            color: white
        }

        .btn-purple:hover {
            background-color: #5c007b;
            color: white
        }
    </style>
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card" style="width: 25rem;">
            <div class="card-body">
                <h2 class="text-center">Register</h2>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <!-- Name -->
                    <div class="mb-3 mt-3">
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter name"
                            name="name">
                        <ul class="list-unstyled text-danger">
                            @foreach($errors->get('name') as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Email -->
                    <div class="mb-3 mt-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter email"
                            name="email">
                        <ul class="list-unstyled text-danger">
                            @foreach($errors->get('email') as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Password:</label>
                        <input type="password" class="form-control" id="password" placeholder="Enter password"
                            name="password">
                        <ul class="list-unstyled text-danger">
                            @foreach($errors->get('password') as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Confirm Password -->
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirm Password:</label>
                        <input type="password" class="form-control" id="password_confirmation" placeholder="Enter password"
                            name="password_confirmation">
                        <ul class="list-unstyled text-danger">
                            @foreach($errors->get('password_confirmation') as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- login -->
                    <div class="mb-3 d-flex justify-content-end">
                        <a class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover" href="{{ route('login') }}">Already have an account?</a>
                    </div>
                    <button type="submit" class="btn btn-purple w-100">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
