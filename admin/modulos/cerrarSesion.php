<?php

session_start();

unset($_SESSION['admin']);
unset($_SESSION['adminPrincipal']);

header("Location:../index.php");



?>