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
        <!-- row -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">ORDER DETAILS</h4>
                        <div class="row m-b-30">
                            <div class="col-lg-12">
                                <div class="card border-warning">
                                    <div class="card-header"></div>
                                    <h6 class="card-title">DELIVERY LOCATION</h6>
                                    <div class="card-body">
                                        <?php
                                        $ans = $database->getAll('application WHERE id = "'.$_GET['id'].'"');
                                        foreach ($ans as $key => $row) {
                                        ?>
                                        <h5 class="card-title">Address</h5>
                                        <p class="card-text"><?= $row['address']?></p>
                                        <h5 class="card-title">City and Zip code</h5>
                                        <p class="card-text"><?= $row['city']."-".$row['zip_code']?></p>
                                    </div>
                                    <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                        <div class="basic-list-group">
                            <h6 class="card-title">Medicine DETAILS</h6>
                            <ul class="list-group">
                                <?php
                                $ans = $database->getAllWithColumn('d.name, d.description, d.price','drugs d, orders o, application a WHERE d.id = o.drug_id AND a.id = o.application_id AND application_id = "'.$_GET['id'].'"');
                                foreach ($ans as $key => $row) {
                                ?>
                                <li class="list-group-item"><b>Name:</b> <?= $row['name'].", <b>Decription:</b> ".$row['description'].", <b>Price:</b> ".$row['price']." Frw" ?></li>
                                <?php } ?>
                            </ul>
                        </div>
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