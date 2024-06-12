<?php
    session_start();

    $id = $_SESSION['id'];

    require_once 'DB_conn.php';

    $sql_sel = "select * from employee where id = '$id'";
	$result_sel = mysqli_query($link,$sql_sel);

		while($row = mysqli_fetch_assoc($result_sel)){
		   $CName = $row['CName'];
        }

    $Password = $_POST['Password'];
    $CNumber = $_POST['CNumber']; 
    $HomeAddress = $_POST['HomeAddress'];
    $BankCode = $_POST['BankCode'];
    $AccountNumber = $_POST['AccountNumber'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['MainMenu'])) {
            header("Location: Employeecheck.php");
            exit();
        } 
    }

    $sql = "UPDATE employee SET Password ='$Password', CNumber = '$CNumber', HomeAdderss = '$HomeAddress', BankCode = '$BankCode', AccountNumber = '$AccountNumber' WHERE ID = '$id'";

    $result = mysqli_query($link,$sql);

    if($result){
        echo '<form method="post" action="Employeecheck.php">';
        echo "<h1>修正資料成功</h1>";
        echo "<p>員工姓名：$CName</p>";
        echo "<p>員工編號：$id</p>";
        echo "<p>員工密碼：$Password</p>";
        echo '<input type="submit" name="MainMenu" id="MainMenu" value="返回主選單" />';
        echo '</form>';
    }
    else{
        echo "修正資料失敗：" . mysqli_error($link);
    }
        
    mysqli_close($link); 

    // echo $CName . '<br/>' . $Password . '<br/>'. $ID . '<br/>' . $JobTitle . '<br/>'. $Gender . '<br/>'. $Birthday . '<br/>'. $IDCard . '<br/>'. $CNumber . '<br/>'. $HomeAddress . '<br/>'. $BankCode . '<br/>'. $AccountNumber . '<br/>'. $ECName . '<br/>'. $ECNumber . '<br/>'. $JoinDate . '<br/>'. $LeaveDate . '<br/>' . $Year;
?>