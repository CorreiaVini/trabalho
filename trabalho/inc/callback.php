<?php
    if (!empty($_GET['code'])){
        include 'requestLogIn.php';
    } else {
        echo '<pre>';
        print_r($_GET);
        echo '</pre>';
    }
?>