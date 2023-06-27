<!DOCTYPE html>
<html>
<head>
	<title>Invoice</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			margin: 0;
			padding: 0;
		}

		.header {
			display: flex;
			align-items: center;
			justify-content: space-between;
			padding: 20px;
			background-color: #f2f2f2;
			border-bottom: 2px solid #ddd;
		}

		.header img {
			height: 80px;
		}

		.invoice-details {
			padding: 20px;
			background-color: #fff;
		}

		.invoice-details h1 {
			font-size: 32px;
			margin-bottom: 20px;
		}

		.invoice-details h2 {
			font-size: 18px;
			margin-bottom: 10px;
		}

		.invoice-details table {
			border-collapse: collapse;
			width: 100%;
		}

		.invoice-details th,
		.invoice-details td {
			border: 1px solid #ddd;
			padding: 10px;
			text-align: left;
		}

		.invoice-details th {
			background-color: #f2f2f2;
		}

		.total {
			padding: 20px;
			background-color: #f2f2f2;
			text-align: right;
			font-weight: bold;
		}

	</style>
</head>
<body>
	<div class="header">
		<h1 style="text-align: center;">Kwintansi</h1>
		<img src="{{ $logo}}" alt="Logo" class="h-8 w-8 mr-2">
	</div>
	<div class="invoice-details">
		<h4>Customer Name: {{$latter->nama_pelanggan}}</h4>
		<h4>Rental Deadline: {{$latter->tanggal_ambil}} - {{$latter->tanggal_kembali}}</h4>
		<table>
			<thead>
				<tr>
					<th>Nama Kendaraan</th>
					<th>Sopir</th>
					<th>Lama Sewa</th>
					<th>Nomer Hp</th>
					<th>Harga</th>		
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>{{$latter->nama_kendaraan}}</td>
					<td>{{$latter->sopir}}</td>
					<td>{{$latter->no_hp}}</td>
					<td>{{ $latter->selisih_hari }} Hari</td>
					<td>{{$latter->harga_sewa}} / 24 Jam</td>
					
				</tr>
			</tbody>
		</table>
	</div>
	<div class="total">
		Total: RP.{{$latter->total_harga}}
	</div>
</body>
</html>
