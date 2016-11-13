<!DOCTYPE html>
<html>
<head>
	<title>Document</title>
</head>
<body>
	<form method="POST" action="/senpaishop/public/upload" enctype="multipart/form-data">
		<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
		<input type="file" name="avatar">
		<button type="submit">ads</button>

	</form>

</body>
</html>