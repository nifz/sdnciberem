<?php

require('../include/db.php');
session_start();
if(!isset($_SESSION['user']))
{
    header('location: login.php');
}
$sql = mysqli_query($con, "SELECT * FROM dinamis");
$arr = array();
while($data = mysqli_fetch_assoc($sql))
{
    $arr[] = $data;
}

if(isset($_POST['submit']))
{
    $sql = "INSERT INTO `users` VALUES (NULL,'".$_POST['namename']."','".$_POST['nameemail']."','".md5($_POST['namepassword'])."','images/user/user.jpg','".$_POST['namerole']."')";
    $sub = mysqli_query($con,$sql);
    if($sub)
    {
        header('location: .?url=user&success=true&message=Data Berhasil Ditambahkan!');
    } else {
        header('location: .?url=user&failed=true&message=Data Gagal Ditambahkan!');
    }
}
else if(isset($_POST['submitedit']))
{
    if(!empty($_POST['namepassword_new'])) 
    {
        $sql = "UPDATE `users` SET `name`='".$_POST['namename']."',`email`='".$_POST['nameemail']."',`role`='".$_POST['namerole']."',`password`='".md5($_POST['namepassword_new'])."' WHERE id = ".$_POST['id']."";
        $sub = mysqli_query($con,$sql);
        if($sub)
        {
            header('location: .?url=user&success=true&message=Data Berhasil Diubah!');
        } else {
            header('location: .?url=user&failed=true&message=Data Gagal Diubah!');
        }
    }
    else
    {
        $sql = "UPDATE `users` SET `name`='".$_POST['namename']."',`email`='".$_POST['nameemail']."',`role`='".$_POST['namerole']."' WHERE id = ".$_POST['id']."";
        $sub = mysqli_query($con,$sql);
        if($sub)
        {
            header('location: .?url=user&success=true&message=Data Berhasil Diubah!');
        } else {
            header('location: .?url=user&failed=true&message=Data Gagal Diubah!');
        }
    }
}

else if(isset($_POST['delete']))
{
    $sql = "DELETE FROM `users` WHERE id = ".$_POST['id']."";
    $qry = mysqli_query($con,$sql) or die(mysqli_error());
    if($qry)
    {
        header('location: .?url=user&success=true&message=Data Berhasil Dihapus!');
    }
    else
    {
        header('location: .?url=user&failed=true&message=Data Gagal Dihapus!');
    }
}
// header('location: .?url=settings');
?>