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
        <div class="modal-body" align="left">
                <div class="form-group">
                    <label>Category</label>
                    <select class="form-control" id="category" name="category">
                        <option><?= $row['category'] ?></option>
                        <option>Administrator</option>
                        <option>Hospital</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Names:</label>
                    <input type="text" name="names" value="<?= $row['names'] ?>" class="form-control" placeholder="Names">
                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                </div>
                <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Telephone:</label>
                        <input type="text" name="telephone" value="<?= $row['telephone'] ?>" class="form-control" placeholder="Telephone number">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Email:</label>
                        <input type="email" name="email" value="<?= $row['email'] ?>" class="form-control" placeholder="Email address">
                    </div>
                </div>
            </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Address:</label>
                    <textarea class="form-control" name="address" id="address"><?= $row['location'] ?></textarea>
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <input type="submit" name="edit-user" value="Save Changes" class="btn btn-primary"> 
        </div>
        </form>
    </div>
</div>
</div>

<!-- delete user -->
<div class="modal fade" id="delete-user<?php echo $row['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <p>Are you sure you want to delete user <?php echo "<b>".$row['names']."?</b>" ?></p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <input type="submit" name="delete-user" value="Delete" class="btn btn-primary"> 
        </div>
        </form>
    </div>
</div>
</div>