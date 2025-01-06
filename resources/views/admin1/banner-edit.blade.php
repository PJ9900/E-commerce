@include('admin1.header')

<section class="content-header">
	<div class="content-header-left">
		<h1>Add Banners</h1>
	</div>
	<div class="content-header-right">
		<a href="{{route('banners')}}" class="btn btn-primary btn-sm">View All</a>
	</div>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			{{-- <div class="callout callout-danger">			
			<p>
			</p>
			</div>
			<div class="callout callout-success">			
			<p></p>
			</div> --}}
			<form class="form-horizontal" action="{{route('banner.update',['id' => $banner->id])}}" method="post" enctype="multipart/form-data">
				@csrf
				<div class="box box-info">
					<div class="box-body">
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Select Page <span>*</span></label>
							<div class="col-sm-4">
								<select class="form-control" name="page_name">
								<option value="Home" @php echo $banner->page_name == "Home" ? 'selected' : ''; @endphp >Home</option>
                                    <option value="About" @php echo $banner->page_name == "About" ? 'selected' : ''; @endphp >About Us</option>
                                    <option value="News" @php echo $banner->page_name == "News" ? 'selected' : ''; @endphp >News & Blogs</option>
                                    <option value="Business" @php echo $banner->page_name == "Business" ? 'selected' : ''; @endphp >Business</option>
                                    <option value="Contact Us" @php echo $banner->page_name == "Contact Us" ? 'selected' : ''; @endphp >Contact Us</option>                                 
                                </select>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Title <span>*</span></label>
							<div class="col-sm-4">
							<input type="text" class="form-control" name="title" value="{{$banner->title}}">
							</div>
						</div>
						{{-- <div class="form-group">
							<label for="" class="col-sm-2 control-label">URL <span>*</span></label>
							<div class="col-sm-4">
							<input type="text" class="form-control" name="url" value="">
							</div>
						</div> --}}
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Existing Banner</label>
							<div class="col-sm-9" style="padding-top:5px">
								<img src="{{ asset('storage/banner-images/' . $banner->banners) }}" alt=" banner" style="width:400px;">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Select Banner Image <span>*</span></label>
							<div class="col-sm-4">
							<input type="file" class="form-control" name="image">
							<input type="hidden" class="form-control" value="{{$banner->banners}}" name="oimage">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Existing Mobile Banner</label>
							<div class="col-sm-9" style="padding-top:5px">
								<img src="{{ asset('storage/banner-images/' . $banner->mbanner) }}" alt="Mobile banner" style="width:400px;">
							</div>
						</div>
							<div class="form-group">
							<label for="" class="col-sm-2 control-label">Select Mobile Banner Image <span>*</span></label>
							<div class="col-sm-4">
							<input type="file" class="form-control" name="mimage">
							<input type="hidden" class="form-control" value="{{$banner->mbanner}}" name="omimage">
							</div>
						</div>						
						
						<div class="form-group">
							<label for="" class="col-sm-2 control-label"></label>
							<div class="col-sm-6">
								<button type="submit" class="btn btn-success pull-left" name="form1">Submit</button>
							</div>
						</div>
					</div>
				</div>

			</form>


		</div>
	</div>

</section>

@include('admin1.footer')