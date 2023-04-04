<?php
include 'header.php';
?>
<div class="container-fluid">
    <div class="d-flex">
        <a href="javascript:history.go(-1)" class="mt-1" title="Back"><i class="bi bi-arrow-left"></i></a>
        <h5 class="ms-3 text-primary">Advance History</h5>
    </div>
    <hr>
    <div class="container-sm mt-3 d-flex justify-content-left align-items-center">
        <form id="myMonthlyForm" method="POST">
            <div class="row">
                <select class="form-select" id="employee_selectOption">
                    <option value="" selected>Select employee</option>
                </select>
            </div>
        </form>

    </div>
    <div class="mt-3 row row-cols-1 row-cols-md-4 g-2" id="card-container">

    </div>
</div>

<script>
    // for employee dropdown
    fetch('https://ams.myshubham.in/api/deb/uat/employeeManage/getAllUsersDropdown.php', {
            method: 'POST',
            body: JSON.stringify({
                "msg": "getAllUsers",
                "ad_id": getCookieValue('ad_id')
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
            const selectOption = document.getElementById('employee_selectOption');

            if (data.status === "Success") {
                const employees = data.data;
                employees.forEach(function(employee) {
                    const option = document.createElement('option');
                    option.text = employee.name;
                    option.value = employee.uid;
                    selectOption.add(option);
                });
            }

            selectOption.addEventListener('change', event => {
                const selectedOption = event.target.selectedOptions[0];
                const selectedName = selectedOption.textContent;
                const selectedUid = selectedOption.value;

                fetch('https://ams.myshubham.in/api/deb/uat/advance/getAdvanceHistory.php', {

                        method: 'POST',
                        body: JSON.stringify({
                            "msg": "GetAdvanceHistory",
                            "ad_id": getCookieValue('ad_id'),
                            "id": selectedUid
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

                        if (data.status === "Success") {

                            const cardContainer = document.getElementById('card-container');
                            cardContainer.innerHTML = '';

                            for (let i = 0; i < data.data.length; i++) {
                                const record = data.data[i];
                                const Date = record.apv_time.substring(0, 10);
                                const amount = record.apv_amount;
                                const remark = record.remark;

                                const card = document.createElement('div');
                                card.classList.add('col');
                                card.innerHTML = `
            <div class="card shadow p-1 bg-body rounded">
                <div class="card-body">
                <div class="row">
                <p class="card-title mb-0">Date: <span class="fw-bold">${Date}</span></p>
                <hr>
                <p class="card-title mb-0">Amount : <span class="fw-bold">₹ ${amount}</span></p>
                <p class="card-title mb-0">Remark : <span class="fw-bold">${remark}</span></p>
                </div>
                </div>
            </div>
            `;
                                cardContainer.appendChild(card);
                            }
                        } else {
                            console.log("Error:", data.message);
                        }

                    }).catch(function(error) {
                        console.error('Error:', error);
                    });


            })
        });
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>