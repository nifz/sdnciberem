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
									<li class="breadcrumb-item active">Tambah Prestasi</li>
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
                      <h3 class="card-title">Tambah Prestasi</h3>
                    </div>
                    
                    <form method="POST" action="achievement-post.php" enctype="multipart/form-data">
                      <!-- /.card-header -->
                      <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <div class="input-wrapper">
                                    <div class="form-group">
                                        <label for="tahun0">Tahun</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="number" class="form-control form-control-border border-width-2" name="nametahun[]" id="tahun0" placeholder="Tahun">
                                            </div>
                                            <div class="input-group-append ml-4">
                                                <button class="btn btn-outline-success" id="add" type="button"><i class="fas fa-plus"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="keterangan0">Keterangan</label>
                                        <textarea  id="keterangan0" rows="6" class="form-control form-control-border border-width-2" name="nameketerangan[]" placeholder="Keterangan"></textarea>
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

<script>

        $(document).ready(function(){
            let no = 0;
            $('#add').click(function(){
                no++;
                $('.input-wrapper').append(`
                    <div id="temp`+no+`" class="pt-3">
                        <div class="form-group">
                            <label for="tahun`+no+`">Tahun</label>
                            <br>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="number" class="form-control form-control-border border-width-2" name="nametahun[]" id="tahun`+no+`" placeholder="Tahun">
                                </div>
                                <div class="input-group-append ml-4">
                                    <button class="btn btn-outline-danger btn_remove" id="`+no+`" type="button"><i class="fas fa-minus"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="keterangan`+no+`">Keterangan</label>
                            <textarea id="keterangan`+no+`" rows="6" class="form-control form-control-border border-width-2" name="nameketerangan[]" placeholder="Keterangan"></textarea>
                        </div> 
                    </div>
                `);
            });
            $(document).on('click', '.btn_remove', function(){
                no--;
                let button_id = $(this).attr("id"); 
                $('#temp'+button_id).remove();
            });
        });

</script>