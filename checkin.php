<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>員工打卡</title>
	
<script>
	function leaveContent() {
		var expandContent = document.getElementById("hidden-content");
		
		if (expandContent.style.display === "none") {
			expandContent.style.display = "block";
		} else {
			expandContent.style.display = "none";
		}
	}
</script>
</head>

<body>
<div class="container">
<form id="form1" name="form1" method="post" action="">
	<?php
	
		$options = [
        "option1" => "事假",
        "option2" => "病假"
		];

		require_once 'DB_conn.php';
		$sql = "select BankCode from bank";
		$result = mysqli_query($link,$sql);

		while($row = mysqli_fetch_assoc($result)){
		   $BCode[] = $row["BankCode"];
		}
		
		mysqli_close($link);

	?>

  <h1>打卡</h1>
  <input type="submit" name="button" id="button" value="上&emsp;班" />
  <input Type="reset" name="button" id="button" value="下&emsp;班" />
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
</body>
</html>