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
<h1>Kategori</h1>
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
		<td>Kode Kategori</td>
		<td>Nama Kategori</td>

	</tr>

</thead>

<tbody>
	

<?php $no = 0; foreach($kategori as $kt): $no++;?>


	<tr>
		
		<td><?=$no?></td><td><?=$kt->kode_kategori?></td><td><?=$kt->nama_kategori?></td>

		<td><?php if($this->session->userdata('level')=="admin"){?> <a href="#ubah" data-toggle="modal" onclick="edit(<?=$kt->kode_kategori?>)"  class="btn btn-warning">Ubah</a><?php }else{ 		echo "Anda user"; }?></td>

		<td><?php if($this->session->userdata('level')=="admin"){?><a href="<?=base_url('index.php/Kategori/hapus/'.$kt->kode_kategori)?>" class="btn btn-danger" onclick="return confirm('apakah anda yakin untuk menghapus')" >Hapus</a><?php }else{ echo "Anda user"; }?></td>

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
				<div class="modal-title">Tambah Kategori</div>
			</div>
			<div class="col-md-6">
				<button class="btn " data-dismiss = "modal" style="float: right; ">X</button>
				</div>

				</div>
	</div>	

	<div class="modal-body">


	<form action="<?=base_url('index.php/Kategori/tambah')?>" method="post" enctype="multipart/form-data">

	<table>
	

		<tr>
		<td>Nama Kategori</td>
		<td><input type="text" name="nama_kategori" required style="margin-left: 20px;"></td>
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
				<div class="modal-title">Ubah Kategori</div>
			</div>
			<div class="col-md-6">
				<button class="btn " data-dismiss = "modal" style="float: right; ">X</button>
				</div>

				</div>
	</div>	

	<div class="modal-body">


	<form action="<?=base_url('index.php/Kategori/update')?>" method="post" enctype="multipart/form-data">

	<input type="hidden" name="kode_kategori" required id="kode_kategori" >

	<table>
	

		<tr>
		<td>Nama Kategori</td>
		<td><input type="text" name="nama_kategori" required  id="nama_kategori" style="margin-left: 20px;"></td>
		</tr>

		
	</table>
				

	<center><input type="submit" name="tambah" value="Ubah" class="btn btn-warning" style="margin-top: 30px;"></center>

</form>

	</div>	
	</div>
	</div>

</div>



<script >
	

function edit(kode_kategori){
	$.ajax({
	type:"post",
	url:"<?=base_url()?>index.php/Kategori/tampil_ubah_kategori/"+kode_kategori,
	dataType:"json",
	success:function(data){
	$("#kode_kategori").val(data.kode_kategori);
	$("#nama_kategori").val(data.nama_kategori);

	}
});
}

</script>

</body>
</html>





