<?=
    require('../include/db.php');
    session_start();
    session_destroy();
    
    header("Location: ../");
?>