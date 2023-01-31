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
                        <h4 class="card-title">LIST OF RECORDED MEDICINE</h4>

                        <a href="patient_pdf" target="_blank" class="link float-right" target="_blank">
                            <i class="far fa-file-pdf" style="color: tomato;"></i> Print PDF
                        </a>
                        <br><br>
                        <a href="record-patient" class="btn btn-primary float-right">
                            <span class="btn-label">
                                <i class="fa fa-plus"></i>
                            </span> Add new
                        </a>
                        <?php  include('modal.php'); ?>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>NAME</th>
                                        <th>NATIONAL ID</th>
                                        <th>GENDER</th>
                                        <th>DATE OF BIRTH</th>
                                        <th>TELEPHONE</th>
                                        <th>CATEGORY</th>
                                        <th>INSURANCE</th>
                                        <th>DIABETIC TYPE</th>
                                        <th>STATUS</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $i = 0;
                                $ans = $database->getAllWithColumn('p.*, u.names, i.insurance AS insuranceco, u.telephone, u.email','patient p, users u, insurance i WHERE p.user_id = u.id AND i.id = p.insurance');
                                foreach ($ans as $key => $row) {
                                    $i++;
                                ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $row['names'] ?></td>
                                        <td><?= $row['national_id'] ?></td>
                                        <td><?= $row['gender'] ?></td>
                                        <td><?= $row['dob'] ?></td>
                                        <td><?= $row['telephone'] ?></td>
                                        <td><?= $row['category'] ?></td>
                                        <td><?= $row['insuranceco'] ?></td>
                                        <td><?= $row['diabetic_type'] ?></td>
                                        <td><?= $row['status'] ?></td>
                                        <td align="center">
    <a href="modified-patient?id=<?php echo $row['user_id']?>">
        <span class="btn-label">
            <i class="fa fa-edit"></i>
        </span>
    </a>
    <a href="#delete-patient<?php echo $row['id'].$row['user_id']?>" data-toggle="modal">
        <span class="btn-label">
            <i class="fa fa-trash"></i>
        </span>
    </a>
    <?php include('modal.php'); ?>
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