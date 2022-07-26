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

if(isset($_POST['submitedit']))
{
    if(!empty($_POST['namepassword_new'])) 
    {
        $id = $_SESSION['userid'];
        $users = mysqli_query($con, "SELECT * FROM users WHERE id = $id");
        $user = mysqli_fetch_assoc($users);
        if(md5($_POST['namepassword_old']) == $user['password'])
        {
            // ambil data file
            $namaFile = $_FILES['nameimage']['name'];
            $namaSementara = $_FILES['nameimage']['tmp_name'];
        
            // tentukan lokasi file akan dipindahkan
            $dirUpload = "images/user/";
        
            // pindahkan file
            $terupload = move_uploaded_file($namaSementara,"../".$dirUpload.$namaFile);
            if ($terupload) 
            {
                $_SESSION['user'] = $_POST['nameemail'];
                $sql = "UPDATE `users` SET `image`='".$dirUpload.$namaFile."',`name`='".$_POST['namename']."',`email`='".$_POST['nameemail']."',`password`='".md5($_POST['namepassword_new'])."' WHERE id = ".$_SESSION['userid']."";
                mysqli_query($con,$sql) or die(mysqli_error());
                header('location: .?url=settings&success=true&message=Data Berhasil Diubah!');
            } 
            else 
            {
                $_SESSION['user'] = $_POST['nameemail'];
                $sql = "UPDATE `users` SET `name`='".$_POST['namename']."',`email`='".$_POST['nameemail']."',`password`='".md5($_POST['namepassword_new'])."' WHERE id = ".$_SESSION['userid']."";
                $sub = mysqli_query($con,$sql);
                if($sub)
                {
                    header('location: .?url=settings&success=true&data=profile&message=Data Berhasil Diubah!');
                } else {
                    header('location: .?url=settings&failed=true&data=profile&message=Data Gagal Diubah!');
                }
            }
        }
        else
        {
            header('location: .?url=settings&failed=true&data=profile&message=Password lama salah!');
        }
        
    }
    else
    {
        // ambil data file
        $namaFile = $_FILES['nameimage']['name'];
        $namaSementara = $_FILES['nameimage']['tmp_name'];
    
        // tentukan lokasi file akan dipindahkan
        $dirUpload = "images/user/";
    
        // pindahkan file
        $terupload = move_uploaded_file($namaSementara,"../".$dirUpload.$namaFile);
        if ($terupload) 
        {
            $_SESSION['user'] = $_POST['nameemail'];
            $sql = "UPDATE `users` SET `image`='".$dirUpload.$namaFile."',`name`='".$_POST['namename']."',`email`='".$_POST['nameemail']."' WHERE id = ".$_SESSION['userid']."";
            mysqli_query($con,$sql) or die(mysqli_error());
            header('location: .?url=settings&success=true&message=Data Berhasil Diubah!');
        } 
        else 
        {
            $_SESSION['user'] = $_POST['nameemail'];
            $sql = "UPDATE `users` SET `name`='".$_POST['namename']."',`email`='".$_POST['nameemail']."' WHERE id = ".$_SESSION['userid']."";
            $sub = mysqli_query($con,$sql);
            if($sub)
            {
                header('location: .?url=settings&success=true&data=profile&message=Data Berhasil Diubah!');
            } else {
                header('location: .?url=settings&failed=true&data=profile&message=Data Gagal Diubah!');
            }
        }
    }
}
for($i=0;$i<count($arr);$i++)
{
    if($i == 1 OR $i == 8)
    {
        if(isset($_POST['submit'.$arr[$i]['id']]))
        {
            // ambil data file
            $namaFile = $_FILES['name'.$arr[$i]['id']]['name'];
            $namaSementara = $_FILES['name'.$arr[$i]['id']]['tmp_name'];
        
            // tentukan lokasi file akan dipindahkan
            $dirUpload = "images/dinamis/";
        
            // pindahkan file
            $terupload = move_uploaded_file($namaSementara,"../".$dirUpload.$namaFile);
            if ($terupload) 
            {
                $sql = "UPDATE `dinamis` SET `data`='".$dirUpload.$namaFile."' WHERE id = '".$arr[$i]['id']."'";
                mysqli_query($con,$sql) or die(mysqli_error());
                header('location: .?url=settings&success=true&message=Data Berhasil Diubah!');
            } 
            else 
            {
                header('location: .?url=settings&failed=true&message=Data Gagal Diubah!');
            }
        }
    }
    else
    {
        if(isset($_POST['submit'.$arr[$i]['id']]))
        {
            $sql = "UPDATE `dinamis` SET `data`='".str_replace('\r','',$_POST['name'.$arr[$i]['id']])."' WHERE id = '".$arr[$i]['id']."'";
            
            $qry = mysqli_query($con,$sql) or die(mysqli_error());
            if($qry)
            {
                header('location: .?url=settings&success=true&message=Data Berhasil Diubah!');
            }
            else
            {
                header('location: .?url=settings&failed=true&message=Data Gagal Diubah!');
            }
        }
    }
}
// header('location: .?url=settings');
?>