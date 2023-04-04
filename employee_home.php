<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Employee Book</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="shortcut icon" href="notification_icon.jpg" type=".jpg/image/x-icon">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville&family=Seymour+One&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="admin_home.php" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <?php
    include 'header2.php';
    ?>

    <div class="container-lg">
        <h5 class="mt-4 fw-bold text-primary">Menu</h5>
        <hr>
        <div class=" mt-2 row row-cols-1 row-cols-md-5 g-3">
            <div class="col">
                <a href="attendance_management.php" class="card-link text-primary">
                    <div class="card text-center h-100">
                        <div class="card-body">
                            <img src="images/add_attendance.png" class="card-img-top" alt="...">
                            <!-- <i class="bi bi-journal-check display-6 mb-3"></i> -->
                            <h6 class="card-title mb-0">Attendance Management</h6>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col">
                <a href="advance_management.php" class="card-link text-primary">
                    <div class="card text-center h-100">
                        <div class="card-body">
                            <img src="images/add_advance.png" class="card-img-top" alt="...">
                            <!-- <i class="bi bi-currency-rupee display-6 mb-3"></i> -->
                            <h6 class="card-title mb-0">Advance Management</h6>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col">
                <a href="Employee_details.php" class="card-link text-primary">
                    <div class="card text-center h-100">
                        <div class="card-body">
                            <img src="images/add_emp.png" class="card-img-top" alt="...">
                            <!-- <i class="bi bi-people display-6 mb-3"></i> -->
                            <h6 class="card-title mb-0">Employee Management</h6>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col">
                <a href="salary_management.php" class="card-link text-primary">
                    <div class="card text-center h-100">
                        <div class="card-body">
                            <img src="images/view_salary.jpg" class="card-img-top" alt="...">
                            <!-- <i class="bi bi-cash display-6 mb-3"></i> -->
                            <h6 class="card-title mb-0">Salary Management</h6>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col">
                <a href="leave_management.php" class="card-link text-primary">
                    <div class="card text-center h-100">
                        <div class="card-body">
                            <img src="images/complaint.png" class="card-img-top" alt="...">
                            <!-- <i class="bi bi-calendar-event display-6 mb-3"></i> -->
                            <h6 class="card-title mb-0">Leave Management</h6>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col">
                <a href="" class="card-link text-primary">
                    <div class="card text-center h-100">
                        <div class="card-body">
                            <img src="images/gallery.png" class="card-img-top" alt="...">
                            <!--<i class="bi bi-image display-6 mb-3"></i>-->
                            <h6 class="card-title mb-0">Gallery Management</h6>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col">
                <a href="" class="card-link text-primary">
                    <div class="card text-center h-100">
                        <div class="card-body">
                            <img src="images/assign_task.png" class="card-img-top" alt="...">
                            <!--<i class="bi bi-check-square display-6 mb-3"></i>-->
                            <h6 class="card-title mb-0">Task Management</h6>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col">
                <a href="" class="card-link text-primary">
                    <div class="card text-center h-100">
                        <div class="card-body">
                            <img src="images/document.png" class="card-img-top" alt="...">
                            <!--<i class="bi bi-building display-6 mb-3"></i>-->
                            <h6 class="card-title mb-0">Site/project Management</h6>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col">
                <a href="" class="card-link text-primary">
                    <div class="card text-center h-100">
                        <div class="card-body">
                            <img src="images/work_history.jpg" class="card-img-top" alt="...">
                            <!--<i class="bi bi-people-fill display-6 mb-3"></i>-->
                            <h6 class="card-title mb-0">Group Management</h6>
                        </div>
                    </div>
                </a>
            </div>

        </div>

    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>

</html>