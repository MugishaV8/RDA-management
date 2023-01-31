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
                        <h4 class="card-title">PAYMENT REPORTS</h4>
                        <a href="payment_pdf" target="_blank" class="link float-right" target="_blank">
                            <i class="far fa-file-pdf" style="color: tomato;"></i> Print PDF
                        </a>
                        <br><br>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>DATE</th>
                                        <th>NAME</th>
                                        <th>INSURANCE</th>
                                        <th>TOTAL CHARGES</th>
                                        <th>INSURANCE COVER</th>
                                        <th>CHARGES</th>
                                        <th>STATUS</th>
                                        <?PHP
                                        if($_SESSION["category"] == "Patient"){
                                        ?>
                                        <th>ACTION</th>
                                        <?php } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $i = 0;
                                if($_SESSION["category"] != "Patient"){
                                $ans = $database->getAllWithColumn('p.*, a.id AS app_id, a.updated_at, a.amount, a.application_code, dob, gender, u.names, a.address, zip_code, a.status AS statusAppl, a.discount, a.insurance AS assuranceco','patient p, users u, application a WHERE p.user_id = u.id AND  a.patient_id = p.user_id AND a.amount != "0"');
                                } else {
                                $ans = $database->getAllWithColumn('p.*, a.id AS app_id, a.updated_at, a.amount, a.application_code, dob, gender, u.names, a.address, zip_code, a.status AS statusAppl, a.discount, a.insurance AS assuranceco','patient p, users u, application a WHERE p.user_id = u.id AND  a.patient_id = p.user_id AND a.amount != "0" AND a.patient_id ="'.$_SESSION['id'].'"');
                                }
                                foreach ($ans as $key => $row) {
                                    $i++;
                                    $dateOfBirth = $row['dob'];
                                    $today = date("Y-m-d");
                                    $diff = date_diff(date_create($dateOfBirth), date_create($today));

                                    $charge = $diff->format('%y') < 25 ? 0 : 5000;
                                    $amountpay = $diff->format('%y') < 25 ? 0 : (($row['amount'] * $row['discount']) / 100);

                                ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $row['updated_at'] ?></td>
                                        <td><?= $row['names'] ?></td>
                                        <td><?= $row['assuranceco'] ?></td>
                                        <td><?= $row['amount']." FRW" ?></td>
                                        <td align="right"><?= ($row['amount'] - ($row['amount'] * $row['discount']) / 100)." FRW" ?></td>
                                        <td align="right"><?= $amountpay." FRW"; ?></td>
                                        <td><?= (($amountpay == 0) ? 'COVERED' : (($row['application_code'] == NULL) ? 'NOT PAID' : 'PAID')) ?></td>
                                        <?PHP
                                        if($_SESSION["category"] == "Patient"){
                                        ?>
                                        <td align="center">
                                            <?PHP
                                            if($amountpay != '0'){
                                            ?>
                                            <a href="../controller/pay?amount=<?php echo $amountpay?>&appId=<?php echo $row['app_id']?>">
                                                <span class="btn-label">
                                                    <i class="fa fa-credit-card"></i>
                                                </span>
                                            </a>
                                            <?php } ?>
                                        </td>
                                        <?php } ?>
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