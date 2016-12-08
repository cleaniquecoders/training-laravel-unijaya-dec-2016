<!DOCTYPE html>
<html>
<head>
	<title>User List</title>
</head>
<body>
	<table>
		<thead>
			<th>Name</th>
			<th>E-mail</th>
		</thead>
		<tbody>
			@foreach($users as $user)
				<tr>
					<td>{{ $user->name }}</td>
					<td>{{ $user->email }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>
