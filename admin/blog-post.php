<?php
ob_start(); 
require('../include/db.php');
require('include/link.php');
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
    $slug = Link::slug($_POST['nametitle']).'-'.rand();
    $namaFile = $_FILES['namethumbnail']['name'];
    $namaSementara = $_FILES['namethumbnail']['tmp_name'];
    
    // tentukan lokasi file akan dipindahkan
    $dirUpload = "images/blog/";
    // pindahkan file
    $terupload = move_uploaded_file($namaSementara,"../".$dirUpload.$namaFile);
    var_dump($_POST);
    if ($terupload) 
    {
        $sql = "INSERT INTO `blog` VALUES (NULL,'".$_SESSION['userid']."','".$_POST['nametitle']."','".$dirUpload.$namaFile."','".$_POST['namecontent']."','".implode(',',$_POST['nametags'])."','".$slug."','".date('Y-m-d H:i:s')."','".date('Y-m-d H:i:s')."')";
        $sub = mysqli_query($con,$sql);
        if($sub)
        {
            header('location: .?url=blog&success=true&message=Data Berhasil Ditambahkan!');
        } else {
            header('location: .?url=blog&failed=true&message=Data Gagal Ditambahkan!');
        }
    }
}
else if(isset($_POST['submitedit']))
{
    // ambil data file
    $namaFile = $_FILES['namethumbnail']['name'];
    $namaSementara = $_FILES['namethumbnail']['tmp_name'];

    // tentukan lokasi file akan dipindahkan
    $dirUpload = "images/blog/";

    // pindahkan file
    $terupload = move_uploaded_file($namaSementara,"../".$dirUpload.$namaFile);
    if ($terupload) 
    {
        $sql = "UPDATE `blog` SET `title`='".$_POST['nametitle']."',`thumbnail`='".$dirUpload.$namaFile."',`content`='".$_POST['namecontent']."',`tags`='".implode(',',$_POST['nametags'])."',`slug`='".$slug."',`updated_at`='".date('Y-m-d H:i:s')."' WHERE id = '".$_POST['id']."'";
        mysqli_query($con,$sql) or die(mysqli_error());
        header('location: .?url=blog&success=true&message=Data Berhasil Diubah!');
    } 
    else 
    {
        $sql = "UPDATE `blog` SET `title`='".$_POST['nametitle']."',`content`='".$_POST['namecontent']."',`tags`='".implode(',',$_POST['nametags'])."',`slug`='".$slug."',`updated_at`='".date('Y-m-d H:i:s')."' WHERE id = '".$_POST['id']."'";
        $sub = mysqli_query($con,$sql);
        if($sub)
        {
            header('location: .?url=blog&success=true&message=Data Berhasil Diubah!');
        } else {
            header('location: .?url=blog&failed=true&message=Data Gagal Diubah!');
        }
    }
}

else if(isset($_POST['delete']))
{
    $sql = "DELETE FROM `blog` WHERE id = ".$_POST['id']."";
    $qry = mysqli_query($con,$sql) or die(mysqli_error());
    if($qry)
    {
        header('location: .?url=blog&success=true&message=Data Berhasil Dihapus!');
    }
    else
    {
        header('location: .?url=blog&failed=true&message=Data Gagal Dihapus!');
    }
}
// header('location: .?url=settings');
?>