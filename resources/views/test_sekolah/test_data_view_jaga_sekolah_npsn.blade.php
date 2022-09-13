<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>TestDataViewJagaSekolahNpsn</title>
</head>
<body>
	
	<!-- check API : https://bima.kpk.go.id/api/v5/sekolah?npsn=20208347 -->

	@foreach($data10 as $key => $data)
		<ul>
			<li>index : {{$key}}</li>
			<li>id : {{$data['id']}}</li>
			<li>npsn : {{$data['npsn']}}</li>
			<li>nama : {{$data['nama']}}</li>
			<li>alamat : {{$data['alamat']}}</li>
			...
			<li>jenjang : {{$data['jenjang']['nama_jenjang']}}</li>
			...
		</ul>
	@endforeach

	PAGINATION <br><br>

	Halaman : {{ $datas['data']['current_page'] }} <br/>
	Jumlah Data : {{ $datas['data']['total_record'] }} <br/>
	Data Per Halaman : {{ $datas['data']['per_page'] }} <br/>
	
</body>
</html>