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
// Preventing the direct access of this page.
if(!isset($_REQUEST['id'])) {
	header('location: logout.php');
	exit;
} else {
	// Check the id is valid or not
	$statement = $pdo->prepare("DELETE  FROM tbl_discount WHERE id=?");
	$statement->execute(array($_REQUEST['id']));
	$total = $statement->rowCount();
	if( $total == 0 ) {
		header('location: logout.php');
		exit;
	}else{
    	header('location: discount.php');
		exit;
	}
}
?>
