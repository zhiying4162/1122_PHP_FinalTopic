<?php
    session_start();
    require_once 'DB_conn.php';

    $id = $_POST['id'];
    $password = $_POST['password'];

    $sql = "select CName , JobTitle from employee WHERE ID = '$id' AND Password = '$password'";
    $result = mysqli_query($link,$sql);

    if ($result) {
        // 檢查是否存在匹配的記錄
        if (mysqli_num_rows($result) > 0) {
            // 帳號和密碼匹配，允許進入
            echo "帳號和密碼正確，允許進入。";
            $row = mysqli_fetch_assoc($result);
            $_SESSION['Name'] = $row['CName'];
            $JobTitle = $row['JobTitle'];
            if ($JobTitle == 'employee' ){
                // echo $row['CName'];
                header("Location: Employeecheck.php");
            }
            else{
                header("Location: Directorcheck.php");
            }
            
        } else {
            // 帳號和密碼不匹配，拒絕進入
            echo "帳號或密碼錯誤，請重新輸入。";
            header("Location: login.html");
        }
    }
    mysqli_close($link);
?>