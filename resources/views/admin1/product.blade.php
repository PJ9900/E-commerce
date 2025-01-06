@include('admin1.header')

<section class="content-header">
	<div class="content-header-left">
		<h1>View Products</h1>
	</div>
	<div class="content-header-right">
		<a href="{{route('product.add')}}" class="btn btn-primary btn-sm">Add Product</a>
	</div>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-info">
				<div class="box-body table-responsive">
					@if (Session::has('fail'))
					<div class="callout callout-danger">{{Session::get('fail')}}
					   </div>
					 @endif
				@if (Session::has('success'))
				<div class="callout callout-success">{{Session::get('success')}}
				</div> 
				@endif
				@if ($errors->any())
                  <div>
                    <ul>
                         @foreach ($errors->all() as $error)
                            <li class="callout callout-danger">{{ $error }}</li>
                         @endforeach
                    </ul>
                  </div>
                @endif
					<table id="example1" class="table table-bordered table-hover table-striped">
					<thead class="thead-dark">
							<tr>
								<th width="10">#</th>
								<th>Photo</th>
								<th>Product Name</th>
								<th width="60">Price</th>
								<th>Description</th>
								<th>Quantity</th>
								<!--<th>Category</th>-->
								<th width="130">Action</th>
							</tr>
						</thead>
						<tbody>
							@if ($products->isEmpty())
							<tr>
								<td colspan="6" class="text-center"> No Products</td>
							</tr>
							@else
							@foreach ($products as $p)
								<tr>
									<td>{{$loop->iteration}}</td>
                                    <td style="width:82px;"><img src="{{ asset('storage/product-images/' . $p->p_featured_photo) }}" alt="Product Image" width="70" ></td>
									<td>{{$p->name}}</td>
									<td>INR{{$p->price}}</td>
									<td>{{$p->description}}</td>
									<td>{{$p->stock_quantity}}</td>								
									<td>
									    {{-- <a href="product-variant.php?id=<?php echo $row['p_id']; ?>" class="btn btn-primary btn-xs">Variant</a>										 --}}
										<a  href="{{route('product.edit', ['id' => $p->id])}}" class="btn btn-primary btn-xs">Edit</a>
										<a href="{{route('product.delete', ['id' => $p->id])}}" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#confirm-delete">Delete</a>  
									</td>
								</tr>				
								@endforeach		
								@endif
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
                <p style="color:red;">Be careful! This product will be deleted from the order table, payment table, size table, color table and rating table also.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				@if ($products->isEmpty())
				@else
                <a href="{{route('product.delete', ['id' => $p->id])}}" class="btn btn-danger btn-ok">Delete</a>
				@endif
            </div>
        </div>
    </div>
</div>

@include('admin1.footer')