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
			
			<form class="form-horizontal" action="{{route('banner.store')}}" method="post" enctype="multipart/form-data">
				@csrf
				<div class="box box-info">
					<div class="box-body">
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Select Page <span>*</span></label>
							<div class="col-sm-4">
								<select class="form-control" name="page_name">
                                    <option value="Home">Home</option>
                                    <option value="About">About Us</option>
                                    <option value="News">News & Blogs</option>
                                    <option value="Business">Business</option>
                                    <option value="Contact Us">Contact Us</option>    
                                </select>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Title <span>*</span></label>
							<div class="col-sm-4">
							<input type="text" class="form-control" name="title">
							</div>
						</div>
						{{-- <div class="form-group">
							<label for="" class="col-sm-2 control-label">URL <span>*</span></label>
							<div class="col-sm-4">
							<input type="text" class="form-control" name="url">
							</div>
						</div> --}}
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Select Banner Image <span>*</span></label>
							<div class="col-sm-4">
							<input type="file" class="form-control" name="image">
							</div>
						</div>
						{{-- <div class="form-group">
							<label for="" class="col-sm-2 control-label">Select Banner Image <span>*</span></label>
							<div class="col-sm-4">
							<input type="file" class="form-control" name="image">
							</div>
						</div> --}}
							<div class="form-group">
							<label for="" class="col-sm-2 control-label">Select Mobile Banner Image <span>*</span></label>
							<div class="col-sm-4">
							<input type="file" class="form-control" name="mimage">
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