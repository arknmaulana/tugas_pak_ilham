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
<h1> Transaksi</h1>

<?php if($this->session->flashdata('pesan')): ?>


	<div class="alert alert-warning"><?= $this->session->flashdata('pesan') ?></div>
	

<?php endif?>


<div class="row">

	<div class="col-md-7">



		<table class="table table-hover table-stripped"> 



			<thead>

				<tr>

				<td>No</td>
				<td>Nama Sepatu</td>
				<td>Size</td>
				<td>Kategori</td>
				<td>Harga</td>
				<td>Merk</td>
				<td>Stok</td>

				</tr>

			</thead>

			<tbody>


				<?php $no = 0; foreach($sepatu as $bk): $no++;?>

				<tr>

					<td><?=$no?></td>
					<td><?=$bk->nama_sepatu?></td>
					<td><?=$bk->size?></td>
					<td><?=$bk->nama_kategori?></td>
					<td><?=$bk->harga?></td>
					<td><img src="<?=base_url('assets/gambar/') . $bk->merk .".png" ?>" style="width:40px;"></td>
					<td><?=$bk->stok?></td>

					<td> <a href="<?=base_url('index.php/Cart/tambah_cart/'.$bk->kode_sepatu)?>" class="btn btn-success">Beli</a></td>

					

				</tr>



			<?php endforeach?>


		</tbody>	

	</table>

</div>

<div class="col-md-5">


<form action="<?= base_url('index.php/Transaksi/transaksi')?>" method="post">

<table class="table table-stripped table-hover"> 


	<tr><td colspan="2">Nama Pembeli</td><td colspan="4"><input type="text" name="pembeli" value="<?=$this->session->flashdata('pembeli');?>"></td></tr>
			

				<tr>

				<th>No</th><th>Nama Sepatu</th><th>Jumlah</th><th>Harga</th><th>Subtotal</th><th></th>

				</tr>

			


			<?php $no = 0; foreach($this->cart->contents() as $ct): $no++;?>

				<input type="hidden" name="kode_sepatu[]" value="<?=$ct['id']?>">
				<input type="hidden" name="rowid[] " value="<?=$ct['rowid']?>">

				<tr>
					<td><?=$no?></td></td><td><?=$ct['name']?></td><td><input type="number" name="banyak[]" value="<?=$ct['qty']?>" style="width:60px;"></td><td><?=number_format($ct['price'])?></td><td><?=number_format($ct['subtotal'])?>
					<td> <a href="<?=base_url('index.php/Cart/hapus_cart/'.$ct['rowid'])?>" onclick="return confirm('apakah anda yakin untuk menghapus pesanan ini')" class="btn btn-danger">x</a></td>

				</tr>
			<?php endforeach?>


		<tr><td colspan="2">Total</td><td colspan="4"><?= number_format($this->cart->total())?></td></tr>

		<tr><td colspan="2">Bayar</td><td colspan="4"><input type="number" name="bayaru"></td></tr>

		<tr><td colspan="2">Kembali</td><td colspan="4"><input type="number" value="<?= $this->session->flashdata('kembali') ?>" name="kembaliu"></td></tr>

		<tr><td colspan="2"><input type="submit" value="Bayar" name="bayar" class="btn btn-success"></td><td colspan="2"><a href="<?=base_url('index.php/Cart/hapus_semua_cart')?>" class="btn btn-danger" onclick="return confirm('apakah anda yakin untuk menghapus semua pesanan')">Hapus Cart</a></td><td colspan="2"><input type="submit" value="Update_qty" name="update qty" class="btn btn-primary"></td></tr>

	</table>

</form>
</div>
</div>
</body>
</html>

