<?php require_once('header.php'); ?>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$module_id = 7;

if(hasPermission($pdo, $user_id, $module_id)) {
    
} else {

    header('Location: permission_denied.php');
    exit;
}
?>
<section class="content-header">
	<div class="content-header-left">
		<h1>View Discounts</h1>
	</div>
	<div class="content-header-right">
		<a href="discount-add.php" class="btn btn-primary btn-sm">Add Discount</a>
	</div>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-info">
				<div class="box-body table-responsive">
					<table id="example1" class="table table-bordered table-hover table-striped">
					<thead class="thead-dark">
							<tr>
								<th>#</th>
								<th>Amount</th>
								<th>Discount</th>
								<th>Status</th>
		    					<th>Added at</th>
								<th>Valid till</th>
								<th width="80">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i=0;
							$statement = $pdo->prepare("SELECT * FROM tbl_discount ORDER BY end_date DESC");
							$statement->execute();
							$result = $statement->fetchAll(PDO::FETCH_ASSOC);
							foreach ($result as $row) {
								$i++;
								?>
								<tr>
									<td><?php echo $i; ?></td>
									
									<td><?php echo $row['amount']; ?></td>
									
									<td><?php echo $row['discount']; ?></td>
									
									<td>
										<?php if($row['is_active'] == 1) {echo '<span class="badge badge-success" style="background-color:green;">Active</span>';} else {echo '<span class="badge badge-danger" style="background-color:red;">Inactive</span>';} ?>
									</td>
									
							        <td><?php echo $row['start_date']; ?></td>
							        <td><?php echo $row['end_date']; ?></td>
									<td>										
										<a href="discount-edit.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-xs">Edit</a>
										<a href="discount-delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-xs" >Delete</a>  
									</td>
								</tr>
								<?php
							}
							?>							
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>



<?php require_once('footer.php'); ?>