<?php
session_start();
session_destroy();
header('Location: /Transfers/app/views/login.php');
exit;
?>