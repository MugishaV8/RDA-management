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

    <div class="container-fluid" align="center">
        <div class="row">
            <div class="col-md-12">
                <form action="#" id="step-form-horizontal" class="step-form-horizontal">
                    <div>
                        <h4>Medicine Details</h4>
                        <section>
                            <div class="row">
                                <div class="basic-form">
                                    <form method="POST">
                                        <div class="form-group">
                                            <?php
                                            $ans = $database->getAll('drugs');
                                            foreach ($ans as $key => $row) {
                                            ?>
                                            <div class="form-check mb-3">
                                                <label class="form-check-label">
                                                    <input type="checkbox" name="drugs[]" class="form-check-input" value="<?= $row['id'] ?>"><?= $row['name']." (".$row['description'].")"." ".$row['price']." FRW." ?></label>
                                            </div>
                                            <?php } ?>
                                        </div>
                                        <input type="submit" name="orders" value="Save">
                                    </form>
                                </div>
                            </div>
                        </section>
                        <h4>Descriptions</h4>
                        <section>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <textarea name="description" class="form-control" placeholder="more about your order" ></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input type="text" name="address" class="form-control" placeholder="Address" >
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" name="city" class="form-control" placeholder="City">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" name="zip_code" class="form-control" placeholder="ZIP Code">
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- <h4>Billing Details</h4>
                        <section>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="creditCard" placeholder="Credit Card Number">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="date" placeholder="Expiration Date">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="owner" placeholder="Credit Card Owner">
                                    </div>
                                </div>
                            </div>
                        </section> -->
                        <h4>Confirmation</h4>
                        <section>
                            <div class="row h-100">
                                <div class="col-12 h-100 d-flex flex-column justify-content-center align-items-center">
                                    <h2>Your application is well received. </h2>
                                    <p>We will procceed accordingly, Thank you.</p>
                                </div>
                            </div>
                        </section>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- #/ container -->
</div>
<!--**********************************
    Content body end
***********************************-->
 <?php include('footer.php'); ?>