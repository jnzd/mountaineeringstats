<?php
    if(isset($_SESSION['id'])){
        session_start();
        echo false;
    }else{
        echo true;
    }
?>