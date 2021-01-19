<!doctype html>
<html lang="en" dir="ltr">

<!-- Mirrored from nsdbytes.com/template/soccer/project/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 17 Jan 2021 09:40:38 GMT -->
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="icon" href="favicon.ico" type="image/x-icon" />
<title>Bantu Khaya Group:: Login</title>

<link rel="stylesheet" href="/assets/plugins/bootstrap/css/bootstrap.min.css" />

<link rel="stylesheet" href="/assets/css/main.css" />
<link rel="stylesheet" href="/assets/css/theme1.css" />
</head>
<body class="font-montserrat">
<div class="auth">
<div class="auth_left">

<div class="card">
<div class="text-center mb-2">
<a class="header-brand" href="index-2.html"><i class="fa fa-soccer-ball-o brand-logo"></i></a>
</div>
<form method="POST" action="{{ route('login') }}">
    @csrf
<div class="card-body">
<div class="card-title">Login to your account</div>
<div class="form-group">
<select class="custom-select">
<option>Project Manager</option>
<option>Team Leader</option>
<option>Employee</option>
</select>
</div>

<div class="form-group">
    <input id="email" type="email" class="form-control form-control-rounded @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">

    @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror</div>
<div class="form-group">
<label class="form-label">Password<a href="forgot-password.html" class="float-right small">I forgot password</a></label>
<input id="password" type="password" class="form-control form-control-rounded @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

@error('password')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror</div>
<div class="form-group">
<label class="custom-control custom-checkbox">
<input type="checkbox" class="custom-control-input" />
<span class="custom-control-label">Remember me</span>
</label>
</div>
<div class="form-footer">
<button type="submit" class="btn btn-primary btn-block" title="">Sign in</a>
</div>
</div>
</form>
<div class="text-center text-muted">
Don't have account yet? <a href="{{route('register')}}">Sign up</a>
</div>
</div>
</div>
<div class="auth_right full_img"></div>
</div>
<script src="/assets/bundles/lib.vendor.bundle.js" type="98cb2039ec224b8be87b0da1-text/javascript"></script>
<script src="/assets/js/core.js" type="98cb2039ec224b8be87b0da1-text/javascript"></script>
<script src="/ajax.cloudflare.com/cdn-cgi/scripts/7089c43e/cloudflare-static/rocket-loader.min.js" data-cf-settings="98cb2039ec224b8be87b0da1-|49" defer=""></script></body>

<!-- Mirrored from nsdbytes.com/template/soccer/project/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 17 Jan 2021 09:40:38 GMT -->
</html>
