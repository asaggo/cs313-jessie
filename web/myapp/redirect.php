<?php
if (isset($_GET['Message'])) {
    print $_GET['Message'];
}
header('Location: login.html');
exit();
?>