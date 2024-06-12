<?php
    require_once 'DB_conn.php';
    session_start();
    
    $SID = $_POST['ID'];
    $SMonth = $_POST['Month'];

    $_SESSION['SID'] = $SID;
    $_SESSION['SMonth'] = $SMonth;
    
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
    
    echo "<form id='form1' name='form1' method='post' action='salary_insert.php'>";
    echo "<h2><span id='ID'></span>2024年 <span id='month-text'></span> 的薪資計算</h2>";
    echo "<p>
            <label for='HWage'>基本薪資：</label>
            <input name='HWage' type='text' id='HWage' size='20' maxlength='14' required='required'/>
          </p>
          <p>
            <label for='WorkDay'>上班天數：</label>
            <input name='WorkDay' type='text' id='WorkDay' size='20' maxlength='14' required='required' disabled='disabled' value='$WorkDay'/>
          </p>
          <p>
            <label for='OHours'>加班時數：</label>
            <input name='OHours' type='text' id='OHours' size='20' maxlength='14' required='required' disabled='disabled' value='$OHours'/>
          </p>
          <p>
            <label for='OPay'>加班費：</label>
            <input name='OPay' type='text' id='OPay' size='20' maxlength='14' required='required' disabled='disabled' value='$OPay'/>
          </p>
          <p>
            <label for='Money'>實拿金額：</label>
            <output name='Money' id='Money'></output>
          </p>
          <input type='submit' id='calculate' name='calculate' value='計算'/>
          <p>
            <input type='button' onclick='history.go(-1)' value='返回'/>
          </p>
          </form>";
    
    mysqli_close($link);

?>