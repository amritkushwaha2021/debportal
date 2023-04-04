<?php
include 'header.php';
include 'config.php';
?>

<div class="container-lg">
    <div class="d-flex">
        <a href="javascript:history.go(-1)" class="" title="Back"><i class="bi bi-arrow-left"></i></a>
        <h5 class="ms-2 text-primary">Advance request</h5>
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

    <div class="" id="cards-container">
        <div class="mt-2 row row-cols-1 row-cols-md-3 g-2" id="card-container">
        </div>
    </div>
</div>

</div>
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

            // for employee dropdown
            fetch(url + 'advance/getAdvanceRequest.php', {

                    method: 'POST',
                    body: JSON.stringify({
                        "msg": "GetAdvanceRequest",
                        "ad_id": getCookieValue('ad_id'),
                        "status": "Pending"
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
                    Swal.close()
                    if (data.status === "Success") {
                        if (data.length > 0) {
                            const cardContainer = document.getElementById('card-container');
                            cardContainer.innerHTML = '';

                            for (let i = 0; i < data.data.length; i++) {
                                const record = data.data[i];
                                const sl_no = record.sl_no;
                                const uid = record.uid;
                                const name = record.name;
                                const req_amount = record.req_amount;
                                const reason = record.reason;
                                const req_time = record.req_time.substr(0, 10);
                                const status = record.status;

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
                                    <a href="#" class="text-primary me-2" name="view" id="view" title="View Details" data-bs-toggle="modal" data-placement="top" data-bs-target="#view_staticBackdrop">
                                        <i class=" fas fa-eye"></i>
                                    </a>
                                    <a href="#" class="text-primary me-2" name="update" id="update" title="Edit" data-bs-toggle="modal" data-placement="top" data-bs-target="#staticBackdrop" >
                                        <i class=" fas fa-edit"></i>
                                    </a>
                                    <a href="#" class="text-danger" name="icon_delete" title="Delete" data-bs-toggle="modal" data-placement="top" data-bs-target="#deleteModal">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-6">
                                <p class="card-text">Date : <span class="fw-bold">${req_time}</span></p>
                            </div>
                            <div class="col-6">
                                <p class="card-text">Req. Amount: <span class="fw-bold">₹${req_amount}</span></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <p class="card-text">Reason : <span class="fw-bold">${reason}</span></p>
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
                            document.getElementById("cards-container").innerHTML = `
        <div class="text-center alert alert-danger" role="alert">
       ${data.message}
        </div>`;
                        }

                    } else {
                        document.getElementById("cards-container").innerHTML = `
        <div class="text-center alert alert-danger" role="alert">
       ${data.message}
        </div> `;
                    }

                });
        }
    });
</script>