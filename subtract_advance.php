<?php
include 'header.php';
?>

<div class="container">
    <div class="d-flex">
        <a href="javascript:history.go(-1)" class="mt-1" title="Back"><i class="bi bi-arrow-left"></i></a>
        <h5 class="ms-3 text-primary">Subtract Advance</h5>
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

    <div class="mt-5 card">
        <div class="card-body">
            <form action="" method="POST">
                <div class="row row-cols-1 row-cols-md-4 g-4">
                    <div class="col">
                        <label for="advance_amount" class="form-label">Enter Subtract Amount:</label>
                    </div>
                    <div class="col">
                        <input type="number" placeholder="Enter in rupees" class="form-control fw-bold" min="0" name="subtract_advance_amount" id="subtract_advance_amount" required>
                    </div>
                    <div class="col">
                        <input type="hidden" name="subtract_advance_uid" id="subtract_advance_uid" value="">
                        <label for="total_amount" class="form-label">Total Advance :</label>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control fw-bold" placeholder="" value="" name="total_advance_amount" id="total_advance_amount" readonly>
                    </div>
                    <div class="col">
                        <label for="reason" class="form-label">Enter Reason :</label>
                    </div>
                    <div class="col mb-2">
                        <textarea class="form-control" placeholder="Enter reason for advance" name="subtract_advance_amount_reason" id="subtract_advance_reason" required></textarea>
                    </div>
                </div>
                <input type="submit" name="subtract_advance_submit" id="subtract_advance_submit" class="btn btn-success" value="Submit">
            </form>
        </div>
    </div>
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
            const subtractAdvanceAmount = document.getElementById("subtract_advance_amount");
            const totalAdvanceAmount = document.getElementById("total_advance_amount");

            totalAdvanceAmount.readOnly = true;


            subtractAdvanceAmount.addEventListener("change", () => {
                const subtractAmount = Number(subtractAdvanceAmount.value);
                const totalAmount = Number(totalAdvanceAmount.value);


                if (subtractAmount > totalAmount) {

                    alert("You cannot subtract an amount greater than the Advance amount.");
                    subtractAdvanceAmount.value = "";
                }
            });


            // for employee dropdown
            fetch(url + 'employeeManage/getAllUsersDropdown.php', {
                    method: 'POST',
                    body: JSON.stringify({
                        "msg": "getAllUsers",
                        "ad_id": getCookieValue('ad_id')
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
                    const advanceUid = document.getElementById('subtract_advance_uid');

                    if (data.status === "Success") {
                        Swal.close();
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

            const selectOption = document.getElementById('employee_selectOption');
            const advanceUid = document.getElementById('subtract_advance_uid');
            const spinner = document.getElementById('spinner');

            function getDataForSelectedOption(selectedUid) {

                fetch(url + 'advance/getCurrentAdvance.php', {
                        method: 'POST',
                        body: JSON.stringify({
                            "msg": "GetCurrentAdvance",
                            "ad_id": getCookieValue('ad_id'),
                            "id": selectedUid
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

                            document.getElementById("total_advance_amount").value = `₹ ${data.data[0].advance}`;

                        } else {
                            document.getElementById("total_advance_amount").value = "Failed to get data from server.";
                        }
                    })
                    .catch(error => {
                        console.error(error);
                    });
            }

            selectOption.addEventListener('change', event => {
                const selectedOption = event.target.selectedOptions[0];
                const selectedName = selectedOption.textContent;
                const selectedUid = selectedOption.value;

                advanceUid.value = selectedUid;
                const employeeName = selectedName;

                getDataForSelectedOption(selectedUid);
            });


            const subtractButton = document.getElementById('subtract_advance_submit');

            subtractButton.addEventListener('click', function(event) {
                event.preventDefault();
                const reason = document.getElementById('subtract_advance_reason').value;
                const uid = document.getElementById('subtract_advance_uid').value;
                const amount = document.getElementById('subtract_advance_amount').value;
                subtractButton.disabled = true;

                fetch(url + 'advance/subtractedByAdmin.php', {

                        method: 'POST',
                        body: JSON.stringify({
                            "msg": "DeductedByAdmin",
                            "ad_id": getCookieValue('ad_id'),
                            "id": uid,
                            "reason": reason,
                            "amount": amount,
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
                            form.reset();
                            subtractButton.disabled = false;

                        } else {
                            showAlert(data.message, 'danger');
                        }
                    })
                    .catch(function(error) {});
            });
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