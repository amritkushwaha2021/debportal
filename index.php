<?php
include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Employee Book - All Features</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="notification_icon.jpg" type=".jpg/image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
</head>


<body>
    <div class="container-fluid" style="background-color: #53bae7 !important;">
        <div class="position-fixed top-0 end-0 p-3" style="z-index: 11">
            <div id="alert-toast" class="toast align-items-center text-white bg-danger" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body"></div>
                    <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        </div>

        <nav class="navbar navbar-expand-md navbar-light pb-2 justify-content-center">
            <div class="container">
                <a href="index.php" class="navbar-brand d-flex"><img src="images/image.jpeg" alt="Digital employee book" width="55" height="50"></a>
            </div>
        </nav>
        <div class="container-fluid bg-fs-blue">
            <div class="container">
                <div class="row px-3">
                    <div class="col-lg-6 col-md-6 col-sm-12 pt-5 pb-5 pr-0 pl-0">
                        <h1 class="h1 text-white font-weight-light">Great Field Work Takes Great Team Work</h1>
                        <span class="text-white font-weight-light">A Powerful Tracking, Monitoring &amp; Reporting
                            System
                            Along
                            With Convenient Tools &amp; Workflows to Accelerate Your Field Operations</span><br>
                        <div style=" color: white; font-size: 28px; font-variant: all-petite-caps;padding-top: 20px;">
                            App Features</div>
                        <ul class="features-ul">
                            <li><i class="fa fa-check-circle"></i>Location Tracking</li>
                            <li><i class="fa fa-check-circle"></i>Attendance Management</li>
                            <li><i class="fa fa-check-circle"></i>Visit Management</li>
                            <li><i class="fa fa-check-circle"></i>Expense Reimbursement Workflow</li>
                            <li><i class="fa fa-check-circle"></i>Dashboard &amp; Insights</li>
                        </ul>
                        <div class="mt-3">
                            <div class="mt-3 d-inline">
                                <a class="bg-fs-blue text-white btn btn-outline-light border-2 font-weight-light text-center px-2 py-2 text-decoration-none" href="#AppFeatures"><span class="px-1">See All Features</span></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-4 mt-3 p-0">
                                <ul class="contact-info" style="background: #fff; margin-top: 68px; list-style: none;">
                                    <li>
                                        <div style="color: #10a8e1;">Free for</div>
                                    </li>
                                    <li>
                                        <div style="color: #10a8e1;">Up to</div>
                                    </li>
                                    <li>
                                        <div style="font-family: 'Open Sans', sans-serif; font-weight: 600; color: #10a8e1;">
                                            10</div>
                                    </li>
                                    <li>
                                        <div style="color: #10a8e1;">
                                            Users
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <div class="col-lg-8 col-md-8 col-sm-8 col-8 mt-3 p-0 mb-3">
                                <!-- Sign up form -->
                                <form action="register.php" name="signup-form" id="signup-form" method="POST" style="display: none;">
                                    <div class="contact-form" style="background-color: #fff;padding: 35px 20px 20px 20px;">
                                        <div id="message"></div>
                                        <h4 class="text-center">SIGN UP</h4>
                                        <input type="text" class="mb-3 form-control border-0 border-bottom rounded-0" name="full_name" placeholder="Full Name" required>
                                        <input type="text" class="mb-3 form-control border-0 border-bottom rounded-0" name="company_name" placeholder="Company Name" required>
                                        <input type="email" class="mb-3 form-control border-0 border-bottom rounded-0" name="email" placeholder="E-mail ID">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text border-0 rounded-0">+91</span>
                                            </div><input type="number" class="mb-3 form-control border-0 border-bottom rounded-0" name="mobile_number" placeholder="Mobile Number" required>
                                        </div>
                                        <div class="checkbox-list">
                                            <label style="font-size: 13px; position: relative;padding-left: 19px;">
                                                <input id="" name="" type="checkbox" value="1" style="position: absolute;top: 3px;left: 0;" checked="">
                                                I would like to receive Marketing Communication from Digital Employee Book
                                            </label>
                                        </div>
                                        <button type="submit" class="mt-3 form-control">Register<i class="ms-2 fa fa-arrow-right"></i></button>
                                        <p class="text-center text-muted mt-3 d-block " style="font-size: 13px;">Already have an account ! <a class="btn btn-link text-muted" id="login-link" style="font-size: 13px;">Sign In</a></p>
                                    </div>
                                </form>


                                <!-- Login form -->
                                <form action="" name="login-form" id="login-form" method="POST">
                                    <div class="mt-4 contact-form" style="background-color: #fff;padding: 35px 20px 20px 20px;">
                                        <h4 class="text-center">SIGN IN</h4>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text border-0 rounded-0">+91</span>
                                            </div>
                                            <input type="number" class="mb-3 form-control border-0 border-bottom rounded-0" name="mobile_otp" id="mobile_otp" placeholder="Mobile Number" required>
                                        </div>

                                        <div class="container" id="recaptcha-container"></div>

                                        <button type="button" class="btn btn-primary mt-3 form-control" id="otp-button">Get OTP</button>
                                        <div class="otp-section mt-3" style="display: none;">
                                            <input type="text" class="mb-3 form-control border-0 border-bottom rounded-0" name="verify_otp" id="verify_otp" placeholder="Enter OTP" required>
                                            <button type="button" class="mt-3 form-control" name="login" id="signin-button">Sign in<i class="ms-2 fa fa-arrow-right"></i></button>
                                        </div>
                                        <p class="mt-3 d-block text-center text-muted" style="font-size: 13px;">Don't have an account? <a class="text-muted btn btn-link" id="signup-link" style="font-size: 13px;">Sign Up</a></p>
                                    </div>
                                </form>

                                <script>
                                    $(document).ready(function() {
                                        $("#otp-button").click(function() {
                                            $(".otp-section").show();
                                        });
                                    });
                                    $(document).ready(function() {
                                        $("#signup-link").click(function() {
                                            $("#login-form").hide();
                                            $("#signup-form").show();
                                        });
                                        $("#login-link").click(function() {
                                            $("#signup-form").hide();
                                            $("#login-form").show();
                                        });
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-5 mb-5"></div>

    <section class="container my-3 px-4">
        <section id="services">
            <div class="container">
                <section class="col-12 px-0">
                    <h2 class="text-center font-weight-light" style="color: #000000;" id="AppFeatures">App Features </h2>
                    <h5 class="text-black-50 text-center pt-2 font-weight-light">Learn about the Features that will
                        streamline your field operations:
                    </h5>
                </section>
                <br><br>
                <div class="row px-3">
                    <div class="col-md-4">
                        <div class="card shadow-sm mb-4">
                            <div class="card-body text-center">
                                <i class="fas fa-solid fa-location-dot fa-5x mb-4 text-primary"></i>
                                <h5 class="card-title">Location Tracking</h5>
                                <p class="card-text">Track the location of your team members in real-time.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card shadow-sm mb-4">
                            <div class="card-body text-center">
                                <i class="fas fa-clipboard-check fa-5x mb-4 text-primary"></i>
                                <h5 class="card-title">Attendance Management</h5>
                                <p class="card-text">Easily manage and keep track of attendance for your team.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card shadow-sm mb-4">
                            <div class="card-body text-center">
                                <i class="fas fa-file-signature fa-5x mb-4 text-primary"></i>
                                <h5 class="card-title">Visit Management</h5>
                                <p class="card-text">Manage and schedule visits with clients and customers.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card shadow-sm mb-4">
                            <div class="card-body text-center">
                                <i class="fas fa-calendar-alt fa-5x mb-4 text-primary"></i>
                                <h5 class="card-title">Leave Management</h5>
                                <p class="card-text">Track and manage leave requests for your team members.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card shadow-sm mb-4">
                            <div class="card-body text-center">
                                <i class="fas fa-tachometer-alt fa-5x mb-4 text-primary"></i>
                                <h5 class="card-title">Dashboard & Insights</h5>
                                <p class="card-text">Get an overview of your team's performance and productivity.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card shadow-sm mb-4">
                            <div class="card-body text-center">
                                <i class="fas fa-receipt fa-5x mb-4 text-primary"></i>
                                <h5 class="card-title">Expense Reimbursement Workflow</h5>
                                <p class="card-text">Streamline your expense reimbursement process.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card shadow-sm mb-4">
                            <div class="card-body text-center">
                                <i class="fas fa-directions fa-5x mb-4 text-primary"></i>
                                <h5 class="card-title">Turn-By-Turn Navigation</h5>
                                <p class="card-text">Provide your team with turn-by-turn navigation and directions.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card shadow-sm mb-4">
                            <div class="card-body text-center">
                                <i class="fas fa-map-marked-alt fa-5x mb-4 text-primary"></i>
                                <h5 class="card-title">Customer Address Management</h5>
                                <p class="card-text">Easily manage and store customer addresses for your team.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card shadow-sm mb-4">
                            <div class="card-body text-center">
                                <i class="fas fa-users fa-5x mb-4 text-primary"></i>
                                <h5 class="card-title">Collaborate with Team Members</h5>
                                <p class="card-text">Communicate and collaborate with your team members in real-time.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card shadow-sm mb-4">
                            <div class="card-body text-center">
                                <i class="fas fa-comments fa-5x mb-4 text-primary "></i>
                                <h5 class="card-title">Instant Messaging</h5>
                                <p class="card-text">Quickly message team members and keep communication streamlined.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card shadow-sm mb-4">
                            <div class="card-body text-center">
                                <i class="fas fa-clipboard-list fa-5x mb-4 text-primary"></i>
                                <h5 class="card-title">Activity Report Logging</h5>
                                <p class="card-text">Keep track of team activity and generate activity reports.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card shadow-sm mb-4">
                            <div class="card-body text-center">
                                <i class="fas fa-file-alt fa-5x mb-4 text-primary"></i>
                                <h5 class="card-title">Custom Forms</h5>
                                <p class="card-text">Create and customize forms for team members to fill out.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card shadow-sm mb-4">
                            <div class="card-body text-center">
                                <i class="fas fa-wifi fa-5x mb-4 text-primary"></i>
                                <h5 class="card-title">Offline Mode</h5>
                                <p class="card-text">Continue working and saving data even when offline.</p>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </section>
    <a href="#" class="btn-back-to-top btn btn-secondary float-end"> <i class="fas fa-arrow-up"></i></a>
</body>

<footer class="bg-dark text-center py-3 text-white">© 2023 Digital Employee Book. All rights reserved.</footer>
<script>
    $(document).ready(function() {

        var btn = $('.btn-back-to-top');
        $(window).scroll(function() {
            if ($(window).scrollTop() > 300) {
                btn.addClass('show');
            } else {
                btn.removeClass('show');
            }
        });
        btn.on('click', function(e) {
            e.preventDefault();
            $('html, body').animate({
                scrollTop: 0
            }, '300');
        });
    });
</script>
<script src="https://www.gstatic.com/firebasejs/8.6.5/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.6.5/firebase-auth.js"></script>

<script>
    var url = '<?php echo $url; ?>';
    var firebaseConfig = {
        apiKey: "AIzaSyAveeKAr1gGpvQIHavHG0EnY6EAOqR9bKE",
        authDomain: "debp-22108.firebaseapp.com",
        projectId: "debp-22108",
        storageBucket: "debp-22108.appspot.com",
        messagingSenderId: "633093211714",
        appId: "1:633093211714:web:f1d7bc33ddc38f58ae4fdb",
        measurementId: "G-LXNW43E91H"
    };
    firebase.initializeApp(firebaseConfig);

    const phoneNumber = document.getElementById('mobile_otp');
    const otpButton = document.getElementById('otp-button');
    const signinButton = document.getElementById('signin-button');

    // Add an event listener to the "Get OTP" button
    otpButton.addEventListener('click', () => {
        const phoneNumberValue = "+91" + phoneNumber.value;
        const appVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container');
        firebase.auth().signInWithPhoneNumber(phoneNumberValue, appVerifier)
            .then((confirmationResult) => {
                showAlert('Otp Sent to mobile number ', 'success');
                document.querySelector('.otp-section').style.display = 'block';
                window.confirmationResult = confirmationResult;
            })
            .catch((error) => {
                showAlert(error.message, 'danger');
            });
    });

    signinButton.addEventListener('click', () => {
        const verificationCode = document.getElementById('verify_otp').value;
        window.confirmationResult.confirm(verificationCode)
            .then((result) => {
                const number = document.getElementById('mobile_otp').value;

                fetch(url + 'employeeManage/userValidate.php', {
                        method: 'POST',
                        body: JSON.stringify({
                            msg: "VerifyEmployee",
                            mobile: number,
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
                        if (data.data.status === 'Active') {

                            if (data.data.user_type === 'Employee') {
                                sessionStorage.setItem('user_type', 'Employee');
                                document.cookie = `mobile=${data.data.mobile}; expires=${new Date(Date.now() + 15 * 24 * 60 * 60 * 1000).toUTCString()}; path=/`;
                                document.cookie = `ad_id=${data.data.ad_id}; expires=${new Date(Date.now() + 15 * 24 * 60 * 60 * 1000).toUTCString()}; path=/`;
                                document.cookie = `name=${data.data.name}; expires=${new Date(Date.now() + 15 * 24 * 60 * 60 * 1000).toUTCString()}; path=/`;
                                window.location.href = 'employee_home.php';


                            } else if (data.data.user_type === 'Admin') {
                                sessionStorage.setItem('user_type', 'Admin');
                                document.cookie = `mobile=${data.data.mobile}; expires=${new Date(Date.now() + 15 * 24 * 60 * 60 * 1000).toUTCString()}; path=/`;
                                document.cookie = `ad_id=${data.data.ad_id}; expires=${new Date(Date.now() + 15 * 24 * 60 * 60 * 1000).toUTCString()}; path=/`;
                                document.cookie = `name=${data.data.name}; expires=${new Date(Date.now() + 15 * 24 * 60 * 60 * 1000).toUTCString()}; path=/`;
                                window.location.href = 'admin_home.php';

                            } else {
                                showAlert('Invalid user type', 'danger');
                            }
                        } else {
                            showAlert('It appears that the user you are trying to reach its currently Inactive ! Please Contact With Administrator', 'danger');
                        }
                    })
                    .catch(function(error) {
                        showAlert(error.message, 'danger');
                    });

                // to show the message

            })
    })

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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" type="text/javascript"></script>

</html>