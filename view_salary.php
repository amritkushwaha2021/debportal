<?php
include 'header.php';
include 'config.php';
?>

<div class="container">
    <div class="position-fixed top-0 end-0 p-3" style="z-index: 11">
        <div id="alert-toast" class="toast align-items-center text-white bg-danger" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body"></div>
                <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>
    <div class="d-flex">
        <a href="javascript:history.go(-1)" class="" title="Back"><i class="bi bi-arrow-left"></i></a>
        <h5 class="ms-2 text-primary">View Monthly Salary</h5>
    </div>
    <hr>

    <form>
        <div class="d-flex">
            <div class="row">
                <input type="hidden" class="form-control" id="view_salary_uid" name="view_salary_uid" value="">
                <div class="col">
                    <input type="month" class="form-control" id="monthInput" name="monthInput" max="<?php echo date('Y-m') ?>" value="<?php echo date('Y-m') ?>">
                </div>
            </div>
        </div>
    </form>
    <div class="mt-3" id="cards-container">
    </div>


    <!-- view_salary_update model  start here -->

    <div class="modal fade" id="view_salary_update_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Update monthly salary</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="month" class="form-label">Month</label>
                                <input type="text" class="form-control form-control-sm" name="month" id="model_month" value="" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="presents" class="form-label">Presents</label>
                                <input type="number" class="form-control form-control-sm" min="0" placeholder="Enter updated presents" name="presents" id="model_presents" value="" required>
                            </div>
                            <div class="col-md-6" id="ot-row">
                                <label for="ots" title="Over Time" class="form-label">Ots</label>
                                <input type="number" class="form-control form-control-sm" min="0" placeholder="Enter updated ots" name="ots" id="model_ots" value="" required>
                            </div>
                            <div class="col-md-6">
                                <label for="totalSalary" class="form-label">Total Salary</label>
                                <input type="text" class="form-control form-control-sm" name="totalSalary" id="model_totalSalary" value="" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="netPaid" class="form-label">Net Paid</label>
                                <input type="text" class="form-control form-control-sm" name="netPaid" id="model_netPaid" value="" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="performance" class="form-label">Performance</label>
                                <select class="form-control form-control-sm" name="performance" id="model_performance" required>
                                    <option value="" selected disabled>Select performance</option>
                                    <option value="Excellent">Excellent</option>
                                    <option value="Good">Good</option>
                                    <option value="Bad">Bad</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="advance" class="form-label">Advance</label>
                                <input type="number" class="form-control form-control-sm" min="0" name="advance" id="model_advance" value="" required>
                            </div>
                            <div class="col-md-6">
                                <label for="remark" class="form-label">Remark</label>
                                <input type="text" class="form-control form-control-sm" name="remark" id="model_remark" value="" required>
                            </div>
                            <input type="hidden" class="form-control" name="salary_type" id="model_salary_type" value="">
                            <input type="hidden" class="form-control" name="salary_basis" id="model_salary" value="">
                            <input type="hidden" class="form-control" name="salary_advance" id="model_salary_advance" value="">
                            <input type="hidden" class="form-control" name="uid" id="model_uid" value="">
                            <div class="col-12">
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-sm btn-success" id="Update-data">Update</button>
                                    <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- view_salary_update model  start here -->



    <!-- view_salary_delete model  start here -->
    <div class="modal fade" id="view_salary_delete_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete Salary Confirmation</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                        <p>Are You sure! Want to Delete the Salary <span class="fw-bold" id="delete_name"></span> ? </p>
                        <input type="hidden" class="form-control form-control-sm" name="month" id="model_delete_month" value="" readonly>
                        <input type="hidden" class="form-control form-control-sm" name="advance" id="model_delete_advance" value="" readonly>
                        <input type="hidden" class="form-control" name="uid" id="model_delete_uid" value="">
                        <div class="col-12">
                            <div class="modal-footer">
                                <button type="button" class="btn btn-sm btn-danger" id="delete-data">Delete</button>
                                <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- view_salary_delete model end here -->
</div>

<script>
    Swal.fire({
        text: 'Please wait...',
        allowOutsideClick: false,
        allowEscapeKey: false,
        allowEnterKey: false,
        showConfirmButton: false,
        onBeforeOpen: () => {
            Swal.showLoading();

            var url = '<?php echo $url; ?>';

            const monthInput = document.getElementById('monthInput');
            let [year, month] = new Date().toISOString().substr(0, 7).split('-');
            monthInput.value = `${year}-${month}`;
            const monthName = new Date(year, month - 1).toLocaleString('default', {
                month: 'long'
            });

            function viewSalary() {
                const selectedMonth = monthInput.value.split('-')[1];
                const selectedYear = monthInput.value.split('-')[0];
                const selectedMonthName = new Date(`${selectedYear}-${selectedMonth}-01`).toLocaleString('default', {
                    month: 'long'
                });

                const dailyNameElem = document.getElementById("cards-container");
                dailyNameElem.innerHTML = "";


                fetch(url + 'salaryManage/getMonthlySalaryList.php', {
                        method: 'POST',
                        body: JSON.stringify({
                            "msg": "GetSalaryList",
                            "ad_id": getCookieValue('ad_id'),
                            "month": selectedMonthName,
                            "year": year
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
                        if (data.status === "Success") {
                            Swal.close();
                            const records = data.data;
                            if (records.length > 0) {
                                const container = document.createElement("div");
                                container.classList.add("row", "row-cols-1", "row-cols-md-3", "g-3");
                                for (let i = 0; i < records.length; i++) {
                                    const record = records[i];
                                    const div = document.createElement("div");
                                    div.classList.add("col");
                                    div.innerHTML = `
            <div class="card">
            <div class="card-body">
          <div class="row">
            <div class="col-8">
              <div>Name : <span class="fw-bold">${record.name}</span></div>
            </div>
            <div class="col-4 d-flex justify-content-end align-items-center">
            <a href="#" class="text-primary me-2" name="update" id="update" title="Edit" data-bs-toggle="modal" data-placement="top" data-bs-target="#view_salary_update_modal" data-uid="${record.uid}" data-month="${record.month}" data-year="${record.year}" data-presents="${record.present}" data-ots="${record.ot}" data-totalSalary="${record.total_salary}" data-netPaid="${record.paid}" data-performance="${record.performance}" data-advance="${record.advance}" data-remark="${record.remark}">
                <i class="fas fa-edit"></i>
              </a>
              <a href="#" class="text-danger" name="delete" id="delete" data-bs-toggle="modal" data-placement="top" title="Delete" data-bs-target="#view_salary_delete_modal" data-month="${record.month}" data-year="${record.year}" data-uid="${record.uid}" data-advance="${record.advance}" data-name="${record.name}">
                <i class="fas fa-trash-alt"></i>
              </a>
            </div>
            <hr>
            <div class="col-6">
              <p class="card-title mb-0">Salary : <span class="fw-bold">${record.total_salary}</span></p>
            </div>
            <div class="col-6">
              <p class="card-title mb-0">Advance : <span class="fw-bold">${record.advance}</span></p>
            </div>
            <div class="col-6">
              <p class="card-title mb-0">Present : <span class="fw-bold" id="daily_present">${record.present}</span></p>
            </div>
            <div class="col-6">
              <p class="card-title mb-0">Ot : <span class="fw-bold" id="daily_ot">${record.ot}</span></p>
            </div>
            
            <p class="card-title mb-0">Paid Amount : <span class="fw-bold" id="daily_ot">${record.paid}</span></p>
            <p class="card-title mb-0">Performance : <span class="fw-bold" id="daily_ot">${record.performance}</span></p>
            <p class="card-title mb-0">Reason : <span class="fw-bold" id="daily_ot">${record.remark}</span></p>
            
          </div>
        </div>
            </div>
            `;

                                    container.appendChild(div);
                                }
                                document.getElementById("cards-container").appendChild(container);

                            } else {
                                document.getElementById("cards-container").innerHTML = `
        <div class="text-center alert alert-danger" role="alert">
        ${data.message}
        </div>
        `;
                            }
                        } else {
                            document.getElementById("cards-container").innerHTML = `
    <div class="text-center alert alert-danger" role="alert">
    ${data.message}
    </div>
    `;
                        }

                        // update monthly salary start here 
                        const editIcons = document.querySelectorAll('[name="update"]');

                        editIcons.forEach(icon => {
                            icon.addEventListener("click", function() {
                                const uid = this.getAttribute("data-uid");
                                const month = this.getAttribute("data-month");
                                const year = this.getAttribute("data-year");
                                const presents = this.getAttribute("data-presents");
                                const ots = this.getAttribute("data-ots");
                                const totalSalary = this.getAttribute("data-totalSalary");
                                const netPaid = this.getAttribute("data-netPaid");
                                const performance = this.getAttribute("data-performance");
                                const advance = this.getAttribute("data-advance");
                                const remark = this.getAttribute("data-remark");

                                fetch(url + 'salaryManage/getUserSalaryAndAdvance.php?=&=&=', {
                                        method: 'POST',
                                        body: JSON.stringify({
                                            "msg": "GetSalaryAndAdvance",
                                            "ad_id": getCookieValue('ad_id'),
                                            "id": uid
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

                                        const records = data.data;
                                        if (records.length > 0) {
                                            for (let i = 0; i < records.length; i++) {
                                                const record = records[i];

                                                const modalSalary = document.getElementById("model_salary");
                                                const modalSalary_advance = document.getElementById("model_salary_advance");
                                                const modalSalary_type = document.getElementById("model_salary_type");

                                                modalSalary.value = record.salary;
                                                modalSalary_advance.value = record.advance;
                                                modalSalary_type.value = record.salary_type;

                                                const salaryType = document.getElementById("model_salary_type").value;
                                                const otType = getCookieValue('ot_type');

                                                if (salaryType === "Monthly Basis" && otType === "Hour Basis") {
                                                    function calculateMonthlySalary() {
                                                        const presentDays = parseInt(document.getElementById('model_presents').value);
                                                        const otHours = parseInt(document.getElementById('model_ots').value);
                                                        const advanceSalary = parseInt(document.getElementById('model_advance').value);

                                                        const monthlySalary = document.getElementById('model_salary').value;

                                                        //working days calculation start here 
                                                        const inputType = getCookieValue('working_days');
                                                        const input_month = selectedMonth;
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


                                                        document.getElementById('model_totalSalary').value =  totalPayableSalary;
                                                        document.getElementById('model_netPaid').value =  netPayableSalary;
                                                    }

                                                    document.getElementById('model_presents').addEventListener('input', calculateMonthlySalary);
                                                    document.getElementById('model_ots').addEventListener('input', calculateMonthlySalary);
                                                    document.getElementById('model_advance').addEventListener('input', calculateMonthlySalary);
                                                    document.getElementById('model_salary').addEventListener('input', calculateMonthlySalary);
                                                } else {
                                                    if (salaryType === "Daily Basis" && otType === "Hour Basis") {
                                                        function calculateHourlySalary() {
                                                            const presentDays = parseInt(document.getElementById('model_presents').value);
                                                            const otHours = parseInt(document.getElementById('model_ots').value);
                                                            const advanceSalary = parseInt(document.getElementById('model_advance').value);

                                                            const dailySalary = parseInt(document.getElementById('model_salary').value);

                                                            const workingDays = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
                                                            const totalWorkingDays = workingDays.length;

                                                            const workingHours = parseInt(getCookieValue('working_hours').split(':')[0], 10);
                                                            const salaryPerHour = dailySalary / workingHours;

                                                            const totalSalary = dailySalary * presentDays;
                                                            const otSalary = otHours * salaryPerHour;

                                                            const totalPayableSalary = totalSalary + otSalary;
                                                            const netPayableSalary = totalPayableSalary - advanceSalary;

                                                           

                                                            document.getElementById('model_totalSalary').value =  totalPayableSalary;
                                                            document.getElementById('model_netPaid').value =  netPayableSalary;
                                                        }

                                                        document.getElementById('model_presents').addEventListener('input', calculateHourlySalary);
                                                        document.getElementById('model_ots').addEventListener('input', calculateHourlySalary);
                                                        document.getElementById('model_advance').addEventListener('input', calculateHourlySalary);
                                                        document.getElementById('model_salary').addEventListener('input', calculateHourlySalary);
                                                    } else {
                                                        if (salaryType === "Monthly Basis" && otType === "Present Basis") {
                                                            function calculateMonthlyPresentSalary() {
                                                                document.getElementById("ot-row").style.display = "none";

                                                                const presentDays = parseInt(document.getElementById('model_presents').value);
                                                                const advanceSalary = parseInt(document.getElementById('model_advance').value);
                                                                const monthlySalary = parseInt(document.getElementById('model_salary').value);

                                                                //working days calculation start here 
                                                                const inputType = getCookieValue('working_days');
                                                                const input_month = selectedMonth;
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

                                                              

                                                                document.getElementById('model_totalSalary').value = totalSalary;
                                                                document.getElementById('model_netPaid').value = totalSalary - advanceSalary;

                                                            }

                                                            document.getElementById('model_presents').addEventListener('input', calculateMonthlyPresentSalary);
                                                            document.getElementById('model_advance').addEventListener('input', calculateMonthlyPresentSalary);
                                                            document.getElementById('model_salary').addEventListener('input', calculateMonthlyPresentSalary);

                                                        } else {
                                                            if (salaryType === "Daily Basis" && otType === "Present Basis") {
                                                                function calculateDailyPresentSalary() {

                                                                    document.getElementById("ot-row").style.display = "none";

                                                                    const dailySalary = parseInt(document.getElementById('model_salary').value);
                                                                    const presentDays = parseInt(document.getElementById('model_presents').value);
                                                                    const advanceSalary = parseInt(document.getElementById('model_advance').value);

                                                                    const inputType = getCookieValue('working_days');
                                                                    const input_month = selectedMonth;
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

                                                                   

                                                                    document.getElementById('model_totalSalary').value = totalSalary;
                                                                    document.getElementById('model_netPaid').value = netPayableSalary;
                                                                }

                                                                document.getElementById('model_salary').addEventListener('input', calculateDailyPresentSalary);
                                                                document.getElementById('model_presents').addEventListener('input', calculateDailyPresentSalary);
                                                                document.getElementById('model_advance').addEventListener('input', calculateDailyPresentSalary);

                                                            } else {

                                                                if ((salaryType === "Daily Basis" && otType === "None") || (salaryType === "Daily Basis" && otType === "Compensation leave")) {
                                                                    function calculateDailyPresentSalary() {

                                                                        document.getElementById("ot-row").style.display = "none";

                                                                        const dailySalary = parseInt(document.getElementById('model_salary').value);
                                                                        const presentDays = parseInt(document.getElementById('model_presents').value);
                                                                        const advanceSalary = parseInt(document.getElementById('model_advance').value);

                                                                        const inputType = getCookieValue('working_days');
                                                                        const input_month = selectedMonth;
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

                                                                        
                                                                        document.getElementById('model_totalSalary').value = totalSalary;
                                                                        document.getElementById('model_netPaid').value =netPayableSalary;
                                                                    }

                                                                    document.getElementById('model_salary').addEventListener('input', calculateDailyPresentSalary);
                                                                    document.getElementById('model_presents').addEventListener('input', calculateDailyPresentSalary);
                                                                    document.getElementById('model_advance').addEventListener('input', calculateDailyPresentSalary);

                                                                } else {
                                                                    if ((salaryType === "Monthly Basis" && otType === "None") || (salaryType === "Monthly Basis" && otType === "Compensation leave")) {
                                                                        function calculateMonthlyPresentSalary() {

                                                                            document.getElementById("ot-row").style.display = "none";

                                                                            const presentDays = parseInt(document.getElementById('model_presents').value);
                                                                            const advanceSalary = parseInt(document.getElementById('model_advance').value);
                                                                            const monthlySalary = parseInt(document.getElementById('model_salary').value);

                                                                            //working days calculation start here 
                                                                            const inputType = getCookieValue('working_days');
                                                                            const input_month = selectedMonth;
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

                                                                           

                                                                            document.getElementById('model_totalSalary').value = totalSalary;
                                                                            document.getElementById('model_netPaid').value = totalSalary - advanceSalary;

                                                                        }

                                                                        document.getElementById('model_presents').addEventListener('input', calculateMonthlyPresentSalary);
                                                                        document.getElementById('model_advance').addEventListener('input', calculateMonthlyPresentSalary);
                                                                        document.getElementById('model_salary').addEventListener('input', calculateMonthlyPresentSalary);

                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }

                                                }

                                                // calculate salary end here  
                                            }

                                        }

                                    })

                                const date = new Date(`${year}-${month}-01`);
                                const formattedDate = date.toLocaleString('default', {
                                    month: 'long',
                                    year: 'numeric'
                                });

                                const modalUid = document.getElementById("model_uid");
                                const modalMonth = document.getElementById("model_month");
                                const modalPresents = document.getElementById("model_presents");
                                const modalOts = document.getElementById("model_ots");
                                const modalTotalSalary = document.getElementById("model_totalSalary");
                                const modalNetPaid = document.getElementById("model_netPaid");
                                const modalPerformance = document.getElementById("model_performance");
                                const modalAdvance = document.getElementById("model_advance");
                                const modalRemark = document.getElementById("model_remark");


                                modalUid.value = uid;
                                modalMonth.value = formattedDate;
                                modalPresents.value = presents;
                                modalOts.value = ots;
                                modalTotalSalary.value = totalSalary;
                                modalNetPaid.value = netPaid;
                                modalPerformance.value = performance;
                                modalAdvance.value = advance;
                                modalRemark.value = remark;

                            });
                        });


                        const updateBtn = document.getElementById("Update-data");

                        updateBtn.addEventListener("click", function() {
                            event.preventDefault();
                            updateBtn.disabled = true;
                            const inputMonth = document.getElementById('model_month');
                            const date = new Date(inputMonth.value + '-01');
                            const updateMonthName = date.toLocaleString('default', {
                                month: 'long'
                            });

                            const updateYear = date.getFullYear();

                            fetch(url + 'salaryManage/updateMonthlySalary.php', {
                                    method: 'POST',
                                    body: JSON.stringify({

                                        "msg": "UpdateMonthlySalary",
                                        "ad_id": getCookieValue('ad_id'),
                                        "id": document.getElementById("model_uid").value,
                                        "month": updateMonthName,
                                        "year": updateYear,
                                        "presents": document.getElementById("model_presents").value,
                                        "ots": document.getElementById("model_ots").value,
                                        "totalSalary": document.getElementById("model_totalSalary").value,
                                        "netPaid": document.getElementById("model_netPaid").value,
                                        "performance": document.getElementById("model_performance").value,
                                        "advance": document.getElementById("model_advance").value,
                                        "remark": document.getElementById("model_remark").value,
                                        "mess": "0",
                                        "newAdvance": "",
                                        "advanceType": ""

                                    }),
                                    headers: {
                                        'Authorization': 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IlNhY2hpZGFuYW5kIiwiaWF0IjoxNTE2MjM5MDIyfQ.taGT5pLH4g6Hbsul0PReCu5eO-k7cWF6thjHU29legk',
                                        'Content-Type': 'application/json',
                                        'Password': 'U2FjaGlkYW5hbmRAZGlnaXRhbF9lbXBsb3llZV9ib29rLnNlbGY=',
                                    }
                                })
                                .then(response => response.json())
                                .then(data => {
                                    updateBtn.disabled = false;
                                    if (data.status === "Success") {
                                        alert(data.message, "success");
                                        window.location.href = "view_salary.php";
                                    } else {
                                        alert(data.message, 'danger');
                                    }
                                })
                                .catch(error => {
                                    console.error("Error updating data:", error);
                                });
                        });


                        // update monthly salary end here

                        // delete model start here
                        const deleteIcons = document.querySelectorAll('[name="delete"]');

                        deleteIcons.forEach(icon => {
                            icon.addEventListener("click", function() {
                                const uid = this.getAttribute("data-uid");
                                const month = this.getAttribute("data-month");
                                const year = this.getAttribute("data-year");
                                const advance = this.getAttribute("data-advance");
                                const name = this.getAttribute("data-name");

                                const date = new Date(`${year}-${month}-01`);
                                const formattedDate = date.toLocaleString('default', {
                                    month: 'long',
                                    year: 'numeric'
                                });


                                const modalUid = document.getElementById("model_delete_uid");
                                const modalMonth = document.getElementById("model_delete_month");
                                const modalAdvance = document.getElementById("model_delete_advance");
                                const modalName = document.getElementById("delete_name");

                                modalUid.value = uid;
                                modalMonth.value = formattedDate;
                                modalAdvance.value = advance;
                                modalName.innerHTML = name;

                            });
                        });

                        const deleteBtn = document.getElementById("delete-data");

                        deleteBtn.addEventListener("click", function() {
                            event.preventDefault();
                            const inputMonth = document.getElementById('model_delete_month');
                            const date = new Date(inputMonth.value + '-01');
                            const deleteMonthName = date.toLocaleString('default', {
                                month: 'long'
                            });

                            const deleteYear = date.getFullYear();

                            fetch(url + 'salaryManage/deleteMonthlySalary.php', {
                                    method: 'POST',
                                    body: JSON.stringify({

                                        "msg": "DeleteMonthlySalaryData",
                                        "ad_id": getCookieValue('ad_id'),
                                        "id": document.getElementById("model_delete_uid").value,
                                        "month": deleteMonthName,
                                        "year": deleteYear,
                                        "advance": document.getElementById("model_delete_advance").value
                                    }),
                                    headers: {
                                        'Authorization': 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IlNhY2hpZGFuYW5kIiwiaWF0IjoxNTE2MjM5MDIyfQ.taGT5pLH4g6Hbsul0PReCu5eO-k7cWF6thjHU29legk',
                                        'Content-Type': 'application/json',
                                        'Password': 'U2FjaGlkYW5hbmRAZGlnaXRhbF9lbXBsb3llZV9ib29rLnNlbGY=',
                                    }
                                })
                                .then(response => response.json())
                                .then(data => {

                                    if (data.status === "Success") {
                                        alert(data.message, "success");
                                    }
                                })
                                .catch(error => {
                                    console.error("Error deleting data:", error);
                                });
                        });

                        // delete model end here 
                    })
            }

            viewSalary();

            monthInput.addEventListener('change', () => {
                viewSalary();
            });
        }
    })
    //show alert message
    function showAlert(message, alertType) {
        var alertToast = document.getElementById('alert-toast');
        var toastBody = alertToast.querySelector('.toast-body');
        alertToast.classList.remove('bg-danger', 'bg-success', 'bg-warning');
        alertToast.classList.add('bg-' + alertType);
        toastBody.innerHTML = message;
        var toast = new bootstrap.Toast(alertToast);
        toast.show();
        setTimeout(function() {
            toast.hide();
        }, 5000);
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
</script>