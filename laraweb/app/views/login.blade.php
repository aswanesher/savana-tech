<!DOCTYPE html>
<html>
<head>
	<title>Login</title>

	<!-- Bootstrap core CSS -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="row">
    {{Form::open(array('action'=>'UserController@checkLogin'))}}
        <div class="col-md-offset-5 col-md-3">
            <div class="form-login">
            <h1>Masuk</h1>
            <input type="text" id="userName" class="form-control input-sm chat-input" placeholder="username" name="username" />
            </br>
            <input type="password" id="userPassword" class="form-control input-sm chat-input" placeholder="password" name="password" />
            </br>
            <div class="wrapper">
            <span class="group-btn">     
                <input type="submit" class="btn btn-default" value="Masuk">
            </span>
            </div>
            </div>
        </div>
    </div>
</div>
{{ Form::close(); }}

<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
</body>
</html>