<html>
<head>
	<title>Insert User</title>
</head>
<body>
	<div>
		<form method="post" role="form">
			<div>
				{{csrf_field()}}
				<label>name</label>
				<input type="text" name="name"/>
			</div>
			<div>
				<label>username</label>
				<input type="text" name="username">
			</div>
			<div>
				<label>password</label>
				<input type="password" name="password">
			</div>
			<div>
				<button type="submit">Tambah data</button>
			</div>
		</form>
	</div>

</body>
</html>