<?php
include 'header.php';
include 'config.php';
?>

<div class="container-lg">
    <div class="d-flex">
        <a href="javascript:history.go(-1)" class="" title="Back"><i class="bi bi-arrow-left"></i></a>
        <h5 class="ms-2 text-primary">Add Monthly Salary</h5>
    </div>
    <hr>

    <div class="d-flex">
        <div class="row">
            <div class="col">
                <select class="form-select" id="employee_selectOption">
                    <option value="" selected>Select employee</option>
                </select>
            </div>
            <div class="col">
                <input type="month" class="form-control" id="monthInput" name="monthInput" max="<?php echo date('Y-m') ?>" value="<?php echo date('Y-m') ?>">
            </div>
        </div>
    </div>

    <div class="card mt-3 ">
        <div class="card-body">
            <form method="POST" id="myForm">
                <div class="mt-2 row row-cols-1 row-cols-md-2 g-4">
                    <input type="hidden" name="add_salary_uid" id="add_salary_uid">
                    <div class="row">
                        <div class="col-5">Present :</div>
                        <div class="col-7"><input type="number" class="form-control form-control-sm mb-2" min="0" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==2) return false;" placeholder="Enter total present" name="salary_present" id="salary_present" value=""></div>
                    </div>

                    <div class="row">
                        <div class="col-5">Salary:</div>
                        <div class="col-7"><input type="text" class="form-control form-control-sm mb-2" name="salary_salary" id="salary_salary" value="" readonly></div>
                    </div>


                    <div class="row" id="ot-row">
                        <div class="col-5">Over Time (Ot) :</div>
                        <div class="col-7"><input type="number" class="form-control form-control-sm mb-2" min="0" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==2) return false;" placeholder="Enter total ot" name="salary_ot" id="salary_ot" value=""></div>
                    </div>

                    <div class="row">
                        <div class="col-5">Salary Type :</div>
                        <div class="col-7"><input type="text" class="form-control form-control-sm mb-2" name="salary_salary_type" id="salary_salary_type" value="" readonly></div>
                    </div>

                    <div class="row">
                        <div class="col-5">Advance :</div>
                        <div class="col-7"><input type="number" class="form-control form-control-sm mb-2" min="0" placeholder="Enter total advance" name="salary_total_advance" id="salary_advance" value=""></div>
                    </div>

                    <div class="row">
                        <div class="col-5">Total Salary :</div>
                        <div class="col-7"><input type="text" class="form-control form-control-sm mb-2" name="salary_total_salary" id="salary_total_salary" value="" readonly></div>
                    </div>

                    <div class="row">
                        <div class="col-5">Remark :</div>
                        <div class="col-7"><input type="text" class="form-control form-control-sm mb-2" placeholder="Remark / Comments" name="salary_remark" id="salary_remark" value=""></div>
                    </div>

                    <div class="row">
                        <div class="col-5">Net Payable Amount :</div>
                        <div class="col-7"><input type="text" class="form-control form-control-sm mb-2" name="salary_payable_amount" id="salary_payable_amount" value="" readonly></div>
                    </div>

                    <div class="row">
                        <div class="col-5">Performance:</div>
                        <div class="col-7">
                            <select class="form-control form-control-sm mb-2" name="salary_performance" id="salary_performance">
                                <option selected>--Select Performance--</option>
                                <option value="Bad">Bad</option>
                                <option value="Good">Good</option>
                                <option value="Excellent">Excellent</option>
                            </select>
                        </div>
                    </div>

                    <div class="row justify-content-left mt-2">
                        <div class="col-3">
                            <input type="button" id="add_salary_btn" class="btn btn-sm btn-success form-control form-control-sm" onclick="return validateForm()" value="Submit">
                        </div>
                        <div class="col-3">
                            <input type="reset" class="btn btn-sm btn-danger form-control form-control-sm" value="Reset">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    //validation end here
    var url = '<?php echo $url; ?>';


    const monthInput = document.getElementById('monthInput');
    const currentDate = new Date();
    let year = currentDate.getFullYear();
    let month = currentDate.getMonth() + 1;
    monthInput.value = `${year}-${month.toString().padStart(2, '0')}`;

    let date = new Date(year, month - 1);
    let monthName = date.toLocaleString('default', {
        month: 'long'
    });

    monthInput.addEventListener('change', () => {
        [year, month] = monthInput.value.split('-');
        year = parseInt(year);
        date = new Date(year, month - 1);
        monthName = date.toLocaleString('default', {
            month: 'long'
        });

    });


    fetch(url + 'employeeManage/getAllUsersDropdown.php', {
            method: 'POST',
            body: JSON.stringify({
                "msg": "getAllUsers",
                "ad_id": getCookieValue('ad_id'),
            }),
            headers: {
                'Authorization': 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IlNhY2hpZGFuYW5kIiwiaWF0IjoxNTE2MjM5MDIyfQ.taGT5pLH4g6Hbsul0PReCu5eO-k7cWF6thjHU29legk',
                'Content-Type': 'application/json',
                'Password': 'U2FjaGlkYW5hbmRAZGlnaXRhbF9lbXBsb3llZV9ib29rLnNlbGY=',
            }
        })
        .then(function(response) {
            return response.json();
        })
        .then(function(data) {

            const selectOption = document.getElementById('employee_selectOption');
            const advanceUid = document.getElementById('add_salary_uid');

            if (data.status === "Success") {
                const employees = data.data;
                employees.forEach(function(employee) {
                    const option = document.createElement('option');
                    option.text = employee.name;
                    option.value = employee.uid;
                    option.salary = employee.salary;
                    option.salary_type = employee.salary_type;
                    selectOption.add(option);
                });
            }

            selectOption.addEventListener('change', event => {
                const selectedOption = event.target.selectedOptions[0];
                const selectedName = selectedOption.textContent;
                const selectedUid = selectedOption.value;
                const selectedSalary = selectedOption.salary;
                const selectedSalaryType = selectedOption.salary_type;

                const selectedAdId = advanceUid.value = selectedUid;
                const employeeName = selectedName;

                document.getElementById("salary_salary").value = selectedSalary;
                document.getElementById("salary_salary_type").value = selectedSalaryType;



                const selectOption = document.getElementById('employee_selectOption');
                const salary_Uid = document.getElementById('add_salary_uid');

                // calculate salary start here 

                const salaryType = document.getElementById("salary_salary_type").value;
                const otType = getCookieValue('ot_type');

                if (salaryType === "Monthly Basis" && otType === "Hour Basis") {
                    function calculateMonthlySalary() {
                        const presentDays = parseInt(document.getElementById('salary_present').value);
                        const otHours = parseInt(document.getElementById('salary_ot').value);
                        const advanceSalary = parseInt(document.getElementById('salary_advance').value);

                        const monthlySalary = document.getElementById('salary_salary').value;

                        //working days calculation start here 
                        const inputType = getCookieValue('working_days');
                        const input_month = month;
                        const input_year = year;

                        const workingDays = inputType === 'Monday to Thursday' ? ['Monday', 'Tuesday', 'Wednesday', 'Thursday'] :
                            inputType === 'Monday to Friday' ? ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'] :
                            inputType === 'Monday to Saturday' ? ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'] : [];

                        const daysInMonth = new Date(input_year, input_month, 0).getDate();
                        let workingDaysCount = 0;
                        for (let day = 1; day <= daysInMonth; day++) {
                            const date = new Date(input_year, input_month - 1, day);
                            if (workingDays.includes(date.toLocaleString('en-IN', {
                                    weekday: 'long'
                                }))) {
                                workingDaysCount++;
                            }
                        }
                        //working days calculation end here 

                        const totalWorkingDays = workingDaysCount;

                        const workingHours = parseInt(getCookieValue('working_hours').split(':')[0], 10);

                        const salaryPerDay = monthlySalary / totalWorkingDays;
                        const salaryPerHour = salaryPerDay / workingHours;

                        const totalSalary = salaryPerDay * presentDays;
                        const otSalary = otHours * salaryPerHour;

                        const totalPayableSalary = totalSalary + otSalary;
                        const netPayableSalary = totalPayableSalary - advanceSalary;



                        document.getElementById('salary_total_salary').value = totalPayableSalary;
                        document.getElementById('salary_payable_amount').value = netPayableSalary;
                    }

                    document.getElementById('salary_present').addEventListener('input', calculateMonthlySalary);
                    document.getElementById('salary_ot').addEventListener('input', calculateMonthlySalary);
                    document.getElementById('salary_advance').addEventListener('input', calculateMonthlySalary);
                    document.getElementById('salary_salary').addEventListener('input', calculateMonthlySalary);
                } else {
                    if (salaryType === "Daily Basis" && otType === "Hour Basis") {
                        function calculateHourlySalary() {
                            const presentDays = parseInt(document.getElementById('salary_present').value);
                            const otHours = parseInt(document.getElementById('salary_ot').value);
                            const advanceSalary = parseInt(document.getElementById('salary_advance').value);

                            const dailySalary = parseInt(document.getElementById('salary_salary').value);

                            const workingDays = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
                            const totalWorkingDays = workingDays.length;

                            const workingHours = parseInt(getCookieValue('working_hours').split(':')[0], 10);
                            const salaryPerHour = dailySalary / workingHours;

                            const totalSalary = dailySalary * presentDays;
                            const otSalary = otHours * salaryPerHour;

                            const totalPayableSalary = totalSalary + otSalary;
                            const netPayableSalary = totalPayableSalary - advanceSalary;



                            document.getElementById('salary_total_salary').value = totalPayableSalary;
                            document.getElementById('salary_payable_amount').value = netPayableSalary;
                        }

                        document.getElementById('salary_present').addEventListener('input', calculateHourlySalary);
                        document.getElementById('salary_ot').addEventListener('input', calculateHourlySalary);
                        document.getElementById('salary_advance').addEventListener('input', calculateHourlySalary);
                        document.getElementById('salary_salary').addEventListener('input', calculateHourlySalary);
                    } else {
                        if (salaryType === "Monthly Basis" && otType === "Present Basis") {
                            function calculateMonthlyPresentSalary() {
                                document.getElementById("ot-row").style.display = "none";

                                const presentDays = parseInt(document.getElementById('salary_present').value);
                                const advanceSalary = parseInt(document.getElementById('salary_advance').value);
                                const monthlySalary = parseInt(document.getElementById('salary_salary').value);

                                //working days calculation start here 
                                const inputType = getCookieValue('working_days');
                                const input_month = month;
                                const input_year = year;

                                const workingDays = inputType === 'Monday to Thursday' ? ['Monday', 'Tuesday', 'Wednesday', 'Thursday'] :
                                    inputType === 'Monday to Friday' ? ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'] :
                                    inputType === 'Monday to Saturday' ? ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'] : [];

                                const daysInMonth = new Date(input_year, input_month, 0).getDate();
                                let workingDaysCount = 0;
                                for (let day = 1; day <= daysInMonth; day++) {
                                    const date = new Date(input_year, input_month - 1, day);
                                    if (workingDays.includes(date.toLocaleString('en-IN', {
                                            weekday: 'long'
                                        }))) {
                                        workingDaysCount++;
                                    }
                                }


                                //working days calculation end here 

                                const totalWorkingDays = workingDaysCount;
                                const salaryPerDay = monthlySalary / totalWorkingDays;

                                const totalSalary = salaryPerDay * presentDays;


                                document.getElementById('salary_total_salary').value = totalSalary;
                                document.getElementById('salary_payable_amount').value = totalSalary - advanceSalary;

                            }

                            document.getElementById('salary_present').addEventListener('input', calculateMonthlyPresentSalary);
                            document.getElementById('salary_advance').addEventListener('input', calculateMonthlyPresentSalary);
                            document.getElementById('salary_salary').addEventListener('input', calculateMonthlyPresentSalary);

                        } else {
                            if (salaryType === "Daily Basis" && otType === "Present Basis") {
                                function calculateDailyPresentSalary() {

                                    document.getElementById("ot-row").style.display = "none";

                                    const dailySalary = parseInt(document.getElementById('salary_salary').value);
                                    const presentDays = parseInt(document.getElementById('salary_present').value);
                                    const advanceSalary = parseInt(document.getElementById('salary_advance').value);

                                    const inputType = getCookieValue('working_days');
                                    const input_month = month;
                                    const input_year = year;

                                    const workingDays = inputType === 'Monday to Thursday' ? ['Monday', 'Tuesday', 'Wednesday', 'Thursday'] :
                                        inputType === 'Monday to Friday' ? ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'] :
                                        inputType === 'Monday to Saturday' ? ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'] : [];

                                    const daysInMonth = new Date(input_year, input_month, 0).getDate();
                                    let workingDaysCount = 0;
                                    for (let day = 1; day <= daysInMonth; day++) {
                                        const date = new Date(input_year, input_month - 1, day);
                                        if (workingDays.includes(date.toLocaleString('en-IN', {
                                                weekday: 'long'
                                            }))) {
                                            workingDaysCount++;
                                        }
                                    }
                                    const totalWorkingDays = workingDaysCount;
                                    const totalSalary = dailySalary * presentDays;
                                    const netPayableSalary = totalSalary - advanceSalary;


                                    document.getElementById('salary_total_salary').value = totalSalary;
                                    document.getElementById('salary_payable_amount').value = netPayableSalary;
                                }

                                document.getElementById('salary_salary').addEventListener('input', calculateDailyPresentSalary);
                                document.getElementById('salary_present').addEventListener('input', calculateDailyPresentSalary);
                                document.getElementById('salary_advance').addEventListener('input', calculateDailyPresentSalary);

                            } else {

                                if ((salaryType === "Daily Basis" && otType === "None") || (salaryType === "Daily Basis" && otType === "Compensation leave")) {
                                    function calculateDailyPresentSalary() {

                                        document.getElementById("ot-row").style.display = "none";

                                        const dailySalary = parseInt(document.getElementById('salary_salary').value);
                                        const presentDays = parseInt(document.getElementById('salary_present').value);
                                        const advanceSalary = parseInt(document.getElementById('salary_advance').value);

                                        const inputType = getCookieValue('working_days');
                                        const input_month = month;
                                        const input_year = year;

                                        const workingDays = inputType === 'Monday to Thursday' ? ['Monday', 'Tuesday', 'Wednesday', 'Thursday'] :
                                            inputType === 'Monday to Friday' ? ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'] :
                                            inputType === 'Monday to Saturday' ? ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'] : [];

                                        const daysInMonth = new Date(input_year, input_month, 0).getDate();
                                        let workingDaysCount = 0;
                                        for (let day = 1; day <= daysInMonth; day++) {
                                            const date = new Date(input_year, input_month - 1, day);
                                            if (workingDays.includes(date.toLocaleString('en-IN', {
                                                    weekday: 'long'
                                                }))) {
                                                workingDaysCount++;
                                            }
                                        }
                                        const totalWorkingDays = workingDaysCount;
                                        const totalSalary = dailySalary * presentDays;
                                        const netPayableSalary = totalSalary - advanceSalary;


                                        document.getElementById('salary_total_salary').value = totalSalary
                                        document.getElementById('salary_payable_amount').value = netPayableSalary
                                    }

                                    document.getElementById('salary_salary').addEventListener('input', calculateDailyPresentSalary);
                                    document.getElementById('salary_present').addEventListener('input', calculateDailyPresentSalary);
                                    document.getElementById('salary_advance').addEventListener('input', calculateDailyPresentSalary);

                                } else {
                                    if ((salaryType === "Monthly Basis" && otType === "None") || (salaryType === "Monthly Basis" && otType === "Compensation leave")) {
                                        function calculateMonthlyPresentSalary() {

                                            document.getElementById("ot-row").style.display = "none";

                                            const presentDays = parseInt(document.getElementById('salary_present').value);
                                            const advanceSalary = parseInt(document.getElementById('salary_advance').value);
                                            const monthlySalary = parseInt(document.getElementById('salary_salary').value);

                                            //working days calculation start here 
                                            const inputType = getCookieValue('working_days');
                                            const input_month = month;
                                            const input_year = year;

                                            const workingDays = inputType === 'Monday to Thursday' ? ['Monday', 'Tuesday', 'Wednesday', 'Thursday'] :
                                                inputType === 'Monday to Friday' ? ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'] :
                                                inputType === 'Monday to Saturday' ? ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'] : [];

                                            const daysInMonth = new Date(input_year, input_month, 0).getDate();
                                            let workingDaysCount = 0;
                                            for (let day = 1; day <= daysInMonth; day++) {
                                                const date = new Date(input_year, input_month - 1, day);
                                                if (workingDays.includes(date.toLocaleString('en-IN', {
                                                        weekday: 'long'
                                                    }))) {
                                                    workingDaysCount++;
                                                }
                                            }


                                            //working days calculation end here 

                                            const totalWorkingDays = workingDaysCount;
                                            const salaryPerDay = monthlySalary / totalWorkingDays;

                                            const totalSalary = salaryPerDay * presentDays;

                                            document.getElementById('salary_total_salary').value = totalSalary;
                                            document.getElementById('salary_payable_amount').value = totalSalary - advanceSalary;

                                        }

                                        document.getElementById('salary_present').addEventListener('input', calculateMonthlyPresentSalary);
                                        document.getElementById('salary_advance').addEventListener('input', calculateMonthlyPresentSalary);
                                        document.getElementById('salary_salary').addEventListener('input', calculateMonthlyPresentSalary);

                                    }
                                }
                            }
                        }
                    }

                }

            });

        });
    // calculate salary end here 

    updateButton = document.getElementById('add_salary_btn');
    updateButton.addEventListener('click', function() {
        event.preventDefault();
        updateButton.disabled = true;
        fetch(url + 'salaryManage/addMonthlySalary.php', {
                method: 'POST',
                body: JSON.stringify({
                    "msg": "AddMonthlySalary",
                    "ad_id": getCookieValue('ad_id'),
                    "id": document.getElementById("add_salary_uid").value,
                    "month": monthName,
                    "year": year,
                    "presents": document.getElementById("salary_present").value,
                    "ots": document.getElementById("salary_ot").value,
                    "totalSalary": document.getElementById("salary_total_salary").value,
                    "netPaid": document.getElementById("salary_payable_amount").value,
                    "performance": document.getElementById("salary_performance").value,
                    "advance": document.getElementById("salary_advance").value,
                    "remark": document.getElementById("salary_remark").value,
                    "mess": "0"
                }),
                headers: {
                    'Authorization': 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IlNhY2hpZGFuYW5kIiwiaWF0IjoxNTE2MjM5MDIyfQ.taGT5pLH4g6Hbsul0PReCu5eO-k7cWF6thjHU29legk',
                    'Content-Type': 'application/json',
                    'Password': 'U2FjaGlkYW5hbmRAZGlnaXRhbF9lbXBsb3llZV9ib29rLnNlbGY=',
                }
            })
            .then(response => response.json())
            .then(data => {
                console.log(data)
                updateButton.disabled = false;
                if (data.status === "Success") {
                    alert(data.message, "success");
                    const form = document.getElementById("myForm");
                    form.reset();

                } else {
                    alert(data.message, 'danger');
                }
            })
    })
</script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>