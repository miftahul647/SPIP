<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>TestDataViewJagaSekolahBosYears</title>
</head>
<body>
	
	<!-- check API : https://bima.kpk.go.id/api/v5/bos/years?source=kemdikbud -->

	@foreach($data10 as $key => $data)
		<ul>
			<li>index : {{$key}}</li>
			<li>year {{$key+1}} : {{$data}}</li>
		</ul>
	@endforeach
	
</body>
</html>