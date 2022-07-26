<?php
    $data;
    if(isset($_GET['id']))
    {
    $qry = mysqli_query($con,"SELECT * FROM users WHERE id=".$_GET['id']."");
    if($qry)
    {
        $data = mysqli_fetch_assoc($qry);
    }
    // var_dump($data);
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
									<li class="breadcrumb-item active">Edit Admin</li>
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
                      <h3 class="card-title">Edit Admin</h3>
                    </div>
                    
                    <form method="POST" action="user-post.php" enctype="multipart/form-data">
                      <!-- /.card-header -->
                      <input type="hidden" name="id" value="<?= $data['id'] ?>">
                      <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <div class="input-wrapper">
                                    <div class="form-group">
                                        <label for="name">Nama</label>
                                        <input type="text" class="form-control form-control-border border-width-2" name="namename" id="name" placeholder="Nama" value="<?= $data['name'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control form-control-border border-width-2" name="nameemail" id="email" placeholder="Email" value="<?= $data['email'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="role">Peran</label>
                                        <select name="namerole" class="form-control form-control-border border-width-2" id="role">
                                          <option value="" disabled>Pilih</option>
                                          <option value="superadmin" <?php if($data['role'] == 'superadmin'){echo "selected";} ?>>Super Admin</option>
                                          <option value="admin" <?php if($data['role'] == 'admin'){echo "selected";} ?>>Admin</option>
                                        </select>
                                    </div>
                                    <div class="form-check mb-3">
                                      <input class="form-check-input" type="checkbox" value="" id="ubahpass">
                                      <label class="form-check-label" for="ubahpass">
                                        Ubah Password
                                      </label>
                                    </div>
                                    <div id="pakepassword" style="display: none;">
                                      <div class="form-group">
                                          <label for="password_new">Password Baru</label>
                                          <input type="password" data-toggle="password" class="form-control form-control-border border-width-2" name="namepassword_new" id="password_old" placeholder="Password Baru">
                                      </div>
                                    </div>
                                </div>
                                <input type="submit" name="submitedit" id="submit" class="btn btn-primary">
                                <input type="submit" name="delete" id="delete" value="Hapus" class="ml-2 btn btn-outline-danger">
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
<script>
  $("#ubahpass").click(function() {
    if($(this).is(":checked")) {
        $("#pakepassword").show();
    } else {
        $("#pakepassword").hide();
    }
  });
</script>