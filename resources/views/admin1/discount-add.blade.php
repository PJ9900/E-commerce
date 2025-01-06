<?php require_once('header.php'); ?>
<?php
$module_id = 7;

if(hasPermission($pdo, $user_id, $module_id)) {
    
} else {

    header('Location: permission_denied.php');
    exit;
}
?>
<?php

$error_message = "";
$success_message = "";

if(isset($_POST['submit'])) {
    $valid = 1;

    if(empty($_POST['amount'])) {
        $valid = 0;
        $error_message .= "You must add a minimum amount<br>";
    }

    if(empty($_POST['discount'])) {
        $valid = 0;
        $error_message .= "Discount cannot be empty<br>";
    }
    if(empty($_POST['start_date'])) {
        $valid = 0;
        $error_message .= "Start date cannot be empty<br>";
    }
    if(empty($_POST['end_date'])) {
        $valid = 0;
        $error_message .= "End date cannot be empty<br>";
    }

    if($valid == 1) {
        $amount = $_POST['amount'];
        $discount = $_POST['discount'];
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];
        $is_active = isset($_POST['is_active']) ? 1 : 0;

        $query = "INSERT INTO tbl_discount (amount, discount, start_date, end_date, is_active) VALUES (:amount, :discount, :start_date, :end_date, :is_active)";
        $stmt = $pdo->prepare($query);
        
        if ($stmt->execute([':amount' => $amount, ':discount' => $discount, ':start_date' => $start_date, ':end_date' => $end_date, ':is_active' => $is_active])) {
            $success_message = "Discount added successfully";
            header('Location: discount.php');
            exit;
        } else {
            $error_message = "An error occurred while updating the discount.";
        }
    }
}
?>

<section class="content">

    <div class="row">
        <div class="col-md-12">

            <?php if(!empty($error_message)): ?>
            <div class="callout callout-danger">
                <p><?php echo $error_message; ?></p>
            </div>
            <?php endif; ?>

            <?php if(!empty($success_message)): ?>
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
                                <input type="text" name="amount" id="amount" class="form-control" value="<?php echo isset($_POST['amount']) ? $_POST['amount'] : ''; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="discount" class="col-sm-3 control-label">Discount % <span>*</span></label>
                            <div class="col-sm-4">
                                <input type="text" name="discount" id="discount" class="form-control" value="<?php echo isset($_POST['discount']) ? $_POST['discount'] : ''; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="start_date" class="col-sm-3 control-label">Start Date <span>*</span></label>
                            <div class="col-sm-4">
                                <input type="date" name="start_date" id="start_date" class="form-control" value="<?php echo isset($_POST['start_date']) ? $_POST['start_date'] : ''; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="end_date" class="col-sm-3 control-label">End Date <span>*</span></label>
                            <div class="col-sm-4">
                                <input type="date" name="end_date" id="end_date" class="form-control" value="<?php echo isset($_POST['end_date']) ? $_POST['end_date'] : ''; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="is_active" class="col-sm-3 control-label">Is Active?</label>
                            <div class="col-sm-8">
                                <select name="is_active" class="form-control" style="width:auto;">
                                    <option value="0" <?php echo (isset($_POST['is_active']) && $_POST['is_active'] == 0) ? 'selected' : ''; ?>>No</option>
                                    <option value="1" <?php echo (isset($_POST['is_active']) && $_POST['is_active'] == 1) ? 'selected' : ''; ?>>Yes</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label"></label>
                            <div class="col-sm-6">
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
