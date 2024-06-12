<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['MainMenu'])) {
        header("Location: Directorcheck.php");
        exit();
    } 
}

require_once 'DB_conn.php';
session_start();
$SID = $_SESSION['SID'];
$SMonth = $_SESSION['SMonth'];

$sql_emp = "SELECT  CName FROM employee WHERE ID = '$SID'";
$result_emp = mysqli_query($link, $sql_emp);
if($result_emp){
    $row = mysqli_fetch_assoc($result_emp);
    $CName = $row['CName'];
}

$HWage = $_POST['HWage'];

$sql = "SELECT  WorkDay,OHours,OPay FROM salary WHERE ID = '$SID' and Month='$SMonth'";
$result = mysqli_query($link, $sql);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $WorkDay = $row['WorkDay'];
    $OHours = $row['OHours'];
    $OPay = $row['OPay'];
} else {
    echo "Error: " . mysqli_error($link);
}

$Money = ($HWage * $WorkDay * 8) + ($OHours * $OPay);

$sql_insert = "UPDATE salary SET Hwage='$HWage', Money = '$Money' WHERE ID = '$SID'";
$result = mysqli_query($link, $sql_insert);

echo "<form id='form1' name='form1' method='post' action='salary_insert.php'>";
echo "<p>員工姓名：$CName</p>";
echo "<p>員工編號：$SID</p>";
echo "<p>基本薪資：$HWage 元</p>";
echo "<p>上班天數：$WorkDay 天</p>";
echo "<p>加班時數：$OHours 元</p>";
echo "<p>加班費：$OPay 元</p>";
echo "<p>實拿金額：$Money 元</p>";
echo '<input type="submit" name="MainMenu" id="MainMenu" value="返回主選單" />';
echo "</form>";


mysqli_close($link);

?>