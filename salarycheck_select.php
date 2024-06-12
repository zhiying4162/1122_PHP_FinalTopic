<?php
    require_once 'DB_conn.php';
    session_start();
    
    $id = $_SESSION['id'];
    $Month = $_POST['Month'];

    // $Name = $_SESSION['Name'];
    // $id = $_SESSION['id'];
    
    $sql = "SELECT * FROM salary WHERE ID = '$id' and Month='$Month'";
    $result = mysqli_query($link, $sql);
    
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $HWage = $row['HWage'];
        $WorkDay = $row['WorkDay'];
        $OHours = $row['OHours'];
        $OPay = $row['OPay'];
        $Money = $row['Money'];
    } else {
        echo "Error: " . mysqli_error($link);
    }
    
    echo "<form id='form1' name='form1' method='post' action='salary_insert.php'>";
    echo "<h2><span id='ID'></span>2024年 <span id='month-text'></span> 的薪資查詢</h2>";
    echo "<p>
			<label for='HWage'>基本時薪：$HWage 元</label>
			<output name='HWage' type='text' id='HWage' size='20' maxlength='14' required='required'>
		 </p>
		 <p>
			<label for='WorkDay'>上班天數：$WorkDay 天</label>
			<output name='WorkDay' type='text' id='WorkDay' size='20' maxlength='14' required='required'>
		 </p>
		 <p>
			<label for='OHours'>加班時數：$OHours 元</label>
			<output name='OHours' type='text' id='OHours' size='20' maxlength='14' required='required'>
		 </p>
		 <p>
			<label for='OPay'>加班費：$OPay 元</label>
			<output name='OPay' type='text' id='OPay' size='20' maxlength='14' required='required'>
		 </p>
		 <p>
			<label for='Money'>實拿金額：$Money 元</label>
			<output name='Money' type='Money' id='Money'>
		 </p>
            <input type='button' onclick='history.go(-1)' value='返回'/>
          </p>
          </form>";
    
    mysqli_close($link);

?>