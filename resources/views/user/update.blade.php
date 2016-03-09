<html>
<head>
	<title>Update User</title>
</head>
<body>
	<div>
		<form method="post" role="form">
			<div>
				{{csrf_field()}}
				<label>name</label>
				<input type="text" name="name" value="{{ $user->name }}">
			</div>
			<div>
				<label>username</label>
				<input type="text" name="username" value="{{ $user->username }}">
			</div>
			<div>
				<label>password</label>
				<input type="text" name="password" value="{{ $user->password }}">
			</div>
			<div>
				<button type="submit">Update data</button>
			</div>
		</form>
	</div>

</body>
</html>