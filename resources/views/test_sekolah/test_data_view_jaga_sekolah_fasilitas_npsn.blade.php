<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>TestDataViewJagaSekolahFasilitasNpsn</title>
</head>
<body>
	
	<!-- check API : https://bima.kpk.go.id/api/v5/sekolah/fasilitas?npsn=20208347 -->

	@foreach($data10 as $key => $data)
		<ul>
			<li>index : {{$key}}</li>
			<li>lab bahasa : {{$data['lab_bahasa']}}</li>
			<li>lab biologi : {{$data['lab_biologi']}}</li>
			<li>lab fisika : {{$data['lab_fisika']}}</li>
			<li>lab ipa : {{$data['lab_ipa']}}</li>
			...
			<li>pegawai nuptk : {{$data['pegawai'][0]['nuptk']}}</li>
			...
		</ul>
	@endforeach

	OR EXEMPLE FOR PEGAWAI

	@foreach($data10 as $key => $data)
		@foreach($data['pegawai'] as $key => $item)
		<ul>
			<li>nuptk : {{$item['nuptk']}}</li>
			<li>nama : {{$item['nama']}}</li>
		</ul>
		@endforeach
	@endforeach

	OR AGAIN EXEMPLE FOR PEGAWAI CAN LIKE THIS

	@foreach($pegawai as $key => $item)
		<ul>
			<li>nuptk : {{$item['nuptk']}}</li>
			<li>jabatan : {{$item['jabatan']}}</li>
		</ul>
	@endforeach

	PAGINATION <br><br>

	Halaman : {{ $datas['data']['current_page'] }} <br/>
	Jumlah Data : {{ $datas['data']['total_record'] }} <br/>
	Data Per Halaman : {{ $datas['data']['per_page'] }} <br/>
	
</body>
</html>