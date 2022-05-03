<?php
session_start();
unset($_SESSION['user-type']);
session_destroy();
header("location: index.php");
exit();
?>