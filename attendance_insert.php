<?php
session_start();

if (isset($_POST['backI'])) {
    header("Location: attendance.php");
    exit();
} elseif (isset($_POST['backD'])) {
    header("Location: Directorcheck.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ID = $_POST['ID'];
    $month = $_POST['Month'];

    require_once 'DB_conn.php';

    $sql = "SELECT TDate, Swork, Gwork FROM attendance WHERE ID='$ID' AND MONTH(TDate) = $month";

    $workDays = 1;

    echo '<form method="post">';
    echo '<table border>';
    echo '<tr align="center"><td>上班日期</td><td>上班時間</td><td>下班時間</td></tr>';
    
    if ($result = mysqli_query($link, $sql)) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>' . $row["TDate"] . '</td>'; // Display the date
            echo '<td>' . $row["Swork"] . '</td>'; // Display the start work time
            echo '<td>' . $row["Gwork"] . '</td>'; // Display the end work time
            echo '</tr>';

            $startTime = strtotime($row["Swork"]);
            $endTime = strtotime($row["Gwork"]);
            $workDuration = ($endTime - $startTime) / 3600;
            if ($workDuration >= 8) {
                $workDays++;
            }
        }

        echo "<tr><td colspan='3'>有效工作天數：$workDays</td></tr>";

    } else {
        echo '<tr><td colspan="3">查詢失敗: ' . mysqli_error($link) . '</td></tr>';
    }
    
    echo '</table></br>';
    echo '<input type="submit" name="backI" id="backI" value="返回查詢畫面">';
    echo '<input type="submit" name="backD" id="backD" value="返回主畫面">';
    echo '</form>';

    $sql_insert = "INSERT INTO salary(ID,Month,WorkDay) VALUES ('$ID',$month,'$workDays')";
    $result_insert =  mysqli_query($link, $sql_insert);

    mysqli_close($link);

    
}
?>
