<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Day 001 Login Form</title>
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans:600'>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <link rel='stylesheet' href="{{ URL::asset('css/login-style.css'); }}">

</head>
<body>
<!-- partial:index.partial.html -->
<form action="{{route('login-user')}}" method="post">
	@csrf
<div class="login-wrap">
	<div class="login-html">
		<input id="tab-1" type="radio" name="tab" class="sign-in" ><label for="tab-1" class="tab">Sign In</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up" checked><label for="tab-2" class="tab">Sign Up</label>
		<div class="login-form">
			<div class="sign-in-htm">
				<div class="group">
					<label for="user" class="label">Username</label>
					<input id="user" type="text" class="input" name="userName">
				</div>
				<div class="group">
					<label for="pass" class="label">Password</label>
					<input id="pass" type="password" class="input" data-type="password" name="userPassword">
				</div>
				@if (Session::has('success'))
				<div class="alert alert-success">{{Session::get('success')}}</div>
				@endif
				@if (Session::has('fail'))
				<div class="alert alert-danger">{{Session::get('fail')}}</div>
				@endif
				<div class="group">
					<input type="submit" class="button" value="Sign In">
				</div>
			</div>
			
		</form>
			<form action="{{route('register-user')}}" method="post">
				@csrf
			<div class="sign-up-htm">
				<div class="group">
					<label for="user" class="label">Username</label>
					<input id="user" type="text" class="input" name="userName">
					<span class="text-danger">@error('userName') {{$message}} @enderror</span>
				</div>
				<div class="group">
					<label for="pass" class="label">Password</label>
					<input id="pass" type="password" class="input" data-type="password" name="userPassword">
					<span class="text-danger">@error('userPassword') {{$message}} @enderror</span>

				</div>
				<div class="group">
					<label for="pass" class="label">Fullname</label>
					<input id="pass" type="text" class="input" name="userFullname">
					<span class="text-danger">@error('userFullname') {{$message}} @enderror</span>

				</div>
				<div class="group">
					<label for="pass" class="label">Address</label>
					<input id="pass" type="text" class="input" name="userAddress">
					<span class="text-danger">@error('userAddress') {{$message}} @enderror</span>

				</div>
				<div class="group">
					<label for="pass" class="label">Phone Number</label>
					<input id="pass" type="text" class="input" name="userPhoneNumber">
					<span class="text-danger">@error('userPhoneNumber') {{$message}} @enderror</span>

				</div>
				@if (Session::has('success'))
				<div class="alert alert-success">{{Session::get('success')}}</div>
				@endif
				@if (Session::has('fail'))
				<div class="alert alert-danger">{{Session::get('fail')}}</div>
				@endif
				<div class="group">
					<input type="submit" class="button" value="Sign Up">
				</div>
			</div>
			</form>
		</div>
	</div>
</div>
<!-- partial -->
  
</body>
</html>
