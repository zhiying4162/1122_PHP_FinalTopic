<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>員工薪資計算</title>
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

    .container h1 {
		text-align: center;
    }

    .container p {
        margin-bottom: 10px;
		text-align: left; 
    }

    select, input[type="text"], input[type="date"] {
        width: 100%;
        padding: 10px;
        font-size: 16px;
        border-radius: 5px;
        border: 1px solid #ccc;
        box-sizing: border-box; 
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
	
	#hidden-content {
        display: none;
    }
	
	#hidden-content p {
		margin-bottom: 10px;
		text-align: left;
	}
</style>

<script>
	function showContent() {
		var expandContent = document.getElementById("hidden-content");
		var monthSelect = document.getElementById("Month");
		var selectedMonth = monthSelect.options[monthSelect.selectedIndex].text;
		var monthText = document.getElementById("month-text");
		var back = document.getElementById("back");
		
		/*var employeeSelect = document.getElementById("ID");
		var selectedEmployee = employeeSelect.options[employeeSelect.selectedIndex].text;
		var employeeText = document.getElementById("employee-text");*/

		if (expandContent.style.display === "none") {
			expandContent.style.display = "block";
			back.style.display = "none";
			/*employeeText.innerText = selectedEmployee;*/
			monthText.innerText = selectedMonth;
		} else {
			expandContent.style.display = "none";
			back.style.display = "inline";
		}
	}

	function EmployeeSalary(){
		var BasicWage = parseFloat(document.getElementById("HWage").value) || 0;
		var WorkDays = parseFloat(document.getElementById("WorkDay").value) || 0;
		var OverHours = parseFloat(document.getElementById("OHours").value) || 0;
		var OverPay = parseFloat(document.getElementById("OPay").value) || 0;

		var totalSalary = (BasicWage * WorkDays * 8) + (OverHours * OverPay);
		document.getElementById("Money").value = totalSalary;
	}
</script>
</head>

<body>
<div class="container">
<form id="form1" name="form1" method="post" action="">
    <?php
        $options = [
        "option1" => "5月",
        "option2" => "6月"
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
			<input name="HWage" type="HWage" id="HWage" size="20" maxlength="14" required="required" oninput="EmployeeSalary()" />
		 </p>
		 <p>
			<label for="WorkDay">上班天數：</label>
			<input name="WorkDay" type="WorkDay" id="WorkDay" size="20" maxlength="14" required="required" oninput="EmployeeSalary()" />
		 </p>
		 <p>
			<label for="OHours">加班時數：</label>
			<input name="OHours" type="OHours" id="OHours" size="20" maxlength="14" required="required" oninput="EmployeeSalary()" />
		 </p>
		 <p>
			<label for="OPay">加班費：</label>
			<input name="OPay" type="OPay" id="OPay" size="20" maxlength="14" required="required" oninput="EmployeeSalary()" />
		 </p>
		 <p>
			<label for="Money">實拿金額：</label>
			<output name="Money" type="Money" id="Money" />
		 </p>
		 <p>
		   <input type="button" onclick="history.go(-1)" value="回到選單頁" />
    </div>
</form>
</body>
</html>
