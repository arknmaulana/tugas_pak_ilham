<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>

	<style>
	@font-face{
		src :url(../assets/font/f1.otf);
		font-family: f1;
	}

	@font-face{
		src :url(../assets/font/f4.otf);
		font-family: f4;
	}

	@font-face{
		src :url(../assets/font/f5.ttf);
		font-family: f5;
	}

	@font-face{
		src :url(../assets/font/f6.ttf);
		font-family: f6;
	}

	td{
		font-family: f5;
		font-size: 15px;
	}

	h1{
		font-family: f6;
	}
</style>

</head>
<body>
<h1>Histori Penjualan</h1>

<a href="<?=base_url('index.php/Histori/cetak_laporan')?>" class="btn btn-primary" style="float: right;">Print</a>

<table class="table table-hover table-stripped"> 

<thead>
	
	<tr>
		
		<td>No</td>
		<td>No Nota</td>
		<td>Nama Kasir</td>
		<td>Pembeli</td>
		<td>Total</td>
		<td>Tanggal Beli</td>

	</tr>

</thead>

<tbody>
	

<?php $no = 0; foreach($ts as $ts): $no++;?>


	<tr>
		
		<td><?=$no?></td><td><?=$ts->kode_transaksi?></td><td><?=$ts->nama_user?></td><td><?=$ts->nama_pembeli?></td><td><?=$ts->total?></td><td><?=$ts->tanggal_beli?></td>

	</tr>



<?php endforeach?>


</tbody>	

</table>

</body>
</html>

