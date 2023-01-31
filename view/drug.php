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
                        <h4 class="card-title">LIST OF RECORDED MEDICINES</h4>
                        <?PHP
                        if($_SESSION["category"] == "Administrator"){
                        ?>
                        <a href="#add-drug" data-toggle="modal" class="btn btn-primary float-right">
                            <span class="btn-label">
                                <i class="fa fa-plus"></i>
                            </span> Add new
                        </a>
                        <?php } include('modal.php'); ?>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>NAME</th>
                                        <th>DESCRIPTION</th>
                                        <th>TERMS AND CONDITION</th>
                                        <th>PRICE</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $i = 0;
                                $ans = $database->getAll('drugs');
                                foreach ($ans as $key => $row) {
                                    $i++;
                                ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $row['name'] ?></td>
                                        <td><?= $row['description'] ?></td>
                                        <td><?= $row['terms_condition'] ?></td>
                                        <td><?= $row['price'] ?></td>

                                        <td align="center">
    <?PHP
    if($_SESSION["category"] == "Administrator"){
    ?>
    <a href="#edit-drug<?php echo $row['id']?>" data-toggle="modal">
        <span class="btn-label">
            <i class="fa fa-edit"></i>
        </span>
    </a>
    <a href="#delete-drug<?php echo $row['id']?>" data-toggle="modal">
        <span class="btn-label">
            <i class="fa fa-trash"></i>
        </span>
    </a>
    <?php include('modal-drug.php'); ?>
    <?php } ?>
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