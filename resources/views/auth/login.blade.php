<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous" />
    <link href="{{ asset('/css/login.css') }}" rel="stylesheet" />
</head>
<body class="body my-5 py-5">
    @if (session('msg'))
    <div class="alert alert-danger">
        {{ session('msg') }}
    </div>
@endif

    <div class="container d-flex align-items-center justify-content-center">
        <div class="ring">
            <i style="--clr:#00ff0a"></i>
            <i style="--clr:#ff0057"></i>
            <i style="--clr:#fffd44"></i>
            <form class="login" action="{{ route('auth.login') }}" method="POST">
                @csrf
                <h2>Login</h2>
                <div class="inputBx position-relative">
                    <input type="email" placeholder="User Name" name="Email" required/>
                </div>
                <div class="inputBx position-relative">
                    <input type="password" placeholder="Password" name="Password" required/>
                </div>
                <div class="inputBx position-relative">
                    <input type="submit" defaultValue="Sign in" value="Sign in"/>
                </div>
                <div class="links">
                    <a href="/#">Forget Password</a>
                    <a href="/register">Sign Up</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>