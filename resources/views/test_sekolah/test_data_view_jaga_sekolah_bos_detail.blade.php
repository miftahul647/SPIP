<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>TestDataViewJagaSekolahBosDetail</title>
</head>
<body>

	<!-- check API : https://bima.kpk.go.id/api/v5/bos/detail?tahun=2020&npsn=20208347 -->
	
	@foreach($data10 as $key => $data)
		<ul>
			<li>index : {{$key}}</li>
			<li>sekolah id : {{$data['sekolah_id']}}</li>
			<li>nama sekolah : {{$data['nama_sekolah']}}</li>
			<li>npsn : {{$data['npsn']}}</li>
			<li>komponen 1 : {{$data['komponen_1']}}</li>
			...
			<li>komponen penggunaan 2 : {{$data['komponen_penggunaan'][0]['nama']}}</li>
			...
		</ul>
	@endforeach

	OR EXEMPLE FOR KOMPONEN PENGGUNAAN

	@foreach($data10 as $key => $data)
		@foreach($data['komponen_penggunaan'] as $key => $item)
		<ul>
			<li>dana : {{$item['dana']}}</li>
			<li>nama : {{$item['nama']}}</li>
		</ul>
		@endforeach
	@endforeach

	OR AGAIN EXEMPLE FOR KOMPONEN PENGGUNAAN CAN LIKE THIS

	@foreach($komponenPenggunaan as $key => $item)
		<ul>
			<li>dana : {{$item['dana']}}</li>
			<li>nama : {{$item['nama']}}</li>
		</ul>
	@endforeach

	PAGINATION <br><br>

	Halaman : {{ $datas['data']['current_page'] }} <br/>
	Jumlah Data : {{ $datas['data']['total_record'] }} <br/>
	Data Per Halaman : {{ $datas['data']['per_page'] }} <br/>
	
</body>
</html>