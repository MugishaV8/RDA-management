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
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-validation">
                            <form class="" action="#" method="post">
                                <?php
                                $i = 0;
                                $ans = $database->getAllWithColumn('p.*, u.names, u.telephone, u.email','patient p, users u WHERE p.user_id = u.id AND p.user_id = "'.$_GET['id'].'"');
                                foreach ($ans as $key => $row) {
                                    $i++;
                                ?>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-username">Names <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="val-username" name="names" value="<?= $row['names'] ?>" placeholder="Enter  patient name..">
                                        <input type="hidden" name="id" value="<?= $_GET['id']?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-username">National ID number/ Passport <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="val-username" name="national_id" value="<?= $row['national_id'] ?>" placeholder="Enter  National ID or Passport">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-username">Date of birth <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="date" class="form-control" id="val-username" name="dob" value="<?= $row['dob'] ?>" placeholder="Enter  date of birth..">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-skill">Gender<span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control" id="val-skill" name="gender">
                                            <option><?= $row['gender'] ?></option>
                                            <option>Male</option>
                                            <option>Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-username">Telephone <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="val-username" name="telephone" value="<?= $row['telephone'] ?>" placeholder="Enter  Telephone number..">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-username">Email <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="email" class="form-control" id="val-username" name="email" value="<?= $row['email'] ?>" placeholder="Enter  Email..">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-skill">Patient Class<span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control" id="val-skill" name="category">
                                            <option><?= $row['category'] ?></option>
                                            <option>Class 1</option>
                                            <option>Class 2</option>
                                            <option>Class 3</option>
                                            <option>Class 4</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-skill">Insurance <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control" id="val-skill" name="insurance">
                                            <?php echo insuranceById($row['insurance']); ?>
                                            <?php echo insurance(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-skill">Diabetic type <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control" id="val-skill" name="diabetic_type">
                                            <option><?= $row['diabetic_type'] ?></option>
                                            <option>TYPE 1</option>
                                            <option>TYPE 2</option>
                                            <option>TYPE 3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-skill">Address<span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                    <textarea class="form-control"  rows="3" name="address" id="address"><?= $row['address'] ?></textarea>
                                </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-8 ml-auto">
                                        <input type="reset" value="Clean" class="btn btn-secondary">
                                        <input type="submit" name="edit-patient" value="Save Changes" class="btn btn-primary">
                                    </div>
                                </div>
                            <?php } ?>
                            </form>
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