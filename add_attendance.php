<?php
include 'header.php';
include 'config.php';
?>
<div class="container-lg">
    <div class="d-flex">
        <a href="javascript:history.go(-1)" class="mt-1" title="Back"><i class="bi bi-arrow-left"></i></a>
        <h5 class="ms-2 text-primary">Add Attendance</h5>
    </div>
    <hr>

    <div class="position-fixed top-0 end-0 p-3" style="z-index: 11">
        <div id="alert-toast" class="toast align-items-center text-white bg-danger" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body"></div>
                <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>

    <div class="container-sm mt-3 d-flex justify-content-left align-items-center">
        <form id="myMonthlyForm" method="POST">
            <div class="row">
                <select class="form-select" id="employee_selectOption">
                    <option value="" selected>Select employee</option>
                </select>
            </div>
        </form>
    </div>

    <div class="mt-5 container">
        <div class="row row-cols-1 row-cols-md-2 g-4">
            <div class="col">
                <form action="" method="POST">
                    <input type="hidden" class="form-control" name="uid" id="uid" value="">
                    <div class="row">
                        <div class="col-4">Date :</div>
                        <div class="col-6"><input type="date" class="form-control mb-2" max="<?php echo date('Y-m-d') ?>" name="date" id="date" value="<?php echo date('Y-m-d') ?>"></div>
                    </div>
                    <div class="row">
                        <div class="col-4">In Time :</div>
                        <div class="col-6"><input type="time" class="form-control mb-2" name="InTime" id="InTime" value="<?php
                                                                                                                            date_default_timezone_set('Asia/Kolkata');
                                                                                                                            echo date('H:i');
                                                                                                                            ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">Out Time :</div>
                        <div class="col-6">
                            <input type="time" class="form-control mb-2" name="OutTime" id="OutTime" value="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">Project Name :</div>
                        <div class="col-6">
                            <input type="text" class="form-control mb-2" name="Project" id="project" value="" placeholder="Project/Site name">
                        </div>
                    </div>
                    <div class="row">
                        <div class="mt-2">
                            <input type="submit" class="btn btn-sm btn-success form-control w-25" name="add_attendance" id="add_attendance">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>

    // to check the time stamp start here 
    var inTimeInput = document.getElementById("InTime");
    var outTimeInput = document.getElementById("OutTime");

    outTimeInput.addEventListener("change", function() {
        var inTime = new Date("2000-01-01T" + inTimeInput.value + ":00");
        var outTime = new Date("2000-01-01T" + outTimeInput.value + ":00");
        var timeDiff = (outTime - inTime) / 1000 / 60 / 60; // calculate the time difference in hours

        if (outTime < inTime) {
            showAlert('Out Time cannot be before In Time ','danger');
            outTimeInput.value = "";
        } else if (timeDiff < 3) {
            showAlert('The difference between In Time and Out Time should be at least 3 hours', 'danger');
            outTimeInput.value = "";
        }
    });

    // to check the time stamp end here 


    // for employee dropdown
    var url = '<?php echo $url; ?>';
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
            const advanceUid = document.getElementById('uid');

            if (data.status === "Success") {
                const employees = data.data;
                employees.forEach(function(employee) {
                    const option = document.createElement('option');
                    option.text = employee.name;
                    option.value = employee.uid;
                    selectOption.add(option);
                });
            }

            selectOption.addEventListener('change', event => {
                const selectedOption = event.target.selectedOptions[0];
                const selectedName = selectedOption.textContent;
                const selectedUid = selectedOption.value;

                const selectedAdId =
                    advanceUid.value = selectedUid;
                const employeeName = selectedName;
            });
        });


    // submit the attendance
    const dateIn = document.getElementById('date').value;
    const inTime = document.getElementById('InTime').value;
    const formattedDate = dateIn.split("-").reverse().join("/");
    const dateInTime = formattedDate + " " + inTime;

    const dateOut = document.getElementById('date').value;
    const outTime = document.getElementById('OutTime').value;
    const formattedDateOut = dateOut.split("-").reverse().join("/");
    const dateOutTime = formattedDateOut + " " + outTime;

    const submitButton = document.getElementById('add_attendance');
    submitButton.addEventListener('click', function(event) {
        event.preventDefault();

        fetch('https://ams.myshubham.in/api/deb/uat/attendance/addAttendanceAdmin.php', {

                method: 'POST',
                body: JSON.stringify({
                    "msg": "AddAttendance",
                    "id": document.getElementById('uid').value,
                    "ad_id": getCookieValue('ad_id'),
                    "status": "Added By Admin",
                    "inTime": dateInTime,
                    "outTime": dateOutTime,
                    "siteName": document.getElementById('project').value

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
                    showAlert(data.message, "success");

                } else {
                    showAlert(data.message, 'danger');
                }
            })
            .catch(function(error) {
                console.error('Error', error)
            });
    });

    // to show the message
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