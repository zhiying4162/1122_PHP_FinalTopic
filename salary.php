<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/style.css">
<title>員工薪資計算</title>

<script>
	
</script>
</head>

<body>
<div class="container">
<form id="form1" name="form1" method="post" action="salary.php">
    <?php
        $options = [
        "5" => "5月",
        "6" => "6月"
        ];
		
		require_once 'DB_conn.php';  #待修改連接
		$sql = "select BankCode from bank";
		$result = mysqli_query($link,$sql);

		while($row = mysqli_fetch_assoc($result)){
		   $BCode[] = $row["BankCode"];
		}

		$sql_ID = "select ID from employee";
		$result_ID = mysqli_query($link,$sql_ID);

		while($row = mysqli_fetch_assoc($result_ID)){
		   $EID[] = $row["ID"];
		}
				
		
		mysqli_close($link);
    ?>
	
  <h1>員工薪資計算</h1>    
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
  <p>年份：2024年</p>
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
  <input type="button" name="open" id="open" value="展開" onclick="showContent()" />
  <input type="button" onclick="history.go(-1)" name ='back' id ='back' value="回到選單頁" />
    <div id="hidden-content">
        <h2><span id='ID'></span>2024年 <span id="month-text"></span> 的薪資計算</h2>
		 <p>
			<label for="HWage">基本薪資：</label>
			<input name="HWage" type="text" id="HWage" size="20" maxlength="14" required="required" oninput="EmployeeSalary()" />
		 </p>
		 <p>
			<label for="WorkDay">上班天數：</label>
			<input name="WorkDay" type="text" id="WorkDay" size="20" maxlength="14" required="required" disabled = "disabled" oninput="EmployeeSalary()" />
		 </p>
		 <p>
			<label for="OHours">加班時數：</label>
			<input name="OHours" type="text" id="OHours" size="20" maxlength="14" required="required" oninput="EmployeeSalary()" />
		 </p>
		 <p>
			<label for="OPay">加班費：</label>
			<input name="OPay" type="text" id="OPay" size="20" maxlength="14" required="required" oninput="EmployeeSalary()" />
		 </p>
		 <p>
			<label for="Money">實拿金額：</label>
			<output name="Money" type="Money" id="Money" />
		 </p>
		 <p>
		   <input type="button" onclick="history.go(-1)" value="回到選單頁" />
    </div>
</form>
<script src="script.js"></script>
</body>
</html>
