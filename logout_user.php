<?php
session_start();
session_unset();
header('location:user_page.php');
?>