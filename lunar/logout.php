<?php
session_start();
session_destroy();
echo 'sssss';
 Header("Location: form_login.php");
?>
