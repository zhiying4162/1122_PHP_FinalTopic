<?php
date_default_timezone_set('Asia/Shanghai'); // 設定時區

session_start();
$id = $_SESSION['id'];
$Name = $_SESSION['Name'];
    
require_once 'DB_conn.php';
        
    $leaveList = $_POST['leaveList'];
    $starttime = $_POST['starttime'];
    $finishtime = $_POST['finishtime'];
    $mytext = $_POST['mytext'];

    $sql = "INSERT INTO afleave VALUES ('$id','$leaveList','$starttime','$finishtime','$mytext')";
    $result = mysqli_query($link,$sql);
        
    if($result){
        echo '<form method="post" action="Leave_insert.php">';
        echo "<h1>請假成功</h1>";
        echo "<p>員工姓名：$Name</p>";
        echo "<p>員工編號：$id</p>";
        echo "<p>假別：$leaveList</p>";
        echo "<p>請假時間：$starttime 到 $finishtime</p>";
        echo "<p>請假原因：$mytext</p>";
        echo '<input type="submit" name="MainMenu" id="MainMenu" value="返回主選單" />';
        echo '</form>';
    }

    mysqli_close($link); 
 
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['MainMenu'])) {
            header("Location: Employeecheck.php");
            exit();
        } 
    }

    
    
    ?>