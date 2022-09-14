<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>TestDataViewJagaSekolahJenjangAll</title>
</head>
<body>

	<!-- check API : https://bima.kpk.go.id/api/v5/sekolah/jenjang-all -->
	
	@foreach($data10 as $key => $data)
		<ul>
			<li>index : {{$key}}</li>
			<li>id : {{$data['id']}}</li>
			<li>nama jenjang : {{$data['nama_jenjang']}}</li>
			<li>kelas : {{$data['sort_order']}}</li>
			<li>src : {{$data['src']}}</li>
			<li>id instansi tipe : {{$data['id_instansi_tipe']}}</li>
			<li>is shown : {{$data['is_shown']}}</li>
		</ul>
	@endforeach

	PAGINATION <br><br>

	Halaman : {{ $datas['data']['current_page'] }} <br/>
	Jumlah Data : {{ $datas['data']['total_record'] }} <br/>
	Data Per Halaman : {{ $datas['data']['per_page'] }} <br/>
	
</body>
</html>