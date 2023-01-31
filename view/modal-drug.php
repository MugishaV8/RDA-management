<!-- edit drugs --> 
<div class="modal fade" id="edit-drug<?php echo $row['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                   <!--  <label for="recipient-name" class="col-form-label">Discount:</label> -->
                    <input type="hidden" class="form-control" name="discount" id="discount" value="10">
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
<div class="modal fade" id="delete-drug<?php echo $row['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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