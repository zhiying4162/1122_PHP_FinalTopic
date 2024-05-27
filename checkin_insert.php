<?php
date_default_timezone_set('Asia/Shanghai'); // 設定時區

function handleButtonClick($action) {
    require_once 'DB_conn.php';
    session_start();
    $id = $_SESSION['id'];

    $Date = date('Y-m-d');
    $currentTime = date('H:i'); // 當前時間

    if ($action === "work") {
        $WorkTime = $currentTime;
        $sql = "INSERT INTO attendance(ID,TDate,SWork) VALUES ('$id','$Date','$WorkTime')";
        $result = mysqli_query($link,$sql);
        if($result){
            return "上班打卡成功\n時間為：$currentTime";
        }else{
            echo mysqli_error($link);
        }
    } 
    else{
        $OffWorkTime = $currentTime;
        $sql = "UPDATE attendance SET GWork='$OffWorkTime' WHERE TDate='$Date'";
        $result_insert = mysqli_query($link,$sql);
        if($result){
            return "下班打卡成功\n時間為：$currentTime";
        }else{
            echo mysqli_error($link);
        }
    } 

    mysqli_close($link); 
}

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $action = $_POST['action'] ?? '';
    
        echo handleButtonClick($action);
    } 

    
    ?>