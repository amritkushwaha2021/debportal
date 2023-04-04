<?php
include 'header.php';
include 'config.php';


if (isset($_POST['assign_leave_submit'])) {
    $ad_id = mysqli_real_escape_string($conn, $_POST['assign_leave_ad_id']);
    $uid = mysqli_real_escape_string($conn, $_POST['assign_leave_uid']);
    $leave_status = "Approved";
    $leave_type = mysqli_real_escape_string($conn, $_POST['assign_leave_type']);
    $leave_day = mysqli_real_escape_string($conn, isset($_POST['assign_leave_day']) ? 'Half Day' : 'Full Day');
    $leave_from_date = mysqli_real_escape_string($conn, $_POST['assign_leave_from']);
    $leave_to_date = mysqli_real_escape_string($conn, $_POST['assign_leave_to']);
    $formatted_leave_from_date = date('d/m/Y', strtotime($leave_from_date));
    $formatted_leave_to_date = date('d/m/Y', strtotime($leave_to_date));
    $reason = mysqli_real_escape_string($conn, $_POST['assign_leave_reason']);
    $remark = mysqli_real_escape_string($conn, $_POST['assign_leave_remark']);

    $sql = "INSERT INTO `ams_leave_uat`(`ad_id`, `uid`, `leave_status`, `leave_type`, `leave_day`, `leave_from_date`, `leave_to_date`, `reason`, `remark`, `req_date`, `approve_date`) 
        VALUES ('$ad_id', '$uid', '$leave_status', '$leave_type', '$leave_day', '$formatted_leave_from_date', '$formatted_leave_to_date', '$reason', '$remark', DATE_FORMAT(NOW(), '%d/%m/%Y:%h:%i %p'), DATE_FORMAT(NOW(), '%d/%m/%Y:%h:%i %p'))";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Record inserted successfully.')</script>";
    } else {
        echo "<script>alert('Error while inserting a data.')</script>" . mysqli_error($conn);
    }
}
?>

<div class="container-lg">
    <div class="d-flex">
        <a href="javascript:history.go(-1)" class="" title="Back"><i class="bi bi-arrow-left"></i></a>
        <h5 class="ms-2 text-primary">Assign Leave</h5>
    </div>
    <hr>
    <div class="card">
        <div class="card-body">
            <form action="" method="POST" onsubmit="return validateForm()">
                <div class="mb-3">
                    <div class="row">
                        <div class="col-3">
                            <input type="hidden" name="assign_leave_ad_id" id="assign_leave_ad_id">
                            <input type="hidden" name="assign_leave_uid" id="assign_leave_uid">
                            <div class="dropdown">
                                <button class="form-control text-primary  form-control-sm dropdown-toggle" type="button" id="employee-dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                    Select Employee
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="employee-dropdown">
                                    <?php
                                    $sql = "SELECT uid, ad_id,advance,name FROM `ams_employee_uat` ORDER BY name";
                                    $result = mysqli_query($conn, $sql);

                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo '<li><a class="dropdown-item" href="#" onclick="setSelectedEmployee(\'' . $row["name"] . '\', \'' . $row["uid"] . '\' , \'' . $row["ad_id"] . '\')">' . $row["name"] . '</a></li>';
                                        }
                                    } else {
                                        echo "No employees found.";
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                        <div class="col-3">
                            <select class="form-control form-control-sm text-primary" name="assign_leave_type" id="leave-type-dropdown">
                                <option selected>Select leave type</option>
                                <option value="Unpaid">Unpaid Leave</option>
                                <option value="Paid">Paid Leave</option>
                                <option value="Company-off">Company Off Leave</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="row">
                        <div class="col-3">
                            <label for="assign_leave_from" class="form-label">From</label>
                            <input type="date" class="form-control text-primary form-control-sm" id="assign_leave_from" name="assign_leave_from" value="<?php echo date('Y-m-d') ?>">
                        </div>
                        <div class="col-3">
                            <label for="assign_leave_to" class="form-label">To</label>
                            <input type="date" class="form-control text-primary form-control-sm" id="assign_leave_to" name="assign_leave_to" value="<?php echo date('Y-m-d') ?>">
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="row">
                        <div class="col-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="assign_leave_day" id="half-day-checkbox" value="Half day">
                                <label class="form-check-label" for="half-day-checkbox">Half day</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="row">
                        <div class="col-3">Number of Days:</div>
                        <div class="col-3">
                            <input type="text" class=" text-primary text-primary form-control form-control-sm" name="assign_leave_no_days" id="assign_leave_no_days" value="" readonly>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="row">
                        <div class="col-3">Reason:</div>
                        <div class="col-5">
                            <textarea type="text" placeholder="Reason" class="text-primary text-primary form-control form-control-sm" name="assign_leave_reason" id="assign_leave_reason" value=""></textarea>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="row">
                        <div class="col-3">Remark:</div>
                        <div class="col-5">
                            <textarea type="text" placeholder="Remark" class="text-primary text-primary form-control form-control-sm" name="assign_leave_remark" id="assign_leave_remark" value=""></textarea>
                        </div>
                    </div>
                </div>
                <div class="mb-1">
                    <div class="row">
                        <div class="col-4"> <button type="submit" name="assign_leave_submit" class="btn btn-sm btn-success form-control form-control-sm" onsubmit="return validateForm()">Submit</button></div>
                        <div class="col-4">
                            <button type="reset" class="btn btn-sm btn-danger form-control form-control-sm">Reset</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>
<script>
    function validateForm() {

        var employeeDropdown = document.getElementById("employee-dropdown");
        var leaveTypeDropdown = document.getElementById("leave-type-dropdown");
        var assignLeaveFrom = document.getElementById("assign_leave_from");
        var assignLeaveTo = document.getElementById("assign_leave_to");
        var leaveDayDropdown = document.getElementById("leave-day-dropdown");
        var assignLeaveNoDays = document.getElementById("assign_leave_no_days");
        var assignLeaveReason = document.getElementById("assign_leave_reason");
        var assignLeaveRemark = document.getElementById("assign_leave_remark");


        var isValid = true;
        var errorMessage = "";


        if (employeeDropdown.value == "Select Employee") {
            isValid = false;
            errorMessage += "Please select an employee.\n";
        }


        if (leaveTypeDropdown.value == "Select leave type") {
            isValid = false;
            errorMessage += "Please select a leave type.\n";
        }


        if (assignLeaveFrom.value == "") {
            isValid = false;
            errorMessage += "Please enter a leave from date.\n";
        }


        if (assignLeaveTo.value == "") {
            isValid = false;
            errorMessage += "Please enter a leave to date.\n";
        }


        if (leaveDayDropdown.value == "Select Leave day") {
            isValid = false;
            errorMessage += "Please select a leave day.\n";
        }


        if (assignLeaveReason.value == "") {
            isValid = false;
            errorMessage += "Please enter a reason for the leave.\n";
        }

        if (!isValid) {
            alert(errorMessage);
        }

        return isValid;
    }


    const fromDateInput = document.getElementById('assign_leave_from');
    const toDateInput = document.getElementById('assign_leave_to');

    [fromDateInput, toDateInput].forEach(input => {
        input.addEventListener('input', () => {
            const fromDate = new Date(fromDateInput.value);
            const toDate = new Date(toDateInput.value);

            if (toDate < fromDate) {
                alert('The "To" date cannot be before the "From" date.');
                toDateInput.value = fromDateInput.value;
            } else {

                const diffInMs = toDate - fromDate;
                const diffInDays = Math.round(1 + diffInMs / (1000 * 60 * 60 * 24));

                const daysInput = document.getElementById('assign_leave_no_days');
                daysInput.value = diffInDays;
            }
        });
    });

    function setSelectedEmployee(name, uid, ad_id) {
        document.getElementById("employee-dropdown").innerHTML = name + ' <span class="caret"></span>';
        document.getElementById("assign_leave_uid").value = uid;
        document.getElementById("assign_leave_ad_id").value = ad_id;
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>