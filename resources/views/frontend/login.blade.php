<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>
    <link rel="stylesheet" href="{{ url('frontend/assets/signin/css/loginStyle.css') }}">
</head>
<body>
<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->
    <h2 class="active"> Sign In </h2>
    <h2 class="inactive underlineHover"><a href="{{ route('signup.create') }}">Sign Up</a> </h2>

    <!-- Icon -->
    <div class="fadeIn first">
      <!-- <img src="http://danielzawadzki.com/codepen/01/icon.svg" id="icon" alt="User Icon" /> -->
    </div>

    <!-- Login Form -->
    <form action="{{ url('/login') }}" method="post">
        @csrf
      <input type="text" id="login" class="fadeIn second" name="username" placeholder="login">
        <div>
        @error('username')
            {{ $message }}
        @enderror
        @if (session()->has('emptyField'))
            {{session('emptyField')}}
        @endif
        </div>
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="password">
        <div>
        @error('password')
            {{ $message }}
        @enderror

        </div>
      <input type="submit" class="fadeIn fourth" value="Log In">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="#">Forgot Password?</a>
    </div>

  </div>
</div>
</body>
</html>
