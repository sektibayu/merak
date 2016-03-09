<html>
<head>
	<title>status</title>
</head>
<body>
	<div>
		<a href="status/create">Tambah Data</a>
	</div>
	<div>
		<table>
			<thead>
				<tr>
					<th>STATUSID</th>
					<th>DESC</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($status as $item)
				<tr>
					<td>
						{{$item->statusid}}
					</td>
					<td>
						{{$item->desc}}
					</td>
					<td>
						<a href="status/delete/{{$item->statusid}}">delete</a>
						<a href="status/update/{{$item->statusid}}">update</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</body>
</html>