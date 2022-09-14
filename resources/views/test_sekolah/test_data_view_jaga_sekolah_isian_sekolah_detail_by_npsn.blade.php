<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>TestDataViewJagaSekolahDetailByNpsn</title>
</head>
<body>

	<!-- check API : https://bima.kpk.go.id/api/v5/pak/isiansekolah/detailbynpsn/20208347 -->
	
	@foreach($data10 as $key => $data)
		<ul>
			<li>index : {{$key}}</li>
			<li>id : {{$data['id']}}</li>
			<li>sekolah npsn : {{$data['sekolah_npsn']}}</li>
			<li>tahun ajaran : {{$data['tahun_ajaran']}}</li>
			<li>deskripsi : {{$data['deskripsi']}}</li>
			...
			<li>sekolah npsn : {{$data['sekolah']['npsn']}}</li>
			<li>sekolah nama : {{$data['sekolah']['nama']}}</li>
			<li>sekolah provinsi : {{$data['sekolah']['nama']}}</li>
			<li>nama jenjang : {{$data['sekolah']['jenjang']['nama_jenjang']}}</li>
			...
			<li>detail mata pelajaran : {{$data['detail'][0]['mata_pelajaran']}}</li>
			<li>detail document filename : {{$data['detail'][0]['documents'][0]['file']['filename']}}</li>
			...
		</ul>
	@endforeach
	
</body>
</html>