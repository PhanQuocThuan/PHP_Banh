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
    <div class="container d-flex align-items-center justify-content-center">
        <div class="ring">
            <i style="--clr:#00ff0a"></i>
            <i style="--clr:#ff0057"></i>
            <i style="--clr:#fffd44"></i>
            <form class="login" action="{{ route('auth.register') }}" method="POST">
                @csrf
                <h2>Register</h2>
                <div class="inputBx position-relative">
                    <input type="text" placeholder="Name" name="Name" required/>
                </div>
                <div class="inputBx position-relative">
                    <input type="email" placeholder="User Name" name="Email"/>
                </div>
                <div class="inputBx position-relative">
                    <input type="password" placeholder="Password" name="Password"/>
                </div>
                <div class="inputBx position-relative">
                    <input type="password" placeholder="Confirm Password" name="ConfirmPassword"/>
                </div>
                <div class="inputBx position-relative">
                    <input type="submit" defaultValue="Sign up" value="Sign up"/>
                </div>
                <div class="links">
                    <a href="/#">Forget Password</a>
                    <a href="/login">Login</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>