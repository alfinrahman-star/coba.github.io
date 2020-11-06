<head>
	<link rel="stylesheet" href="bootstrap.css">
</head>
<style>
 #login{
	 
 }
 
</style>

<body class="hold-transition login-page" style="background:#c2d6d6">
		
		<div id="login" class="login-box rounded-lg" style=" width:350px; height:400px;background: #e6ffee; position:fixed;">
		<img src="gambar/gbr1.png" style="position:absolute; left:340px; top:160px; ">
		<img src="gambar/gbr0.png" style="position:absolute; right:340px; top:160px;">
		<img src="gambar/gbr2.png" style="position:absolute; left:140px; bottom:375px;">
		<div class="login-logo" style="margin-top:40px; font-family:verdana;">
			<a href="index.php" style="font-size:20px; position:absolute; top:50px; right:20px;">
				<b>Sistem Informasi</b> Kepegawaian
			</a>
		</div>
		<!-- /.login-logo -->
		<div class="card-body login-card-body" style="right:13px; position:absolute; top:80px; width:320px; hight:330px; background:#e6ffee;" >
			<div class="card-body login-card-body" style="background:#e6ffee;">
				<p class="login-box-msg" style="font-size:15px;">Sign in to start your session</p>
				<?php if (!empty($_GET['gagal'])) { ?>
					<?php if ($_GET['gagal'] == "userKosong") { ?>
						<span class="text-danger">Maaf Username Tidak Boleh Kosong</span>
					<?php } else if ($_GET['gagal'] == "passKosong") { ?>
						<span class="text-danger">Maaf Password Tidak Boleh Kosong</span>
					<?php } else { ?>
						<span class="text-danger">Maaf Username dan Password Anda Salah</span>
					<?php } ?>
				<?php } ?>
				<form action="index.php?include=konfirmasi_login" method="post">
					<div class="input-group mb-3" border-color="yellow">
						<input type="text" class="form-control rounded-pill" placeholder="Username" name="username" style=" width:360px;">
						<svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-person-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg" style=" position:absolute; left:200px; top:5px;">
  <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
</svg>
					</div>
					<div class="input-group mb-3">
						<input type="password" class="form-control rounded-pill" placeholder="Password" name="password" style=" width:360px;">
						<svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-lock-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg" style="  position:absolute; left:200px; top:5px;">
  <path d="M2.5 9a2 2 0 0 1 2-2h7a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-7a2 2 0 0 1-2-2V9z"/>
  <path fill-rule="evenodd" d="M4.5 4a3.5 3.5 0 1 1 7 0v3h-1V4a2.5 2.5 0 0 0-5 0v3h-1V4z"/>
</svg>
					</div>
					<div class="row">
						<div class="col-8"></div>
						<!-- /.col -->
						<div class="col-4" style="postion:absolute; right:170px;">
							<button type="submit" name="login" value="Login" class="btn btn-info btn-block rounded-pill" style=" width:240px;"><b>Log In</b></button>
						</div>
						<!-- /.col -->
					</div>
				</form>
				<!-- /.social-auth-links -->
			</div>
			<!-- /.login-card-body -->
		</div>
	</div>
	<!-- /.login-box -->
	<!-- jQuery -->
	<?php include("includes/script.php") ?>
</body>