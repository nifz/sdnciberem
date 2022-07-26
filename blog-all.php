<?php
    require('include/db.php');
    session_start();
    
    $blg = mysqli_query($con,"SELECT *,users.name as useradmin,users.id as userid FROM blog INNER JOIN users ON blog.id_users = users.id ORDER BY updated_at DESC");
    $sql = mysqli_query($con, "SELECT name, data FROM dinamis");
    $arr = array();
    while($data = mysqli_fetch_assoc($sql))
    {
        $arr[] = $data;
    }
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
    <title>Berita - <?= $arr[0]['data'] ?></title>
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
                    <a class="nav-link active" href="blog.php">Berita</a>
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
    
    <section id="blog">
        <div class="mt-4"></div>
        <div class="container">
            <div class="row justify-content-center">
                <h3 class="text-center my-5 ofh titled" data-aos="fade-down" data-aos-duration="1000">Berita</h3>
            </div>
            <div class="row row-cols-1 row-cols-md-3 g-4">
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
