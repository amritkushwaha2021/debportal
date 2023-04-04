<?php

include 'header.php';
?>
<div class="mt-3 container">
    <div class="d-flex">
        <a href="javascript:history.go(-1)" class="mt-1" title="Back"><i class="bi bi-arrow-left"></i></a>
        <h5 class="ms-3 text-primary">Attendance Management</h5>
    </div>
    <hr>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-2 text-primary">
        <div class="col">
            <div class="card text-center">
                <a href="view_daily_attendance.php">
                    <div class="card-body">
                        <i class="bi bi-calendar-check display-6 mb-3"></i>
                        <h6 class="card-title mb-0">View Daily Attendance</h6>
                    </div>
                </a>
            </div>
        </div>
        <div class="col">
            <div class="card text-center">
                <a href="view_monthly_attendance.php">
                    <div class="card-body">
                        <i class="bi bi-calendar2-range display-6 mb-3"></i>
                        <h6 class="card-title mb-0">Monthly Attendance</h6>
                    </div>
                </a>
            </div>
        </div>
        <div class="col">
            <div class="card text-center">
                <a href="add_attendance.php">
                    <div class="card-body">
                        <i class="bi bi-calendar-plus display-6 mb-3"></i>
                        <h6 class="card-title mb-0">Add Attendance</h6>
                    </div>
                </a>
            </div>
        </div>
        <div class="col">
            <div class="card text-center">
                <a href="add_daily_attendance.php">
                    <div class="card-body">
                        <i class="bi bi-calendar2-check display-6 mb-3"></i>
                        <h6 class="card-title mb-0">Add Daily Attendance</h6>
                    </div>
                </a>
            </div>
        </div>
    </div>

</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>