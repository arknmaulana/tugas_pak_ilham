<?php if ($_SESSION['level'] == 'admin') : ?>
<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=, initial-scale=1.0">
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

	span{
		font-family: f5;
	}

	h1{
		font-family: f6;
		text-align: center;
	}

	p{
		font-family: f6;
		text-align: center;
	}
</style>

	</head>
	<body>
	<h1 >Selamat Datang <?=$this->session->userdata('nama_user')?></h1>
		<p class="panel-subtitle">Troops Shoes Shop</p>
						


	<div class="boss" style="width">

	<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content" style="margin-top:-100px; margin-left:-260px;" >
				<div class="container-fluid">
					<div class="panel panel-profile">
						<div class="clearfix">
							<!-- LEFT COLUMN -->
							<div class="profile-left">
								<!-- PROFILE HEADER -->
								<div class="profile-header">
									<div class="overlay"></div>
									<div class="profile-main">
										<h3 class="name">Troops</h3>
										<span class="online-status status-available">Sport Station</span>
									</div>
									<div class="profile-stat" style="background-color: #b81e1e;">
										<div class="row">
											<div class="col-md-4 stat-item">
												45 <span>Merk</span>
											</div>
											<div class="col-md-4 stat-item">
												50% <span>Diskon</span>
											</div>
											<div class="col-md-4 stat-item">
												2174 <span>testimoni</span>
											</div>
										</div>
									</div>
								</div>
								<!-- END PROFILE HEADER -->
								<!-- PROFILE DETAIL -->
								<div class="profile-detail">
									<div class="profile-info">
										<h4 class="heading">Basic Info</h4>
										<ul class="list-unstyled list-justify">
											<li>Since <span>1 Feb, 2019</span></li>
											<li>Mobile <span>(124) 823409234</span></li>
											<li>Email <span>troops-sport.com</span></li>
											<li>Website <span><a href="https://www.troops.com">www.troops.com</a></span></li>
										</ul>
									</div>
									<div class="profile-info">
										<h4 class="heading">Social</h4>
										<ul class="list-inline social-icons">
											<li><a href="#" class="facebook-bg"><i class="fa fa-facebook"></i></a></li>
											<li><a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a></li>
											<li><a href="#" class="google-plus-bg"><i class="fa fa-google-plus"></i></a></li>
											<li><a href="#" class="github-bg"><i class="fa fa-github"></i></a></li>
										</ul>
									</div>
								</div>
								<!-- END PROFILE DETAIL -->
							</div>
							<!-- END LEFT COLUMN -->
							<!-- RIGHT COLUMN -->
							

							<div class="profile-right">
							<div class="panel-body">
							<div class="row">
								<div class="col-md-4">
							<?php if($this->session->userdata('level')=='admin'){?>
								<a href="<?=base_url('index.php/Kasir')?>" style="color: black">
								<?php }?>
									<div class="metric">
										<span class="icon"><i class="fa fa-eye"></i></span>
										<p>
											<span class="number"><?= $user?></span>
											<span class="title">Pegawai</span>
										</p>
									</div>
								<?php if($this->session->userdata('level')=='admin'){?>
								</a>
								<?php }?>
								</div>
								<div class="col-md-4">

								<a href="<?=base_url('index.php/Histori')?>" style="color: black">
									<div class="metric">
										<span class="icon"><i class="fa fa-shopping-bag"></i></span>
										<p>
											<span class="number"><?= $transaksi ?></span>
											<span class="title">Penjualan</span>
										</p>
									</div>

									</a>
								</div>
								<div class="col-md-4">
								<a href="<?=base_url('index.php/Sepatu')?>" style="color: black">
									<div class="metric">
										<span class="icon"><i class="fa fa-bar-chart"></i></span>
										<p>
											<span class="number"><?= $sepatu ?></span>
											<span class="title">Sepatu</span>
										</p>
									</div>

									</a>
								</div>
							</div>
							
						</div>


								<h4 class="heading">Troops Awards</h4>
								<!-- AWARDS -->
								<div class="awards">
									<div class="row">
										<div class="col-md-3 col-sm-6">
											<div class="award-item">
												<div class="hexagon">
													<span class="lnr lnr-sun award-icon"></span>
												</div>
												<span>Most Bright Idea</span>
											</div>
										</div>
										<div class="col-md-3 col-sm-6">
											<div class="award-item">
												<div class="hexagon">
													<span class="lnr lnr-clock award-icon"></span>
												</div>
												<span>Most On-Time</span>
											</div>
										</div>
										<div class="col-md-3 col-sm-6">
											<div class="award-item">
												<div class="hexagon">
													<span class="lnr lnr-magic-wand award-icon"></span>
												</div>
												<span>Problem Solver</span>
											</div>
										</div>
										<div class="col-md-3 col-sm-6">
											<div class="award-item">
												<div class="hexagon">
													<span class="lnr lnr-heart award-icon"></span>
												</div>
												<span>Most Loved</span>
											</div>
										</div>
									</div>
									<div class="text-center"><a href="#" class="btn btn-default">See all awards</a></div>
								</div>

	</div>

	</body>
	</html>

<?php endif; ?>
<?php if ($_SESSION['level'] == 'kasir') : ?>
<h1>Hallo ini kasir</h1>
<?php else: ?>
<h1>Hallo ini user</h1>
<?php endif; ?>