<!DOCTYPE html>
<html>
<head>
	<title>Permohonan Informasi {{$items->pi_no}}</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	
	<style>
		/** 
			Set the margins of the page to 0, so the footer and the header
			can be of the full height and width !
		 **/
		@page {
			margin: 0cm 0cm;
		}

		/** Define now the real margins of every page in the PDF **/
		body {
			margin-top: 5cm;
			margin-left: 2cm;
			margin-right: 2cm;
			margin-bottom: 2cm;
		}

		/** Define the header rules **/
		header {
			position: fixed;
			top: 1cm;
			left: 0cm;
			right: 0cm;

			/** 
			Extra personal styles 
				background-color: #03a9f4;
				color: white;
				text-align: center;
				line-height: 1.5cm;
			**/
		}

		/** Define the footer rules **/
		footer {
			position: fixed; 
			bottom: 0cm; 
			left: 0cm; 
			right: 0cm;
			height: 1.5cm;
			background-color: #E8F6EF;

			/** 
			Extra personal styles 
				color: white;
				text-align: center;
				line-height: 1.5cm;
			**/
		}
	</style>
</head>

<body style="font-family:none;">
	
	<header>
		<table class="table" style="margin-bottom:0px">
			<tbody>
				<tr style="height:fit-content">
					<td class="py-0" rowspan="4" style="text-align:right; vertical-align:middle; width:20%; border:0px">
						<img src="{{ asset('fe/images/logo-jatim.png') }}" alt width="70">
					</td>
					<td class="py-0 text-center" style="font-size:14pt; border:0px; line-height:1">PEMERINTAHAN PROVINSI JAWA TIMUR</td>
					<td class="py-0" style="width:10%; border:0px"></td>
				</tr>
				<tr style="height:fit-content">
					<td class="py-0 text-center" style="font-size:24pt; border:0px; line-height:1"><strong>INSPEKTORAT</strong></td>
					<td class="py-0" style="width:10%; border:0px"></td>
				</tr>
				<tr style="height:fit-content">
					<td class="py-0 text-center" style="font-size:14pt; border:0px">Jl. Ngagel Jaya Tengah No. 102 Telp. (031)99669160</td>
					<td class="py-0" style="width:10%; border:0px"></td>
				</tr>
				<tr style="height:fit-content">
					<td class="py-0 text-center" style="font-size:14pt; border:0px"><strong><u>S U R A B A Y A</u></strong></td>
					<td class="py-0" style="width:10%; border:0px"></td>
				</tr>
			</tbody>
		</table>
	</header>

	<footer>
		<table class="table" style="margin-bottom:0px; transform:translate(0, 50%);">
			<tbody>
				<tr style="height:fit-content">
					<td class="py-0" style="width:5%; border:0px"></td>
					<td class="py-0" style="font-size:10pt; border:0px; line-height:1">dicetak melalui web PPID Inspektorat Provinsi Jawa Timur</td>
				</tr>
				<tr style="height:fit-content">
					<td class="py-0" style="width:5%; border:0px"></td>
					<td class="py-0" style="font-size:10pt; border:0px; line-height:1">oleh : {{ Auth::user()->name }}, {{ tglIndo(date('Y-m-d H:i:s')) }} {{ date('H:i', strtotime(date('Y-m-d H:i:s'))) }}</td>
				</tr>
			</tbody>
		</table>
	</footer>
	
	<table class="table" style="margin-bottom:30px">
		<tbody>
			<tr style="height:fit-content">
				<td class="py-0 text-center" style="font-size:18pt; border:0px; line-height:1.5"><strong>PERMOHONAN INFORMASI</strong></td>
			</tr>
			<tr style="height:fit-content">
				<td class="py-0 text-center" style="font-size:12pt; border:0px; line-height:1.5"><strong>Nomor : {{$items->pi_no}}</strong></td>
			</tr>
		</tbody>
	</table>
	
	<table class="table" style="margin-bottom:20px">
		<tbody>
			<tr style="height:fit-content">
				<td class="py-0" colspan="3" style="font-size:12pt; border:0px; line-height:1.5"><strong>A. Biodata Pemohon Informasi</strong></td>
			</tr>
			<tr style="height:fit-content">
				<td class="py-0" style="font-size:12pt; border:0px; line-height:1.5; width:35%;">Nama</td>
				<td class="p-0" style="font-size:12pt; border:0px; line-height:1.5; width:5%; text-align:right">:</td>
				<td class="py-0" style="font-size:12pt; border:0px; line-height:1.5">{{$items->user_nama}}</td>
			</tr>
			<tr style="height:fit-content">
				<td class="py-0" style="font-size:12pt; border:0px; line-height:1.5; width:35%;">NIK</td>
				<td class="p-0" style="font-size:12pt; border:0px; line-height:1.5; width:5%; text-align:right">:</td>
				<td class="py-0" style="font-size:12pt; border:0px; line-height:1.5">{{$items->user_nik}}</td>
			</tr>
			<tr style="height:fit-content">
				<td class="py-0" style="font-size:12pt; border:0px; line-height:1.5; width:35%;">Email</td>
				<td class="p-0" style="font-size:12pt; border:0px; line-height:1.5; width:5%; text-align:right">:</td>
				<td class="py-0" style="font-size:12pt; border:0px; line-height:1.5">{{$items->user_email}}</td>
			</tr>
			<tr style="height:fit-content">
				<td class="py-0" style="font-size:12pt; border:0px; line-height:1.5; width:35%;">No. Telpon</td>
				<td class="p-0" style="font-size:12pt; border:0px; line-height:1.5; width:5%; text-align:right">:</td>
				<td class="py-0" style="font-size:12pt; border:0px; line-height:1.5">{{$items->user_telp}}</td>
			</tr>
			<tr style="height:fit-content">
				<td class="py-0" style="font-size:12pt; border:0px; line-height:1.5; width:35%;">Jenis Alamat</td>
				<td class="p-0" style="font-size:12pt; border:0px; line-height:1.5; width:5%; text-align:right">:</td>
				<td class="py-0" style="font-size:12pt; border:0px; line-height:1.5">{{$items->user_jenis_alamat}}</td>
			</tr>
			<tr style="height:fit-content">
				<td class="py-0" style="font-size:12pt; border:0px; line-height:1.5; width:35%;">Alamat</td>
				<td class="p-0" style="font-size:12pt; border:0px; line-height:1.5; width:5%; text-align:right">:</td>
				<td class="py-0" style="font-size:12pt; border:0px; line-height:1.5">{{$items->user_alamat}}</td>
			</tr>
		</tbody>
	</table>
	
	<table class="table" style="margin-bottom:30px">
		<tbody>
			<tr style="height:fit-content">
				<td class="py-0" colspan="3" style="font-size:12pt; border:0px; line-height:1.5"><strong>B. Permohonan Informasi</strong></td>
			</tr>
			<tr style="height:fit-content">
				<td class="py-0" style="font-size:12pt; border:0px; line-height:1.5; width:35%;">Nomor Permohonan</td>
				<td class="p-0" style="font-size:12pt; border:0px; line-height:1.5; width:5%; text-align:right">:</td>
				<td class="py-0" style="font-size:12pt; border:0px; line-height:1.5">{{$items->pi_no}}</td>
			</tr>
			<tr style="height:fit-content">
				<td class="py-0" style="font-size:12pt; border:0px; line-height:1.5; width:35%;">Tanggal dan Waktu</td>
				<td class="p-0" style="font-size:12pt; border:0px; line-height:1.5; width:5%; text-align:right">:</td>
				<td class="py-0" style="font-size:12pt; border:0px; line-height:1.5">{{ tglIndo($items->pi_tanggal_buat) }} {{ date('H:i', strtotime($items->pi_tanggal_buat)) }}</td>
			</tr>
			<tr style="height:fit-content">
				<td class="py-0" style="font-size:12pt; border:0px; line-height:1.5; width:35%;">Jenis Permohonan</td>
				<td class="p-0" style="font-size:12pt; border:0px; line-height:1.5; width:5%; text-align:right">:</td>
				<td class="py-0" style="font-size:12pt; border:0px; line-height:1.5">{{$items->pi_jenis}}</td>
			</tr>
			<tr style="height:fit-content">
				<td class="py-0" style="font-size:12pt; border:0px; line-height:1.5; width:35%;">Bertindak Atas Nama</td>
				<td class="p-0" style="font-size:12pt; border:0px; line-height:1.5; width:5%; text-align:right">:</td>
				<td class="py-0" style="font-size:12pt; border:0px; line-height:1.5">{{$items->pi_peruntukan}}</td>
			</tr>
			<tr style="height:fit-content">
				<td class="py-0" style="font-size:12pt; border:0px; line-height:1.5; width:35%;">Informasi Yang Dibutuhkan</td>
				<td class="p-0" style="font-size:12pt; border:0px; line-height:1.5; width:5%; text-align:right">:</td>
				<td class="py-0" style="font-size:12pt; border:0px; line-height:1.5">{{$items->pi_informasi}}</td>
			</tr>
			<tr style="height:fit-content">
				<td class="py-0" style="font-size:12pt; border:0px; line-height:1.5; width:35%;">Tujuan Permohonan</td>
				<td class="p-0" style="font-size:12pt; border:0px; line-height:1.5; width:5%; text-align:right">:</td>
				<td class="py-0" style="font-size:12pt; border:0px; line-height:1.5">{{$items->pi_tujuan}}</td>
			</tr>
			<tr style="height:fit-content">
				<td class="py-0" style="font-size:12pt; border:0px; line-height:1.5; width:35%;">Bentuk Informasi Yang Diminta</td>
				<td class="p-0" style="font-size:12pt; border:0px; line-height:1.5; width:5%; text-align:right">:</td>
				<td class="py-0" style="font-size:12pt; border:0px; line-height:1.5">{{$items->pi_peroleh_bentuk}}</td>
			</tr>
			<tr style="height:fit-content">
				<td class="py-0" style="font-size:12pt; border:0px; line-height:1.5; width:35%;">Cara Memperoleh Informasi</td>
				<td class="p-0" style="font-size:12pt; border:0px; line-height:1.5; width:5%; text-align:right">:</td>
				<td class="py-0" style="font-size:12pt; border:0px; line-height:1.5">{{$items->pi_peroleh_cara}}</td>
			</tr>
			<tr style="height:fit-content">
				<td class="py-0" style="font-size:12pt; border:0px; line-height:1.5; width:35%;">Catatan Tambahan </br><em>(yang dibuat pemohon informasi)</em></td>
				<td class="p-0" style="font-size:12pt; border:0px; line-height:1.5; width:5%; text-align:right">:</td>
				<td class="py-0" style="font-size:12pt; border:0px; line-height:1.5">{{$items->pi_catatan_buat}}</td>
			</tr>
			<tr style="height:fit-content">
				<td class="py-0" style="font-size:12pt; border:0px; line-height:1.5; width:35%;">Status</td>
				<td class="p-0" style="font-size:12pt; border:0px; line-height:1.5; width:5%; text-align:right">:</td>
				<td class="py-0" style="font-size:12pt; border:0px; line-height:1.5">
					@if ($items->pi_status === "S")
						Dikabulkan Sebagian
					@elseif ($items->pi_status === "D")
						Dikabulkan Seluruhnya
					@elseif ($items->pi_status === "X")
						Ditolak
					@else
						Buat Baru
					@endif
				</td>
			</tr>
		</tbody>
	</table>
	
	<!--
	<table class="table" style="margin-bottom:70px">
		<tbody>
			<tr>
				<td class="py-0 text-center" style="font-size:12pt; border:0px; line-height:1.5; width:50%;"><strong>Petugas Pelayanan Informasi</strong></td>
				<td class="py-0 text-center" style="font-size:12pt; border:0px; line-height:1.5"><strong>Pemohon Informasi</strong></td>
			</tr>
			<tr>
				<td class="py-0 text-center" style="font-size:12pt; border:0px; line-height:1.5; width:50%;"><strong>(Penerima Permohonan)</strong></td>
				<td class="py-0 text-center" style="font-size:12pt; border:0px; line-height:1.5"> </td>
			</tr>
		</tbody>
	</table>
	
	<table class="table" style="margin-bottom:30px">
		<tbody>
			<tr>
				<td class="py-0 text-center" style="font-size:12pt; border:0px; line-height:1.5; width:50%;"><strong>( . . . . . . . . . . . . . . . . . . . . )</strong></td>
				<td class="py-0 text-center" style="font-size:12pt; border:0px; line-height:1.5"><strong>( {{ $items->user_nama }} )</strong></td>
			</tr>
			<tr>
				<td class="py-0 text-center" style="font-size:12pt; border:0px; line-height:1.5; width:50%;"><strong></strong></td>
				<td class="py-0 text-center" style="font-size:12pt; border:0px; line-height:1.5"></td>
			</tr>
		</tbody>
	</table>
	-->
	
</body>
</html>