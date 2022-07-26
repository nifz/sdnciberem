<?php
    $data;
    if(isset($_GET['id']))
    {
    $qry = mysqli_query($con,"SELECT * FROM prestasi WHERE id=".$_GET['id']."");
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
								<h1 class="m-0">Prestasi</h1>
							</div>
							<!-- /.col -->
							<div class="col-sm-6">
								<ol class="breadcrumb float-sm-right">
									<li class="breadcrumb-item">
										<a href="?url=dashboard">Home</a>
									</li>
									<li class="breadcrumb-item">
										<a href="?url=achievement">Prestasi</a>
									</li>
									<li class="breadcrumb-item active">Edit Prestasi</li>
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
                      <h3 class="card-title">Edit Prestasi</h3>
                    </div>
                    
                    <form method="POST" action="achievement-post.php" enctype="multipart/form-data">
                      <!-- /.card-header -->
                      <input type="hidden" name="id" value="<?= $data['id'] ?>">
                      <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <div class="input-wrapper">
                                    <div class="form-group">
                                        <label for="tahun0">Tahun</label>
                                        <input type="number" class="form-control form-control-border border-width-2" name="nametahun" id="tahun0" placeholder="Tahun" value="<?= $data['tahun'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="keterangan0">Keterangan</label>
                                        <textarea id="keterangan0" rows="6" class="form-control form-control-border border-width-2" name="nameketerangan" placeholder="Keterangan"><?= str_replace("<br />","",$data['keterangan']) ?></textarea>
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
