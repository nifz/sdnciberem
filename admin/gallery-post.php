<?php

require('../include/db.php');
session_start();
if(!isset($_SESSION['user']))
{
    header('location: login.php');
}
$sql = mysqli_query($con, "SELECT * FROM gallery");
$arr = array();
while($data = mysqli_fetch_assoc($sql))
{
    $arr[] = $data;
}
if(isset($_POST['submit']))
{
    // $arrcarausel = array();
    // $arrfacility = array();
    for($i=0;$i<count($_FILES['namegallery']['tmp_name']);$i++)
    {
        // ambil data file
        $namaFile = $_FILES['namegallery']['name'][$i];
        $namaSementara = $_FILES['namegallery']['tmp_name'][$i];
    
        // tentukan lokasi file akan dipindahkan
        $dirUpload = "images/gallery/";
    
        // pindahkan file
        $terupload = move_uploaded_file($namaSementara,"../".$dirUpload.$namaFile);
        if ($terupload) {
            $sql = "INSERT INTO `gallery` VALUES (NULL,'".$_SESSION["userid"]."','".$_POST['name'][$i]."','".$_POST['description'][$i]."','".$dirUpload.$namaFile."','".$_POST['namecarausel'][$i]."','".$_POST['namefacility'][$i]."')";
            mysqli_query($con,$sql) or die(mysqli_error());
            header('location: .?url=gallery&success=true&message=Data Berhasil Ditambahkan!');
        } else {
            header('location: .?url=gallery&failed=true&message=Data Gagal Ditambahkan!');
        }
    }
}
else if(isset($_POST['submitedit']))
{
    // ambil data file
    $namaFile = $_FILES['namegallery']['name'];
    $namaSementara = $_FILES['namegallery']['tmp_name'];
    // var_dump($namaSementara);
    if($namaFile)
    {
        // tentukan lokasi file akan dipindahkan
        $dirUpload = "images/gallery/";
    
        // pindahkan file
        $terupload = move_uploaded_file($namaSementara,"../".$dirUpload.$namaFile);
        if ($terupload) {
            $sql = "UPDATE `gallery` SET `id_users`='".$_SESSION["userid"]."', `name`='".$_POST['name']."',`description`='".$_POST['description']."',`image`='".$dirUpload.$namaFile."',`carousel`='".$_POST['namecarausel']."',`facility`='".$_POST['namefacility']."' WHERE id = ".$_POST['id']."";
            // $sql = "INSERT INTO `gallery` VALUES (NULL,'".$_POST['name'][$i]."','".$_POST['description'][$i]."','".$dirUpload.$namaFile."','".$_POST['namecarausel'][$i]."','".$_POST['namefacility'][$i]."')";
            mysqli_query($con,$sql) or die(mysqli_error());
            header('location: .?url=gallery&success=true&message=Data Berhasil Diubah!');
        } else {
            header('location: .?url=gallery&failed=true&message=Data Gagal Diubah!');
        }
    }
    else
    {
        $sql = "UPDATE `gallery` SET `id_users`='".$_SESSION["userid"]."', `name`='".$_POST['name']."',`description`='".$_POST['description']."',`carousel`='".$_POST['namecarausel']."',`facility`='".$_POST['namefacility']."' WHERE id = ".$_POST['id']."";
        $qry = mysqli_query($con,$sql) or die(mysqli_error());
        if($qry)
        {
            header('location: .?url=gallery&success=true&message=Data Berhasil Diubah!');
        }
        else
        {
            header('location: .?url=gallery&failed=true&message=Data Gagal Diubah!');
        }
    }
}
else if(isset($_POST['delete']))
{
    $sql = "DELETE FROM `gallery` WHERE id = ".$_POST['id']."";
    $qry = mysqli_query($con,$sql) or die(mysqli_error());
    if($qry)
    {
        header('location: .?url=gallery&success=true&message=Data Berhasil Dihapus!');
    }
    else
    {
        header('location: .?url=gallery&failed=true&message=Data Gagal Dihapus!');
    }
}

?>