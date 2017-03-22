<?php
try{
if (isset($_GET['Message'])) {
    echo '<script language="javascript">';
    echo 'alert('.$_GET['Message'].')';
}
header('Location: login.html');
exit();
}
catch (PDOException $e){
    echo $e->getMessage();
}
?>