<?php include('header.php'); ?>
<!--**********************************
    Content body start
***********************************-->
<div class="content-body">
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">ORDERED LIST OF PATIENT</h4>
                        <?PHP
                        if($_SESSION["category"] == "Patient"){
                        ?>
                        <a href="#order-drug" data-toggle="modal" class="btn btn-primary float-right">
                            <span class="btn-label">
                                <i class="fa fa-plus"></i>
                            </span> Add new
                        </a>
                        <?php  } include('modal.php'); ?>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>DATE</th>
                                        <?PHP
                                        if($_SESSION["category"] != "Patient"){
                                        ?>
                                        <th>NAME</th>
                                        <th>AGE</th>
                                        <th>DIABETIC TYPE</th>
                                        <?php } ?>
                                        <th>INSURANCE</th>
                                        <th>CHARGES</th>
                                        <th>DELIVER LOCATION</th>
                                        <th>STATUS</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $i = 0;
                                if($_SESSION["category"] != "Patient"){
                                $ans = $database->getAllWithColumn('p.*, a.id AS app_id, a.created_at, dob, gender, u.names, a.address, zip_code, a.status AS statusAppl, a.discount, a.insurance AS assuranceco','patient p, users u, application a WHERE p.user_id = u.id AND  a.patient_id = p.user_id');
                                } else {
                                  $ans = $database->getAllWithColumn('p.*, a.id AS app_id, a.created_at, dob, gender, u.names, a.address, zip_code, a.status AS statusAppl, a.discount, a.insurance AS assuranceco','patient p, users u, application a WHERE p.user_id = u.id AND  a.patient_id = p.user_id AND a.patient_id ="'.$_SESSION['id'].'"');  
                                }
                                // $ans = $database->getAllWithColumn('p.*, u.names, u.telephone, delivery_location, a.status AS statusAppl','patient p, users u, application a WHERE p.user_id = u.id AND  a.patient_id = p.id');
                                foreach ($ans as $key => $row) {
                                    $i++;
                                    $dateOfBirth = $row['dob'];
                                    $today = date("Y-m-d");
                                    $diff = date_diff(date_create($dateOfBirth), date_create($today));

                                    $charge = $diff->format('%y') < 25 ? 0 : 5000;

                                ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $row['created_at'] ?></td>
                                        <?PHP
                                        if($_SESSION["category"] != "Patient"){
                                        ?>
                                        <td><?= $row['names'] ?></td>
                                        <td><?= $diff->format('%y') ?></td>
                                        <td><?= $row['diabetic_type'] ?></td>
                                        <?php } ?>
                                        <td><?= $row['assuranceco'] ?></td>
                                        <td><?= $row['discount']." %" ?></td>
                                        <td><?= $row['address']."-".$row['zip_code'] ?></td>
                                        <td><?= $row['statusAppl'] ?></td>
                                        <td align="center">
                                            <div class="list-group-item-figure">
                                                <div class="dropdown text-center">
                                                    <i class="fa fa-ellipsis-h btn-dropdown" data-toggle="dropdown"></i>
                                                    <div class="dropdown-arrow"></div>
                                                    <div class="dropdown-menu dropdown-menu-center">
                                                        <a href="order-detail?id=<?php echo $row['app_id']; ?>" class="dropdown-item">View Order Details</a>
                                                        <?PHP
                                                        if($_SESSION["category"] == "Administrator"){
                                                        ?>
                                                        <a href="order-approval?id=<?php echo $row['app_id']; ?>" class="dropdown-item">Approve Order Request</a>
                                                        <!-- <a href="#reject-order<?php echo $row['app_id']; ?>" data-toggle="modal" class="dropdown-item">Reject Order Request</a> -->
                                                        <?php } include('modal.php'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->
</div>
<!--**********************************
    Content body end 
***********************************-->
 <?php include('footer.php'); ?>