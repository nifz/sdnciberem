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
									<li class="breadcrumb-item active">Tambah Gambar</li>
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
                      <h3 class="card-title">Tambah Gambar</h3>
                    </div>
                    
                    <form method="POST" action="gallery-post.php" enctype="multipart/form-data">
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
                                        <img id="previewgallery0" src="" style="max-width: 100%; height: 200px;" class="rounded-3 pb-3">
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" accept="image/*" class="custom-file-input" name="namegallery[]" onchange="$('#checked0').show();document.getElementById('previewgallery0').src = window.URL.createObjectURL(this.files[0]);$('#labelgallery0').html(this.files[0].name);" id="gallery0">
                                                <label class="custom-file-label" id="labelgallery0" for="gallery0">Choose file</label>
                                            </div>
                                            <div class="input-group-append ml-4">
                                                <button class="btn btn-outline-success" id="add" type="button"><i class="fas fa-plus"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="display: none;" id="checked0">
                                        <div class="form-group">
                                            <label for="name0">Title</label>
                                            <input type="text" class="form-control form-control-border border-width-2" name="name[]" id="name0" placeholder="Title">
                                        </div> 
                                        <div class="form-group">
                                            <label for="description0">Deskripsi</label>
                                            <input type="text" class="form-control form-control-border border-width-2" name="description[]" id="description0" placeholder="Deskripsi">
                                        </div> 
                                        <div class="form-group">
                                            
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" name="namecarausel[]" type="hidden" id="carausel00" value="0">
                                                <input class="form-check-input clscarausel" type="checkbox" id="carausel0" value="1">
                                                <label class="form-check-label" for="carausel0">Tampilkan di Section Carausel</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" name="namefacility[]" type="hidden" id="facility00" value="0">
                                                <input class="form-check-input clsfacility" type="checkbox" id="facility0" value="1">
                                                <label class="form-check-label" for="facility0">Tampilkan di Section Fasilitas</label>
                                            </div>
                                        </div>
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
                            <label for="gallery`+no+`">Preview Gambar</label>
                            <br>
                            <img id="previewgallery`+no+`" src="" style="max-width: 100%; height: 200px;" class="rounded-3 pb-3">
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" accept="image/*" class="custom-file-input" name="namegallery[]" onchange="$('#checked`+no+`').show();document.getElementById('previewgallery`+no+`').src = window.URL.createObjectURL(this.files[0]);$('#labelgallery`+no+`').html(this.files[0].name);" id="gallery`+no+`">
                                    <label class="custom-file-label" id="labelgallery`+no+`" for="gallery`+no+`">Choose file</label>
                                </div>
                                <div class="input-group-append ml-4">
                                    <button class="btn btn-outline-danger btn_remove" id="`+no+`" type="button"><i class="fas fa-minus"></i></button>
                                </div>
                            </div>
                        </div>
                        <div style="display: none;" id="checked`+no+`">
                            <div class="form-group">
                                <label for="name0">Title</label>
                                <input type="text" class="form-control form-control-border border-width-2" name="name[]" id="name0" placeholder="Title">
                            </div> 
                            <div class="form-group">
                                <label for="description0">Deskripsi</label>
                                <input type="text" class="form-control form-control-border border-width-2" name="description[]" id="description0" placeholder="Deskripsi">
                            </div> 
                            <div class="form-group">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="namecarausel[]" type="hidden" id="carausel`+no+no+`" value="0">
                                    <input class="form-check-input clscarausel" type="checkbox" id="carausel`+no+`" value="1">
                                    <label class="form-check-label" for="carausel`+no+`">Tampilkan di Section Carausel</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="namefacility[]" type="hidden" id="facility`+no+no+`" value="0">
                                    <input class="form-check-input clsfacility" type="checkbox" id="facility`+no+`" value="1">
                                    <label class="form-check-label" for="facility`+no+`">Tampilkan di Section Fasilitas</label>
                                </div>
                            </div>
                        </div>
                    </div>
                `);
            });
            $(document).on('click', '.btn_remove', function(){
                no--;
                let button_id = $(this).attr("id"); 
                $('#temp'+button_id).remove();
            });
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