<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Employee Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="admin_home.php" />
    <link rel="shortcut icon" href="notification_icon.jpg" type=".jpg/image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <?php

    include 'header2.php';
    include 'config.php';
    ?>

    <div class="container-lg">
        <h5 class="mt-4 fw-bold text-primary">Menu</h5>
        <hr>
        <div class=" mt-2 row row-cols-1 row-cols-md-5 g-3">
            <div class="col">
                <a href="attendance_management.php" class="card-link text-primary">
                    <div class="card text-center h-100">
                        <div class="card-body ">
                            <i class="bi bi-journal-check display-6 mb-3"></i>
                            <h6 class="card-title mb-0">Attendance Management</h6>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col">
                <a href="advance_management.php" class="card-link text-primary">
                    <div class="card text-center h-100">
                        <div class="card-body">
                            <i class="bi bi-currency-rupee display-6 mb-3"></i>
                            <h6 class="card-title mb-0">Advance Management</h6>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col">
                <a href="Employee_details.php" class="card-link text-primary">
                    <div class="card text-center h-100">
                        <div class="card-body">
                            <i class="bi bi-people display-6 mb-3"></i>
                            <h6 class="card-title mb-0">Employee Management</h6>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col">
                <a href="salary_management.php" class="card-link text-primary">
                    <div class="card text-center h-100">
                        <div class="card-body">
                            <i class="bi bi-cash display-6 mb-3"></i>
                            <h6 class="card-title mb-0">Salary Management</h6>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col">
                <a href="leave_management.php" class="card-link text-primary">
                    <div class="card text-center h-100">
                        <div class="card-body">
                            <i class="bi bi-calendar-event display-6 mb-3"></i>
                            <h6 class="card-title mb-0">Leave Management</h6>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col">
                <a href="" class="card-link text-primary">
                    <div class="card text-center h-100">
                        <div class="card-body">
                            <i class="bi bi-image display-6 mb-3"></i>
                            <h6 class="card-title mb-0">Gallery Management</h6>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col">
                <a href="" class="card-link text-primary">
                    <div class="card text-center h-100">
                        <div class="card-body">
                            <i class="bi bi-check-square display-6 mb-3"></i>
                            <h6 class="card-title mb-0">Task Management</h6>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col">
                <a href="" class="card-link text-primary">
                    <div class="card text-center h-100">
                        <div class="card-body">
                            <i class="bi bi-building display-6 mb-3"></i>
                            <h6 class="card-title mb-0">Site/project Management</h6>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col">
                <a href="" class="card-link text-primary">
                    <div class="card text-center h-100">
                        <div class="card-body">
                            <i class="bi bi-people-fill display-6 mb-3"></i>
                            <h6 class="card-title mb-0">Group Management</h6>
                        </div>
                    </div>
                </a>
            </div>

        </div>

    </div>
</body>
<script>
    var url = '<?php echo $url; ?>';
    fetch(url + 'settings/getSettingsData.php', {
            method: 'POST',
            body: JSON.stringify({
                "msg": "getSettings",
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
            document.cookie = `working_hours=${data.data[0].working_hours}; expires=${new Date(Date.now() + 15 * 24 * 60 * 60 *
1000).toUTCString()}; path=/`;
            document.cookie = `working_days=${data.data[0].working_days}; expires=${new Date(Date.now() + 15 * 24 * 60 * 60 *
1000).toUTCString()}; path=/`;
            document.cookie = `ot_type=${data.data[0].ot_type}; expires=${new Date(Date.now() + 15 * 24 * 60 * 60 *
1000).toUTCString()}; path=/`;

        })
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>

</html>