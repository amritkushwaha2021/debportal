<?php
include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Employee Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="admin_home.css" />
    <link href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.5/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.12.4.js"></script>
    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>

<body>
    <!---navbar start here-->
    <div style="background-color: #53bae7;">
        <div class="container">
            <nav class="navbar navbar-light" style="background-color: #53bae7; z-index: 1;">
                <a class="ms-3 navbar-brand fw-bold fs-2" href="admin_home.php">
                    <img src="notification_icon.jpg" alt="Logo" width="45" height="35" class="d-inline-block align-text-top">
                    Digital Employee Book
                </a>
                <div class="dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" id="profileDropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        Profile
                    </a>

                    <ul class="dropdown-menu dropdown-menu-start" aria-labelledby="profileDropdownMenuLink">
                        <li>
                            <p class="dropdown-item-text">Welcome: <span id="name"></span></p>
                        </li>
                        <li>
                            <p class="dropdown-item-text">Mob. : <span id="mobile"></span></p>
                        </li>
                        <li>
                            <p class="dropdown-item-text">working_days : <span id="working_days"></span></p>
                        </li>
                        <li>
                            <p class="dropdown-item-text">working_hours : <span id="working_hours"></span></p>
                        </li>
                        <li>
                            <p class="dropdown-item-text">Ot_Type. : <span id="ot_type"></span></p>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a href="#" class="dropdown-item text-danger" id="logoutBtn">Logout</a>
                        </li>
                    </ul>
                </div>

            </nav>
        </div>
    </div>
    <!---navbar end here-->
</body>
<script>
    var url = '<?php echo $url; ?>';

    window.addEventListener('load', function() {
        const mobile = getCookieValue('mobile');
        const name = getCookieValue('name');
        const adId = getCookieValue('ad_id');
        const working_days = getCookieValue('working_days');
        const working_hours = getCookieValue('working_hours');
        const ot_type = getCookieValue('ot_type');
        const userType = sessionStorage.getItem('user_type');

        if (!mobile || !name || !adId || !userType || !working_days || !working_hours || !ot_type) {
            window.location.href = 'index.php';
        } else {
            document.getElementById('name').textContent = name;
            document.getElementById('mobile').textContent = mobile;
            document.getElementById('working_days').textContent = working_days;
            document.getElementById('working_hours').textContent = working_hours;
            document.getElementById('ot_type').textContent = ot_type;
        }
    });

    const logoutBtn = document.getElementById('logoutBtn');
    logoutBtn.addEventListener('click', function() {
        document.cookie = 'mobile=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
        document.cookie = 'ad_id=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
        document.cookie = 'name=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
        document.cookie = 'working_days=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
        document.cookie = 'working_hours=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
        document.cookie = 'ot_type=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';

        sessionStorage.clear();
        window.location.href = 'index.php';
    });

    function getCookieValue(name) {
        const cookies = document.cookie.split(';');
        for (let i = 0; i < cookies.length; i++) {
            const cookie = cookies[i].trim();
            if (cookie.startsWith(name + '=')) {
                return cookie.substring(name.length + 1);
            }
        }
        return '';
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>

</html>