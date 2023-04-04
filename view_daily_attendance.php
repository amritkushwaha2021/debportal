<?php
include 'header.php';
include 'config.php';
?>

<body>
    <div class=" mt-3 container">
        <div class="position-fixed top-0 end-0 p-3" style="z-index: 11">
            <div id="alert-toast" class="toast align-items-center text-white bg-danger" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body"></div>
                    <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        </div>

        <div class="d-flex">
            <a href="javascript:history.go(-1)" class="mt-1" title="Back"><i class="bi bi-arrow-left"></i></a>
            <h5 class="ms-2 text-primary"> Daily Attendance </h5>
        </div>
        <hr>
        <div class="container">
            <form id="myForm" method="POST">
                <div class="row row-cols-1 col-md-3 g-2">
                    <div class="input-group">
                        <input type="date" id="date-input" class="form-control" max="<?php echo date('Y-m-d') ?>" name="date-input" value="<?php echo isset($_POST['date-input']) ? date('Y-m-d', strtotime($_POST['date-input'])) : date('Y-m-d'); ?>">
                    </div>
                </div>
            </form>

            <div class="mt-3" id="daily_name">

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
                            <form action="" method="POST" id="my-form">
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
                        <form action="" method="POST" id="my-form">
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
        </div>
    </div>
</body>


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



            var defaultDate = document.getElementById('date-input').value;
            var formattedDefaultDate = defaultDate.split('-').reverse().join('/');
            fetchData(formattedDefaultDate);

            var input_date = document.getElementById('date-input');
            input_date.addEventListener('change', function(event) {
                event.preventDefault();
                var selectedDate = document.getElementById('date-input').value;
                var formattedSelectedDate = selectedDate.split('-').reverse().join('/');

                fetchData(formattedSelectedDate);
            });

            function fetchData(date) {
                const dailyNameElem = document.getElementById("daily_name");
                dailyNameElem.innerHTML = "";
                let totalPresents = 0;

                fetch(url + 'attendance/getAttendanceDayByDay.php', {
                        method: 'POST',
                        body: JSON.stringify({
                            "msg": "getAttendanceDayByDay",
                            "ad_id": getCookieValue('ad_id'),
                            "date": date
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


                                    //time calculation end here 
                                    const div = document.createElement("div");
                                    div.classList.add("col");
                                    div.innerHTML = `
                        
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            <div class="fw-bold">${record.name}</div>
                        </div>
                        <div class="col-4 d-flex justify-content-end align-items-center">
                            <a href="#" class="text-primary me-2" name="update" id="update" title="Edit" data-bs-toggle="modal" data-placement="top" data-bs-target="#staticBackdrop" data-siteName="${record.siteName}" data-sl_no="${record.sl_no}" data-uid="${record.uid}" data-date="${record.InTime.split(' ')[0]}" data-in_time="${record.InTime.split(' ')[1]}" data-out_time="${record.OutTime.split(' ')[1]}">
                                <i class=" fas fa-edit"></i>
                            </a>
                            <a href="#" class="text-danger" name="delete" id="delete" data-bs-toggle="modal" data-placement="top" title="Delete" data-bs-target="#deleteModal" data-sl_no="${record.sl_no}" data-uid="${record.uid}" >
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </div>
                        <div class="">Status: <span class="fw-bold">${record.status}</span></div>
                    </div>
                    <hr>
                    <div class="row">
                    
                        <div class="col-6">
                            <p class="card-title mb-0">In Time: <span class="fw-bold">${dailyInTime}</span></p>
                        </div>
                        <div class="col-6">
                            <p class="card-title mb-0">Out Time: <span class="fw-bold">${dailyOutTime}</span></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <p class="card-title mb-0">Present: <span class="fw-bold" id="daily_present" value="">${present}</span></p>
                        </div>
                    <div class="col-6">
                            <p class="card-title mb-0">Ot: <span class="fw-bold" id="daily_ot" value="">${overtime}</span></p>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-6">
                            <p class="card-title mb-0">Site Name: <span class="fw-bold">${record.siteName}</span></p>
                        </div>
                        <div class="col-6">
                        </div>
                    </div>
                </div>
            </div>
            `;
                                    container.appendChild(div);

                                }
                                dailyNameElem.appendChild(container);



                            } else {
                                const alertDiv = document.createElement("div");
                                alertDiv.classList.add("alert", "alert-danger", "text-center", );
                                alertDiv.textContent = "Attendance data not found ";
                                dailyNameElem.appendChild(alertDiv);
                            }
                        } else {
                            dailyNameElem.innerText = "Error: " + data.message;
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

                            const sl_no = document.getElementById("delete_sl_no").value;
                            const uid = document.getElementById("delete_uid").value;

                            fetch(url + 'attendance/deleteAttendance.php', {
                                    method: 'POST',
                                    body: JSON.stringify({
                                        "msg": "deleteAttendance",
                                        "ad_id": getCookieValue('ad_id'),
                                        "id": uid,
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
                                        window.location.href = "view_daily_attendance.php";
                                    } else {
                                        alert(data.message, 'danger');
                                    }
                                })
                                .catch(error => {
                                    console.error("Error updating data:", error);
                                });
                        });

                    });
            }
        }
    })

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

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>