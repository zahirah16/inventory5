<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>

<style>

    body {
        background-color: #526D82;
    }
    .register {
        font-size: 40px;
        color: #27374D;
        text-align: center;
    }
    .main {
        height: 100vh;
        box-sizing: border-box;
    }
    .register-box {
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
        @if ($errors->any())
        <div class="alert alert-danger" style="width: 300px">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('massage') }}
        </div>
        @endif
        <div class="register-box">
            <form action="" method="post">
                @csrf
                <div class="register align-items-center" >
                    Register
                </div>
                <div>
                    <label for="username" class="form-label">username</label>
                    <input type="text" name="username" id="username" class="form-control" requaired>
                </div>
                <div>
                    <label for="nis" class="form-label">nis</label>
                    <input type="text" name="nis" id="nis" class="form-control" requaired>
                </div>
                <div>
                    <label for="kelas" class="form-label">kelas</label>
                    <input type="text" name="kelas" id="kelas" class="form-control" requaired>
                </div>
                <div>
                    <label for="password" class="form-label">password</label>
                    <input type="password" name="password" id="password" class="form-control" requaired>
                </div>
                <div>
                    <button type= "submit" class="btn btn-primary form-control">Register</button>
                </div>
                <div class="text-center">
                    Already have an Account? <a href="login">Login</a>
                </div>
            </form>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>
</html>