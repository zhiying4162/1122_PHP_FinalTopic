<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/style.css">

<title>員工打卡</title>

</head>

<body>
<div class="container">
<form id="form1" name="form1" method="post" action="checkin_insert.php" onsubmit="return handleSubmit(event)">

  <h1>打卡</h1>
  <button type="submit" name="action" value="work" id="work">上&emsp;班</button>
  <button type="submit" name="action" value="offwork" id="offwork" disabled>下&emsp;班</button>
  <p></p>
  
  <input type="button" onclick="history.go(-1)" value="回到選單頁" />
</form>
<script src="script.js"></script>
</body>
</html>