<?php
  $sql = mysqli_query($con, "SELECT * FROM gallery");
  $arr = array();
  while($data = mysqli_fetch_assoc($sql))
  {
    $arr[] = $data;
  }
?>
<style>
    .card
    {
        margin-bottom: 25px;
    }
    .card-img-top 
    {
        width: 100%;
        height: 300px;
        object-fit: cover;
    }
    .card .card-img-top:hover
    {
        opacity: 0.8;
    }
</style>
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
									<li class="breadcrumb-item active">Galeri</li>
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
                  <!-- general form elements -->
                  <div class="card card-primary card-outline">
                    <div class="card-header">
                      <h3 class="card-title">Data Gambar</h3>
                        <div class="card-tools">
                            <a href="?url=gallery&action=add" class="pr-2">
                                <i class="nav-icon fas fa-plus"></i>
                                Tambah Gambar
                            </a>
                        </div>
                    </div>
                    
                    <form method="POST" action="settings-post.php" enctype="multipart/form-data">
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
                            <b>Gagal!</b> '.$_GET['message'].'
                          </div>
                          ';
                        }
                        ?>
                        <div class="row">
                            <?php for($i=0;$i<count($arr);$i++) : ?>
                              
                                <div class="col-md-4 ofh" data-aos="zoom-out" data-aos-duration="1000">
                                    <div class="card">
                                        <a href="../<?=$arr[$i]['image']?>" target="_BLANK">
                                            <img class="card-img-top" src="../<?=$arr[$i]['image']?>">
                                        </a>
                                        <div class="card-body">
                                            <h5 class="card-title text-center"><?=$arr[$i]['name']?></h5>
                                            <br>
                                            <span><?=$arr[$i]['description']?></span>
                                            <br>
                                        </div>
                                          <div class="card-footer">
                                            <a href="?url=gallery&action=edit&id=<?=$arr[$i]['id']?>" class="btn btn-outline-warning btn-sm mr-2">Edit</a>
                                            <?php if($arr[$i]['carousel']) : ?>
                                              <span class="bg-info badge">Tampil di Carousel</span>
                                            <?php endif; ?>
                                            <?php if($arr[$i]['facility']) : ?>
                                              <span class="bg-info badge">Tampil di Fasilitas</span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endfor; ?>
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
</script>