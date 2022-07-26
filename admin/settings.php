<?php
  $sql = mysqli_query($con, "SELECT * FROM dinamis");
  $arr = array();
  while($data = mysqli_fetch_assoc($sql))
  {
    $arr[] = $data;
  }
  $result = mysqli_query($con, "SELECT * FROM users WHERE email = '".$_SESSION['user']."'");
  $data = mysqli_fetch_assoc($result);
  
?>
			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
				<!-- Content Header (Page header) -->
				<div class="content-header">
					<div class="container-fluid">
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1 class="m-0">Ubah Data</h1>
							</div>
							<!-- /.col -->
							<div class="col-sm-6">
								<ol class="breadcrumb float-sm-right">
									<li class="breadcrumb-item">
										<a href="?url=dashboard">Home</a>
									</li>
									<li class="breadcrumb-item active">Ubah Data</li>
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
                <div class="<?php if($data['role'] == 'admin'){echo "col-md-8";}else{echo "col-md-4";} ?>">
                  
                  <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Data Akun</h3>
                    </div>
                    <form method="POST" action="settings-post.php" enctype="multipart/form-data">
                      <!-- /.card-header -->
                      <div class="card-body">
                        <?php
                        if(isset($_GET['success']) == true && isset($_GET['data']) == 'profile')
                        {
                          echo '
                          <div class="alert alert-success" role="alert">
                            <b>Sukses</b> '.$_GET['message'].'
                          </div>
                          ';
                        }
                        else if(isset($_GET['failed']) == true && isset($_GET['data']) == 'profile')
                        {
                          echo '
                          <div class="alert alert-danger" role="alert">
                            <b>Gagal</b> '.$_GET['message'].'
                          </div>
                          ';
                        }
                        ?>
                        <div class="col-12">
                          <div class="form-group">
                            <label for="image">Image</label>
                            <br>
                            <img id="previewimage" src="../<?= $data['image'] ?>" style="width: 200px; height: 200px;" class="rounded-3 pb-3">
                            <div class="input-group">
                              <div class="custom-file">
                                <input type="file" accept="image/*" onchange="$('#previewimage').show();document.getElementById('previewimage').src = window.URL.createObjectURL(this.files[0]);$('#labelimage').html(this.files[0].name);" class="custom-file-input" name="nameimage" id="image">
                                <label class="custom-file-label" id="labelimage" for="image">Choose file</label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="name">Nama</label>
                          <input type="text" class="form-control form-control-border border-width-2" name="namename" id="name" placeholder="Nama" value="<?= $data['name'] ?>">
                        </div> 
                        <div class="form-group">
                          <label for="email">Email</label>
                          <input type="email" class="form-control form-control-border border-width-2" name="nameemail" id="email" placeholder="Email" value="<?= $data['email'] ?>">
                        </div> 
                        <div class="form-check mb-3">
                          <input class="form-check-input" type="checkbox" value="" id="ubahpass">
                          <label class="form-check-label" for="ubahpass">
                            Ubah Password
                          </label>
                        </div> 
                        <div id="pakepassword" style="display: none;">
                          <div class="form-group">
                              <label for="password_old">Password Lama</label>
                              <input type="password" data-toggle="password" class="form-control form-control-border border-width-2" name="namepassword_old" id="password_old" placeholder="Password Lama">
                          </div>
                          <div class="form-group">
                              <label for="password_new">Password Baru</label>
                              <input type="password" data-toggle="password" class="form-control form-control-border border-width-2" name="namepassword_new" id="password_new" placeholder="Password Baru">
                          </div>
                        </div>
                        <input type="submit" name="submitedit" id="submit" class="btn btn-primary">
                      </div>
                      <!-- /.card-body -->
                    </form>
                  </div>
                </div>
                <?php
                  if($data['role'] == 'superadmin'):
                ?>
                <div class="col-md-8">
                  <!-- general form elements -->
                  <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Data Sekolah</h3>
                    </div>
                    
                    <form method="POST" action="settings-post.php" enctype="multipart/form-data">
                      <!-- /.card-header -->
                      <div class="card-body">
                        <?php
                        if(isset($_GET['success']) == true && !isset($_GET['data']))
                        {
                          echo '
                          <div class="alert alert-success" role="alert">
                            <b>Sukses</b> '.$_GET['message'].'
                          </div>
                          ';
                        }
                        else if(isset($_GET['failed']) == true && !isset($_GET['data']))
                        {
                          echo '
                          <div class="alert alert-danger" role="alert">
                            <b>Gagal</b> '.$_GET['message'].'
                          </div>
                          ';
                        }
                        ?>
                        <div class="row">
                            <?php
                              for($i=0;$i<count($arr)-1;$i++)
                              {
                                if($i == 1 OR $i == 8)
                                {
                                  echo '
                                    <div class="col-8 col-md-10">
                                      <div class="form-group">
                                        <label for="'.$arr[$i]['id'].'">'.$arr[$i]['name'].'</label>
                                        <br>
                                        <img id="preview'.$arr[$i]['id'].'" src="../'.str_replace('"','',str_replace('\\','',json_encode($arr[$i]['data']))).'" style="max-width: 100%; height: 200px;" class="rounded-3 pb-3">
                                        <div class="input-group">
                                          <div class="custom-file">
                                            <input type="file" accept="image/*" class="custom-file-input" name="name'.$arr[$i]['id'].'" id="'.$arr[$i]['id'].'">
                                            <label class="custom-file-label" id="label'.$arr[$i]['id'].'" for="'.$arr[$i]['id'].'">Choose file</label>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-4 col-md-2 pt-4" id="helper'.$arr[$i]['id'].'" style="display: none;">
                                      <div class="row">
                                        <div class="col-6">
                                          <input type="submit" name="submit'.$arr[$i]['id'].'" class="btn btn-sm btn-success btn-block" value="✓">
                                        </div>
                                        <div class="col-6">
                                          <input type="button" name="btn'.$arr[$i]['id'].'" class="btn btn-sm btn-outline-danger btn-block" value="X">
                                        </div>
                                      </div>
                                    </div>
                                  ';
                                }
                                else if($i >= 2 AND $i <= 4 OR $i == 7 OR $i >= 9 AND $i <= 10)
                                {
                                  echo '
                                    <div class="col-8 col-md-10">
                                      <div class="form-group">
                                        <label for="'.$arr[$i]['id'].'">'.$arr[$i]['name'].'</label>
                                        <textarea name="name'.$arr[$i]['id'].'" id="'.$arr[$i]['id'].'" rows="6" class="form-control form-control-border border-width-2" placeholder="'.$arr[$i]['name'].'">'.$arr[$i]['data'].'</textarea>
                                      </div> 
                                    </div> 
                                    <div class="col-4 col-md-2 pt-4" id="helper'.$arr[$i]['id'].'" style="display: none;">
                                      <div class="row">
                                        <div class="col-6">
                                          <input type="submit" name="submit'.$arr[$i]['id'].'" class="btn btn-sm btn-success btn-block" value="✓">
                                        </div>
                                        <div class="col-6">
                                          <input type="button" name="btn'.$arr[$i]['id'].'" class="btn btn-sm btn-outline-danger btn-block" value="X">
                                        </div>
                                      </div>
                                    </div>
                                  ';
                                }
                                else
                                {
                                  echo '
                                    <div class="col-8 col-md-10">
                                      <div class="form-group">
                                        <label for="'.$arr[$i]['id'].'">'.$arr[$i]['name'].'</label>
                                        <input type="text" class="form-control form-control-border border-width-2" name="name'.$arr[$i]['id'].'" id="'.$arr[$i]['id'].'" placeholder="'.$arr[$i]['name'].'" value="'.$arr[$i]['data'].'">
                                      </div> 
                                    </div> 
                                    <div class="col-4 col-md-2 pt-4" id="helper'.$arr[$i]['id'].'" style="display: none;">
                                      <div class="row">
                                        <div class="col-6">
                                          <input type="submit" name="submit'.$arr[$i]['id'].'" class="btn btn-sm btn-success btn-block" value="✓">
                                        </div>
                                        <div class="col-6">
                                          <input type="button" name="btn'.$arr[$i]['id'].'" class="btn btn-sm btn-outline-danger btn-block" value="X">
                                        </div>
                                      </div>
                                    </div>
                                  ';
                                }
                              }
                            ?>  
                        </div>
                      </div>
                      <!-- /.card-body -->
                    </form>
                  </div>
                  <!-- /.card -->
                </div>
                <?php
                endif;
                ?>
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
  for(let i=0;i<=js_arr.length;i++)
  {
    if(i == 2 || i == 9)
    {
      
      $('#'+i).change(function(e){
        var fileName = e.target.files[0].name;
        $('#label'+i).html(fileName);
        $('#preview'+i).attr('src', window.URL.createObjectURL(this.files[0]));
        $('#helper'+i).show();
      });
      $('[name=btn'+i+']').click(function(){
        // $('[name='+i+']').val(js_arr[i-1]['data']);
        $('#helper'+i).hide();
        $('#label'+i).html("Choose file");
        $('#preview'+i).attr('src', '../'+js_arr[i-1]['data']);
      });
    }
    else
    {
      $('[name=btn'+i+']').click(function(){
        $('[name=name'+i+']').val(js_arr[i-1]['data']);
        $('#helper'+i).hide();
      });
      $('[name=name'+i+']').click(function(){
        $('#helper'+i).show();
      });
    }
  }
    $("#ubahpass").click(function() {
      if($(this).is(":checked")) {
          $("#pakepassword").show();
      } else {
          $("#pakepassword").hide();
      }
    });
</script>