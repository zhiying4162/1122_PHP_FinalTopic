<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>出缺勤查詢</title>
<style>
	body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
        font-family: Arial, sans-serif;
    }

    .container {
        width: 50%;
        text-align: center;
        padding: 30px;
        background-color: #f4f4f4;
        border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }
	
	input[type="button"], input[type="button"] {
        padding: 10px 20px;
        font-size: 16px;
        border: none;
        background-color: #007bff;
        color: #fff;
        cursor: pointer;
        border-radius: 5px;
    }

    input[type="button"]:hover, input[type="button"]:hover {
        background-color: #0056b3;
    }
</style>
</head>

<body>
<div class="container">
<form id="form1" name="form1" method="post" action="">
	<?php
	header("Content-Type:text/html; charset=utf-8");
	#$id= $_POST['id'];
	#$pwd = $_POST['password'];
	
	echo "<h1>出缺勤查詢</br></h1>";
	

	?>
  <input type="button" onclick="history.go(-1)" value="回到選單頁" />
</form>
</body>
</html>