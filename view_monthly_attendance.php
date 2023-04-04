<?php
include 'header.php';
include 'config.php';
?>

<div class="container">
    <div class="d-flex">
        <a href="javascript:history.go(-1)" class="mt-1" title="Back"><i class="bi bi-arrow-left"></i></a>
        <h5 class="ms-3 text-primary">Monthly Attendance</h5>
    </div>
    <hr>
    <div class="container-sm mt-3 d-flex justify-content-left align-items-center">
        <form id="myMonthlyForm" method="POST">
            <div class="row">
                <div class="col">
                    <select class="form-select" id="employee_selectOption">
                        <option selected disabled>Select employee</option>
                    </select>
                </div>
                <div class="col">
                    <input type="month" class="form-control" id="monthInput" name="monthInput" max="<?php echo date('Y-m') ?>" value="<?php echo date('Y-m') ?>">
                </div>
            </div>
        </form>
    </div>

    <div class="container mt-3" id="cards-container">
    </div>
    <div class="row">
        <p class="card-title mb-0 text-center text-primary fw-bold ">Total Presents : <span class="fw-bold" id="daily_totalPresents"></span></p>
    </div>

    <!-- Modal update attendance -->

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Update In/Out time</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="in_time">In Time</label>
                            <input type="time" class="form-control" name="in_time" id="model_in_time" value="" required>
                        </div>
                        <div class="form-group">
                            <label for="out_time">Out Time</label>
                            <input type="time" class="form-control" name="out_time" id="model_out_time" value="" required>
                        </div>
                        <input type="hidden" class="form-control" name="sl_no" id="model_sl_no" value="">
                        <input type="hidden" class="form-control" name="date" id="model_date" value="">
                        <input type="hidden" class="form-control" name="uid" id="model_uid" value="">
                        <input type="hidden" class="form-control" name="siteName" id="model_siteName" value="">
                        <div class="modal-footer">
                            <button type="button" name="update-data" id="update-data" class="btn btn-sm btn-primary">Update</button>
                            <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- modal end -->


    <!---delete model start here--->


    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="POST">
                    <div class="modal-body">
                        Are you sure you want to delete the attendance record?
                    </div>
                    <input type="hidden" class="form-control" name="sl_no" id="delete_sl_no" value="">
                    <input type="hidden" class="form-control" name="uid" id="delete_uid" value="">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-danger" name="delete" id="confirmDelete">Delete</button>
                        <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!---delete model end  here--->
</div>

<!-- code end for the form to select employee and month -->
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

            // to check the time stamp start here 
            var inTimeInput = document.getElementById("model_in_time");
            var outTimeInput = document.getElementById("model_out_time");

            outTimeInput.addEventListener("change", function() {
                var inTime = new Date("2000-01-01T" + inTimeInput.value + ":00");
                var outTime = new Date("2000-01-01T" + outTimeInput.value + ":00");
                var timeDiff = (outTime - inTime) / 1000 / 60 / 60; // calculate the time difference in hours

                if (outTime < inTime) {
                    alert('Out Time cannot be before In Time ', 'danger');
                    outTimeInput.value = "";
                } else if (timeDiff < 3) {
                    alert('The difference between In Time and Out Time should be at least 3 hours', 'danger');
                    outTimeInput.value = "";
                }
            });

            // to check the time stamp end here 

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
                    Swal.close();
                    const selectOption = document.getElementById('employee_selectOption');
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
                        selectOption.value = event.target.value;
                    });
                });

            Swal.fire({
                text: 'Please wait...',
                allowOutsideClick: false,
                allowEscapeKey: false,
                allowEnterKey: false,
                showConfirmButton: false,
                onBeforeOpen: () => {
                    Swal.showLoading();

                    // Get the select and input elements
                    const myMonthlyForm = document.getElementById('myMonthlyForm');
                    const employeeSelect = document.getElementById('employee_selectOption');
                    const monthInput = document.getElementById('monthInput');

                    myMonthlyForm.addEventListener('change', () => {
                        const selectedEmployee = employeeSelect.value;
                        const selectedMonth = monthInput.value.split('-').reverse().join('/');

                        const dailyNameElem = document.getElementById("cards-container");
                        dailyNameElem.innerHTML = "";

                        fetch(url + 'attendance/getMonthlyAttendance.php', {
                                method: 'POST',
                                body: JSON.stringify({
                                    "msg": "getAttendance",
                                    "id": selectedEmployee,
                                    "ad_id": getCookieValue('ad_id'),
                                    "monthYear": selectedMonth
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
                                Swal.close();
                                if (data.status === "Success") {
                                    const records = data.data;
                                    if (records.length > 0) {
                                        const container = document.createElement("div");
                                        container.classList.add("row", "row-cols-1", "row-cols-md-3", "g-3");
                                        for (let i = 0; i < records.length; i++) {
                                            const record = records[i];
                                            let totalPresents = 0;
                                            let dailyInTime = `${record.InTime.split(' ')[1]}`;
                                            let dailyOutTime = `${record.OutTime.split(' ')[1]}`;

                                            // time calculation start here
                                            let workingHour = 8;
                                            let workingMin = 0;

                                            let inTime = new Date(`2023-03-28T${dailyInTime}:00`);
                                            let outTime = new Date(`2023-03-28T${dailyOutTime}:00`);


                                            let hours = (outTime.getTime() - inTime.getTime()) / (1000 * 60 * 60);
                                            let hour = Math.floor(hours);
                                            let min = Math.round((hours - hour) * 60);

                                            let present = 0;
                                            let overtime = 0;
                                            let overtimeMin = 0;

                                            if (hour >= workingHour) {
                                                if (workingMin == 0) {
                                                    present = 1;
                                                    overtime = hour - workingHour;
                                                } else {
                                                    if (hour >= workingHour && min >= workingMin) {
                                                        present = 1;
                                                        overtime = hour - workingHour;
                                                        overtimeMin = min - workingMin;
                                                        let totalMin = overtime * 60 + overtimeMin;
                                                        let tempHour = totalMin / 60;
                                                        let reminder = totalMin % 60;
                                                        if (reminder > 50) {
                                                            tempHour += 1;
                                                        }
                                                        overtime = tempHour;
                                                    } else if (hour > workingHour) {
                                                        present = 1;
                                                        overtime = hour - workingHour;
                                                        overtimeMin = min - workingMin;
                                                        let totalMin = overtime * 60 + overtimeMin;
                                                        let tempHour = totalMin / 60;
                                                        let reminder = totalMin % 60;
                                                        if (reminder > 50) {
                                                            tempHour += 1;
                                                        }
                                                        overtime = tempHour;
                                                    } else {
                                                        if (hour == workingHour) {
                                                            overtime = 0;
                                                            present = 1;
                                                        } else {
                                                            overtime = hour;
                                                            overtimeMin = min - workingMin;
                                                            let totalMin = overtime * 60 + overtimeMin;
                                                            let tempHour = totalMin / 60;
                                                            let reminder = totalMin % 60;
                                                            if (reminder > 50) {
                                                                tempHour += 1;
                                                            }
                                                            overtime += tempHour;
                                                            present = 0;
                                                        }
                                                    }
                                                }
                                            } else {
                                                if (hour == workingHour - 1 && min - workingMin >= 10) {
                                                    overtime = 0;
                                                    present = 1;
                                                } else {
                                                    overtime = hour;
                                                    present = 0;
                                                }
                                            }

                                            if (present == 1) {
                                                totalPresents++;
                                            }

                                            document.getElementById('daily_totalPresents').innerHTML = totalPresents;

                                            //time calculation end here 
                                            const div = document.createElement("div");
                                            div.classList.add("col");
                                            div.innerHTML = `
            <div class="card">
            <div class="card-body">
          <div class="row">
            <div class="col-8">
              <div>Date: <span class="fw-bold">${record.InTime.split(' ')[0]}</span></div>
              <div>Day: <span class="fw-bold">${record.day}</span></div>
              <div>Site Name: <span class="fw-bold">${record.siteName}</span></div>
            </div>
            <div class="col-4 d-flex justify-content-end align-items-center">
              <a href="#" class="text-primary me-2" name="update" id="update" title="Edit" data-bs-toggle="modal" data-placement="top" data-bs-target="#staticBackdrop" data-siteName="${record.siteName}" data-sl_no="${record.sl_no}" data-uid="${record.uid}" data-date="${record.InTime.split(' ')[0]}" data-in_time="${record.InTime.split(' ')[1]}" data-out_time="${record.OutTime.split(' ')[1]}">
                <i class="fas fa-edit"></i>
              </a>
              <a href="#" class="text-danger" name="delete" id="delete" data-bs-toggle="modal" data-placement="top" title="Delete" data-bs-target="#deleteModal" data-sl_no="${record.sl_no}" data-uid="${record.uid}">
                <i class="fas fa-trash-alt"></i>
              </a>
            </div>
            <hr>
            <div class="col-6">
              <p class="card-title mb-0">In Time: <span class="fw-bold">${record.InTime.split(' ')[1]}</span></p>
            </div>
            <div class="col-6">
              <p class="card-title mb-0">Out Time: <span class="fw-bold">${record.OutTime.split(' ')[1]}</span></p>
            </div>
            <div class="col-6">
              <p class="card-title mb-0">Present: <span class="fw-bold" id="daily_present">${present}</span></p>
            </div>
            <div class="col-6">
              <p class="card-title mb-0">Ot: <span class="fw-bold" id="daily_ot"></span>${overtime}</p>
            </div>
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
        Monthly Attendance Not Found
        </div>
        `;
                                    }
                                } else {
                                    document.getElementById("cards-container").innerHTML = `
    <div class="text-center alert alert-danger" role="alert">
        ${record.message}
    </div>
    `;
                                }


                                // update the record intime and outtime start here 

                                const editIcons = document.querySelectorAll('[name="update"]');

                                editIcons.forEach(icon => {
                                    icon.addEventListener("click", function() {
                                        const sl_no = this.getAttribute("data-sl_no");
                                        const in_time = this.getAttribute("data-in_time");
                                        const out_time = this.getAttribute("data-out_time");
                                        const uid = this.getAttribute("data-uid");
                                        const date = this.getAttribute("data-date");
                                        const siteName = this.getAttribute("data-siteName");

                                        const modalSlNo = document.getElementById("model_sl_no");
                                        const modalInTime = document.getElementById("model_in_time");
                                        const modalOutTime = document.getElementById("model_out_time");
                                        const modalUid = document.getElementById("model_uid");
                                        const modalDate = document.getElementById("model_date");
                                        const modalSiteName = document.getElementById("model_siteName");

                                        modalSlNo.value = sl_no;
                                        modalUid.value = uid;
                                        modalDate.value = date;
                                        modalInTime.value = in_time;
                                        modalOutTime.value = out_time;
                                        modalSiteName.value = siteName;
                                    });
                                });


                                const updateBtn = document.getElementById("update-data");

                                updateBtn.addEventListener("click", function() {
                                    event.preventDefault();

                                    const sl_no = document.getElementById("model_sl_no").value;
                                    const uid = document.getElementById("model_uid").value;
                                    const in_time = document.getElementById("model_in_time").value;
                                    const out_time = document.getElementById("model_out_time").value;
                                    const date = document.getElementById("model_date").value;
                                    const siteName = document.getElementById("model_siteName").value;

                                    fetch(url + 'attendance/updateAttendanceByAdmin.php', {
                                            method: 'POST',
                                            body: JSON.stringify({
                                                "msg": "UpdateAttendance",
                                                "ad_id": getCookieValue('ad_id'),
                                                "id": uid,
                                                "status": "Admin update",
                                                "inTime": date + " " + in_time,
                                                "outTime": date + " " + out_time,
                                                "siteName": siteName,
                                                "sl_no": sl_no
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
                                                window.location.href = "view_monthly_attendance.php";
                                            } else {
                                                alert(data.message, 'danger');
                                            }
                                        })
                                        .catch(error => {
                                            console.error("Error updating data:", error);
                                        });
                                });


                                // delete the record start here

                                const deleteIcons = document.querySelectorAll('[name="delete"]');

                                deleteIcons.forEach(icon => {
                                    icon.addEventListener("click", function() {
                                        const sl_no = this.getAttribute("data-sl_no");
                                        const uid = this.getAttribute("data-uid");

                                        const modalSlNo = document.getElementById("delete_sl_no");
                                        const modalUid = document.getElementById("delete_uid");

                                        modalSlNo.value = sl_no;
                                        modalUid.value = uid;
                                    });
                                });

                                const deleteBtn = document.getElementById("confirmDelete");

                                deleteBtn.addEventListener("click", function() {
                                    event.preventDefault();


                                    fetch(url + '/attendance/deleteAttendance.php', {
                                            method: 'POST',
                                            body: JSON.stringify({
                                                "msg": "deleteAttendance",
                                                "ad_id": getCookieValue('ad_id'),
                                                "id": document.getElementById("delete_uid").value,
                                                "sl_no": document.getElementById("delete_sl_no").value
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
                                                alert(data.message);
                                                window.location.href = "view_monthly_attendance.php";
                                            } else {
                                                alert(data.message);
                                            }
                                        })
                                        .catch(error => {
                                            console.error("Error updating data:", error);
                                        });
                                });
                            });
                    })
                }
            })
        }
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>

</html>