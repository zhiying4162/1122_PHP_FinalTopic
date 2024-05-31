<?php
session_start();



echo "<h1> 主管歡迎您好!!</h1>";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['register'])) {
        header("Location: register.php");
        exit();
    } elseif (isset($_POST['salary'])) {
        header("Location: salary.php");
        exit();
    } elseif (isset($_POST['attendance'])) {
        header("Location: attendance.php");
        exit();
    } elseif (isset($_POST['Signout'])) {
        header("Location: login.html");
        exit();
    }
}
?>
