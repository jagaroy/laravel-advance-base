<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Title PDF</title>
</head>
<body>
	<h1>Customer List ({{$name}})</h1>
	<a href="{{ URL::to('/pdf') }}">Export PDF</a>
	<table>
	  <thead>
	    <tr>
	      <th>ID</th>
	      <th>Name</th>
	      <th>Email</th>
	      <th>Phone</th>
	    </tr>
	  </thead>
	  <tbody>
	      <tr>
	        <td>customer id</td>
	        <td>customer name</td>
	        <td>customer email</td>
	        <td>customer phone</td>
	      </tr>
	  </tbody>
	</table>
</body>
</html>