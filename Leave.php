<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/style.css">

<title>員工請假</title>

</head>

<body>
<div class="container">
<form id="form1" name="form1" method="post" action="Leave_insert.php">
	<?php
	
	$options = [
        "Personal" => "事假",
        "sick" => "病假"
		];
	?>

  <h1>請假</h1>
		 <p>
			<label for="leaveList">假別：</label>
			<select name="leaveList" id="leaveList" required="required">
				<?php
				foreach ($options as $value => $label) {
					echo '<option value="' . $value . '">' . $label . '</option>';
				}
			?>
			</select>
		</p>
		<p>
			<label for="starttime">申請起始日期：</label>
			<input name="starttime" type="date" value="<?php echo date('Y-m-d'); ?>" required="required" />
		</p>
		<p>
			<label for="finishtime">申請結束日期：</label>
			<input name="finishtime" type="date" value="<?php echo date('Y-m-d'); ?>" required="required" />
		</p>
		<p>
			<textarea name="mytext" rows="6" cols="40" required="required" placeholder="請假原因"></textarea>
		</p>
		<p>
		   <input type="submit" value="送出" />
		   <p></p>
		   <input type="button" onclick="history.go(-1)" value="回到選單頁" />
</form>
<script src="script.js"></script>
</body>
</html>