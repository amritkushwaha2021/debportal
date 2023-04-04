<?php
include 'header.php';
?>
<div class="container-lg">
    <div class="d-flex">
        <a href="javascript:history.go(-1)" class="mt-1" title="Back"><i class="bi bi-arrow-left"></i></a>
        <h5 class="ms-2 text-primary">Daily Attendance</h5>
    </div>
    <hr>


    <div class="mt-3 container">
        <div class="row row-cols-1 row-cols-md-2 g-4">
            <div class="col">
                <form action="" method="POST">
                    <input type="hidden" class="form-control" name="sl_no" id="sl_no" value="">
                    <div class="row mb-3">
                        <div class="col"><input class="form-check-input me-2" type="checkbox" value="">All Select</div>
                    </div>
                    <div class="row">
                        <div class="col-4">Date :</div>
                        <div class="col-6" id="update_name"><input type="date" class="form-control mb-2" max="<?php echo date('Y-m-d') ?>" name="view_name" id="view_name" value="<?php echo date('Y-m-d') ?>"></div>
                    </div>
                    <div class="row">
                        <div class="col-4"> <input class="form-check-input me-2" type="checkbox" value="">In Time :</div>
                        <div class="col-6" id="update_emp_id"><input type="time" class="form-control mb-2" name="InTime" id="InTime" value="<?php echo date('H:i'); ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4"><input class="form-check-input me-2" type="checkbox" value="">Out Time :</div>
                        <div class="col-6">
                            <input type="time" class="form-control mb-2" name="OutTime" id="OutTime" value="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">Project Name :</div>
                        <div class="col-6">
                            <select type="time" class="form-control mb-2" name="ProjectName" id="ProjectName" value="">
                                <option value="" selected>select project</option>
                                <option value="Deb Web App">Deb Web App</option>
                                <option value="Deb App">Deb App</option>
                                <option value="Others">Others</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mt-2">
                            <input type="submit" class="btn btn-sm btn-success form-control w-25" name="add_attendance" id="add_attendance" value="Save">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>