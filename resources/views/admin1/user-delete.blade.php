<?php

$module_id = 1;

if(hasPermission($pdo, $user_id, $module_id)) {
    
} else {

    header('Location: permission_denied.php');
    exit;
}


require_once('header.php');

if(isset($_GET['id'])) {
    $user_id = $_GET['id'];

    // Delete user
    $stmt = $pdo->prepare("DELETE FROM tbl_user WHERE id=?");
    $stmt->execute([$user_id]);

    // Also delete user's permissions
    $stmt = $pdo->prepare("DELETE FROM tbl_permissions WHERE user_id=?");
    $stmt->execute([$user_id]);

    // Redirect after deletion
    header('Location: user.php');
    exit;
} else {
    header('Location: user.php');
    exit;
}
?>
