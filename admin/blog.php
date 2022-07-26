<?php
  $sql = mysqli_query($con, "SELECT * FROM dinamis");
  $arr = array();
  while($data = mysqli_fetch_assoc($sql))
  {
    $arr[] = $data;
  }
  $qry = mysqli_query($con, "SELECT * FROM blog ORDER BY updated_at DESC");
?>
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
									<li class="breadcrumb-item active">Berita</li>
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
                            <div class="col-md-12">
                                <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h3 class="card-title">Data Berita</h3>
                                    <div class="card-tools">
                                        <a href="?url=blog&action=add" class="pr-2">
                                            <i class="nav-icon fas fa-edit"></i>
                                            Tambah Berita
                                        </a>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul</th>
                                        <th>Gambar</th>
                                        <th>Kategori</th>
                                        <th>Terakhir diubah</th>
                                        <th>Aksi</th>
                                    </tr>
                                    </thead>
                                        <tbody>
                                            <?php $i=1; while($d = mysqli_fetch_assoc($qry)) : ?>
                                            <tr>
                                                <td><?= $i++ ?></td>
                                                <td><?= $d['title'] ?></td>
                                                <td><img src="../<?= $d['thumbnail'] ?>" style="height: 50px;" alt=""></td>
                                                <td><?= $d['tags'] ?></td>
                                                <td><?= date('d M Y H:i',strtotime($d['updated_at'])) ?></td>
                                                <td>
                                                  <a href="../blog.php?berita=<?= $d['slug'] ?>" class="btn btn-sm btn-secondary">Lihat</a>
                                                  <a href="?url=blog&action=edit&id=<?= $d['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                                                </td>
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