<html>
<head>
	<title>Update User</title>
</head>
<body>
	<div>
		<form method="post" role="form">
			<div>
				{{csrf_field()}}
				<label>desc</label>
				<input type="text" name="desc" value="{{ $status->desc }}">
			</div>
			<div>
				<button type="submit">Update data</button>
			</div>
		</form>
	</div>

</body>
</html>