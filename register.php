<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/registerStyle.css">
<title>註冊員工資料</title>

</head>


<body>

<div class="container">

<form id="form1" name="form1" method="post" action="register_insert.php">
	<?php
		require_once 'DB_conn.php';
		$sql = "select BankCode from bank";
		$result = mysqli_query($link,$sql);

		while($row = mysqli_fetch_assoc($result)){
		   $BCode[] = $row["BankCode"];
		}
		
		mysqli_close($link);

    if (isset($_POST['back'])) {
      header("Location: Directorcheck.php");
      exit();
    }
?>

  <h2>註冊員工資料</h2>
  <p>
    <label for="CName">員工姓名：</label>
    <input name="CName" type="text" id="CName" size="20" maxlength="14" required="required" />
  </p>
  <p>
		<label for="JobTitle">職稱：</label>
		<input name="employee" type="text" id="employee" value = "員工" disabled = "disabled">
  </p>
  <p>
		<label>性別：</label>
		<input type="radio" name="Gender" value="Male" id="male" required="required" checked /> 男
		<input type="radio" name="Gender" value="Female" id="female" required="required" /> 女
  </p>
  <p>
		<label for="Birthday">生日：</label>
		<input name="Birthday" type="date" value="<?php echo date('Y-m-d'); ?>" required="required" />
  </p>
  <p>
		<label for="IDCard">身分證號碼：</label>
		<input name="IDCard" type="text" id="IDCard" size="20" maxlength="10" required="required" />
  </p>
  <p>
		<label for="CNumber">連絡電話：</label>
		<input name="CNumber" type="text" id="CNumber" size="20" maxlength="10" required="required" />
  </p>
  <p>
		<label for="HomeAddress">住家地址：</label>
		<input name="HomeAddress" type="text" id="HomeAddress" size="30" maxlength="30" required="required" />
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
		<input name="AccountNumber" type="text" id="AccountNumber" size="20" maxlength="20" required="required" />
  </p>
  <p>
		<label for="ECName">緊急聯絡人：</label>
		<input name="ECName" type="text" id="ECName" size="20" maxlength="14" required="required" />
  </p>
  <p>
		<label for="ECNumber">緊急聯絡人電話：</label>
		<input name="ECNumber" type="text" id="ECNumber" size="20" maxlength="10" required="required" />
  </p>
  <p>
		<label for="JoinDate">入職日期：</label>
		<input name="JoinDate" type="date" value="<?php echo date('Y-m-d'); ?>" required="required" />
  </p>
  <p>
		<label for="LeaveDate">離職日期：</label>
		<input name="LeaveDate" type="date" value="" />
  </p>
  <p>
  <input type="submit" name="button" id="button_r" value="送出" />
  <input type="reset" name="button" id="button_r" value="重設" />
  
  </p>
</form>

<form id="form1" name="form1" method="post">
  <input type="submit" name="back" id="back" value="返回主頁" />
</form>

</body>
</html>