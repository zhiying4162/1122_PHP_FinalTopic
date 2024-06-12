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
	<?php
	
		$options = [
        "Personal" => "事假",
        "sick" => "病假"
		];
	?>

  <h1>打卡</h1>
  <button type="submit" name="action" value="work" id="work">上&emsp;班</button>
  <button type="submit" name="action" value="offwork" id="offwork" disabled>下&emsp;班</button>
  <p>
  <input type="button" name="leave" id="leave" value="請假" onclick="leaveContent()" />
    <div id="hidden-content">
        <h2>請假</h2>
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
			<textarea name="mytext" rows="6" cols="40" required="required">請假原因</textarea>
		</p>
		<p>
		   <input type="button" value="送出" />
    </div>
  <input type="button" onclick="history.go(-1)" value="回到選單頁" />
</form>
<script src="script.js"></script>
</body>
</html>