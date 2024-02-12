<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-Login</title>
    <!-- <link rel="stylesheet" href="style2.css"> -->
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet" />

</head>

<body class="main-body-login">
    <main>
        <div class="row-login">

            <div class="colm-form">

                <div class="form-container">
                    <div> <h1>Login Admin</h1></div>&nbsp;
                    @if (count($errors) > 0)
                    <div  class = "alert alert-danger">
                        <ul>
                        @foreach ($errors->all() as $error)
                             <li id="mydiv" style="color:red;">{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                    @endif
                    @if (session('error'))
    <div class="alert alert-danger">
            <ul>
                <li style="color:red;"> {{ session('error') }}</li>
            </ul>

    </div>
      @endif
      &nbsp;&nbsp;&nbsp;
                    <form action="{{route('loginAdmin')}}" method="POST">
                        @csrf
                    <input type="text" name="email" class="input-login" placeholder="Email address" autocomplete="off">
                    <input type="password" name="password" class="input-login" placeholder="Password">
                    <input type="submit" class="btn-login" value="login" >
                    <a class="back-btn" href="{{url('/')}}">Back</a>
                    </form>
                    <!-- <button class="btn-new">Create new Account</button> -->
                </div>

            </div>
        </div>
    </main>

</body>
</html>
