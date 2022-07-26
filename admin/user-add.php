<?php
  $sql = mysqli_query($con, "SELECT * FROM dinamis");
  $arr = array();
  while($data = mysqli_fetch_assoc($sql))
  {
    $arr[] = $data;
  }
?>
			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
				<!-- Content Header (Page header) -->
				<div class="content-header">
					<div class="container-fluid">
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1 class="m-0">Admin</h1>
							</div>
							<!-- /.col -->
							<div class="col-sm-6">
								<ol class="breadcrumb float-sm-right">
									<li class="breadcrumb-item">
										<a href="?url=dashboard">Home</a>
									</li>
									<li class="breadcrumb-item">
										<a href="?url=user">Admin</a>
									</li>
									<li class="breadcrumb-item active">Tambah Admin</li>
								</ol>
							</div>
							<!-- /.col -->
						</div>
						<!-- /.row -->
					</div>
					<!-- /.container-fluid -->
				</div>
				<!-- /.content-header -->
				<!-- Main content -->
				<section class="content">
					<div class="container-fluid">
						<div class="row">
                <div class="col-md-9">
                  <!-- general form elements -->
                  <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Tambah Admin</h3>
                    </div>
                    
                    <form method="POST" action="user-post.php" enctype="multipart/form-data">
                      <!-- /.card-header -->
                      <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <div class="input-wrapper">
                                    <div class="form-group">
                                        <label for="name">Nama</label>
                                        <input type="text" class="form-control form-control-border border-width-2" name="namename" id="name" placeholder="Nama">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control form-control-border border-width-2" name="nameemail" id="email" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" data-toggle="password" class="form-control form-control-border border-width-2" name="namepassword" id="password" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <label for="role">Peran</label>
                                        <select name="namerole" class="form-control form-control-border border-width-2" id="role">
                                          <option value="" disabled selected>Pilih</option>
                                          <option value="superadmin">Super Admin</option>
                                          <option value="admin">Admin</option>
                                        </select>
                                    </div>
                                </div>
                                <input type="submit" name="submit" id="submit" class="btn btn-primary">
                            </div>
                        </div>
                      </div>
                      <!-- /.card-body -->
                    </form>
                  </div>
                  <!-- /.card -->
                </div>
            </div>
					</div>
					<!-- /.container-fluid -->
				</section>
				<!-- /.content -->
			</div>
