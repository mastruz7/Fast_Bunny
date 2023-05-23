<?php
session_start();

if(isset($_session[admin])){
    unset($_session[admin]);

    header("location:./index.php");
    
}

?>