<?php
  $sql = mysqli_query($con, "SELECT * FROM dinamis");
  $arr = array();
  while($data = mysqli_fetch_assoc($sql))
  {
    $arr[] = $data;
  }
  $qry = mysqli_query($con, "SELECT * FROM users");
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
									<li class="breadcrumb-item active">Admin</li>
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
              <div class="col-md-8">
                  <div class="card card-primary card-outline">
                      <div class="card-header">
                          <h3 class="card-title">Data Admin</h3>
                          <div class="card-tools">
                              <a href="?url=user&action=add" class="pr-2">
                                  <i class="nav-icon fas fa-edit"></i>
                                  Tambah Admin
                              </a>
                          </div>
                      </div>
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
                          <table id="example1" class="table table-bordered table-striped">
                          <thead>
                          <tr>
                              <th>No</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Role</th>
                              <th>Aksi</th>
                          </tr>
                          </thead>
                              <tbody>
                                  <?php $i=1; while($d = mysqli_fetch_assoc($qry)) : ?>
                                  <tr>
                                      <td><?= $i++ ?></td>
                                      <td><?= $d['name'] ?></td>
                                      <td><?= $d['email'] ?></td>
                                      <td><?= $d['role'] ?></td>
                                      <td><a href="?url=user&action=edit&id=<?= $d['id'] ?>" class="btn btn-sm btn-warning">Edit</a></td>
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