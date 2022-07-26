<?php
  $sql = mysqli_query($con, "SELECT * FROM dinamis");
  $arr = array();
  while($data = mysqli_fetch_assoc($sql))
  {
    $arr[] = $data;
  }
?>
<style>
  .note-group-select-from-files {
    display: none;
  }
</style>
			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
				<!-- Content Header (Page header) -->
				<div class="content-header">
					<div class="container-fluid">
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1 class="m-0">Berita</h1>
							</div>
							<!-- /.col -->
							<div class="col-sm-6">
								<ol class="breadcrumb float-sm-right">
									<li class="breadcrumb-item">
										<a href="?url=dashboard">Home</a>
									</li>
									<li class="breadcrumb-item">
										<a href="?url=blog">Berita</a>
									</li>
									<li class="breadcrumb-item active">Tambah Berita</li>
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
                      <h3 class="card-title">Tambah Berita</h3>
                    </div>
                    
                    <form method="POST" action="blog-post.php" enctype="multipart/form-data">
                      <!-- /.card-header -->
                      <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <div class="input-wrapper">
                                    <div class="form-group">
                                        <label for="gallery0">Preview Gambar</label>
                                        <br>
                                        <img id="previewgallery0" src="" style="max-width: 100%; height: 200px; display:none;" class="rounded-3 pb-3">
                                        <div class="custom-file">
                                            <input type="file" accept="image/*" class="custom-file-input" name="namethumbnail" onchange="$('#previewgallery0').show();document.getElementById('previewgallery0').src = window.URL.createObjectURL(this.files[0]);$('#labelgallery0').html(this.files[0].name);" id="gallery0">
                                            <label class="custom-file-label" id="labelgallery0" for="gallery0">Choose file</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="title">Judul</label>
                                        <input type="text" class="form-control form-control-border border-width-2" name="nametitle" id="title" placeholder="Judul">
                                    </div>
                                    <div class="form-group">
                                        <label for="summernote">Konten</label>
                                        <textarea  id="summernote"class="form-control form-control-border border-width-2" name="namecontent" placeholder="Isi konten"></textarea>
                                    </div> 
                                    <div class="form-group">
                                        <label for="summernote">Kategori</label>
                                        <select class="select2 form-control" multiple="multiple" name="nametags[]" style="width: 100%;" placeholder="Ketik lalu enter"></select>
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
  $(function () {
    $('#summernote').summernote({
        height: 300,
        placeholder: "Isi konten...",
    });
    
    $('.select2').select2({
        "tags": true,
        "language": {
            "noResults": function(){
                return "Ketik lalu enter";
            }
        },

    });
  });
</script>