<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Employee Book - All Features</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="admin_home.css">
    <script src="states.js"></script>
    <link rel="shortcut icon" href="notification_icon.jpg" type=".jpg/image/x-icon">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-light justify-content-center" style="background-color: #53bae7;">
        <div class="container">
            <a href="#" class="navbar-brand d-flex"><img src="images/image.jpeg" alt="Digital employee book" width="50" height="40"></a>
        </div>
    </nav>
    <div class="container">
        <div class="position-fixed top-0 end-0 p-3" style="z-index: 11">
            <div id="alert-toast" class="toast align-items-center text-white bg-danger" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body"></div>
                    <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        </div>
    </div>
    <div class="container" style="width:70%;margin: 0 auto;">
        <div class="row">
            <div class="col-md-12 mt-4 ">
                <h3 class="">Alright, let's set this up!</h3>
                <p class="text-muted">As a business application, Digital Employee Book requires some information about you and
                    your company. Let's begin now.</p>
            </div>
        </div>
    </div>
    <div class="signup container mb-4" style="width:70%;margin: 0 auto;">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-11">
                        <div class="d-flex justify-content-between">
                            <div class="text-muted fs-5 ms-3">
                                Create Account
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container mt-3">
                <form id='myForm' style="font-size: 13px;" method="POST">
                    <div class="row mb-2">
                        <label for="inputName" class="col-5 col-form-label">Full Name</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control form-control-sm" placeholder="Full Name" id="inputName" name="inputName" value="<?php echo isset($_POST['full_name']) ? $_POST['full_name'] : ''; ?>">
                            <div class="invalid-feedback">Please enter your full name.</div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="inputEmail" class="col-5 col-form-label">Email ID</label>
                        <div class="col-sm-7">
                            <input type="email" class="form-control form-control-sm" placeholder="E-mail ID" id="inputEmail" name="inputEmail" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>">
                            <div class="invalid-feedback">Please enter a valid email address.</div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="inputMobile" class="col-5 col-form-label">Mobile No. (Without +91 )</label>
                        <div class="col-sm-7">
                            <input type="tel" class="form-control form-control-sm" placeholder="Mobile No" id="inputMobile" name="inputMobile" value="<?php echo isset($_POST['mobile_number']) ? $_POST['mobile_number'] : ''; ?>">
                            <div class="invalid-feedback">Please enter a 10 digit mobile number.</div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="inputDesignation" class="col-5 col-form-label">Designation</label>
                        <div class="col-sm-7">
                            <select class="form-control form-control-sm" id="inputDesignation" name="inputDesignation">
                                <option value="">-- Select Designation --</option>
                                <option value="Assistant Manager">Assistant Manager</option>
                                <option value="Assistant Vice President">Assistant Vice President</option>
                                <option value="Branch Manager">Branch Manager</option>
                                <option value="Business Analyst">Business Analyst</option>
                                <option value="Business Development Executive">Business Development Executive</option>
                                <option value="Business Manager">Business Manager</option>
                                <option value="CEO">CEO</option>
                                <option value="CFO">CFO</option>
                                <option value="CLO">CLO</option>
                                <option value="CMO">CMO</option>
                                <option value="Consultant">Consultant</option>
                                <option value="COO">COO</option>
                                <option value="CTO">CTO</option>
                                <option value="Data Analyst">Data Analyst</option>
                                <option value="Director /ManagingDirector /Proprietor">Director / Managing Director / Proprietor</option>
                                <option value="General Manager">General Manager</option>
                                <option value="Head of department">Head of department</option>
                                <option value="HR Administrator">HR Administrator</option>
                                <option value="HR Manager">HR Manager</option>
                                <option value="HR Representative">HR Representative</option>
                                <option value="HR Specialist">HR Specialist</option>
                                <option value="IT Head">IT Head</option>
                                <option value="IT Manager">IT Manager</option>
                                <option value="Manager">Manager</option>
                                <option value="Marketing Manager">Marketing Manager</option>
                                <option value="Operations Head">Operations Head</option>
                                <option value="Operations Manager">Operations Manager</option>
                                <option value="Owner">Owner</option>
                                <option value="Pathologist">Pathologist</option>
                                <option value="Pharmacist">Pharmacist</option>
                                <option value="Principal">Principal</option>
                                <option value="Project Manager">Project Manager</option>
                                <option value="Sales Head">Sales Head</option>
                                <option value="Sales Manager">Sales Manager</option>
                                <option value="Secretary">Secretary</option>
                                <option value="Senior Executive IT">Senior Executive IT</option>
                                <option value="Software Engineer">Software Engineer</option>
                                <option value="Teacher/ Professor">Teacher / Professor</option>
                                <option value="Technical Specialist">Technical Specialist</option>
                                <option value="Trainee">Trainee</option>
                                <option value="Vice President">Vice President</option>
                                <option value="Zonal Head">Zonal Head</option>

                            </select>

                            <div class="invalid-feedback">Please Select a valid Designation.</div>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label for="inputCompanyName" class="col-5 col-form-label">Company Name</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control form-control-sm" placeholder="Company Name" id="inputCompanyName" name="inputCompanyName" value="<?php echo isset($_POST['company_name']) ? $_POST['company_name'] : ''; ?>">
                            <div class="invalid-feedback">Please enter valid company name.</div>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label for="inputIndustry" class="col-5 col-form-label">Company Sector</label>
                        <div class="col-sm-7">
                            <select class="form-control form-control-sm" id="inputIndustry" name="inputIndustry">
                                <option value="">--Select Sector--</option>
                                <option value="Accounting">Accounting</option>
                                <option value="Airlines/Aviation">Airlines/Aviation</option>
                                <option value="Alternative Dispute Resolution">Alternative Dispute Resolution</option>
                                <option value="Alternative Medicine">Alternative Medicine</option>
                                <option value="Animation">Animation</option>
                                <option value="Apparel & Fashion">Apparel & Fashion</option>
                                <option value="Architecture & Planning">Architecture & Planning</option>
                                <option value="Arts and Crafts">Arts and Crafts</option>
                                <option value="Automotive">Automotive</option>
                                <option value="Aviation & Aerospace">Aviation & Aerospace</option>
                                <option value="Banking">Banking</option>
                                <option value="Biotechnology">Biotechnology</option>
                                <option value="Broadcast Media">Broadcast Media</option>
                                <option value="Building Materials">Building Materials</option>
                                <option value="Business Supplies and Equipment">Business Supplies and Equipment</option>
                                <option value="Capital Markets">Capital Markets</option>
                                <option value="Chemicals">Chemicals</option>
                                <option value="Civic & Social Organization">Civic & Social Organization</option>
                                <option value="Civil Engineer">Civil Engineer</option>
                                <option value="Commercial Real Estate">Commercial Real Estate</option>
                                <option value="Computer & Network Security">Computer & Network Security</option>
                                <option value="Computer Games">Computer Games</option>
                                <option value="Computer Hardware">Computer Hardware</option>
                                <option value="Computer Networking">Computer Networking</option>
                                <option value="Computer Software">Computer Software</option>
                                <option value="Construction">Construction</option>
                                <option value="Consumer Electronics">Consumer Electronics</option>
                                <option value="Consumer Goods">Consumer Goods</option>
                                <option value="Consumer Services">Consumer Services</option>
                                <option value="Cosmetics">Cosmetics</option>
                                <option value="Dairy">Dairy</option>
                                <option value="Defense&Space">Defense & Space</option>
                                <option value="Design">Design</option>
                                <option value="Education Management">Education Management</option>
                                <option value="E-learning">E-learning</option>
                                <option value="Electrical /Electronic Manufacturing">Electrical / Electronic Manufacturing</option>
                                <option value="Entertainment">Entertainment</option>
                                <option value="Environmental Services">Environmental Services</option>
                                <option value="Event Services">Event Services</option>
                                <option value="Executive Office">Executive Office</option>
                                <option value="Facilities Services">Facilities Services</option>
                                <option value="Farming">Farming</option>
                                <option value="Financial Services">Financial Services</option>
                                <option value="FineArt">Fine Art</option>
                                <option value="Fishery">Fishery</option>
                                <option value="Food & Beverages">Food & Beverages</option>
                                <option value="Food Production">Food Production</option>
                                <option value="Fund-Raising">Fund-Raising</option>
                                <option value="Furniture">Furniture</option>
                                <option value="Gambling & Casinos">Gambling & Casinos</option>
                                <option value="Glass Ceramics & Concrete">Glass, Ceramics & Concrete</option>
                                <option value="Government Administration">Government Administration</option>
                                <option value="Government Relations">Government Relations</option>
                                <option value="Graphic Design">Graphic Design</option>
                                <option value="Health Wellness & Fitness">Health, Wellness & Fitness</option>
                                <option value="Higher Education">Higher Education</option>
                                <option value="Hospital & HealthCare">Hospital & Health Care</option>
                                <option value="Hospitality">Hospitality</option>
                                <option value="Human Resources">Human Resources</option>
                                <option value="Import & Export">Import & Export</option>
                                <option value="Individual & Family Services">Individual & Family Services</option>
                                <option value="Industrial Automation">Industrial Automation</option>
                                <option value="International Affairs">International Affairs</option>
                                <option value="International Trade & Development">International Trade & Development</option>
                                <option value="Internet">Internet</option>
                                <option value="Information Services">Information Services</option>
                                <option value="Information Technology and Services">Information Technology and Services</option>
                                <option value="Insurance">Insurance</option>
                                <option value="Investment Banking">Investment Banking</option>
                                <option value="Investment Management">Investment Management</option>
                                <option value="Judiciary">Judiciary</option>
                                <option value="Law Enforcement">Law Enforcement</option>
                                <option value="Law Practice">Law Practice</option>
                                <option value="Legal Services">Legal Services</option>
                                <option value="Legislative Office">Legislative Office</option>
                                <option value="Leisure Travel & Tourism">Leisure, Travel & Tourism</option>
                                <option value="Libraries">Libraries</option>
                                <option value="Logistic sand SupplyChain">Logistics and Supply Chain</option>
                                <option value="Luxury Goods & Jewelry">Luxury Goods & Jewelry</option>
                                <option value="Machinery">Machinery</option>
                                <option value="Management Consulting">Management Consulting</option>
                                <option value="Maritime">Maritime</option>
                                <option value="Marketing and Advertising">Marketing and Advertising</option>
                                <option value="Market Research">Market Research</option>
                                <option value="Mechanical or Industrial Engineering">Mechanical or Industrial Engineering</option>
                                <option value="Media Production">Media Production</option>
                                <option value="Medical Devices">Medical Devices</option>
                                <option value="Medical Practices">Medical Practices</option>
                                <option value="Mental HealthCare">Mental Health Care</option>
                                <option value="Military">Military</option>
                                <option value="Mining & Metals">Mining & Metals</option>
                                <option value="Motion Pictures & Film">Motion Pictures & Film</option>
                                <option value="Museums and Institutions">Museums and Institutions</option>
                                <option value="Music">Music</option>
                                <option value="Nano technology">Nanotechnology</option>
                                <option value="News papers">Newspapers</option>
                                <option value="Nonprofit Organization Management">Nonprofit Organization Management</option>
                                <option value="Oil & Energy">Oil & Energy</option>
                                <option value="Online Media">Online Media</option>
                                <option value="Out sourcing / Off sourcing">Outsourcing/ Off sourcing</option>
                                <option value="Package/FreightDelivery">Package/Freight Delivery</option>
                                <option value="Packaging and Containers">Packaging and Containers</option>
                                <option value="Paper & Forest Products">Paper & Forest Products</option>
                                <option value="Performing Arts">Performing Arts</option>
                                <option value="Pharmaceuticals">Pharmaceuticals</option>
                                <option value="Philanthropy">Philanthropy</option>
                                <option value="Photography">Photography</option>
                                <option value="Plastics">Plastics</option>
                                <option value="Political Organization">Political Organization</option>
                                <option value="Primary/Secondary Education">Primary/Secondary Education</option>
                                <option value="Printing">Printing</option>
                                <option value="Professional Training & Coaching">Professional Training & Coaching</option>
                                <option value="Program Development">Program Development</option>
                                <option value="Public Policy">Public Policy</option>
                                <option value="Public Relations and Communication">Public Relations and Communication</option>
                                <option value="Public Safety">Public Safety</option>
                                <option value="Publishing">Publishing</option>
                                <option value="Railroad Manufacture">Railroad Manufacture</option>
                                <option value="Ranching">Ranching</option>
                                <option value="Real-Estate">Real-Estate</option>
                                <option value="Recreational Facilities and Services">Recreational Facilities and Services</option>
                                <option value="Religious Institutions">Religious Institutions</option>
                                <option value="Renewable & Environment">Renewable & Environment</option>
                                <option value="Research">Research</option>
                                <option value="Restaurants">Restaurants</option>
                                <option value="Retail">Retail</option>
                                <option value="Security and Investigations">Security and Investigations</option>
                                <option value="Semiconductors">Semiconductors</option>
                                <option value="Shipbuilding">Shipbuilding</option>
                                <option value="SportingGoods">Sporting Goods</option>
                                <option value="Sports">Sports</option>
                                <option value="Staffing and Recruiting">Staffing and Recruiting</option>
                                <option value="Supermarkets">Supermarkets</option>
                                <option value="Telecommunications">Telecommunications</option>
                                <option value="Text tiles">Text tiles</option>
                                <option value="Think Tanks">Think Tanks</option>
                                <option value="Tobacco">Tobacco</option>
                                <option value="Translation and Localization">Translation and Localization</option>
                                <option value="Transportation/trucking/Railroad">Transportation/trucking/Railroad</option>
                                <option value="Utilities">Utilities</option>
                                <option value="Venture Capital & Private Equity">Venture Capital &Private Equity</option>
                                <option value="Veterinary">Veterinary</option>
                                <option value="Warehousing">Warehousing</option>
                                <option value="Wholesale">Wholesale</option>
                                <option value="Wine and Spirits">Wine and Spirits</option>
                                <option value="Wireless">Wireless</option>
                                <option value="Writing & Editing">Writing & Editing</option>
                            </select>
                            <div class="invalid-feedback">Please select valid Sector.
                            </div>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label for="inputSalaryType" class="col-5 col-form-label">Salary Type</label>
                        <div class="col-sm-7">
                            <select class="form-control form-control-sm" id="inputSalaryType" name="inputSalaryType">
                                <option value="" selected disabled>--Select Salary Type--</option>
                                <option value="Monthly Basis">Monthly Basis</option>
                                <option value="Daily Basis">Daily Basis</option>
                            </select>
                            <div class="invalid-feedback">Please Select a valid Salary Type.</div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="inputWorkingDay" class="col-5 col-form-label">Working Days</label>
                        <div class="col-sm-7">
                            <select class="form-control form-control-sm" id="inputWorkingDay" name="inputWorkingDay">
                                <option value="" selected disabled>--Select Working Days--</option>
                                <option value="Monday To Thursday">Monday To Thursday</option>
                                <option value="Monday To Friday">Monday To Friday</option>
                                <option value="Monday To Saturday">Monday To Saturday</option>
                                <option value="Every Day">Every Day</option>
                            </select>
                            <div class="invalid-feedback">Please Select a valid Working Days.</div>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label for="inputWorkingHour" class="col-5 col-form-label">Working Hours</label>
                        <div class="col-sm-7">
                            <select class="form-control form-control-sm" id="inputWorkingHour" name="inputWorkingHour">
                                <option value="" selected disabled>--Select Working Hours--</option>
                                <option value="05:00 Hours">05:00 Hours</option>
                                <option value="06:00 Hours">06:00 Hours</option>
                                <option value="07:00 Hours">07:00 Hours</option>
                                <option value="08:00 Hours">08:00 Hours</option>
                                <option value="09:00 Hours">09:00 Hours</option>
                                <option value="10:00 Hours">10:00 Hours</option>
                                <option value="11:00 Hours">11:00 Hours</option>
                                <option value="12:00 Hours">12:00 Hours</option>
                            </select>
                            <div class="invalid-feedback">Please Select a valid Working Hours.</div>
                        </div>
                    </div>


                    <div class="row mb-2">
                        <label for="inputOverTime" class="col-5 col-form-label">Over Time Type</label>
                        <div class="col-sm-7">
                            <select class="form-control form-control-sm" id="inputOverTime" name="inputOverTime">
                                <option value="" selected disabled>--Select Over Time Type--</option>
                                <option value="Hourly Basis">Hourly Basis</option>
                                <option value="Daily Basis">Daily Basis</option>
                            </select>
                            <div class="invalid-feedback">Please Select a Over Time Type.</div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <input type="button" name="validate" class="btn bg-fs-blue float-end mb-2 text-white" id="validate-btn" value="Validate">
                        <input type="submit" name="submit" class="btn btn-success float-end mb-2 text-white d-none" id="continue-btn" value="Submit">
                    </div>

                </form>

            </div>

        </div>

    </div>

</body>

<script>
    function validateForm() {
        const form = document.getElementById('myForm');
        let valid = true;

        if (form.inputName.value.trim() === '') {
            form.inputName.classList.add('is-invalid');
            valid = false;
        } else {
            form.inputName.classList.remove('is-invalid');
        }

        if (form.inputEmail.value.trim() === '' || !isValidEmail(form.inputEmail.value.trim())) {
            form.inputEmail.classList.add('is-invalid');
            valid = false;
        } else {
            form.inputEmail.classList.remove('is-invalid');
        }

        if (form.inputMobile.value.trim() === '' || !isValidMobile(form.inputMobile.value.trim())) {
            form.inputMobile.classList.add('is-invalid');
            valid = false;
        } else {
            form.inputMobile.classList.remove('is-invalid');
        }

        if (form.inputDesignation.value.trim() === '') {
            form.inputDesignation.classList.add('is-invalid');
            valid = false;
        } else {
            form.inputDesignation.classList.remove('is-invalid');
        }

        if (form.inputCompanyName.value.trim() === '') {
            form.inputCompanyName.classList.add('is-invalid');
            valid = false;
        } else {
            form.inputCompanyName.classList.remove('is-invalid');
        }

    
        if (form.inputIndustry.value.trim() === '') {
            form.inputIndustry.classList.add('is-invalid');
            valid = false;
        } else {
            form.inputIndustry.classList.remove('is-invalid');
        }

        if (form.inputWorkingDay.value.trim() === '') {
            form.inputWorkingDay.classList.add('is-invalid');
            valid = false;
        } else {
            form.inputWorkingDay.classList.remove('is-invalid');
        }

        if (form.inputSalaryType.value.trim() === '') {
            form.inputSalaryType.classList.add('is-invalid');
            valid = false;
        } else {
            form.inputSalaryType.classList.remove('is-invalid');
        }

        if (form.inputOverTime.value.trim() === '') {
            form.inputOverTime.classList.add('is-invalid');
            valid = false;
        } else {
            form.inputOverTime.classList.remove('is-invalid');
        }



        if (form.inputWorkingHour.value.trim() === '') {
            form.inputWorkingHour.classList.add('is-invalid');
            valid = false;
        } else {
            form.inputWorkingHour.classList.remove('is-invalid');
        }


        return valid;
    }

    function isValidEmail(email) {
        const pattern = /^[^@]+@\w+(\.\w+)+\w$/;
        return pattern.test(email);
    }

    function isValidMobile(mobile) {
        const pattern = /^[0-9]{10}$/;
        return pattern.test(mobile);
    }



    const validateBtn = document.getElementById('validate-btn');
    const submitBtn = document.getElementById('continue-btn');

    validateBtn.addEventListener('click', function() {
        event.preventDefault()
        const isValid = validateForm();
        if (isValid) {
            validateBtn.classList.add('d-none');
            submitBtn.classList.remove('d-none');
            submitBtn.classList.add('d-block');
        }
    });


   
    document.getElementById('continue-btn').addEventListener('click', function(event) {
        event.preventDefault();

        fetch('https://ams.myshubham.in/api/deb/uat/employerManage/registerEmployer.php', {
                method: 'POST',
                body: JSON.stringify({
                    msg: 'RegisterEmployer',
                    company_name: document.getElementById('inputCompanyName').value,
                    logo: 'null',
                    name: document.getElementById('inputName').value,
                    designation: document.getElementById('inputDesignation').value,
                    mobile: document.getElementById('inputMobile').value,
                    email: document.getElementById('inputEmail').value,
                    company_sector: document.getElementById('inputIndustry').value,
                    working_days: document.getElementById('inputWorkingDay').value,
                    salary_type: document.getElementById('inputSalaryType').value,
                    work_hour: document.getElementById('inputWorkingHour').value,
                    ot_type: document.getElementById('inputOverTime').value,
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
                showAlert(data.message, 'success');
                setTimeout(function() {
                    window.location.href = 'index.php';
                }, 4000);
            })
    }).catch(function(error) {
        showAlert(error.message, 'danger');
    });

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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</html>