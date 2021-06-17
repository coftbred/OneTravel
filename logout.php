<?php 
    session_start();
    $_SESSION = [];
    session_destroy();

    header("Location: index.php?log_out=true");
?>