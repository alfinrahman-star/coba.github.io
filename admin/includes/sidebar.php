<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
<link rel="stylesheet" href="css/css.css">
	<!-- Brand Logo -->
	<a href="index.php" class="brand-link">
		<img src="dist/img/admin.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
		<span class="brand-text font-weight-light">Admin UB IT</span>
	</a>
	<!-- Sidebar -->
	<div class="sidebar">

		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<li class="nav-item">
					<a href="index.php?include=profil_anggota" class="nav-link">
						<i class="fas fa-users"></i>
						<p style="color:white;">&nbsp;&nbsp;Profil Anggota</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="index.php?include=profil" class="nav-link">
						<i class="nav-icon fas fa-user"></i>
						<p style="color:white;">Profil Pegawai</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="index.php?include=pegawai" class="nav-link">
						<i class="nav-icon fas fa-user-tie"></i>
						<p style="color:white;">Data Pegawai</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="index.php?include=jobdesk" class="nav-link">
						<i class="nav-icon fas fa-address-card"></i>
						<p style="color:white;">Data Jobdesk</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="index.php?include=bidang_keahlian" class="nav-link">
						<i class="fas fa-laptop-code"></i>
						<p style="color:white;">&nbsp;&nbsp;Data Bidang Keahlian</p>
					</a>
				</li>
				<?php
				if (isset($_SESSION['level'])) {
					if ($_SESSION['level'] == "superadmin") { ?>
						<li class="nav-item">
							<a href="index.php?include=user" class="nav-link">
								<i class="nav-icon fas fa-user-cog"></i>
								<p style="color:white;">Pengaturan User</p>
							</a>
						</li>
					<?php } ?>
				<?php } ?>
				<li class="nav-item">
					<a href="index.php?include=sign_out" class="nav-link">
						<i class="nav-icon fas fa-sign-out-alt"></i>
						<p style="color:white;">Sign Out</p>
					</a>
				</li>
			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>