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
	
<h1>Sepatu</h1>

<?php if($this->session->flashdata('pesan')): ?>


	<div class="alert alert-warning"><?= $this->session->flashdata('pesan') ?></div>
	

<?php endif?>



<?php if($this->session->userdata('level')=="admin"){?>
<left><a style="margin: 10px; margin-left: 1px;" href="#tambah" 
    class="btn btn-primary" data-toggle="modal">
    <span class="glyphicon glyphicon-plus"></span> Tambah</a>

<?php }?>
<table class="table table-hover table-stripped"> 

	<thead>

		<tr>

			<td>No</td>
			<td>Kode Sepatu</td>
			<td>Nama Sepatu</td>
			<td>Tahun</td>
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
			<td><?=$bk->kode_sepatu?></td>
			<td><?=$bk->nama_sepatu?></td>
			<td><?=$bk->size?></td>
			<td><?=$bk->nama_kategori?></td>
			<td><?=$bk->harga?></td>
			<td><img src="<?=base_url('assets/gambar/') . $bk->merk .".png" ?>" style="width:40px;"></td> 
			<td><?=$bk->stok?></td>

			<td><?php if($this->session->userdata('level')=="admin"){?> 
			<a href="#ubah" data-toggle="modal" onclick="edit(<?=$bk->kode_sepatu?>)"  class="btn btn-warning">Ubah</a>
			<?php }else{ 		echo "Anda user"; }?></td>

			<td><?php if($this->session->userdata('level')=="admin"){?>
			<a href="<?=base_url('index.php/Sepatu/hapus/'.$bk->kode_sepatu)?>" onclick="return confirm('apakah anda yakin untuk menghapus')" 
			class="btn btn-danger">Hapus</a><?php }else{ echo "Anda user"; }?></td>

		</tr>
	<?php endforeach?>

</tbody>	
</table>


<div class="modal fade" id="tambah" >
	<div class="modal-dialog">
		
		<div class="modal-content">
			<div class="modal-header">


			<div class="row">

			<div class="col-md-6">
				<div class="modal-title">Tambah Sepatu</div>
			</div>
			<div class="col-md-6">
				<button class="btn " data-dismiss = "modal" style="float: right; ">X</button>
				</div>

				</div>

			</div>	

			<div class="modal-body">


				<form action="<?=base_url('index.php/Sepatu/tambah')?>" method="post" enctype="multipart/form-data">

					<table>

						<tr>
							<td>Nama Sepatu</td>
							<td><input type="text" name="nama_sepatu" style="margin-left: 20px;"></td>
						</tr>

						<tr>
							<td>Size</td>
							<td><input type="number" name="size" style="margin-left: 20px;"></td>
						</tr>

						<tr>
							<td>Kategori</td>
							<td>


								<select name="kategori" style="margin-left: 20px; ">
									<?php foreach ($kategori as $kt): ?>

										<option value="<?= $kt->kode_kategori?>" ><?= $kt->nama_kategori?></option>
									<?php endforeach?>	
								</select>
							</td>
						</tr>

						<tr>
							<td>Harga</td>
							<td><input type="text" name="harga" style="margin-left: 20px;"></td>
						</tr>

						<tr>
							<td>Merk</td>
							<td><input type="file" name="merk" style="margin-left: 20px;"></td>
						</tr>

						<tr>
							<td>Stok</td>
							<td><input type="number" name="stok" style="margin-left: 20px;"></td>
						</tr>

					</table>


					<center><input type="submit" name="tambah" value="tambah" class="btn btn-warning" style="margin-top: 30px;"></center>

				</form>

			</div>	
		</div>
	</div>

</div>

<div class="modal fade" id="ubah" >
	<div class="modal-dialog">
		
		<div class="modal-content">
			<div class="modal-header">

				<div class="row">

			<div class="col-md-6">
				<div class="modal-title">Ubah Sepatu</div>
			</div>
			<div class="col-md-6">
				<button class="btn " data-dismiss = "modal" style="float: right; ">X</button>
				</div>

				</div>
			</div>	

			<div class="modal-body">


				<form action="<?=base_url('index.php/Sepatu/update')?>" method="post" enctype="multipart/form-data">

					<table>

						<input type="hidden" name="kode_sepatu" required id="kode_sepatu" style="margin-left: 20px;">

						<tr>
							<td>Nama Sepatu</td>
							<td><input type="text" name="nama_sepatu"  required  id="nama_sepatu" style="margin-left: 20px;"></td>
						</tr>

						<tr>
							<td>Size</td>
							<td><input type="number" name="size" required  id="size" style="margin-left: 20px;"></td>
						</tr>

						<tr>
							<td>Kategori</td>
							<td>


								<select name="kategori" style="margin-left: 20px; " id="kategori" required >
									<?php foreach ($kategori as $kt): ?>

										<option value="<?= $kt->kode_kategori?>" ><?= $kt->nama_kategori?></option>
									<?php endforeach?>	
								</select>
							</td>
						</tr>

						<tr>
							<td>Harga</td>
							<td><input type="text" name="harga" required  id="harga" style="margin-left: 20px;"></td>
						</tr>

						<tr>
							<td>Merk</td>
							<td><input type="file" name="merk"   id="sepatu" style="margin-left: 20px;"></td>
						</tr>

						<tr>
							<td>Stok</td>
							<td><input type="number" name="stok" required  id="stok" style="margin-left: 20px;"></td>
						</tr>

					</table>


					<center><input type="submit" value="Ubah" name="update" required  class="btn btn-warning" style="margin-top: 30px;"></center>

				</form>

			</div>	
		</div>
	</div>

</div>


<script >
	

	function edit(kode_sepatu){
		$.ajax({
			type:"post",
			url:"<?=base_url()?>index.php/Sepatu/tampil_ubah_sepatu/"+kode_sepatu,
			dataType:"json",


			success:function(data){
				$("#kode_sepatu").val(data.kode_sepatu);
				$("#nama_sepatu").val(data.nama_sepatu);
				$("#size").val(data.size);
				$("#kategori").val(data.kode_kategori);
				$("#harga").val(data.harga);
				$("#merk").val(data.merk);
				$("#stok").val(data.stok);	
			}
		});
	}

</script>

</body>
</html>
