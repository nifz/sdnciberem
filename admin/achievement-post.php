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

if(isset($_POST['submit12']))
{
    // ambil data file
    $namaFile = $_FILES['name'.$arr[11]['id']]['name'];
    $namaSementara = $_FILES['name'.$arr[11]['id']]['tmp_name'];

    // tentukan lokasi file akan dipindahkan
    $dirUpload = "images/dinamis/";

    // pindahkan file
    $terupload = move_uploaded_file($namaSementara,"../".$dirUpload.$namaFile);
    if ($terupload) 
    {
        $sql = "UPDATE `dinamis` SET `id_users`='".$_SESSION["userid"]."', `data`='".$dirUpload.$namaFile."' WHERE id = '".$arr[11]['id']."'";
        mysqli_query($con,$sql) or die(mysqli_error());
        header('location: .?url=achievement&success=true&message=Data Berhasil Diubah!');
    } 
    else 
    {
        header('location: .?url=achievement&failed=true&message=Data Gagal Diubah!');
    }
}
if(isset($_POST['submit']))
{
    for($i=0;$i<count($_POST['nametahun']);$i++)
    {
        $sql = "INSERT INTO `prestasi` VALUES (NULL,'".$_SESSION["userid"]."','".$_POST['nametahun'][$i]."','".mysqli_real_escape_string($con, nl2br($_POST['nameketerangan'][$i]))."')";
        $sub = mysqli_query($con,$sql);
        if($sub)
        {
            header('location: .?url=achievement&success=true&message=Data Berhasil Ditambahkan!');
        } else {
            header('location: .?url=achievement&failed=true&message=Data Gagal Ditambahkan!');
        }
    }
}
else if(isset($_POST['submitedit']))
{
    $sql = "UPDATE `prestasi` SET `id_users`='".$_SESSION["userid"]."', `tahun`='".$_POST['nametahun']."',`keterangan`='".mysqli_real_escape_string($con, nl2br($_POST['nameketerangan']))."' WHERE id = ".$_POST['id']."";
    $sub = mysqli_query($con,$sql);
    if($sub)
    {
        header('location: .?url=achievement&success=true&message=Data Berhasil Diubah!');
    } else {
        header('location: .?url=achievement&failed=true&message=Data Gagal Diubah!');
    }
}

else if(isset($_POST['delete']))
{
    $sql = "DELETE FROM `prestasi` WHERE id = ".$_POST['id']."";
    $qry = mysqli_query($con,$sql) or die(mysqli_error());
    if($qry)
    {
        header('location: .?url=achievement&success=true&message=Data Berhasil Dihapus!');
    }
    else
    {
        header('location: .?url=achievement&failed=true&message=Data Gagal Dihapus!');
    }
}
// header('location: .?url=settings');
?>