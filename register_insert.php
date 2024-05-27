<?php
require_once 'DB_conn.php';

$CName = $_POST['CName'];
$JobTitle = 'employee';
$Gender = $_POST['Gender'];
$Birthday = $_POST['Birthday'];
$IDCard = $_POST['IDCard'];
$CNumber = $_POST['CNumber']; 
$HomeAddress = $_POST['HomeAddress'];
$BankCode = $_POST['BankCode'];
$AccountNumber = $_POST['AccountNumber'];
$ECName = $_POST['ECName'];
$ECNumber = $_POST['ECNumber'];
$JoinDate = $_POST['JoinDate'];
$LeaveDate = $_POST['LeaveDate'];

if(!isset($CName)){
    
    header("Location:register.php");
}
else{

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['register'])) {
            $error_message = "未輸入資料！";
            header("Location: register.php?error=" . urlencode($error_message));
            exit();
        } 
        elseif (isset($_POST['MainMenu'])) {
            header("Location: Directorcheck.php");
            exit();
        } 
    }


    

    if($Gender == 'Male'){
        $Gender = '男性';
    }
    else{
        $Gender = '女性';
    }

    $JoinDateTimestamp = strtotime($JoinDate);

    $Year = date('Y', $JoinDateTimestamp);
    $Year = $Year - 1911;

    $sql = "select ID from employee where JobTitle = 'employee' ORDER BY ID DESC LIMIT 1";
    $result = mysqli_query($link,$sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $employeeID = $row['ID'];

        // 提取后两位数字
        $lastTwoDigits = substr($employeeID, -2) + 1;
    }
    else{
        $lastTwoDigits = 1;
    }

    $len = strlen($lastTwoDigits);

    for($i=1;$i<=2-$len;$i++){
        $Ans = 0;
        $lastTwoDigits = $Ans.$lastTwoDigits;
    }

    $ID = $Year.$lastTwoDigits;

    $Password = substr($IDCard, -4);
    $Password = $ID . $Password;

    $sql_insert = "insert into employee values ('$CName' , '$ID' , '$Password' , '$JobTitle' , '$Gender' , '$Birthday'  ,  '$IDCard' , '$CNumber' , '$HomeAddress' , '$BankCode' , '$AccountNumber' , '$ECName' , '$ECNumber' , '$JoinDate' , '$LeaveDate' )";

    $result_insert = mysqli_query($link,$sql_insert);

    if($result_insert){
        echo '<form method="post" action="register_insert.php">';
        echo "<h1>註冊成功</h1>";
        echo "<p>員工姓名：$CName</p>";
        echo "<p>員工編號：$ID</p>";
        echo "<p>員工密碼：$Password</p>";
        echo '<input type="submit" name="MainMenu" id="MainMenu" value="返回主選單" />';
        echo '<input type="submit" name="register" id="register" value="返回註冊頁面" />';
        echo '</form>';
    }
    else{
        echo "註冊失敗：" . mysqli_error($link);
    }
        
    mysqli_close($link); 
}
// echo $CName . '<br/>' . $Password . '<br/>'. $ID . '<br/>' . $JobTitle . '<br/>'. $Gender . '<br/>'. $Birthday . '<br/>'. $IDCard . '<br/>'. $CNumber . '<br/>'. $HomeAddress . '<br/>'. $BankCode . '<br/>'. $AccountNumber . '<br/>'. $ECName . '<br/>'. $ECNumber . '<br/>'. $JoinDate . '<br/>'. $LeaveDate . '<br/>' . $Year;
?>