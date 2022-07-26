<?php
    require('../include/db.php');
    session_start();
    $sql = mysqli_query($con, "SELECT name, data FROM dinamis");
    $arr = array();
    while($data = mysqli_fetch_assoc($sql))
    {
        $arr[] = $data;
    }
    if(isset($_SESSION['user']))
    {
        header('location: index.php');
    }
    $message = '';

    if(isset($_POST['submit']))
    {
        $email = $_POST['email'];
        $pass = md5($_POST['password']);
        $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$pass'";
        $result = mysqli_query($con, $sql);
        if($result->num_rows > 0)
        {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['userid'] = $row['id'];
            $_SESSION['user'] = $row['email'];
            header('location: ./');
        }
        else
        {
            $message = "Email atau password salah!";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include ('include/tag.php');
    ?>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="../../index2.html" class="h1"><b>A</b>dmin</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Login</p>
      <p class="login-box-msg"><?= $message ?></p>

      <form method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" name="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->
<?php include('include/script.php'); ?>
</body>
</html>
