<?php
include 'header.php';
?>
<div class="container-lg">
    <div class="d-flex">
        <a href="javascript:history.go(-1)" class="mt-1" title="Back"><i class="bi bi-arrow-left"></i></a>
        <h5 class="ms-2 text-primary">Employee Details</h5>
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

    <button type="button" class="btn btn-primary fixed-button" title="Add Employee" id="add-employee-btn" data-bs-toggle="modal" data-bs-target="#add-employee-modal">
        <i class="fas fa-plus"></i>
    </button>
    <div class="mt-2 row row-cols-1 row-cols-md-3 g-2" id="card-container">

    </div>
</div>
<!-- Add employee modal start here  -->

<div class="modal fade" id="add-employee-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Add Employee</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-primary" style="font-size: 14px;">
                <div id="message"></div>
                <form method="POST" id="employee-form">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="Nic-employee-id" name="nic-employee-id" placeholder="NIC/ Employee Id" required>
                                <label for="nic-employee-id"><i class="fas fa-id-card"></i> NIC/ Employee ID</label>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="date" class="form-control" name="joining-date" id="Joining-date" max="<?php echo date('Y-m-d') ?>" value="<?php echo date('Y-m-d'); ?>" placeholder="Joining date" required>
                                <label for="joining-date"><i class="fas fa-calendar"></i> Joining date</label>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="Name" id="Name" placeholder="Name" required>
                                <label for="name"><i class="fas fa-user"></i> Name</label>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="designation" id="Designation" placeholder="Designation" required>
                                <label for="designation"><i class="fas fa-user-tie"></i> Designation</label>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <select class="form-select" name="user-type" id="User-type" aria-label="select user-type" required>
                                    <option>Employee</option>
                                    <option>Team Leader</option>
                                </select>
                                <label for="user-type"><i class="fas fa-user-tag"></i> User-Type</label>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="tel" class="form-control" name="mobile-no" id="Mobile-no" placeholder="Mobile no" required>
                                <label for="mobile-no"><i class="fas fa-phone"></i> Mobile no</label>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="email" class="form-control" name="company-mail" id="Company-mail" placeholder="Company Mail" required>
                                <label for="company-mail"><i class="fas fa-envelope"></i> Company Mail</label>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <select class="form-select" name="salary-type" id="Salary-type" aria-label="select salary-type" required>
                                    <option>Daily Basis</option>
                                    <option>Monthly Basis</option>
                                </select>
                                <label for="user-type"><i class="fas fa-user-tag"></i> Salary Type</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="number" class="form-control" name="salary" min="1" id="salary" placeholder="salary" value="" required>
                                <label for="salary"><i class="fas fa-user-tag"></i> Salary</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="add_employee" name="add_employee" class="btn btn-primary">Save</button>
                        <button type="reset" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</div>
<!-- Add employee modal end here  -->



<!-- update  Modal start  here -->

<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Update Employee Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="success-alert" class="alert alert-success d-none" role="alert">
                    <span id="success-alert-message"></span>
                </div>

                <div id="error-alert" class="alert alert-danger d-none" role="alert">
                    <span id="error-alert-message"></span>
                </div>

                <form action="" method="POST">
                    <input type="hidden" class="form-control" name="update_uid" id="update_uid" value="">
                    <input type="hidden" class="form-control" name="update_sl_no" id="update_sl_no" value="">
                    <div class="row">
                        <div class="col-6">Name:</div>
                        <div class="col-6"><input type="text" class="form-control mb-2" name="update_name" id="update_name" value="" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">Emp ID:</div>
                        <div class="col-6"><input type="text" class="form-control mb-2" name="update_emp_id" id="update_emp_id" value="" required></div>
                    </div>
                    <div class="row">
                        <div class="col-6">Joining Date:</div>
                        <div class="col-6">
                            <input type="date" class="form-control mb-2" name="new_update_joining_date" max="<?php echo date('Y-m-d') ?>" id="new_update_joining_date" value="" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">Designation:</div>
                        <div class="col-6"><input type="text" class="form-control mb-2" name="update_designation" id="update_designation" value="" required></div>
                    </div>
                    <div class="row">
                        <div class="col-6">Mobile:</div>
                        <div class="col-6"><input type="number" class="form-control mb-2" name="update_mobile" id="update_mobile" value="" required></div>
                    </div>
                    <div class="row">
                        <div class="col-6">Email:</div>
                        <div class="col-6"><input type="email" class="form-control mb-2" name="update_email" id="update_email" value="" required></div>
                    </div>
                    <div class="row">
                        <div class="col-6">User Type:</div>
                        <div class="col-6">
                            <select class="form-control mb-2" name="update_user_type" id="update_user_type" required>
                                <option value="Employee">Employee</option>
                                <option value="Team Leader">Team Leader</option>
                                <option value="Admin" hidden>Admin</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">Salary Type:</div>
                        <div class="col-6">
                            <select class="form-control mb-2" name="update_salary_type" id="update_salary_type" required>
                                <option value="Daily Basis">Daily Basis</option>
                                <option value="Monthly Basis">Monthly Basis</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">Salary :</div>
                        <div class="col-6">
                            <input type="number" placeholder="Enter salary in rupees" min="1" class="form-control mb-2" name="update_salary" id="update_salary" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">Status:</div>
                        <div class="col-6">
                            <select class="form-control mb-2" name="update_status" id="update_status" required>
                                <option value="Active">Active</option>
                                <option value="In Active">In Active</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" id="update-employee-data" name="update-employee-data" class="btn btn-sm btn-primary employee_update" onclick="validateForm()">
                        <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- update  Modal end  here -->


<!-- view  Modal start  here -->

<div class="modal fade" id="view_staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="view_staticBackdropLabel">View Employee Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="success-alert" class="alert alert-success d-none" role="alert">
                    <span id="success-alert-message"></span>
                </div>

                <div id="error-alert" class="alert alert-danger d-none" role="alert">
                    <span id="error-alert-message"></span>
                </div>

                <form action="" method="POST">
                    <input type="hidden" class="form-control" name="view_sl_no" id="view_sl_no" value="">
                    <div class="row">
                        <div class="col-6">Name:</div>
                        <div class="col-6" id="update_name"><input type="text" class="form-control mb-2" name="view_name" id="view_name" value="" readonly></div>
                    </div>
                    <div class="row">
                        <div class="col-6">Emp ID:</div>
                        <div class="col-6"><input type="text" class="form-control mb-2" name="view_emp_id" id="view_emp_id" value="" readonly></div>
                    </div>
                    <div class="row">
                        <div class="col-6">Joining Date:</div>
                        <div class="col-6">
                            <input type="text" class="form-control mb-2" name="view_joining_date" id="view_joining_date" max="<?php echo date('Y-m-d') ?>" value="" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">Designation:</div>
                        <div class="col-6"><input type="text" class="form-control mb-2" name="view_designation" id="view_designation" value="" readonly></div>
                    </div>
                    <div class="row">
                        <div class="col-6">Mobile:</div>
                        <div class="col-6"><input type="text" class="form-control mb-2" name="view_mobile" id="view_mobile" value="" readonly></div>
                    </div>
                    <div class="row">
                        <div class="col-6">Email:</div>
                        <div class="col-6"><input type="text" class="form-control mb-2" name="view_email" id="view_email" value="" readonly></div>
                    </div>
                    <div class="row">
                        <div class="col-6">User Type:</div>
                        <div class="col-6"><input type="text" class="form-control mb-2" name="view_user_type" id="view_user_type" value="" readonly></div>
                    </div>
                    <div class="row">
                        <div class="col-6">Salary Type:</div>
                        <div class="col-6"><input type="text" class="form-control mb-2" name="view_salary_type" id="view_salary_type" value="" readonly></div>
                    </div>
                    <div class="row">
                        <div class="col-6">Salary :</div>
                        <div class="col-6">
                            <input type="number" placeholder="Enter salary in rupees" class="form-control mb-2" name="view_salary" id="view_salary" value="" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">Status:</div>
                        <div class="col-6"><input type="text" class="form-control mb-2" name="view_status" id="view_status" value="" readonly></div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


</script>

<!-- view   Modal end  here -->



<!-- delete  Modal start here -->


<div class="modal fade" id="deleteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Delete Employee Conformation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    <input type="hidden" class="form-control" name="delete_uid" id="delete_uid" value="">
                    <input type="hidden" class="form-control" name="delete_user_type" id="delete_user_type" value="">
                    <p id="delete-message">Are you Sure want to delete the record of <span class="fw-bold" id="delete_name"></span> employee ? </p>
                    <div class="modal-footer">
                        <button type="button" id="delete-employee-data" name="update-employee-data" class="btn btn-sm btn-danger">Delete</button>
                        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- delete  Modal end  here -->


<script>
    // show all employee in dropdown

    Swal.fire({
        text: 'Please wait...',
        allowOutsideClick: false,
        allowEscapeKey: false,
        allowEnterKey: false,
        showConfirmButton: false,
        onBeforeOpen: () => {
            Swal.showLoading();

            var url = '<?php echo $url; ?>';


            fetch(url+ 'employeeManage/getAllUsers.php', {

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
                    Swal.close();
                    if (data.status === "Success") {
                        const cardContainer = document.getElementById('card-container');
                        cardContainer.innerHTML = '';

                        for (let i = 0; i < data.data.length; i++) {
                            const record = data.data[i];

                            const sl_no = record.sl_no;
                            const uid = record.uid;
                            const name = record.name;
                            const joining_date = record.joining_date;
                            const email = record.email;
                            const mobile = record.mobile;
                            const designation = record.designation;
                            const user_type = record.user_type;
                            const salary_type = record.salary_type;
                            const salary = record.salary;
                            const status = record.status;
                            const empID = record.emp_id;
                            const advance = record.advance;

                            const card = document.createElement('div');
                            card.classList.add('col');
                            card.innerHTML = `
            <div class="card shadow p-1 bg-body rounded">
                <div class="card-body">
                    <div class="row">
                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h6 class="card-title mb-0 fw-bold">${name}</h6>
                                    <div>
                                        <a href="#" class="text-primary me-2" name="view" id="view" title="View Details" data-bs-toggle="modal" data-placement="top" data-bs-target="#view_staticBackdrop" data-sl_no="${sl_no}" data-emp_id="${empID}" data-name="${name}" data-joining_date="${joining_date}" data-mobile="${mobile}" data-email="${email}" data-designation="${designation}" data-user_type="${user_type}" data-salary_type="${salary_type}" data-salary="${salary}" data-status="${status}">
                                            <i class=" fas fa-eye"></i>
                                        </a>

                                        <a href="#" class="text-primary me-2" name="update" id="update" title="Edit" data-bs-toggle="modal" data-placement="top" data-bs-target="#staticBackdrop" data-uid="${uid}" data-sl_no="${sl_no}" data-emp_id="${empID}" data-name="${name}" data-joining_date="${joining_date}" data-mobile="${mobile}" data-email="${email}" data-designation="${designation}" data-user_type="${user_type}" data-salary_type="${salary_type}" data-salary="${salary}" data-status="${status}">
                                            <i class=" fas fa-edit"></i>
                                        </a>
                                        <a href="#" class="text-danger" name="icon_delete" title="Delete" data-bs-toggle="modal" data-placement="top" data-bs-target="#deleteModal" data-uid="${uid}" data-user_type="${user_type}"  data-name ="${name}">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-6">
                                    <p class="card-text">Status: <span class="fw-bold">${status}</span></p>
                                </div>
                                <div class="col-6">
                                    <p class="card-text">Advance: <span class="fw-bold">${advance}</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            `;
                            cardContainer.appendChild(card);
                        }
                    } else {
                        console.log("Error:", data.message);
                    }


                    // employee view details start here 

                    const eyeIcons = document.querySelectorAll('[name="view"]');

                    eyeIcons.forEach(icon => {
                        icon.addEventListener("click", function() {

                            const sl_no = this.getAttribute("data-sl_no");
                            const name = this.getAttribute("data-name");
                            const empID = this.getAttribute("data-emp_id");
                            const joining_date = this.getAttribute("data-joining_date");
                            const designation = this.getAttribute("data-designation");
                            const mobile = this.getAttribute("data-mobile");
                            const email = this.getAttribute("data-email");
                            const salary_type = this.getAttribute("data-salary_type");
                            const salary = this.getAttribute("data-salary");
                            const user_type = this.getAttribute("data-user_type");
                            const status = this.getAttribute("data-status");

                            const modalName = document.getElementById("view_name");
                            const modalEmpID = document.getElementById("view_emp_id");
                            const modalJoining_date = document.getElementById("view_joining_date");
                            const modalDesignation = document.getElementById("view_designation");
                            const modalMobile = document.getElementById("view_mobile");
                            const modalEmail = document.getElementById("view_email");
                            const modalSalary = document.getElementById("view_salary");
                            const modalSalary_type = document.getElementById("view_salary_type");
                            const modalUser_type = document.getElementById("view_user_type");
                            const modalStatus = document.getElementById("view_status");

                            modalName.value = name;
                            modalEmpID.value = empID;
                            modalJoining_date.value = joining_date;
                            modalDesignation.value = designation;
                            modalMobile.value = mobile;
                            modalEmail.value = email;
                            modalSalary_type.value = salary_type;
                            modalSalary.value = salary;
                            modalUser_type.value = user_type;
                            modalStatus.value = status;


                        });
                    });


                    //update employee start here 
                    const editIcons = document.querySelectorAll('[name="update"]');

                    editIcons.forEach(icon => {
                        icon.addEventListener("click", function() {

                            const update_sl_no = this.getAttribute("data-sl_no");
                            const update_uid = this.getAttribute("data-uid");
                            const name = this.getAttribute("data-name");
                            const empID = this.getAttribute("data-emp_id");
                            const joining_date = this.getAttribute("data-joining_date");
                            const designation = this.getAttribute("data-designation");
                            const mobile = this.getAttribute("data-mobile");
                            const email = this.getAttribute("data-email");
                            const salary_type = this.getAttribute("data-salary_type");
                            const salary = this.getAttribute("data-salary");
                            const user_type = this.getAttribute("data-user_type");
                            const status = this.getAttribute("data-status");

                            const modalSl_no = document.getElementById("update_sl_no");
                            const modalUid = document.getElementById("update_uid");
                            const modalName = document.getElementById("update_name");
                            const modalEmpID = document.getElementById("update_emp_id");
                            const modalJoining_date = document.getElementById("new_update_joining_date");
                            const modalDesignation = document.getElementById("update_designation");
                            const modalMobile = document.getElementById("update_mobile");
                            const modalEmail = document.getElementById("update_email");
                            const modalSalary_type = document.getElementById("update_salary_type");
                            const modalSalary = document.getElementById("update_salary");
                            const modalUser_type = document.getElementById("update_user_type");
                            const modalStatus = document.getElementById("update_status");

                            modalSl_no.value = update_sl_no;
                            modalUid.value = update_uid;
                            modalName.value = name;
                            modalEmpID.value = empID;
                            modalJoining_date.value = joining_date.split("/").reverse().join("-");
                            modalDesignation.value = designation;
                            modalMobile.value = mobile;
                            modalEmail.value = email;
                            modalSalary_type.value = salary_type;
                            modalSalary.value = salary;
                            modalUser_type.value = user_type;
                            modalStatus.value = status;


                            var userType = document.getElementById("update_user_type");
                            var userStatus = document.getElementById("update_status");

                            if (userType.value === "Admin" && userStatus.value === "Active") {
                                userType.disabled = true;
                                userStatus.disabled = true;
                            } else {
                                userType.disabled = false;
                                userStatus.disabled = false;
                            }

                        });
                    });

                    const updateButton = document.getElementById("update-employee-data");
                    updateButton.addEventListener("click", function(event) {
                        event.preventDefault();
                        updateButton.disabled = true;
                        fetch(url + 'employeeManage/updateEmployeeData.php', {

                                method: 'POST',
                                body: JSON.stringify({
                                    "msg": "UpdateEmployeeData",
                                    "ad_id": getCookieValue('ad_id'),
                                    "id": document.getElementById("update_uid").value,
                                    "name": document.getElementById("update_name").value,
                                    "mobile": document.getElementById("update_mobile").value,
                                    "salary": document.getElementById("update_salary").value,
                                    "salary_type": document.getElementById("update_salary_type").value,
                                    "email": document.getElementById("update_email").value,
                                    "user_type": document.getElementById("update_user_type").value,
                                    "emp_id": document.getElementById("update_emp_id").value,
                                    "joining_date": new Date(document.getElementById("new_update_joining_date").value).toLocaleDateString('en-GB'),
                                    "designation": document.getElementById("update_designation").value,
                                    "sl_no": document.getElementById("update_sl_no").value,
                                    "status": document.getElementById("update_status").value
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
                                    updateButton.disabled = false;
                                    alert("Employee Data Updated successfully");
                                    window.location.href = 'Employee_details.php';
                                } else {
                                    alert('Employee data not updated Please try again.');
                                }
                            }).catch(function(error) {
                                console.error('Error:', error);
                            });
                    })
                    // form validations start here
                    function validateForm() {
                        var name = document.getElementById("update_name").value;
                        var emp_id = document.getElementById("update_emp_id").value;
                        var joining_date = document.getElementById("new_update_joining_date").value;
                        var designation = document.getElementById("update_designation").value;
                        var mobile = document.getElementById("update_mobile").value;
                        var email = document.getElementById("update_email").value;
                        var user_type = document.getElementById("update_user_type").value;
                        var salary_type = document.getElementById("update_salary_type").value;
                        var salary = document.getElementById("update_salary").value;
                        var status = document.getElementById("update_status").value;

                        if (name == "" || emp_id == "" || joining_date == "" || designation == "" || mobile == "" || email == "" || user_type == "" || salary_type == "" || salary == "" || status == "") {
                            alert("Please fill all fields");
                            return false;
                        }
                    }

                    // delete button start here 
                    const deleteIcons = document.querySelectorAll('[name="icon_delete"]');

                    deleteIcons.forEach(icon => {
                        icon.addEventListener("click", function() {
                            const delete_uid = this.getAttribute("data-uid");
                            const delete_user_type = this.getAttribute("data-user_type");
                            const delete_name = this.getAttribute("data-name");

                            const modalDelete_uid = document.getElementById("delete_uid");
                            const modalDelete_user_type = document.getElementById("delete_user_type");
                            const modalDelete_name = document.getElementById("delete_name");

                            modalDelete_uid.value = delete_uid;
                            modalDelete_user_type.value = delete_user_type;
                            modalDelete_name.innerHTML = delete_name;


                            const userType = document.getElementById("delete_user_type").value;
                            if (userType === "Admin") {
                                const deleteBtn = document.getElementById("delete-employee-data");
                                deleteBtn.style.display = "none";

                                const deleteMessage = document.getElementById("delete-message");
                                deleteMessage.innerHTML = "You cannot delete the user because they are an admin";

                            }
                        });
                    });

                    const delButton = document.getElementById("delete-employee-data");
                    delButton.addEventListener("click", function(event) {
                        event.preventDefault();
                        delButton.disabled =true;
                        fetch(url + 'employeeManage/deleteEmployee.php', {

                                method: 'POST',
                                body: JSON.stringify({

                                    "msg": "DeleteEmployee",
                                    "ad_id": getCookieValue('ad_id'),
                                    "id": document.getElementById("delete_uid").value

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
                                console.log(data)
                                if (data.status === "Success") {
                                    delButton.disabled =false;
                                    alert("Employee Deleted successfully");
                                    window.location.href = 'Employee_details.php';
                                } else {
                                    alert('Unable to delete employee Please try again.');
                                }
                            }).catch(function(error) {
                                console.error('Error:', error);
                            });


                    });

                }).catch(function(error) {
                    console.error('Error:', error);
                });


            // add employee start here 
            const add_employee = document.getElementById("add_employee");
            add_employee.addEventListener("click", function(event) {
                event.preventDefault();
                add_employee.disabled = true;
                fetch(url + 'employeeManage/registerEmployee.php', {

                        method: 'POST',
                        body: JSON.stringify({

                            "msg": "RegisterEmployee",
                            "dp": "null",
                            "ad_id": getCookieValue('ad_id'),
                            "name": document.getElementById("Name").value,
                            "mobile": document.getElementById("Mobile-no").value,
                            "salary": document.getElementById("salary").value,
                            "salary_type": document.getElementById("Salary-type").value,
                            "email": document.getElementById("Company-mail").value,
                            "user_type": document.getElementById("User-type").value,
                            "emp_id": document.getElementById("Nic-employee-id").value,
                            "joining_date": new Date(document.getElementById("Joining-date").value).toLocaleDateString('en-GB'),
                            "designation": document.getElementById("Designation").value
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
                        add_employee.disabled = false;
                        if (data.status === "Success") {
                            alert(data.message);
                            window.location.href = 'Employee_details.php';
                        } else {
                            alert(data.message);
                        }
                    }).catch(function(error) {
                        console.error('Error:', error);
                    });
            })
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

</html>