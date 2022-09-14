<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>TestDataViewJagaSekolahSearch</title>
</head>
<body>

	<!-- check API : https://bima.kpk.go.id/api/v5/sekolah/search?limit=12&offset=0&kota=sumedang&nama=babakan&order_direction=asc&jenjang=1&vnk=62087734 -->
	
	@foreach($data10 as $key => $data)
		<ul>
			<li>index : {{$key}}</li>
			<li>nama : {{$data['nama']}}</li>
			<li>kota kab : {{$data['kota_kab']}}</li>
			<li>provinsi : {{$data['provinsi']}}</li>
			<li>npsn : {{$data['npsn']}}</li>
			<li>kepsek : {{$data['kepsek']}}</li>
			<li>tanggal update sekolah : {{$data['tanggal_update_sekolah']}}</li>
			<li>latitude : {{$data['latitude']}}</li>
			<li>longitude : {{$data['longitude']}}</li>
			<li>jenjang id : {{$data['jenjang_id']}}</li>
			<li>nama jenjang : {{$data['nama_jenjang']}}</li>
			<li>is pak : {{$data['is_pak']}}</li>
			<li>liked_count : {{$data['liked_count']}}</li>
			<li>is liked : {{$data['is_liked']}}</li>
			<li>src : {{$data['src']}}</li>
		</ul>
	@endforeach

	PAGINATION <br><br>

	Halaman : {{ $datas['data']['current_page'] }} <br/>
	Jumlah Data : {{ $datas['data']['total_record'] }} <br/>
	Data Per Halaman : {{ $datas['data']['per_page'] }} <br/>
	
</body>
</html>