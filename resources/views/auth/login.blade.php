<!DOCTYPE html>
<head>
  <title>{{ __('HoneyLuxe Admin Login') }}</title>
  <!-- bootstrap-css -->
  <link rel="stylesheet" href="{{asset('public/css/bootstrap.min.css')}}" >
  <!-- //bootstrap-css -->
  <!-- Custom CSS -->
  <link href="{{asset('public/css/style.css')}}" rel='stylesheet' type='text/css' />
  <!-- Custom CSS -->
  
</head>
<body style="background-image: url('./public/bg.jpg'); background-size: cover;background-repeat: no-repeat;background-attachment: fixed;">

    <div class="w3layouts-main">
      <h2><img src="{{asset('public/honeylogo.gif')}}" style="width: 50%;"><br>{{ __('Honeluxe Admin') }}</h2>
      
<form method="POST" action="{{ route('login') }}">
          @csrf
          <input id="email" type="email" class="ggg{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"placeholder="Email ID" required="">
          @if ($errors->has('email'))
          <div class="alert alert-danger" role="alert">
            <strong>{{ __('Oh snap!') }}</strong> {{ $errors->first('email') }}
          </div>
          
          @endif
          <input id="password" type="password" class="ggg{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required="">
          @if ($errors->has('password'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('password') }}</strong>
          </span>
          @endif
          
          <button type="submit" name="login">{{ __('Login') }}</button>
        </form>

</div>
</body>
</html>