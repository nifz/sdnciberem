<?php
	$sql = mysqli_query($con, "SELECT name, data FROM dinamis");
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
								<h1 class="m-0">Dashboard</h1>
							</div>
							<!-- /.col -->
							<div class="col-sm-6">
								<ol class="breadcrumb float-sm-right">
									<li class="breadcrumb-item">
										<a href="?url=dashboard">Home</a>
									</li>
									<li class="breadcrumb-item active">Dashboard</li>
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
							<div class="col-md-7">
								<div class="card card-primary card-outline">
									<div class="card-header">
										<h3 class="card-title">Data Sekolah</h3>
										<div class="card-tools">
											
											<?php 
												if($data['role'] == 'superadmin') :
											?>
											<a href="?url=settings" class="pr-2">
												<i class="nav-icon fas fa-edit"></i>
												Ubah Data
											</a>
											<?php endif; ?>
										</div>
									</div> 
									
									<!-- /.card-body -->
									<div class="card-body">
										<div class="table-responsive">
											<table class="table table-light">
												<tbody>
													<?php
														for($i=0;$i<count($arr)-1;$i++)
														{
															if($i == 1 OR $i == 8)
															{
																echo "
																	<tr>
																		<td>".str_replace('"','',str_replace('\\','',json_encode($arr[$i]['name'])))."</td>
																		<td><img src='../".str_replace('"','',str_replace('\\','',json_encode($arr[$i]['data'])))."' style='max-width: 100%; height: 200px;' class='rounded-3'></td>
																	</tr>";
															}
															else if($i == 10)
															{
																
																$ex = explode('<br>',str_replace('\n','<br>',str_replace('"','',json_encode($arr[$i]['data']))));
																
																echo "
																	<tr>
																		<td>".str_replace('"','',str_replace('\\','',json_encode($arr[$i]['name'])))."</td>
																		<td>
																			<ol>";
																for($j=0;$j<count($ex);$j++)
																{
																	echo '<li align="justify">'.str_replace('\r','',$ex[$j]).'</li>';
																}
																echo '
																			</ol>
																		</td>
																	</tr>
																';
															}
															else if($i == 4)
															{
																echo "
																	<tr>
																		<td>".str_replace('"','',str_replace('\\','',json_encode($arr[$i]['name'])))."</td>
																		<td>".str_replace('"','',str_replace('\\','',json_encode($arr[$i]['data'])))."</td>
																	</tr>";
															}
															else
															{
																echo"
																	<tr>
																		<td>".str_replace('"','',json_encode($arr[$i]['name']))."</td>
																		<td>".str_replace('"','',json_encode($arr[$i]['data']))."</td>
																	</tr>
																";
															}
														}
													?>
												</tbody>
											</table>
										</div>
									</div><!-- /.card-body -->
								</div>
							</div>
						</div>
					</div>
					<!-- /.container-fluid -->
				</section>
				<!-- /.content -->
			</div>