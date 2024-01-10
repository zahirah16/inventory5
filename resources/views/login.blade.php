
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<style>

    body {
        background-color: #27374D;
    }
    .login {
        font-size: 40px;
        color: #27374D;
        text-align: center;
    }
    .main {
        height: 100vh;
        box-sizing: border-box;
    }
    .login-box {
        background-color: #DDE6ED;
        width:500px;
        border:solid 1px;
        padding:30px;
        border-radius:15px;

    }
    form div {
        margin-bottom: 15px;
    }
</style>

<body>

    <div class="main d-flex flex-column justify-content-center align-items-center">
        @if (session('status'))
        <div class="alert alert-danger">
            {{ session('massage') }}
        </div>
        @endif
        <div class="login-box">
            <form action="" method="post">
                @csrf
                <div class="login align-items-center" >
                    Login
                </div>
                <div>
                    <label for="username" class="form-label">username</label>
                    <input type="text" name="username" id="username" class="form-control" requaired>
                </div>
                <div>
                    <label for="password" class="form-label">password</label>
                    <input type="password" name="password" id="password" class="form-control" requaired>
                </div>
                <div>
                    <button type= "submit" class="btn btn-primary form-control">Login</button>
                </div>
                <div class="text-center">
                    Don't have an Account? <a href="register">Register</a>
                </div>
            </form>
        </div>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>
</html>
