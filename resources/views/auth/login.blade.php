<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
	<link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
	<form class="box" method="POST" action="{{ route('login.check') }}">
		@csrf
          <div class="logo"><img src="{{$content->logo}}" style="width:100px;height:100px"></div>
          <h3>{{$content->name}}</h3>

        <h1>Admin Login</h1>
         @if(Session('errors'))
         <div class="alert alert-danger">
          <span style="color: red">  Opps! Username or Password Didn't Match.</span>
         </div>
          @endif
        <input type="text" name="username" placeholder="username" required>
        <input type="password" name="password" placeholder="password" required>
        <input type="submit" value="Login">
    </form>
</body>
</html>
