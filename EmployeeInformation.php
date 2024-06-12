<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<title>修改基本資料</title>

</head>


<body>

<div class="container">

<form id="form1" name="form1" method="post" action="EmployeeInformation_update.php">
	<?php
		session_start();
		$id = $_SESSION['id'];


		require_once 'DB_conn.php';
		$sql = "select * from employee where id = '$id'";
		$result = mysqli_query($link,$sql);

		while($row = mysqli_fetch_assoc($result)){
		   $CName = $row['CName'];
		   $ID = $row['ID'];
		   $Password = $row['Password'];
		   $CNumber = $row['CNumber']; 
		   $HomeAddress = $row['HomeAdderss'];
		   $BankCode = $row['BankCode'];
		   $AccountNumber = $row['AccountNumber'];
		}

		$sql = "select BankCode from bank";
		$result = mysqli_query($link,$sql);

		while($row = mysqli_fetch_assoc($result)){
		   $BCode[] = $row["BankCode"];
		}
		
		mysqli_close($link);

		if (isset($_POST['back'])) {
			header("Location:Employeecheck.php");
			exit();
		}

?>

  <h2>修改基本資料</h2>
  <p>
    <label for="CName">員工姓名：</label>
    <input name="CName" type="text" id="CName" size="20" maxlength="14" disabled = "disabled" value="<?php echo $CName; ?>"/>
  </p>
  <p>
		<label for="ID">員工編號：</label>
		<input name="ID" type="text" id="ID" disabled = "disabled" value="<?php echo $ID; ?>">
  </p>
  <p>
		<label for="Password">密碼：</label>
		<input name="Password" type="text" id="Password"  value="<?php echo $Password; ?>">
  </p>
  <p>
		<label for="CNumber">連絡電話：</label>
		<input name="CNumber" type="text" id="CNumber" size="20" maxlength="10" required="required" value="<?php echo $CNumber; ?>"/>
  </p>
  <p>
		<label for="HomeAddress">住家地址：</label>
		<input name="HomeAddress" type="text" id="HomeAddress" size="30" maxlength="20" required="required" value="<?php echo $HomeAddress; ?>"/>
  </p>
  <p>
		<label for="BankCode">銀行：</label>
		<select name="BankCode" id="BankCode" required="required" >
			<?php
			foreach($BCode as $id){
				echo "<option value= '$id' > $id </option>";
			}
			?>
		</select>
  </p>
  <p>
		<label for="AccountNumber">銀行帳戶號碼：</label>
		<input name="AccountNumber" type="text" id="AccountNumber" size="20" maxlength="20" required="required" value="<?php echo $AccountNumber; ?>"/>
  </p>
  
  <p>
  <input type="submit" name="button" id="button_r" value="修正資料" />
  <input type="reset" name="button" id="button_r" value="重設" />
  
  </p>
</form>

<form id="form1" name="form1" method="post">
  <input type="submit" name="back" id="back" value="返回主頁" />
</form>

</body>
</html>