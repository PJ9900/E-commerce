@include('admin1.header')

<section class="content-header">
	<div class="content-header-left">
		<h1>View Orders</h1>
	</div>
</section>


<section class="content">

  <div class="row">
    <div class="col-md-12">


      <div class="box box-info">
        
        <div class="box-body table-responsive">
            <form method="GET" action="">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control" placeholder="Search by product name or SKU" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <select name="limit" class="form-control" onchange="this.form.submit()">
                                        <option value="10" <?php echo isset($_GET['limit']) && $_GET['limit'] == 10 ? 'selected' : ''; ?>>10</option>
                                        <option value="20" <?php echo isset($_GET['limit']) && $_GET['limit'] == 20 ? 'selected' : ''; ?>>20</option>
                                        <option value="30" <?php echo isset($_GET['limit']) && $_GET['limit'] == 30 ? 'selected' : ''; ?>>30</option>
                                    </select>
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-primary">Show</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </form>
                      <br>
          <table id="example1" class="table table-bordered table-hover table-striped">
			<thead>
			    <tr>
			        <th>#</th>
                    <th>Customer</th>
                    <th>Address</th>
			        <th>Product Details</th>
                    <th>Payment Information</th>
                    <th>Paid Amount</th>
                    <th>Payment Status</th>
                    <th>Shipping Status</th>
			        <th>Action</th>
			    </tr>
			</thead>
            <tbody>
                @foreach ($order as $item)  
                <tr >
	                    <td>{{$loop->iteration}}</td>
	                    <td>
	                        
                            
                            <b>Name:</b> {{$item->billing_name}} <br>
                            <b>Email:</b>{{$item->billing_email}} <br>                            
                        	<b>Mobile :</b> <br>
                            <!--<a href="#" data-toggle="modal" data-target="#model-"class="btn btn-warning btn-xs" style="width:100%;margin-bottom:4px;">Send Message</a>-->
                            <div id="model-" class="modal fade" role="dialog">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title" style="font-weight: bold;">Send Message</h4>
										</div>
										<div class="modal-body" style="font-size: 14px">
											<form action="" method="post">
                                                <input type="hidden" name="cust_id" value="">
                                                <input type="hidden" name="payment_id" value="">
												<table class="table table-bordered">
													<tr>
														<td>Subject</td>
														<td>
                                                            <input type="text" name="subject_text" class="form-control" style="width: 100%;">
														</td>
													</tr>
                                                    <tr>
                                                        <td>Message</td>
                                                        <td>
                                                            <textarea name="message_text" class="form-control" cols="30" rows="10" style="width:100%;height: 200px;"></textarea>
                                                        </td>
                                                    </tr>
													<tr>
														<td></td>
														<td><input type="submit" value="Send Message" name="form1"></td>
													</tr>
												</table>
											</form>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										</div>
									</div>
								</div>
							</div>
                        </td>
                        <td>{{$item->billing_state}} {{$item->billing_pincode}}</td>
                        <td>
                        
                                <b>Product:</b> 
                                <br><b>SKU:</b> {{$item->sku}}
                                <br><b>Size:</b> {{$item->size}}
                                <br><b>Quantity:</b> {{$item->quantity}}
                                , <br><b>Unit Price:</b> {{$item->unit_price}}
                                <br><br>
                        </td>
                        <td>
                        	
                        		<b>Payment Method:</b> Online<br>
                        		<b>Date:</b>{{$item->OrderDate}}<br>
                        		<b>Transaction Id:</b> <br>
                        	
                        </td>
                        <td>INR {{$item->unit_price}}</td>
                        <td>

                            <br><br>
                                    <a href="order-change-status.php?id=&task=Completed" class="btn btn-success btn-xs" style="width:100%;margin-bottom:4px;">Mark Complete</a>
                                    
                        </td>
                        <td>
                            <br><br>
                                    <a href="shipping-change-status.php?id=&task=Completed" class="btn btn-warning btn-xs" style="width:100%;margin-bottom:4px;">Mark Complete</a>
                                                              
                        </td>
	                    <td>
	                        <a href="#" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#order-edit" onclick="order_update(this)" data-id="" style="width:100%;">Edit</a>
                            <a href="#" class="btn btn-danger btn-xs" data-href="order-delete.php?id=" data-toggle="modal" data-target="#confirm-delete" style="width:100%;">Delete</a>
	                    </td>
	                </tr>
                    @endforeach
                </tbody>
          </table>
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
                Sure you want to delete this item?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger btn-ok">Delete</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="order-edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel1">Manage Order</h4>
            </div>
            <form method="POST" action="">
            <div class="modal-body">
                   <div class="order-update"></div>
            </div>
             
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="submit" name="update" class="btn btn-success">Update</a>
            </div>
            </form>
        </div>
    </div>
</div>


@include('admin1.footer')
<script>
    function order_update(e) {
    var id = $(e).attr("data-id");
    var action="fetch_data";
    console.log(id);
    $.ajax({
        url: "order-manage",
        method: "POST",
        data: {
            action: action,
            payment_id: id,
        },
        success: function(data) {
            $('.order-update').html(data);
        }
    });
      
}
</script>