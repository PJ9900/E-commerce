@include('admin1.header')

<section class="content-header">
	<div class="content-header-left">
		<h1>Edit Product</h1>
	</div>
	<div class="content-header-right">
		<a href="{{route('products')}}" class="btn btn-primary btn-sm">View All</a>
	</div>
</section>

<section class="content">

	<div class="row">
		<div class="col-md-12">

			@if (Session::has('fail'))
			<div class="callout callout-danger">{{Session::get('fail')}}</div>				
			@endif
			@if(Session::has('success'))
			<div class="callout callout-success">{{Session::get('success')}}</div>
			@endif
			<form class="form-horizontal" action="{{route('product.update',['id' => $product->id ])}}" method="post" enctype="multipart/form-data">
                @csrf
				<div class="box box-info">
					<div class="box-body">
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Top Level Category Name <span>*</span></label>
							<div class="col-sm-4">
								<select class="form-control select2 top-cat" name="category_id" id="category_id">
									<option value="">Select Category</option>
									@foreach ($category as $item)
									<option value="{{$item->tcat_id}}" @php echo $product->category_id == $item->tcat_id ? 'selected' : ''; @endphp >{{$item->tcat_name}}</option>
									@endforeach
								</select>
							</div>
						</div>						
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Product Name <span>*</span></label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="p_name" id="p_name" value="{{$product->name}}" >
							</div>
						</div>	

						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Product Slug <span>*</span></label>
							<div class="col-sm-4">
								<input type="text" name="slug" id="slug" class="form-control" value="{{ $product->slug }}" >
							</div>
						</div>	

						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Choose Size</label>
							<div class="col-sm-4">
								<select class="form-control" name="p_size" id="p_size">
									<option value="">Select Size</option>
										<option value="sm" @php echo $product->size == 'sm' ? 'selected' : ''; @endphp >Small</option>
										<option value="m" @php echo $product->size == 'm' ? 'selected' : ''; @endphp >Medium</option>
										<option value="lg" @php echo $product->size == 'lg' ? 'selected' : ''; @endphp >Large</option>
										<option value="xs" @php echo $product->size == 'xs' ? 'selected' : ''; @endphp >Extra Small</option>
										<option value="xxl" @php echo $product->size == 'xxl' ? 'selected' : ''; @endphp >Extra Large</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Color</label>
							<div class="col-sm-4">
								<label for="p_color">Choose Color</label>
								<select class="form-control" name="p_color" id="p_color">
									<option value="">Select Color</option>
										<option value="Red" @php echo $product->color == 'Red' ? 'selected' : ''; @endphp >Red</option>
										<option value="Black" @php echo $product->color == 'Black' ? 'selected' : ''; @endphp >Black</option>
										<option value="White" @php echo $product->color == 'White' ? 'selected' : ''; @endphp >White</option>
										<option value="Orange" @php echo $product->color == 'Orange' ? 'selected' : ''; @endphp >Orange</option>
										<option value="Blue" @php echo $product->color == 'Blue' ? 'selected' : ''; @endphp >Blue</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Current Price <span>*</span><br><span style="font-size:10px;font-weight:normal;">(In Rs.)</span></label>
							<div class="col-sm-4">
								<input type="number" class="form-control" name="price" id="p_name" value="{{ $product->price }}" >
							</div>
						</div>	
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">SKU <span>*</span></label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="p_sku" id="p_sku" value="{{$product->p_sku}}" >
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Stock Quantity </label>
							<div class="col-sm-4">
								<input type="number" class="form-control" name="stock_quantity" id="stock_quantity" value="{{ $product->stock_quantity }}">
							</div>
						</div>	
						
						<div class="form-group">
							<label for="p_featured_photo">Existing Featured Photo</label>
							<img src="{{ asset('storage/product-images/' . $product->p_featured_photo) }}" width="100" alt="" srcset="">
							<input type="hidden"  class="form-control" name="existing_photo" value="{{$product->p_featured_photo}}" id="p_featured_photo">
						</div>
						
						<div class="form-group">
							<label for="p_featured_photo" class="col-sm-3 control-label">Featured Photo</label>
							<input type="file" class="form-control" name="p_featured_photo" id="p_featured_photo">
						</div>

						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Short Description</label>
							<div class="col-sm-8">
								<textarea name="p_short_description" id="p_short_description" class="form-control" cols="30" rows="6" id="">{{ $product->p_short_description }}</textarea>
							</div>
						</div>	
						
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Long Description</label>
							<div class="col-sm-8">
								<textarea name="p_long_description" class="form-control" cols="30" rows="10" id="editor1">{{ $product->p_long_description }}</textarea>
							</div>
						</div>		
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Additional Information</label>
							<div class="col-sm-8">
								<textarea name="additional_info" class="form-control" cols="30" rows="10" id="editor2">{{ $product->additional_info }}</textarea>
							</div>
						</div>					
						<div class="form-group">
							<label for="p_is_featured" class="col-sm-3 control-label" >Featured</label>
							<div class="col-sm-8">
								<input type="checkbox" name="p_is_featured" id="p_is_featured" {{ ($product->p_is_featured) ? 'checked' : '' }}>
							</div>
						</div>
						<div class="form-group">
							<label for="p_is_active" class="col-sm-3 control-label">Is Active?</label>
							<div class="col-sm-8">
								<input type="checkbox" name="p_is_active" id="p_is_active" {{ ($product->p_is_active) ? 'checked' : '' }}>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label"></label>
							<div class="col-sm-6">
								<button type="submit" class="btn btn-success pull-left" >Add Product</button>
							</div>
						</div>
					</div>
				</div>
			</form>


		</div>
	</div>

</section>

@include('admin1.footer')