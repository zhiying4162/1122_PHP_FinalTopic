function leaveContent() {
    var expandContent = document.getElementById("hidden-content");

    if (expandContent.style.display === "none") {
        expandContent.style.display = "block";
    } else {
        expandContent.style.display = "none";
    }
}

function showContent() {
    var expandContent = document.getElementById("hidden-content");
    var monthSelect = document.getElementById("Month");
    var selectedMonth = monthSelect.options[monthSelect.selectedIndex].text;
    var monthText = document.getElementById("month-text");
    var back = document.getElementById("back");

    /*var employeeSelect = document.getElementById("ID");
    var selectedEmployee = employeeSelect.options[employeeSelect.selectedIndex].text;
    var employeeText = document.getElementById("employee-text");*/

    if (expandContent.style.display === "none") {
        expandContent.style.display = "block";
        back.style.display = "none";
        /*employeeText.innerText = selectedEmployee;*/
        monthText.innerText = selectedMonth;
    } else {
        expandContent.style.display = "none";
        back.style.display = "inline";
    }
}

function EmployeeSalary() {
    var BasicWage = parseFloat(document.getElementById("HWage").value) || 0;
    var WorkDays = parseFloat(document.getElementById("WorkDay").value) || 0;
    var OverHours = parseFloat(document.getElementById("OHours").value) || 0;
    var OverPay = parseFloat(document.getElementById("OPay").value) || 0;

    var totalSalary = (BasicWage * WorkDays * 8) + (OverHours * OverPay);
    document.getElementById("Money").value = totalSalary;
}

function handleSubmit(event) {
    event.preventDefault(); // 停止表单提交
    const action = event.submitter.value; // 获取被点击按钮的值
    sendRequest(action);
}

function sendRequest(action) {
    fetch('checkin_insert.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: new URLSearchParams({ action: action })
    })
        .then(response => response.text())
        .then(data => {
            console.log(data);
            alert(data); // 显示响应内容

            if (action === 'work') {
                document.getElementById('offwork').disabled = false; // 启用下班按钮
                document.getElementById('work').disabled = true;
            } else if (action === 'offwork') {
                document.getElementById('work').disabled = false; // 启用上班按钮
                document.getElementById('offwork').disabled = true;
            }
        })
        .catch(error => console.error('Error:', error));
}