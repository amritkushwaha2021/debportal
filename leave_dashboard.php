<?php

include 'header.php';
include 'config.php';


?>
<div class="mt-2 container-lg">
    <div class="d-flex">
        <a href="javascript:history.go(-1)" class="" title="Back"><i class="bi bi-arrow-left"></i></a>
        <h5 class="ms-2 text-primary">Leave Dashboard</h5>
    </div>
    <hr>

    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" title="Pending leave" data-bs-toggle="tab" href="#pending">Pending</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" title="Approved leave" data-bs-toggle="tab" href="#approved">Approved</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" title="Rejected leave" data-bs-toggle="tab" href="#rejected">Rejected</a>
        </li>
    </ul>

    <div class="tab-content mt-3">
        <div class="tab-pane fade show active" id="pending">
            <div class="mt-3" id="cards-container">

            </div>
        </div>

        <div class="tab-pane fade" id="approved">
            <div class="mt-3" id="cards-container">

            </div>
            <div class="col">
                <div class="card mt-3 shadow p-3 mb-2 bg-body rounded">
                    <div class="card-body">
                        <h6 class="card-title"></h6>
                        <hr>
                        <div class="row">
                            <div class="col-6">
                                <p class="card-title mb-0">Leave Type: <span class="fw-bold"><?php echo $row['leave_type']; ?></span></p>
                            </div>
                            <div class="col-6">
                                <p class="card-title mb-0">Duration: <span class="fw-bold"><?php echo $durationInDays; ?> days</span></p>
                            </div>

                            <div class="col-6">
                                <p class="card-title mb-0">Apply Date: <span class="fw-bold"><?php echo $row['req_date']; ?></span></p>
                            </div>
                            <div class="col-6">
                                <p class="card-title mb-0">From: <span class="fw-bold" id="approve_from-date"><?php echo $row['leave_from_date']; ?></span> To: <span class="fw-bold" id="approve_to-date"><?php echo $row['leave_to_date']; ?></span></p>
                            </div>
                            <div class="col-6">
                                <p class="card-title mb-0">Reason: <span class="fw-bold"><?php echo $row['reason']; ?></span></p>
                            </div>
                            <div class="col-6">
                                <p class="card-title mb-0">Status: <span class="fw-bold text-success"><?php echo $row['leave_status']; ?></span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="tab-pane fade" id="rejected">
        <div class="row row-cols-1 row-cols-md-2 g-2">

            <div class="col">
                <div class="card mt-3 shadow p-3 mb-2 bg-body rounded">
                    <div class="card-body">
                        <h6 class="card-title"><?php echo $row['name']; ?></h6>
                        <hr>
                        <div class="row">
                            <div class="col-6">
                                <p class="card-title mb-0">Leave Type: <span class="fw-bold"><?php echo $row['leave_type']; ?></span></p>
                            </div>
                            <div class="col-6">
                                <p class="card-title mb-0">Duration: <span class="fw-bold"><?php echo $durationInDays; ?> days</span></p>
                            </div>

                            <div class="col-6">
                                <p class="card-title mb-0">Apply Date: <span class="fw-bold"><?php echo $row['req_date']; ?></span></p>
                            </div>
                            <div class="col-6">
                                <p class="card-title mb-0">From: <span class="fw-bold" id="approve_from-date"><?php echo $row['leave_from_date']; ?></span> To: <span class="fw-bold" id="approve_to-date"><?php echo $row['leave_to_date']; ?></span></p>
                            </div>
                            <div class="col-6">
                                <p class="card-title mb-0">Reason: <span class="fw-bold"><?php echo $row['reason']; ?></span></p>
                            </div>
                            <div class="col-6">
                                <p class="card-title mb-0">Status: <span class="fw-bold text-danger"><?php echo $row['leave_status']; ?></span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</body>
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

            fetch(url + 'leaveManage/getAppliedLeaveRequest.php', {
                    method: 'POST',
                    body: JSON.stringify({
                        "msg": "GetAppliedLeave",
                        "ad_id": getCookieValue('ad_id'),
                        "leave_status": "Pending"
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
                        Swal.close();
                        const records = data.data;
                        if (records.length > 0) {
                            const container = document.createElement("div");
                            container.classList.add("row", "row-cols-1", "row-cols-md-3", "g-3");
                            for (let i = 0; i < records.length; i++) {
                                const record = records[i];
                                const div = document.createElement("div");
                                div.classList.add("col");
                                div.innerHTML = `
                                <div class="card-body">
                            <h6 class="card-title"></h6>
                            <hr>
                            <div class="row">
                                <div class="col-6">
                                    <p class="card-title mb-0">Leave Type: <span class="fw-bold"></span></p>
                                </div>
                                <div class="col-6">
                                    <p class="card-title mb-0">Duration: <span class="fw-bold"> days</span></p>
                                </div>

                                <div class="col-6">
                                    <p class="card-title mb-0">Apply Date: <span class="fw-bold"></span></p>
                                </div>
                                <div class="col-6">
                                    <p class="card-title mb-0">From: <span class="fw-bold" id="approve_from-date"></span> To: <span class="fw-bold" id="approve_to-date"></span></p>
                                </div>
                                <div class="col-6">
                                    <p class="card-title mb-0">Reason: <span class="fw-bold"></span></p>
                                </div>
                                <div class="col-6">
                                    <p class="card-title mb-0">Status: <span class="fw-bold text-warning"></span></p>
                                </div>
                            </div>

                        </div>

                                    `;

                                container.appendChild(div);
                            }
                            document.getElementById("cards-container").appendChild(container);

                        } else {
                            document.getElementById("cards-container").innerHTML = `
<div class="text-center alert alert-danger" role="alert">
${data.message}
</div>
`;
                        }
                    } else {
                        document.getElementById("cards-container").innerHTML = `
<div class="text-center alert alert-danger" role="alert">
${data.message}
</div>
`;
                    }

                })
        }
    })
</script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</html>