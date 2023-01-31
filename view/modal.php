<!-- add new drugs -->
<div class="modal fade" id="add-drug" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Record new drug</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="" method="POST">
        <div class="modal-body">
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Drug:</label>
                    <input type="text" class="form-control" name="name" id="name">
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Description:</label>
                    <textarea class="form-control" name="description" id="description"></textarea>
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Terms and condition:</label>
                    <textarea class="form-control" name="terms_condition" id="terms_condition"></textarea>
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Price:</label>
                    <input type="text" class="form-control" name="price" id="price">
                </div>
                <div class="form-group">
                    <!-- <label for="recipient-name" class="col-form-label">Discount:</label> -->
                    <input type="hidden" class="form-control" name="discount" id="discount" value="10">
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <input type="submit" name="add-drug" value="Save" class="btn btn-primary"> 
        </div>
        </form>
    </div>
</div>
</div>

<!-- edit drugs --> 
<div class="modal fade" id="edit-drug<?php echo $row['id'].$row['name'].$row['description'].$row['terms_condition'].$row['price'].$row['discount'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Record new drug</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="" method="POST">
        <div class="modal-body" align="left">
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Drug:</label>
                    <input type="text" class="form-control" name="name" id="name" value="<?= $row['name'] ?>">
                    <input type="hidden" class="form-control" name="id" value="<?= $row['id'] ?>">
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Description:</label>
                    <textarea class="form-control" name="description" id="description"><?= $row['description'] ?></textarea>
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Terms and condition:</label>
                    <textarea class="form-control" name="terms_condition" id="terms_condition"><?= $row['terms_condition'] ?></textarea>
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Price:</label>
                    <input type="text" class="form-control" name="price" id="price" value="<?= $row['price'] ?>">
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Discount:</label>
                    <input type="text" class="form-control" name="discount" id="discount" value="<?= $row['discount'] ?>">
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <input type="submit" name="edit-drug" value="Save Changes" class="btn btn-primary"> 
        </div>
        </form>
    </div>
</div>
</div>

<!-- delete drugs -->
<div class="modal fade" id="delete-drug<?php echo $row['id'].$row['name'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="" method="POST">
        <div class="modal-body" align="left">
            <input type="hidden" name="id" value="<?= $row['id'] ?>">
            <p>Are you sure you want to delete this drug <?php echo "<b>".$row['name']."?</b>" ?></p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <input type="submit" name="delete-drug" value="Delete" class="btn btn-primary"> 
        </div>
        </form>
    </div>
</div>
</div>

<!-- delete patient -->
<div class="modal fade" id="delete-patient<?php echo $row['id'].$row['user_id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="" method="POST">
        <div class="modal-body" align="left">
            <input type="hidden" name="id" value="<?= $row['id'] ?>">
            <input type="hidden" name="user_id" value="<?= $row['user_id'] ?>">
            <p>Are you sure you want to delete patient <?php echo "<b>".$row['names']."?</b>" ?></p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <input type="submit" name="delete-patient" value="Delete" class="btn btn-primary"> 
        </div>
        </form>
    </div>
</div>
</div>

<!-- add new drugs -->
<div class="modal fade" id="order-drug" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Order Drugs</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="" method="POST">
        <div class="modal-body">
                <div class="form-group">
                    <label>Drugs (hold shift to select more than one)</label>
                    <select multiple="multiple" class="form-control" id="drugs" name="drugs[]">
                        <?php
                        $ans = $database->getAll('drugs');
                        foreach ($ans as $key => $row) {
                        ?>
                        <option value="<?= $row['id'] ?>"><?= $row['name']." (".$row['description'].")"." ".$row['price']." FRW." ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Description:</label>
                    <textarea class="form-control" name="description" id="description"></textarea>
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Address:</label>
                    <input type="text" name="address" class="form-control" placeholder="Address">
                </div>
                <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">City:</label>
                        <input type="text" name="city" class="form-control" placeholder="City">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Zip code:</label>
                        <input type="text" name="zip_code" class="form-control" placeholder="ZIP Code">
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <input type="submit" name="order-drug" value="Save" class="btn btn-primary"> 
        </div>
        </form>
    </div>
</div>
</div>

<!-- View order details -->
<div class="modal fade" id="#order-details<?php echo $row['app_id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">ORDER DETAILS</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="" method="POST">
        <div class="modal-body" align="left">
            <input type="hidden" name="id" value="<?= $row['id'] ?>">
            <p>Are you sure you want to delete patient</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <input type="submit" name="delete-patient" value="Delete" class="btn btn-primary"> 
        </div>
        </form>
    </div>
</div>
</div>

<!-- reject order -->
<div class="modal fade" id="reject-order<?php echo $row['app_id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="" method="POST">
        <div class="modal-body" align="left">
            <input type="hidden" name="id" value="<?= $row['id'] ?>">
            <p>Are you sure you want to reject this order from<?php echo "<b>".$row['names']."?</b>" ?></p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <input type="submit" name="reject-order" value="Delete" class="btn btn-primary"> 
        </div>
        </form>
    </div>
</div>
</div>

<!-- add new user -->
<div class="modal fade" id="add-users" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add new user</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="" method="POST">
        <div class="modal-body">
                <div class="form-group">
                    <label>Category</label>
                    <select class="form-control" id="category" name="category">
                        <option>--Select--</option>
                        <option>Administrator</option>
                        <option>Hospital</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Names:</label>
                    <input type="text" name="names" class="form-control" placeholder="Names">
                </div>
                <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Telephone:</label>
                        <input type="text" name="telephone" class="form-control" placeholder="Telephone number">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Email:</label>
                        <input type="email" name="email" class="form-control" placeholder="Email address">
                    </div>
                </div>
            </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Address:</label>
                    <textarea class="form-control" name="address" id="address"></textarea>
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <input type="submit" name="add-user" value="Save" class="btn btn-primary"> 
        </div>
        </form>
    </div>
</div>
</div>

<!-- edit a user -->
<div class="modal fade" id="edit-user<?php echo $row['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add new user</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="" method="POST">
        <div class="modal-body">
                <div class="form-group">
                    <label>Category</label>
                    <select class="form-control" id="category" name="category">
                        <option>--Select--</option>
                        <option>Administrator</option>
                        <option>Hospital</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Names:</label>
                    <input type="text" name="names" class="form-control" placeholder="Names">
                </div>
                <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Telephone:</label>
                        <input type="text" name="telephone" class="form-control" placeholder="Telephone number">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Email:</label>
                        <input type="email" name="email" class="form-control" placeholder="Email address">
                    </div>
                </div>
            </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Address:</label>
                    <textarea class="form-control" name="address" id="address"></textarea>
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <input type="submit" name=edit-user" value="Save" class="btn btn-primary"> 
        </div>
        </form>
    </div>
</div>
</div>

<!-- delete patient -->
<div class="modal fade" id="delete-user<?php echo $row['id'].$row['names']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="" method="POST">
        <div class="modal-body" align="left">
            <input type="hidden" name="id" value="<?= $row['id'] ?>">
            <input type="hidden" name="user_id" value="<?= $row['id'] ?>">
            <p>Are you sure you want to delete a user</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <input type="submit" name="delete-user" value="Delete" class="btn btn-primary"> 
        </div>
        </form>
    </div>
</div>
</div>