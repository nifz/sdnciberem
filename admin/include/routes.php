<?php

    $result = mysqli_query($con, "SELECT * FROM users WHERE email = '".$_SESSION['user']."'");
    $data = mysqli_fetch_assoc($result);

    if(isset($_GET['url']) && !isset($_GET['action']) && $data['role'] == 'admin')
    {
        switch ($_GET['url'])
        {
            case('dashboard'):
                include('dashboard.php');
            break;
            case('settings'):
                include('settings.php');
            break;
            case('gallery'):
                include('gallery.php');
            break;
            case('achievement'):
                include('achievement.php');
            break;
            case('blog'):
                include('blog.php');
            break;
            default:
                include('dashboard.php');
            break;
        }
    }
    if(isset($_GET['url']) && !isset($_GET['action']) && $data['role'] == 'superadmin')
    {
        switch ($_GET['url'])
        {
            case('dashboard'):
                include('dashboard.php');
            break;
            case('settings'):
                include('settings.php');
            break;
            case('user'):
                include('user.php');
            break;
            case('gallery'):
                include('gallery.php');
            break;
            case('achievement'):
                include('achievement.php');
            break;
            case('blog'):
                include('blog.php');
            break;
            default:
                include('dashboard.php');
            break;
        }
    }
    if(strpos($_SERVER['REQUEST_URI'],'gallery') && isset($_GET['action']))
    {
        switch ($_GET['action'])
        {
            case('add'):
                include('gallery-add.php');
            break;
            case('edit'):
                include('gallery-edit.php');
            break;
            default:
                include('gallery-add.php');
            break;
        }
    }
    if(strpos($_SERVER['REQUEST_URI'],'achievement') && isset($_GET['action']))
    {
        switch ($_GET['action'])
        {
            case('add'):
                include('achievement-add.php');
            break;
            case('edit'):
                include('achievement-edit.php');
            break;
            default:
                include('achievement-add.php');
            break;
        }
    }
    if(strpos($_SERVER['REQUEST_URI'],'blog') && isset($_GET['action']))
    {
        switch ($_GET['action'])
        {
            case('add'):
                include('blog-add.php');
            break;
            case('edit'):
                include('blog-edit.php');
            break;
            default:
                include('blog-add.php');
            break;
        }
    }
    if(strpos($_SERVER['REQUEST_URI'],'user') && isset($_GET['action']) && $data['role'] == 'superadmin')
    {
        switch ($_GET['action'])
        {
            case('add'):
                include('user-add.php');
            break;
            case('edit'):
                include('user-edit.php');
            break;
            default:
                include('user-add.php');
            break;
        }
    }
?>