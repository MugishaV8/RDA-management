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
                        <h4 class="card-title">LIST OF USERS</h4>
                        <a href="#add-users" data-toggle="modal" class="btn btn-primary float-right">
                            <span class="btn-label">
                                <i class="fa fa-plus"></i>
                            </span> Add new
                        </a>
                        <?php  include('modal.php'); ?>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th> # </th>
                                        <th>Names</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Level</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $i = 0;
                                $ans = $database->getAll('users');
                                foreach ($ans as $key => $row) {
                                    $i++;
                                ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td><?= $row['names'] ?></td>
                                    <td>
                                    <?= 
                                    $row['username'] == "" ? "no account"
                                    :$row['username']
                                    ?>      
                                    </td>
                                    <td><?= $row['email'] ?></td>
                                    <td><?= $row['telephone'] ?></td>
                                    <td><?= $row['category'] ?></td>
                                    <td><?= $row['status'] ?></td>
                                        <td align="center">
    <a href="#edit-user<?php echo $row['id']?>" data-toggle="modal">
        <span class="btn-label">
            <i class="fa fa-edit"></i>
        </span>
    </a>
    <a href="#delete-user<?php echo $row['id']?>" data-toggle="modal">
        <span class="btn-label">
            <i class="fa fa-trash"></i>
        </span>
    </a>
    <?php include('modal-user.php'); ?>
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