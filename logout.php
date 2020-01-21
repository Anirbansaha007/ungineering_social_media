<?php
    session_start();
    session_destroy();
    /*echo "you are logged out";
    ?>
    <a href=homepage.php>click here</a> to go to homepage
    <?php */  
    header("Location:homepage.php");
    exit;
?>
