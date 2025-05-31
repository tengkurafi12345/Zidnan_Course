<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
                @session('status')
                <div class="alert alert-danger" role="alert">
                    {{ session('status') }}
                  </div>
                @endsession
                <h2 class="text-center">Login Form</h2>
                <form method="POST" action="{{ route('guardian.login') }}">
                    @csrf
                    <div class="mb-3 mt-3">
                        <label for="phone" class="form-label">Nomor Telepon:</label>
                        <input type="number" class="form-control" id="phone" placeholder="Enter phone number"
                            name="phone">
                        <ul class="list-unstyled text-danger">
                            @foreach($errors->get('phone') as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="mb-3">
                        <label for="pwd" class="form-label">Password:</label>
                        <input type="password" class="form-control" id="pwd" placeholder="Enter password"
                            name="password">
                        <ul class="list-unstyled text-danger">
                            @foreach($errors->get('password') as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="form-check mb-3 d-flex justify-content-between">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" id="remember_me" name="remember"> Remember
                            me
                        </label>
                        @if (Route::has('password.request'))
                            <a class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover" href="{{ route('password.request') }}">Forgot Password</a>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-purple w-100">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
