<?php
include("inc/config.php");
$statement = $pdo->prepare("SELECT * FROM tbl_order WHERE oid=?");
        $statement->execute(array($_POST['oid']));
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
        foreach ($result as $row) {
            $aws=$row['oid'];
           
        }
?>

<input type="text" class="form-control" name="confirm-id" value="<?php echo $aws; ?>">
<div class="form-group">
    <label>Confirm</label>
   
        <select name="confirm" class="form-control">
            <option value="0">No</option>
            <option value="1">Yes</option>
            <option value="2">Pending</option>
        </select>
 
</div>