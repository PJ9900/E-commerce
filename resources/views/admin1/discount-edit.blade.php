<?php
require_once('header.php');


$module_id = 7;

if(hasPermission($pdo, $user_id, $module_id)) {
    
} else {

    header('Location: permission_denied.php');
    exit;
}


if (isset($_GET['id'])) {
    $eid = $_GET['id'];
    $statement = $pdo->prepare("SELECT * FROM tbl_discount WHERE id=?");
    $statement->execute(array($eid));
    $result = $statement->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        $amount = $result['amount'];
        $discount = $result['discount'];
        $is_active = $result['is_active'];
        $start_date = $result['start_date'];
        $end_date = $result['end_date'];
    }
} 

if (isset($_POST['submit'])) {
    $eid = $_POST['eid'];
    $amount = $_POST['amount'];
    $discount = $_POST['discount'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $is_active = $_POST['is_active'];

    $query = "UPDATE tbl_discount SET amount = :amount, discount = :discount, start_date = :start_date, end_date = :end_date, is_active = :is_active WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':amount', $amount);
    $stmt->bindParam(':discount', $discount);
    $stmt->bindParam(':start_date', $start_date);
    $stmt->bindParam(':end_date', $end_date);
    $stmt->bindParam(':is_active', $is_active);
    $stmt->bindParam(':id', $eid);
    $stmt->execute();
    
    
    if ($stmt->execute()) {
        header('Location: discount.php');
        exit;
    } else {
        $error_message = "An error occurred while updating the discount.";
    }
    
}
?>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <?php if (!empty($error_message)): ?>
            <div class="callout callout-danger">
                <p><?php echo $error_message; ?></p>
            </div>
            <?php endif; ?>

            <?php if (!empty($success_message)): ?>
            <div class="callout callout-success">
                <p><?php echo $success_message; ?></p>
            </div>
            <?php endif; ?>

            <form class="form-horizontal" name="myForm" onsubmit="return validateForm()" method="post" enctype="multipart/form-data">
                <div class="box box-info">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="amount" class="col-sm-3 control-label">Minimum Amount<span>*</span></label>
                            <div class="col-sm-4">
                                <input type="text" name="amount" id="amount" class="form-control" value="<?php echo $amount; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="discount" class="col-sm-3 control-label">Discount % <span>*</span></label>
                            <div class="col-sm-4">
                                <input type="text" name="discount" id="discount" class="form-control" value="<?php echo $discount; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="start_date" class="col-sm-3 control-label">Start Date <span>*</span></label>
                            <div class="col-sm-4">
                                <input type="date" name="start_date" id="start_date" class="form-control" value="<?php echo $start_date; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="end_date" class="col-sm-3 control-label">End Date <span>*</span></label>
                            <div class="col-sm-4">
                                <input type="date" name="end_date" id="end_date" class="form-control" value="<?php echo $end_date; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="is_active" class="col-sm-3 control-label">Is Active?</label>
                            <div class="col-sm-8">
                                <select name="is_active" class="form-control" style="width:auto;">
                                    <option value="0" <?php echo (isset($is_active) && $is_active == 0) ? 'selected' : ''; ?>>No</option>
                                    <option value="1" <?php echo (isset($is_active) && $is_active == 1) ? 'selected' : ''; ?>>Yes</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label"></label>
                            <div class="col-sm-6">
                                <input type="hidden" name="eid" value="<?php echo $eid; ?>">
                                <button type="submit" class="btn btn-success pull-left" name="submit">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<?php require_once('footer.php'); ?>

<script>
function validateForm() {
    var valid = true;
    var error_message = '';

    if (document.forms["myForm"]["amount"].value == "") {
        error_message += "You must add a minimum amount<br>";
        valid = false;
    }

    if (document.forms["myForm"]["discount"].value == "") {
        error_message += "Discount cannot be empty<br>";
        valid = false;
    }

    if (document.forms["myForm"]["start_date"].value == "") {
        error_message += "Start date cannot be empty<br>";
        valid = false;
    }

    if (document.forms["myForm"]["end_date"].value == "") {
        error_message += "End date cannot be empty<br>";
        valid = false;
    }

    if (!valid) {
        document.querySelector('.callout-danger').innerHTML = error_message;
        document.querySelector('.callout-danger').style.display = 'block';
    }

    return valid;
}
</script>
