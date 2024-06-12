<?php
    require_once 'DB_conn.php';
    
    $ID = $_POST['ID'];
    $month = $_POST['Month'];

    $sql_salary = "select WorkDay from salary where ID='$ID' and Month='$month'";
    if ($result_salary = mysqli_query($link, $sql_salary)) {
        while ($row = mysqli_fetch_assoc($result_salary)) {
            $WorkDay = $row["WorkDay"] ;
        }
    }
    echo $WorkDay;
?>