<?php

session_start();
unset($_SESSION['username']);
session_destroy('username');
header("location:login.html");
?>