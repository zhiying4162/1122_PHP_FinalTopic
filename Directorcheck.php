<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/style.css">
<title>主管功能頁面</title>

</head>

<body>
<div class="container">
<form id="form1" name="form1" method="post" action="">
	<?php
	header("Content-Type:text/html; charset=utf-8");
	#$id= $_POST['id'];
	#$pwd = $_POST['password'];

    session_start();

    $Name = $_SESSION['Name'];
	
	echo "<h1> $Name 主管歡迎您!!</br></h1>";
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
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
	
	<p> <input type="submit" name="register" id="register" value="註冊員工資料" /></p>
	<p> <input type="submit" name="salary" id="salary" value="員工薪資計算" /></p>
	<p> <input type="submit" name="attendance" id="attendance" value="員工出缺勤查詢" /></p>
    <p> <input type="submit" name="Signout" id="Signout" value="登出" /></p>
	  
</form>
</body>
</html>