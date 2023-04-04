<?php
include 'header.php';
include 'config.php';
?>

<div class="container-lg">
    <div class="d-flex">
        <a href="javascript:history.go(-1)" class="" title="Back"><i class="bi bi-arrow-left"></i></a>
        <h5 class="ms-2 text-primary">Leave Management</h5>
    </div>
    <hr>
    <div class=" mt-2 row row-cols-1 row-cols-md-5 g-3">
        <div class="col">
            <a href="leave_dashboard.php" class="card-link text-primary">
                <div class="card text-center h-100">
                    <div class="card-body ">
                        <i class="bi bi-border-all display-6 mb-3"></i>
                        <h6 class="card-title mb-0">Leave Dashboard</h6>
                    </div>
                </div>
            </a>
        </div>
        <div class="col">
            <a href="assign_leave.php" class="card-link text-primary">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <i class="bi bi-calendar-plus display-6 mb-3"></i>
                        <h6 class="card-title mb-0">Assign Leave</h6>
                    </div>
                </div>
            </a>
        </div>
        <div class="col">
            <a href="leave_history.php" class="card-link text-primary">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <i class="far fa-clock display-6 mb-3"></i>
                        <h6 class="card-title mb-0">User Leave History</h6>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>