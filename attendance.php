<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/style.css">
<title>出缺勤查詢</title>

</head>

<body>
<div class="container">
<form id="form1" name="form1" method="post" action="attendance_insert.php">
	<?php
	header("Content-Type:text/html; charset=utf-8");
	#$id= $_POST['id'];
	#$pwd = $_POST['password'];
	
	echo "<h1>出缺勤查詢</br></h1>";

	$options = [
        "5" => "5月",
        "6" => "6月"
        ];

		require_once 'DB_conn.php';

		$sql_ID = "select ID from employee where ID like '1%'";
		$result_ID = mysqli_query($link,$sql_ID);

		while($row = mysqli_fetch_assoc($result_ID)){
		   $EID[] = $row["ID"];
		}
		
		mysqli_close($link);
    ?>
	
   <p>  
		<label for="ID">員工編號：</label> 
		<select name="ID" id="ID" required="ID">
			<?php
			foreach($EID as $cid){
				echo "<option value= $cid > $cid </option>";
			}
			?>
		</select>
  </p>

  <p>
        <label for="Month">月份：</label>
        <select name="Month" id="Month" required="Month">
            <?php
            foreach ($options as $value => $label) {
                echo '<option value="' . $value . '">' . $label . '</option>';
            }
            ?>
        </select>
  </p>
  <input type="submit" name="Inquire" id="Inquire" value="查詢" />
  <input type="button" onclick="history.go(-1)" value="回到選單頁" />
</form>
</body>
</html>