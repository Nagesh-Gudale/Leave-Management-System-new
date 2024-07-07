<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
  } 
function checkLogin() {
    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit();
    }
}

function isAdmin() {
    return isset($_SESSION['role']) && $_SESSION['role'] == 'admin';
}

function isHOD() {
    return isset($_SESSION['role']) && $_SESSION['role'] == 'hod';
}

function isStaff() {
    return isset($_SESSION['role']) && ($_SESSION['role'] != 'hod' || $_SESSION['role'] != 'admin') ;
}
?>
