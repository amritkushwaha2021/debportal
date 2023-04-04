<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Digital Employee Book</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
  <link rel="stylesheet" href="admin_home.css" />
  <link rel="shortcut icon" href="notification_icon.jpg" type=".jpg/image/x-icon">
  <link rel="stylesheet" href="style.css" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.5/dist/sweetalert2.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

</head>

<body>
<style>
    .swal2-modal {
        width: 200px !important;
    }
</style>
  <?php
  include 'header2.php';
  ?>
  <div class="sidebar" id="sidebar">
    <div class="">
      <a class="" href="admin_home.php">
        <i class="me-1 bi bi-house"></i>
        Home
      </a>
    </div>

    <div class="dropdown">
      <a class="dropdown-toggle attendance" href="attendance_management.php" type="button" id="dropdownMenuButton" >
        <i class="me-1 bi bi-calendar"></i>
        Attendance
      </a>
      <ul class="me-2 dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
        <li><a class="dropdown-item" href="view_daily_attendance.php">View Daily Attendance</a></li>
        <li><a class="dropdown-item" href="view_monthly_attendance.php">Monthly Attendance</a></li>
        <li><a class="dropdown-item" href="add_attendance.php">Add Attendance</a></li>
        <li><a class="dropdown-item" href="add_daily_attendance.php">Add daily Attendance</a></li>
      </ul>
    </div>

    <div class=" dropdown">
      <a class="dropdown-toggle" type="button" href="advance_management.php" id="dropdownMenuButton" >
        <i class="me-1 bi bi-currency-rupee"></i>
        Advance
      </a>
      <ul class="me-2 dropdown-menu   dropdown-menu-end" aria-labelledby="dropdownMenuButton">
        <li><a class="dropdown-item" href="view_request.php">View Request</a></li>
        <li><a class="dropdown-item" href="add_advance.php">Add Advance</a></li>
        <li><a class="dropdown-item" href="subtract_advance.php">Subtract Advance </a></li>
        <li><a class="dropdown-item" href="advance_history.php">Advance History</a></li>
      </ul>
    </div>


    <div class="  dropdown">
      <a class="dropdown-toggle" type="button" href="Employee_details.php" id="dropdownMenuButton" >
        <i class="me-1 bi bi-people"></i>
        Employee
      </a>
      <ul class="me-2 dropdown-menu    dropdown-menu-end" aria-labelledby="dropdownMenuButton">
        <li><a class="dropdown-item" href="Employee_details.php">Employee Details</a></li>

      </ul>
    </div>

    <div class="dropdown">
      <a class="dropdown-toggle" type="button" href="salary_management.php" id="dropdownMenuButton" >
        <i class="me-1 bi bi-credit-card"></i>
        Salary
      </a>
      <ul class="me-2 dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
        <li><a class="dropdown-item" href="add_salary.php">Add Monthly Salary</a></li>
        <li><a class="dropdown-item" href="view_salary.php">View Monthly Salary</a></li>
      </ul>
    </div>



    <div class="  dropdown">
      <a class="dropdown-toggle" href="leave_management.php" type="button" id="dropdownMenuButton" >
        <i class="me-1 bi bi-briefcase"></i>
        Leave
      </a>
      <ul class="me-2 dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
        <li><a class="dropdown-item" href="leave_dashboard.php">Leave Dashboard</a></li>
        <li><a class="dropdown-item" href="assign_leave.php">Assign Leave</a></li>
        <li><a class="dropdown-item" href="leave_history.php">Leave History</a></li>
      </ul>
    </div>



    <div class="  dropdown">
      <a class="dropdown-toggle " type="button" id="dropdownMenuButton" >
        <i class="me-1 bi bi-image"></i>
        Gallery
      </a>
      <ul class="me-2 dropdown-menu    dropdown-menu-end" aria-labelledby="dropdownMenuButton">
        <li><a class="dropdown-item" href="#">Gallery</a></li>
        <li><a class="dropdown-item" href="#">Machine Pass</a></li>
      </ul>
    </div>


    <div class=" ">
      <a class="    " href="#contact">
        <i class="me-1 bi bi-clipboard"></i>
        Task
      </a>

    </div>
    <div class=" ">

      <a class="    " href="#site/project">
        <i class="me-1 bi bi-folder-fill"></i>
        Site/Project
      </a>

    </div>
    <div class=" ">
      <a class="    " href="#group">
        <i class="me-1 bi bi-people-fill"></i>
        Group
      </a>
    </div>
  </div>
  <div class="float-end me-3">
    <button type="button" class="mt-2 form-control float-left" id="toggle-sidebar" onclick="toggleSidebar()">
      <i class="bi bi-list"></i>
    </button>
  </div>

  </div>
  <div class="content">



</body>

<script>
  function toggleSidebar() {
    var sidebar = document.getElementById("sidebar");
    var toggleButton = document.getElementById("toggle-sidebar");

    if (sidebar.style.width === "200px") {
      // Hide the sidebar
      sidebar.style.width = "0";
      toggleButton.innerHTML = '<i class="bi bi-list"></i>';
      toggleButton.classList.remove("btn-danger");
      toggleButton.classList.add("btn-success");
    } else {
      // Show the sidebar
      sidebar.style.width = "200px";
      toggleButton.innerHTML = '<i class="bi bi-x"></i>';
      toggleButton.classList.remove("btn-success");
      toggleButton.classList.add("btn-danger");
    }
  }

  function showDropdown() {
  var dropdown = document.getElementsByClassName("dropdown-toggle");
  for (var i = 0; i < dropdown.length; i++) {
    dropdown[i].addEventListener("mouseover", function() {
      var openMenu = document.querySelector(".dropdown-menu.show");
      if (openMenu) {
        openMenu.classList.remove("show");
      }
      this.parentElement.querySelector(".dropdown-menu").classList.add("show");
    });
  }
}

function hideDropdown() {
  var dropdown = document.getElementsByClassName("dropdown-toggle");
  for (var i = 0; i < dropdown.length; i++) {
    dropdown[i].addEventListener("mouseout", function(event) {
      var menu = this.parentElement.querySelector(".dropdown-menu");
      if (!menu.contains(event.relatedTarget)) {
        menu.classList.remove("show");
      }
    });
  }
}

showDropdown();
hideDropdown();

document.addEventListener("click", function(event) {
  var menu = document.querySelector(".dropdown-menu.show");
  if (menu && !menu.contains(event.target)) {
    menu.classList.remove("show");
  }
});



</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.5/dist/sweetalert2.all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>

</html>