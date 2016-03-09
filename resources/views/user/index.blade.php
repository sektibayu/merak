<html>
<head>
	<title>User</title>
</head>
<body>
	<div>
		<a href="user/create">Tambah Data</a>
	</div>
	<div>
		<table>
			<thead>
				<tr>
					<th>USER_ID</th>
					<th>NAME</th>
					<th>USERNAME</th>
					<th>PASSWORD</th>
					<th>ACTION</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($user as $item)
				<tr>
					<td>
						{{$item->userid}}
					</td>
					<td>
						{{$item->name}}
					</td>
					<td>
						{{$item->username}}
					</td>
					<td>
						{{$item->password}}
					</td>
					<td>
						<a href="user/delete/{{$item->userid}}">delete</a>
						<a href="user/update/{{$item->userid}}">update</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</body>
</html>