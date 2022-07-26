<?php
    require('include/db.php');
    session_start();
    $sql = mysqli_query($con, "SELECT name, data FROM dinamis");
    $arr = array();
    while($data = mysqli_fetch_assoc($sql))
    {
        $arr[] = $data;
    }
    $sql_gallery = mysqli_query($con, "SELECT * FROM gallery");
    $arr_carousel = array();
    $arr_facility = array();
    while($data = mysqli_fetch_assoc($sql_gallery))
    {
        if($data['carousel'] == TRUE)
        {
            $arr_carousel[] = $data;
        }
        if($data['facility'] == TRUE)
        {
            $arr_facility[] = $data;
        }
    }
    $sql_prestasi = mysqli_query($con, "SELECT * FROM prestasi ORDER BY id DESC");
    // var_dump($arr_gallery);
    // var_dump($arr_carousel);
    // var_dump($arr);
    // echo $arr2 = json_encode($arr[0]['data']);
    // echo array_search("nama",$arr);
    
  $blg = mysqli_query($con, "SELECT * FROM blog ORDER BY updated_at DESC LIMIT 6");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="<?= $arr[1]['data'] ?>" type="image/x-icon">
    <script src="https://kit.fontawesome.com/7c63c67dc3.js" crossorigin="anonymous"></script>
    <title><?= $arr[0]['data'] ?></title>
</head>
<body>
    <div id="carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php
                for($i=0;$i<count($arr_carousel);$i++)
                {
                    $active = '';
                    if($i == 0)
                    {
                        $active = 'active';
                    }
                    echo '
                        <div class="carousel-item '.$active.'">
                            <div style="background-image: linear-gradient(rgba(0,0,0,0.6) 0%,rgba(0,0,0,0.6) 100%), url('.$arr_carousel[$i]['image'].')" class="bg-cover d-block c-image w-100">
                                <div class="carousel-caption">
                                    <h2 class="text-uppercase">'.$arr_carousel[$i]['name'].'</h2>
                                    <h5>'.$arr_carousel[$i]['description'].'</h5>
                                </div>
                            </div>
                        </div>
                    ';
                }
            ?>
            <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <div class="chevron">
            <a href="#about">
                <i class="fas fa-chevron-down text-white"></i>
            </a>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg sticky-top navbar-light bg-light">
        <div class="container">
            
            <a class="navbar-brand" href="index.php">
                <img src="<?= $arr[1]['data'] ?>" alt="" height="35">
                <?= $arr[0]['data'] ?>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link activated active" href="#carousel">Home</a>
                    <a class="nav-link activated" href="#about">Tentang Sekolah</a>
                    <a class="nav-link activated" href="#vm">Visi & Misi</a>
                    <a class="nav-link activated" href="#achievement">Prestasi</a>
                    <a class="nav-link activated" href="#blog">Berita</a>
                    <a class="nav-link activated" href="#facility">Fasilitas</a>
                    <?php
                        if(isset($_SESSION['user']))
                        {
                            echo '
                            <a class="nav-link activated" href="admin/">Dashboard</a>
                            ';
                        }
                        else
                        {
                            echo '
                            <a class="nav-link activated" href="admin/login.php">Login</a>
                            ';
                        }
                    ?>
                </div>
            </div>
        </div>
    </nav>
    <section id="about">
        <div class="container">
            <div class="row justify-content-center">
                <h3 class="text-center my-5 titled ofh" data-aos="fade-down" data-aos-duration="1000">Tentang Sekolah</h3>
            </div>
            <div class="row">
                <div class="col-md-6 ofh" data-aos="fade-right" data-aos-duration="1000">
                    <p align="justify" style="color: white;"><?= $arr[7]['data'] ?></p>
                </div>
                <div class="col-md-6 ofh" data-aos="fade-left" data-aos-duration="1000">
                    <img src="<?= $arr[8]['data'] ?>" class="w-100 rounded-3">
                </div>
            </div>
        </div>
        <div class="spacer"></div>
    </section>
    <section id="vm">
        <div class="container">
            <div class="row justify-content-center">
                <h3 class="text-center my-5 ofh titled" data-aos="fade-down" data-aos-duration="1000">Visi & Misi</h3>
            </div>
            <div class="row">
                <div class="col-md-6 ofh" data-aos="fade-right" data-aos-duration="1000">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Visi</h5>
                            <p class="card-text" align="justify"><?= $arr[9]['data'] ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 ofh" data-aos="fade-left" data-aos-duration="1000">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Misi</h5>
                            <p class="card-text" align="justify">
                                <ol>
                                <?php
                                    $ex = explode('<br>',str_replace('\n','<br>',str_replace('"','',json_encode($arr[10]['data']))));
                                    for($i=0;$i<count($ex);$i++)
                                    {
                                        echo '<li align="justify">'.str_replace('\r','',$ex[$i]).'</li>';
                                    }
                                ?>
                                </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="spacer"></div>
    </section>
    <section id="achievement">
        <div class="container">
            <div class="row justify-content-center">
                <h3 class="text-center my-5 ofh titled" data-aos="fade-down" data-aos-duration="1000">Prestasi</h3>
            </div>
            <div class="row">
                <div class="col-md-4 ofh" data-aos="zoom-in-right" data-aos-duration="1000">
                    <img src="<?= $arr[11]['data'] ?>" class="w-100 rounded-3">
                </div>
                <div class="col-md-8 ofh" data-aos="fade-left" data-aos-duration="1000">
                    <?php while($data = mysqli_fetch_assoc($sql_prestasi)) : ?>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?= $data['tahun'] ?></h5>
                            <p class="card-text"><?= $data['keterangan'] ?></p>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
        <div class="spacer"></div>
    </section>
    <section id="blog">
        <div class="container">
            <div class="row justify-content-center">
                <h3 class="text-center my-5 ofh titled" data-aos="fade-down" data-aos-duration="1000">Berita</h3>
            </div>
            <div class="row row-cols-1 row-cols-md-3 g-4 ofh" data-aos="zoom-out" data-aos-duration="1000">
                <?php 
                    while($d = mysqli_fetch_assoc($blg)) :
                ?>
                <div class="col">
                    <div class="card">
                        <a href="blog.php?berita=<?= $d['slug'] ?>">
                            <img src="<?= $d['thumbnail'] ?>" class="card-img-top" alt="<?= $d['title'] ?>">
                            <div class="card-body">
                                <?php
                                    $title;
                                    $desc;
                                    if(strlen(strip_tags($d['title'])) > 25)
                                    {
                                        $title = substr_replace(strip_tags($d['title']),'...',25);
                                    }
                                    else
                                    {
                                        $title = strip_tags($d['title']);
                                    }
                                    if(strlen(strip_tags($d['content'])) > 35)
                                    {
                                        $desc = substr_replace(strip_tags($d['content']),'...',35);
                                    }
                                    else
                                    {
                                        $desc = strip_tags($d['content']);
                                    }
                                ?>
                                <h5 class="card-title"><?= $title ?></h5>
                                <p class="card-text">
                                    <?= $desc ?>
                                </p>
                            </div>
                        </a>
                        <div class="card-footer">
                            <small class="text-muted"><?= date('d M Y',strtotime($d['updated_at'])) ?></small>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
            <div class="row justify-content-center">
                <h6 class="text-center mb-5 ofh titled text-uppercase bg-warning" data-aos="fade-down" data-aos-duration="1000"><a href="blog.php">Lihat Semua Berita</a></h6>
            </div>
        </div>
    </section>
    <section id="facility">
        <div class="container">
            <div class="row justify-content-center">
                <h3 class="text-center my-5 ofh titled" data-aos="fade-down" data-aos-duration="1000">Fasilitas</h3>
            </div>
            <div class="row">
                <?php
                    for($i=0;$i<count($arr_facility);$i++)    
                    {
                        echo '
                        <div class="col-md-4 ofh" data-aos="zoom-out" data-aos-duration="1000">
                            <a href="'.$arr_facility[$i]['image'].'" target="_BLANK">
                                <div class="card">
                                    <img class="card-img-top" src="'.$arr_facility[$i]['image'].'">
                                    <div class="card-body">
                                        <h5 class="card-title text-center">'.$arr_facility[$i]['name'].'</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                        ';
                    }
                ?>
            </div>
        </div>
        <div class="spacer"></div>
    </section>
    
    <footer class="text-center text-lg-start bg-light text-muted">
        <section class="d-flex justify-content-center justify-content-lg-between p-3 border-bottom">
            <div class="container text-center text-md-start mt-3">
                <div class="row mt-3 ofh" data-aos="fade-up" data-aos-duration="1000">
                    <div class="col-md-5 mb-4">
                        <img src="<?= $arr[1]['data'] ?>" alt="" height="70">
                        <h6 class="text-uppercase fw-bold my-4"><?= $arr[0]['data'] ?></h6>
                        <p><?= $arr[2]['data'] ?></p>
                    </div>
                    <div class="col-md-3">
                        <h6 class="text-uppercase fw-bold mb-4">Kontak</h6>
                        <p><i class="fas fa-home me-3"></i> <?= $arr[3]['data'] ?></p>
                        <p><i class="fas fa-envelope me-3"></i> <a href="mailto:<?= $arr[5]['data'] ?>"><?= $arr[5]['data'] ?></a></p>
                        <p><i class="fas fa-phone me-3"></i> <a href="tel:+62<?= str_replace('"0','',json_encode($arr[6]['data'])) ?>0"><?= $arr[6]['data'] ?></a></p>
                    </div>
                    <div class="col-md-4">
                        <h6 class="text-uppercase fw-bold mb-4">Alamat</h6>
                        <?= str_replace('"','',str_replace('\\','',json_encode($arr[4]['data']))) ?>
                    </div>
                </div>
            </div>
        </section>
        <div class="text-center py-3" style="background-color: rgba(0, 0, 0, 0.05);">
            <p class="pt-2">&copy; <?= date('Y') ?> All right reserved.</p>
        </div>
    </footer>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/custom.js"></script>

</body>
</html>
