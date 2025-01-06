<?php
require_once('header.php');

$module_id = 1;

if(hasPermission($pdo, $user_id, $module_id)) {
    
} else {

    header('Location: permission_denied.php');
    exit;
}


// Redirect if no user ID is provided
if(!isset($_GET['id'])) {
    header('Location: user.php');
    exit;
}

$user_id = $_GET['id'];

// Fetch user details
$stmt = $pdo->prepare("SELECT * FROM tbl_user WHERE id=?");
$stmt->execute([$user_id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Check if user exists
if(!$user) {
    $error_message = "User not found.";
} else {
    // Fetch user's current permissions
    $stmt = $pdo->prepare("SELECT module_id FROM tbl_permissions WHERE user_id=?");
    $stmt->execute([$user_id]);
    $permissions = $stmt->fetchAll(PDO::FETCH_COLUMN);
}

// Process form submission
if(isset($_POST['form1'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = !empty($_POST['password']) ? md5($_POST['password']) : $user['password'];
    $role = $_POST['role'];
    $status = $_POST['p_is_active'] ? 'Active' : 'Inactive';

    // Validate required fields
    if(empty($username) || empty($email) || empty($phone) || empty($role)) {
        $error_message = "Please fill out all required fields.";
    } else {
        // Check if email already exists for another user
        $stmt = $pdo->prepare("SELECT * FROM tbl_user WHERE email=? AND id!=?");
        $stmt->execute([$email, $user_id]);
        if($stmt->rowCount() > 0) {
            $error_message = "Email already exists.";
        } else {
            // Update user details
            $stmt = $pdo->prepare("UPDATE tbl_user SET username=?, email=?, phone=?, password=?, role=?, status=? WHERE id=?");
            $result = $stmt->execute([$username, $email, $phone, $password, $role, $status, $user_id]);
            if($result) {
                $success_message = "User updated successfully.";

                // Update permissions
                $stmt = $pdo->prepare("DELETE FROM tbl_permissions WHERE user_id=?");
                $stmt->execute([$user_id]);

                if(isset($_POST['permission'])) {
                    foreach($_POST['permission'] as $module_id) {
                        $stmt = $pdo->prepare("INSERT INTO tbl_permissions (user_id, module_id) VALUES (?, ?)");
                        $stmt->execute([$user_id, $module_id]);
                    }
                }
            } else {
                $error_message = "There was an error updating the user.";
            }
        }
        header('Location: user.php');
            exit;
    }
}
?>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <?php if($error_message): ?>
            <div class="callout callout-danger">
                <p><?php echo $error_message; ?></p>
            </div>
            <?php endif; ?>
            <?php if($success_message): ?>
            <div class="callout callout-success">
                <p><?php echo $success_message; ?></p>
            </div>
            <?php endif; ?>

            <form class="form-horizontal" name="myForm" onsubmit="return validateForm()" method="post">
                <div class="form-group">
                    <label class="col-sm-3 control-label">User Name <span>*</span></label>
                    <div class="col-sm-4">
                        <input type="text" name="username" class="form-control" value="<?php echo htmlspecialchars($user['username']); ?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Email <span>*</span></label>
                    <div class="col-sm-4">
                        <input type="email" name="email" class="form-control" value="<?php echo htmlspecialchars($user['email']); ?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Phone <span>*</span></label>
                    <div class="col-sm-4">
                        <input type="text" name="phone" class="form-control" value="<?php echo htmlspecialchars($user['phone']); ?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Password</label>
                    <div class="col-sm-4">
                        <input type="password" name="password" class="form-control">
                        <span>Leave blank if you don't want to change the password.</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Role <span>*</span></label>
                    <div class="col-sm-4">
                        <select name="role" class="form-control" required>
                            <option value="user" <?php if($user['role'] == 'user') echo 'selected'; ?>>User</option>
                            <option value="admin" <?php if($user['role'] == 'admin') echo 'selected'; ?>>Admin</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Permissions</label>
                    <div class="col-sm-4">
                        <?php
                        $stmt = $pdo->prepare("SELECT * FROM tbl_modules");
                        $stmt->execute();
                        $modules = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        foreach($modules as $module) {
                            $checked = in_array($module['id'], $permissions) ? 'checked' : '';
                            echo '<input type="checkbox" id="permission'.$module['id'].'" name="permission[]" value="'.$module['id'].'" '.$checked.'>';
                            echo '<label for="permission'.$module['id'].'"> '.$module['module_name'].'</label><br>';
                        }
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Is Active?</label>
                    <div class="col-sm-8">
                        <select name="p_is_active" class="form-control" style="width:auto;">
                            <option value="0" <?php if($user['status'] == 'Inactive') echo 'selected'; ?>>No</option>
                            <option value="1" <?php if($user['status'] == 'Active') echo 'selected'; ?>>Yes</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-6">
                        <button type="submit" class="btn btn-success" name="form1">Update User</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<?php require_once('footer.php'); ?>
<script>
    function validateForm() {
        var inputs = document.forms["myForm"].getElementsByTagName("input");
        for(var i = 0; i < inputs.length; i++) {
            if(inputs[i].hasAttribute("required") && inputs[i].value === "") {
                alert("Please fill out all required fields.");
                return false;
            }
        }
        return true;
    }
</script>
