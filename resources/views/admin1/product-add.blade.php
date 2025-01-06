@include('admin1.header')

<section class="content-header">
	<div class="content-header-left">
		<h1>Add Product</h1>
	</div>
	<div class="content-header-right">
		<a href="{{route('products')}}" class="btn btn-primary btn-sm">View All</a>
	</div>
</section>


<section class="content">

	<div class="row">
		<div class="col-md-12">
        @if (Session::has('fail'))
        <div class="callout callout-danger">{{Session::get('fail')}}
           </div>
         @endif
	@if (Session::has('success'))
	<div class="callout callout-success">{{Session::get('success')}}
	</div> 
	@endif
			<form action="{{ route('product.store') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
					@csrf			
				<div class="box box-info">
					<div class="box-body">
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Top Level Category Name <span>*</span></label>
							<div class="col-sm-4">
								<select class="form-control select2 top-cat" name="category_id" id="category_id">
									<option value="">Select Category</option>
									@foreach ($category as $item)
									<option value="{{$item->tcat_id}}">{{$item->tcat_name}}</option>										
									@endforeach
								</select>
							</div>
						</div>						
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Product Name <span>*</span></label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="p_name" id="p_name" value="{{ old('p_name') }}">
							</div>
						</div>	

						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Product Slug <span>*</span></label>
							<div class="col-sm-4">
								<input type="text" name="slug" id="slug" class="form-control" value="{{ old('slug') }}" >
							</div>
						</div>	

						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Choose Size</label>
							<div class="col-sm-4">
								<select class="form-control" name="p_size" id="p_size">
									<option value="">Select Color</option>
										<option value="sm" >Small</option>
										<option value="m" >Medium</option>
										<option value="lg" >Large</option>
										<option value="xs" >Extra Small</option>
										<option value="xxl" >Extra Large</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Color</label>
							<div class="col-sm-4">
								<label for="p_color">Choose Color</label>
								<select class="form-control" name="p_color" id="p_color">
									<option value="">Select Color</option>
										<option value="Red" >Red</option>
										<option value="Black" >Black</option>
										<option value="White" >White</option>
										<option value="Orange" >Orange</option>
										<option value="Blue" >Blue</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Current Price <span>*</span><br><span style="font-size:10px;font-weight:normal;">(In Rs.)</span></label>
							<div class="col-sm-4">
								<input type="number" class="form-control" name="price" id="p_name" value="{{ old('price') }}">
							</div>
						</div>	
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">SKU <span>*</span></label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="p_sku" id="p_sku" value="{{ old('p_sku') }}">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Stock Quantity </label>
							<div class="col-sm-4">
								<input type="number" class="form-control" name="stock_quantity" id="stock_quantity" value="{{ old('stock_quantity') }}">
							</div>
						</div>						
						{{-- <div class="form-group">
							<label for="" class="col-sm-3 control-label">Other Photos</label>
							<div class="col-sm-4" style="padding-top:4px;">
								<table id="ProductTable" style="width:100%;">
			                        <tbody>
			                            <tr>
			                                <td>
			                                    <div class="upload-btn">
			                                        <input type="file" name="p_featured_photo[]" style="margin-bottom:5px;">
			                                    </div>
			                                </td>
			                                <td style="width:28px;"><a href="javascript:void()" class="Delete btn btn-danger btn-xs">X</a></td>
			                            </tr>
			                        </tbody>
			                    </table>
							</div>
							<div class="col-sm-2">
			                    <input type="button" id="btnAddNew" value="Add Item" style="margin-top: 5px;margin-bottom:10px;border:0;color: #fff;font-size: 14px;border-radius:3px;" class="btn btn-warning btn-xs">
			                </div>
						</div> --}}

						<div class="form-group">
							<label for="p_featured_photo" class="col-sm-3 control-label">Featured Photo</label>
							<input type="file" class="form-control" name="p_featured_photo" id="p_featured_photo">
						</div>

						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Short Description</label>
							<div class="col-sm-8">
								<textarea name="p_short_description" id="p_short_description" class="form-control" cols="30" rows="6" id="">{{ old('p_short_description') }}</textarea>
							</div>
						</div>	
						
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Long Description</label>
							<div class="col-sm-8">
								<textarea name="p_long_description" class="form-control" cols="30" rows="10" id="editor1">{{ old('p_long_description') }}</textarea>
							</div>
						</div>		
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Additional Information</label>
							<div class="col-sm-8">
								<textarea name="additional_info" class="form-control" cols="30" rows="10" id="editor2"></textarea>
							</div>
						</div>					
						<div class="form-group">
							<label for="p_is_featured" class="col-sm-3 control-label" >Featured</label>
							<div class="col-sm-8">
								<input type="checkbox" name="p_is_featured" id="p_is_featured" {{ old('p_is_featured') ? 'checked' : '' }}>
							</div>
						</div>
						<div class="form-group">
							<label for="p_is_active" class="col-sm-3 control-label">Is Active?</label>
							<div class="col-sm-8">
								<input type="checkbox" name="p_is_active" id="p_is_active" {{ old('p_is_active') ? 'checked' : '' }}>
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
<script>
    $("form.form-horizontal #name").on("keyup",function(){
        var val = $(this).val();
        var sanitizedInput = val.replace(/[^a-zA-Z0-9\-]/g, ''); // removes all non-alphanumeric and non-hyphen characters
        val = sanitizedInput; // updates input field value
        $("form.form-horizontal #slug").val(val);
        // console.log(val);
    })
    function validateForm() {
      var input =$("form.form-horizontal #slug").val();
      $("form.form-horizontal #slug").val(input.replace(/[^a-zA-Z0-9\-]/g, ''));
    }
</script>
