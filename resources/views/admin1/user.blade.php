<?php
require_once('header.php');

$module_id = 1;

if(hasPermission($pdo, $user_id, $module_id)) {
    
} else {

    header('Location: permission_denied.php');
    exit;
}

$statement = $pdo->prepare("SELECT * FROM tbl_user");
$statement->execute();
$users = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<section class="content-header">
    <div class="content-header-left">
        <h1>View Users</h1>
    </div>
    <div class="content-header-right">
        <a href="user-add.php" class="btn btn-primary btn-sm">Add User</a>
    </div>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-body table-responsive">
                    <table id="example1" class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th width="10">#</th>
                                <th width="180">Name</th>
                                <th width="150">Email</th>
                                <th width="180">Phone</th>
                                <th>Role</th>
                                <th width="100"> Status</th>
                                <th width="100">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($users as $i => $user): ?>
                            <tr class="">
                                <td><?php echo $i + 1; ?></td>
                                <td><?php echo $user['username']; ?></td>
                                <td><?php echo $user['email']; ?></td>
                                <td><?php echo $user['phone']; ?></td>
                                <td><?php echo $user['role']; ?></td>
                                <td><?php echo $user['status'] == 'Active' ? 'Active' : 'Inactive'; ?></td>
                                <td>
                                    <a href="edit_user.php?id=<?php echo $user['id']; ?>" class="btn btn-success btn-xs">Edit</a>
                                    <a href="#" class="btn btn-danger btn-xs" data-href="user-delete.php?id=<?php echo $user['id']; ?>" data-toggle="modal" data-target="#confirm-delete">Delete</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Delete Confirmation</h4>
            </div>
            <div class="modal-body">
                <p>Are you sure want to delete this item?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger btn-ok">Delete</a>
            </div>
        </div>
    </div>
</div>

<?php require_once('footer.php'); ?>
