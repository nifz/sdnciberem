<?php
    date_default_timezone_set("Asia/Jakarta");
    $con = mysqli_connect('localhost','root','','sdnciberem');
    if(!$con)
    {
        die("connecion failed! " . mysqli_connect_error());
    }