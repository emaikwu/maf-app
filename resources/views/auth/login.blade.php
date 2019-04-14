<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="{{asset('imgs/icon.png')}}">
  <title>Login - Mafete n Gifts</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset("css/adminlte.min.css")}}">
  <!-- iCheck -->
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <style>
    .login-page {
        background: #fff;
    }
    .login-box, .register-box {
        padding: 15px;
        background: #ccc;
        border-radius: 10px;
    }
    .login-logo a {
        color: #fff;
        display: block;
    }
    .login-logo img {
        vertical-align: middle;
        border-style: none;
        height: 60px;
    }
    .login-page .card {
        margin-bottom: 0!important;
    }
    .login-page .card p {
        margin: 15px 0 0;
        padding: 0 20px
    }
    .error {
        color: crimson;
    }
  </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="/"><img src="/imgs/logo.png" alt="">&nbsp; Login</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <p class="error">{{$errors->first("email")}}</p>
    <div class="card-body login-card-body">
        <label for="email">Email </label>
      <form action="/login" method="post">
        @csrf
        <div class="form-group has-feedback">
          <input type="email" autofocus name="email" class="form-control" value={{old("email")}}>
          <span class="fa fa-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <label for="password">Password <span class="error">{{$errors->first("password")}}</span></label>
          <input type="password" name="password" class="form-control">
          <span class="fa fa-lock form-control-feedback"></span>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="checkbox icheck">
              <label>
                <input type="checkbox" name="remember_token" value="Yes"> Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
          </div>
          <!-- /.col -->
        </div>
      <p class="mb-1">
        <a href="#">I forgot my password</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
</body>
</html>
