<?php
  $data;
  if(isset($_GET['id']))
  {
    $qry = mysqli_query($con,"SELECT * FROM gallery WHERE id=".$_GET['id']."");
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
								<h1 class="m-0">Galeri</h1>
							</div>
							<!-- /.col -->
							<div class="col-sm-6">
								<ol class="breadcrumb float-sm-right">
									<li class="breadcrumb-item">
										<a href="?url=dashboard">Home</a>
									</li>
									<li class="breadcrumb-item">
										<a href="?url=gallery">Galeri</a>
									</li>
									<li class="breadcrumb-item active">Edit Gambar</li>
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
                      <h3 class="card-title">Edit Gambar</h3>
                    </div>
                    
                    <form method="POST" action="gallery-post.php" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $data['id'] ?>">
                      <!-- /.card-header -->
                      <div class="card-body">
                        <?php
                        if(isset($_GET['success']) == true)
                        {
                          echo '
                          <div class="alert alert-success" role="alert">
                            Data berhasil diubah!
                          </div>
                          ';
                        }
                        else if(isset($_GET['failed']) == true)
                        {
                          echo '
                          <div class="alert alert-danger" role="alert">
                            Data gagal diubah!
                          </div>
                          ';
                        }
                        ?>
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <div class="input-wrapper">
                                    <div class="form-group">
                                        <label for="gallery0">Preview Gambar</label>
                                        <br>
                                        <img id="previewgallery0" src="../<?= $data['image'] ?>" style="max-width: 100%; height: 200px;" class="rounded-3 pb-3">
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" accept="image/*" class="custom-file-input" name="namegallery" onchange="$('#checked0').show();document.getElementById('previewgallery0').src = window.URL.createObjectURL(this.files[0]);$('#labelgallery0').html(this.files[0].name);" id="gallery0">
                                                <label class="custom-file-label" id="labelgallery0" for="gallery0">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="checked0">
                                        <div class="form-group">
                                            <label for="name0">Title</label>
                                            <input type="text" class="form-control form-control-border border-width-2" name="name" id="name0" placeholder="Title" value="<?= $data['name'] ?>">
                                        </div> 
                                        <div class="form-group">
                                            <label for="description0">Deskripsi</label>
                                            <input type="text" class="form-control form-control-border border-width-2" name="description" id="description0" placeholder="Deskripsi" value="<?= $data['description'] ?>">
                                        </div> 
                                        <div class="form-group">
                                            
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" name="namecarausel" type="hidden" id="carausel00" value="<?= $data['carousel'] ?>">
                                                <input class="form-check-input clscarausel" type="checkbox" id="carausel0" value="1" <?php if($data['carousel'] == 1) {echo "checked";} ?>>
                                                <label class="form-check-label" for="carausel0">Tampilkan di Section Carausel</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" name="namefacility" type="hidden" id="facility00" value="<?= $data['facility'] ?>">
                                                <input class="form-check-input clsfacility" type="checkbox" id="facility0" value="1" <?php if($data['facility'] == 1) {echo "checked";} ?>>
                                                <label class="form-check-label" for="facility0">Tampilkan di Section Fasilitas</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="submit" name="submitedit" id="submit" value="Simpan" class="btn btn-primary">
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

        $(document).ready(function(){
            let no = 0;
            $(document).on('click', '.clscarausel, .clsfacility', function(){
                let button_id = $(this).attr("id"); 
                if($('#'+button_id).is(':checked'))
                {
                    $('#'+button_id+no).val(1);
                }
                else
                {
                    $('#'+button_id+no).val(0);
                }
            });
        });

</script>