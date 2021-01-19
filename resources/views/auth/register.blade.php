<!doctype html>
<html lang="en" dir="ltr">

<!-- Mirrored from nsdbytes.com/template/soccer/project/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 17 Jan 2021 09:40:38 GMT -->
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="icon" href="favicon.ico" type="image/x-icon" />
<title>Bantu Khaya Group:: Register</title>

<link rel="stylesheet" href="/assets/plugins/bootstrap/css/bootstrap.min.css" />

<link rel="stylesheet" href="/assets/css/main.css" />
<link rel="stylesheet" href="/assets/css/theme1.css" />
</head>
<body class="font-montserrat">
<div class="auth">
<div class="auth_left">
<div class="card">
<div class="text-center mb-5">
<a class="header-brand" href="index-2.html"><i class="fa fa-soccer-ball-o brand-logo"></i></a>
</div>
<form method="POST" action="{{ route('register') }}">
    @csrf
<div class="card-body">
<div class="card-title">Create new account</div>
<div class="form-group">
<label class="form-label">Name</label>
<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
@error('name')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror</div>
<div class="form-group">
<label class="form-label">Email address</label> <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
@error('email')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
</div>
<div class="form-group">
<label class="form-label">Password</label>  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
@error('password')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
</div>
<div class="form-group">
<label class="custom-control custom-checkbox">
<input type="checkbox" class="custom-control-input" />
<span class="custom-control-label">Agree the <a href="#">terms and policy</a></span>
</label>
</div>
<div class="form-footer">
<button type="submit" class="btn btn-primary btn-block">Create new account</button>
</div>
</div>
</form>
<div class="text-center text-muted">
Already have account? <a href="{{route('login')}}">Sign in</a>
</div>
</div>
</div>
<div class="auth_right full_img"></div>
</div>
<script src="/assets/bundles/lib.vendor.bundle.js" type="6b065bf477c7336f1ffad310-text/javascript"></script>
<script src="/assets/js/core.js" type="6b065bf477c7336f1ffad310-text/javascript"></script>
<script src="/ajax.cloudflare.com/cdn-cgi/scripts/7089c43e/cloudflare-static/rocket-loader.min.js" data-cf-settings="6b065bf477c7336f1ffad310-|49" defer=""></script></body>

</html>
