@include('admin1.header')

<section class="content-header">
	<div class="content-header-left">
		<h1>View Products</h1>
	</div>
	<div class="content-header-right">
		<a href="{{route('banner.add')}}" class="btn btn-primary btn-sm">Add New</a>
	</div>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-info">
				<div class="box-body table-responsive">
					@if (Session::has('fail'))
					<div class="callout callout-danger">			
						<p>{{Session::get('fail')}}</p>
					</div>
					@endif
					@if (Session::has('success'))
					<div class="callout callout-success">			
						<p>{{Session::get('success')}}</p>
					</div>
					@endif
	
					<table id="example1" class="table table-bordered table-hover table-striped">
					<thead class="thead-dark">
							<tr>
								<th width="10">#</th>
								<th>Banner</th>
								<th>Mobile Banner</th>
								<th width="160">Page Name</th>
								<th width="80">Action</th>
							</tr>
						</thead>
						<tbody>
							@if ($banners->isEmpty())
							<tr><td colspan="6" class="text-center">No Banners</td></tr>	
							@else
							@foreach ($banners as $b)
								<tr>
									<td>{{$loop->iteration}}</td>
									<td style="width:82px;"><img src="{{ asset('storage/banner-images/' . $b->banners) }}" alt="{{$b->title}}" style="width:80px;"></td>
									<td style="width:82px;"><img src="{{ asset('storage/banner-images/' . $b->mbanner) }}" alt="{{$b->title}}" style="width:80px;"></td>
									<td>{{$b->page_name}}</td>
									<td>
									    <a href="{{route('banner.edit', ['id' => $b->id])}}" class=" btn-primary btn-xs">Edit</a>  																				
										<a href="{{route('banner.delete', ['id' => $b->id])}}" class="btn btn-danger btn-xs" data-href="{{route('banner.delete', ['id' => $b->id])}}" >Delete</a>  
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
                <a href="" class="btn btn-danger btn-ok">Delete</a>
            </div>
        </div>
    </div>
</div>
@include('admin1.footer')