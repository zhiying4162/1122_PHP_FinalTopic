<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/style.css">
<title>員工功能頁面</title>
	
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

	echo "<h1> $Name 員工歡迎!!</br></h1>";
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		if (isset($_POST['checkin'])) {
			header("Location: checkin.php");
			exit();
		} elseif (isset($_POST['salarycheck'])) {
			header("Location: salarycheck.php");
			exit();
		} elseif (isset($_POST['Signout'])) {
			header("Location: login.html");
			exit();
        }
	}
	?>
	
  <p><input type="submit" name="checkin" id="checkin" value="打&emsp;&emsp;卡" /></p>
  <p><input type="submit" name="salarycheck" id="salarycheck" value="薪資查詢" /></p>
  <p><input type="submit" name="Signout" id="Signout" value="登出" /></p>
  
</form>
</body>
</html>