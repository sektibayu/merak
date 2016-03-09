<html>
<head>
	<title>Insert User</title>
</head>
<body>
	<div>
		<form method="post" role="form">
			<div>
				{{csrf_field()}}
				<label>desc</label>
				<input type="text" name="desc"/>
			</div>
			<div>
				<button type="submit">Tambah data</button>
			</div>
		</form>
	</div>

</body>
</html>