<?php
session_start();
session_destroy();
header("Location: week03.html");
?>