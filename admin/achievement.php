<?php
  $sql = mysqli_query($con, "SELECT * FROM dinamis");
  $arr = array();
  while($data = mysqli_fetch_assoc($sql))
  {
    $arr[] = $data;
  }
  $qry = mysqli_query($con, "SELECT * FROM prestasi ORDER BY tahun DESC");
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
									<li class="breadcrumb-item active">Prestasi</li>
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
                <div class="col-md-4">
                  <!-- general form elements -->
                  <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Prestasi</h3>
                    </div>
                    
                    <form method="POST" action="achievement-post.php" enctype="multipart/form-data">
                      <!-- /.card-header -->
                      <div class="card-body">
                        <?php
                        if(isset($_GET['success']) == true)
                        {
                          echo '
                          <div class="alert alert-success" role="alert">
                            <b>Sukses</b> '.$_GET['message'].'
                          </div>
                          ';
                        }
                        else if(isset($_GET['failed']) == true)
                        {
                          echo '
                          <div class="alert alert-danger" role="alert">
                            <b>Gagal</b> '.$_GET['message'].'
                          </div>
                          ';
                        }
                        ?>
                        <div class="row">
                            <div class="col-8 col-md-9">
                                <div class="form-group">
                                <label for="<?= $arr[11]['id'] ?>"><?= $arr[11]['name'] ?></label>
                                <br>
                                <img id="preview<?= $arr[11]['id'] ?>" src="../<?= str_replace('"','',str_replace('\\','',json_encode($arr[11]['data']))) ?>" style="max-width: 100%; height: 250px;" class="rounded-3 pb-3">
                                <div class="input-group">
                                    <div class="custom-file">
                                    <input type="file" accept="image/*" class="custom-file-input" name="name<?= $arr[11]['id'] ?>" id="<?= $arr[11]['id'] ?>">
                                    <label class="custom-file-label" id="label<?= $arr[11]['id'] ?>" for="<?= $arr[11]['id'] ?>">Choose file</label>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="col-4 col-md-3 pt-4" id="helper<?= $arr[11]['id'] ?>" style="display: none;">
                                <div class="row">
                                <div class="col-6">
                                    <input type="submit" name="submit<?= $arr[11]['id'] ?>" class="btn btn-sm btn-success btn-block" value="✓">
                                </div>
                                <div class="col-6">
                                    <input type="button" name="btn<?= $arr[11]['id'] ?>" class="btn btn-sm btn-outline-danger btn-block" value="X">
                                </div>
                                </div>
                            </div>
                        </div>
                      </div>
                      <!-- /.card-body -->
                    </form>
                  </div>
                  <!-- /.card -->
                </div>
                <div class="col-md-8">
                    
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">Data Prestasi</h3>
                <div class="card-tools">
                    <a href="?url=achievement&action=add" class="pr-2">
                        <i class="nav-icon fas fa-edit"></i>
                        Tambah Prestasi
                    </a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Tahun</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                    <tbody>
                        <?php $i=1; while($d = mysqli_fetch_assoc($qry)) : ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $d['tahun'] ?></td>
                            <td><?= $d['keterangan'] ?></td>
                            <td><a href="?url=achievement&action=edit&id=<?= $d['id'] ?>" class="btn btn-sm btn-warning">Edit</a></td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
                </div>
            </div>
					</div>
					<!-- /.container-fluid -->
				</section>
				<!-- /.content -->
			</div>

<script>
  
  <?php
    // for($i=0;$i<count($arr);$i++)
    // {
    //   echo "
    //     $('input[name=btn1]').click(function(){
    //       $('#helper1').hide();
    //       $('input[name=1]').val('".$arr[$i]['data']."');
    //     });
    //     $('input[name=1]').click(function(){
    //       $('#helper1').show();
    //     })
    //   ";
    // }
    echo "let js_arr = ". json_encode($arr) . ";\n";
  ?>
  
    $('#12').change(function(e){
    var fileName = e.target.files[0].name;
    $('#label12').html(fileName);
    $('#preview12').attr('src', window.URL.createObjectURL(this.files[0]));
    $('#helper12').show();
    });
    $('[name=btn12'+']').click(function(){
    // $('[name=12'+']').val(js_arr[i-1]['data']);
    $('#helper12').hide();
    $('#label12').html("Choose file");
    $('#preview12').attr('src', '../'+js_arr[11]['data']);
    });

    
  $(function () {
    $('#example1').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>