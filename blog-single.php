<?php
    require('include/db.php');
    session_start();
    
    $blog;
    $found = false;
    if(isset($_GET['berita']))
    {
        $qry = mysqli_query($con,"SELECT *,users.name as useradmin,users.id as userid FROM blog INNER JOIN users ON blog.id_users = users.id WHERE slug='".$_GET['berita']."'");
        if($qry)
        {
            $blog = mysqli_fetch_assoc($qry);
            if($blog)
            {
                $found = true;
                $otherPost = mysqli_query($con,"SELECT *,users.name as useradmin FROM blog INNER JOIN users ON blog.id_users = users.id WHERE slug !='".$_GET['berita']."' ORDER BY RAND() LIMIT 5");
            }
            else
            {
                header('location: 404.html');
            }
        }
    }
    $sql = mysqli_query($con, "SELECT name, data FROM dinamis");
    $arr = array();
    while($data = mysqli_fetch_assoc($sql))
    {
        $arr[] = $data;
    }
    if($found == true) :
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
    <title><?= $blog['title'] ?> - <?= $arr[0]['data'] ?></title>
</head>
<body>
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
                    <a class="nav-link" href="index.php">Home</a>
                    <a class="nav-link" href="blog.php">Berita</a>
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
    <div id="carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" style="background: linear-gradient(rgba(0,0,0,0.1) 0%,rgba(0,0,0,0.6) 100%), url('<?= $blog['thumbnail'] ?>') no-repeat center center fixed; background-size: cover;">
            </div>
        </div>
    </div>
    <section id="content">
        <div class="container my-5">
            <div class="row">
                <div class="col-12 col-md-8">
                    <span class="fs-1 fw-bolder"><?= $blog['title'] ?></span>
                    <br>
                    <?php
                        if(isset($_SESSION['userid']) && $_SESSION['userid'] == $blog['userid']) :
                    ?>
                    <a href="admin/?url=blog&action=edit&id=<?= $blog['id'] ?>" class="btn btn-sm btn-warning my-2">Ubah Berita</a>
                    <br>
                    <?php endif ?>
                    <span class="fs-6 fw-lighter text-secondary">Kategori: <?= $blog['tags'] ?></span>
                    <br>
                    <span class="fs-6 fw-lighter text-secondary">Oleh: <?= $blog['useradmin']." | ". date('d M Y H:i:s',strtotime($blog['updated_at'])) ?></span>
                    <img src="<?= $blog['thumbnail'] ?>" class="w-100 rounded-3">
                    <div class="content my-3">
                        <?= $blog['content'] ?>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="sticky-top" style="z-index: 0; top: 100px;">
                        <div class="fs-3 mt-3 mb-4 fw-bolder">Berita Lainnya</div>
                        <?php 
                            while($any = mysqli_fetch_assoc($otherPost)) :
                        ?>
                            <div class="card mb-3" style="">
                                <a href="?berita=<?= $any['slug'] ?>">
                                    <div class="row g-0">
                                        <div class="col-2 col-md-3">
                                            <img src="<?= $any['thumbnail'] ?>" class="img-fluid rounded-start" style="width:80px; height:80px;">
                                        </div>
                                        <div class="col-8">
                                            <div class="card-body">
                                                <div class="fs-6">
                                                    <?php 
                                                        $titles;
                                                        if(strlen(strip_tags($any['title'])) > 20)
                                                        {
                                                            $titles = substr_replace(strip_tags($any['title']),'...',20);
                                                        }
                                                        else
                                                        {
                                                            $titles = $any['title'];
                                                        }
                                                    ?>
                                                    <?= $titles ?>
                                                </div>
                                                <p class="card-text"><small class="text-muted"><?= date('d M Y',strtotime($blog['updated_at'])) ?></small></p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        </div>
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
<?php endif; ?>