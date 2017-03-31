<?php

if (isset($_GET['Message'])) {
    echo '<script language="javascript">';
    echo 'alert('.$_GET['Message'].')';
    echo 'header.location = "http://localhost:8080/login.html";'
    echo '</script>';
}
//header('Location: login.html');
//exit();

?>