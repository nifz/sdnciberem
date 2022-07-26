<?php
    $result = mysqli_query($con, "SELECT * FROM users WHERE email = '".$_SESSION['user']."'");
    $data = mysqli_fetch_assoc($result);

?>

			<!-- Preloader -->
			<div class="preloader flex-column justify-content-center align-items-center">
				<img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
			</div>
			<!-- Navbar -->
			<nav class="main-header navbar navbar-expand navbar-white navbar-light">
				<!-- Left navbar links -->
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" data-widget="pushmenu" href="#" role="button">
							<i class="fas fa-bars"></i>
						</a>
					</li>
					<li class="nav-item d-none d-sm-inline-block">
						<a href="../index.php" class="nav-link">Home</a>
					</li>
					<li class="nav-item d-none d-sm-inline-block">
						<a href="logout.php" class="nav-link">Logout</a>
					</li>
				</ul>
			</nav>
			<!-- /.navbar -->
			<!-- Main Sidebar Container -->
			<aside class="main-sidebar sidebar-dark-primary elevation-4">
				<!-- Brand Logo -->
				<a href="../" class="brand-link">
					<img src="../<?= str_replace('"','',json_encode($arr[1]['data'])) ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
					<span class="brand-text font-weight-light"><?= str_replace('"','',json_encode($arr[0]['data'])) ?></span>
				</a>
				<!-- Sidebar -->
				<div class="sidebar">
					<!-- Sidebar user panel (optional) -->
					<div class="user-panel mt-3 pb-3 mb-3 d-flex">
						<div class="image">
							<img src="../<?= $data['image'] ?>" class="img-circle elevation-2" style="width: 34px; height: 34px;" alt="User Image">
						</div>
						<div class="info">
							<a href="#" class="d-block"><?php echo $data['name'] ?></a>
						</div>
					</div>
					<!-- Sidebar Menu -->
					<nav class="mt-2">
						<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
							<!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
							<li class="nav-item">
								<a href="?url=dashboard" class="nav-link 
                                    <?php 
                                        if(strpos($_SERVER['REQUEST_URI'],'dashboard') == TRUE)
                                        {
                                            echo "active";
                                        }
                                    ?>
                                ">
									<i class="nav-icon fas fa-tachometer-alt"></i>
									<p> Dashboard</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="?url=settings" class="nav-link 
                                    <?php 
                                        if(strpos($_SERVER['REQUEST_URI'],'settings') == TRUE)
                                        {
                                            echo "active";
                                        }
                                    ?>
                                ">
									<i class="nav-icon fas fa-cog"></i>
									<p> Ubah Data</p>
								</a>
							</li>
							<?php
								if($data['role'] == 'superadmin') :
							?>
							<li class="nav-item 
								<?php 
									if(strpos($_SERVER['REQUEST_URI'],'user') == TRUE)
									{
										echo "menu-is-opening menu-open";
									}
								?>
							">
								<a href="#" class="nav-link 
                                    <?php 
                                        if(strpos($_SERVER['REQUEST_URI'],'user') == TRUE)
                                        {
                                            echo "active";
                                        }
                                    ?>
								">
									<i class="nav-icon fas fa-user"></i>
									<p> Admin <i class="fas fa-angle-left right"></i></p>
								</a>
								<ul class="nav nav-treeview">
									<li class="nav-item">
										<a href="?url=user" class="nav-link 
											<?php 
												if(strpos($_SERVER['REQUEST_URI'],'user') == TRUE AND strpos($_SERVER['REQUEST_URI'],'user&action=add') != TRUE OR strpos($_SERVER['REQUEST_URI'],'user&action=edit') == TRUE)
												{
													echo "active";
												}
											?>
										">
											<i class="far fa-angle-right nav-icon"></i>
											<p>Data Admin</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?url=user&action=add" class="nav-link 
											<?php 
												if(strpos($_SERVER['REQUEST_URI'],'user') == TRUE && strpos($_SERVER['REQUEST_URI'],'action=add') == TRUE)
												{
													echo "active";
												}
											?>
										">
											<i class="far fa-angle-right nav-icon"></i>
											<p>Tambah Admin</p>
										</a>
									</li>
								</ul>
							</li>
							<?php
								endif;
							?>
							<li class="nav-item 
								<?php 
									if(strpos($_SERVER['REQUEST_URI'],'gallery') == TRUE)
									{
										echo "menu-is-opening menu-open";
									}
								?>
							">
								<a href="#" class="nav-link 
                                    <?php 
                                        if(strpos($_SERVER['REQUEST_URI'],'gallery') == TRUE)
                                        {
                                            echo "active";
                                        }
                                    ?>
								">
									<i class="nav-icon far fa-image"></i>
									<p> Galeri <i class="fas fa-angle-left right"></i></p>
								</a>
								<ul class="nav nav-treeview">
									<li class="nav-item">
										<a href="?url=gallery" class="nav-link 
											<?php 
												if(strpos($_SERVER['REQUEST_URI'],'gallery') == TRUE AND strpos($_SERVER['REQUEST_URI'],'gallery&action=add') != TRUE OR strpos($_SERVER['REQUEST_URI'],'gallery&action=edit') == TRUE)
												{
													echo "active";
												}
											?>
										">
											<i class="far fa-angle-right nav-icon"></i>
											<p>Data Gambar</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?url=gallery&action=add" class="nav-link 
											<?php 
												if(strpos($_SERVER['REQUEST_URI'],'gallery') == TRUE && strpos($_SERVER['REQUEST_URI'],'action=add') == TRUE)
												{
													echo "active";
												}
											?>
										">
											<i class="far fa-angle-right nav-icon"></i>
											<p>Tambah Gambar</p>
										</a>
									</li>
								</ul>
							</li>
							<li class="nav-item 
								<?php 
									if(strpos($_SERVER['REQUEST_URI'],'achievement') == TRUE)
									{
										echo "menu-is-opening menu-open";
									}
								?>
							">
								<a href="#" class="nav-link 
                                    <?php 
                                        if(strpos($_SERVER['REQUEST_URI'],'achievement') == TRUE)
                                        {
                                            echo "active";
                                        }
                                    ?>
								">
									<i class="nav-icon fas fa-graduation-cap"></i>
									<p> Prestasi <i class="fas fa-angle-left right"></i></p>
								</a>
								<ul class="nav nav-treeview">
									<li class="nav-item">
										<a href="?url=achievement" class="nav-link 
											<?php 
												if(strpos($_SERVER['REQUEST_URI'],'achievement') == TRUE AND strpos($_SERVER['REQUEST_URI'],'achievement&action=add') != TRUE OR strpos($_SERVER['REQUEST_URI'],'achievement&action=edit') == TRUE)
												{
													echo "active";
												}
											?>
										">
											<i class="far fa-angle-right nav-icon"></i>
											<p>Data Prestasi</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?url=achievement&action=add" class="nav-link 
											<?php 
												if(strpos($_SERVER['REQUEST_URI'],'achievement') == TRUE && strpos($_SERVER['REQUEST_URI'],'action=add') == TRUE)
												{
													echo "active";
												}
											?>
										">
											<i class="far fa-angle-right nav-icon"></i>
											<p>Tambah Prestasi</p>
										</a>
									</li>
								</ul>
							</li>
							<li class="nav-item 
								<?php 
									if(strpos($_SERVER['REQUEST_URI'],'blog') == TRUE)
									{
										echo "menu-is-opening menu-open";
									}
								?>
							">
								<a href="#" class="nav-link 
                                    <?php 
                                        if(strpos($_SERVER['REQUEST_URI'],'blog') == TRUE)
                                        {
                                            echo "active";
                                        }
                                    ?>
								">
									<i class="nav-icon fas fa-newspaper"></i>
									<p> Berita <i class="fas fa-angle-left right"></i></p>
								</a>
								<ul class="nav nav-treeview">
									<li class="nav-item">
										<a href="?url=blog" class="nav-link 
											<?php 
												if(strpos($_SERVER['REQUEST_URI'],'blog') == TRUE AND strpos($_SERVER['REQUEST_URI'],'blog&action=add') != TRUE OR strpos($_SERVER['REQUEST_URI'],'blog&action=edit') == TRUE)
												{
													echo "active";
												}
											?>
										">
											<i class="far fa-angle-right nav-icon"></i>
											<p>Data Berita</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?url=blog&action=add" class="nav-link 
											<?php 
												if(strpos($_SERVER['REQUEST_URI'],'blog') == TRUE && strpos($_SERVER['REQUEST_URI'],'action=add') == TRUE)
												{
													echo "active";
												}
											?>
										">
											<i class="far fa-angle-right nav-icon"></i>
											<p>Tambah Berita</p>
										</a>
									</li>
								</ul>
							</li>
							<li class="nav-item d-block d-md-none">
								<a href="logout.php" class="nav-link">
									<i class="nav-icon fas fa-sign-out-alt"></i>
									<p> Logout</p>
								</a>
							</li>
						</ul>
					</nav>
					<!-- /.sidebar-menu -->
				</div>
				<!-- /.sidebar -->
			</aside>