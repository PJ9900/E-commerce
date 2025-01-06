@include('admin1.header')

<section class="content-header">
	<div class="content-header-left">
		<h1>Add Blog</h1>
	</div>
	<div class="content-header-right">
		<a href="{{route('blogs')}}" class="btn btn-primary btn-sm">View All</a>
	</div>
</section>


<section class="content">

	<div class="row">
		<div class="col-md-12">

			@if ($errors->any())
			<div class="callout callout-danger">
			 <ul>
				@foreach ($errors->all() as $error)
				  <li>{{ $error }}</li>
				@endforeach
			 </ul>
			</div>
		 	@endif

			 @if (Session::has('fail'))
			 <div class="callout callout-danger">
				<p>{{Session::get('fail')}}</p>
		     </div>
			@endif

			<form class="form-horizontal" action="{{route('blog.update',['id' => $blog->id])}}" method="post" enctype="multipart/form-data">
				@csrf
				<div class="box box-info">
					<div class="box-body">
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Status<span>*</span></label>
							<div class="col-sm-4">
								<select name="status" class="form-control select2">
									    <option value="1" @php echo $blog->status == 1 ? 'selected' : ''; @endphp >Active</option>
										<option value="0" @php echo $blog->status == 0 ? 'selected' : ''; @endphp >Deactive</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Existing Image</label>
							<div class="col-sm-9" style="padding-top:5px">
								<img src="{{asset('storage/blog-images/'.$blog->banner)}}" alt="Blog Image" style="width:400px;">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Banner<span>*</span></label>
							<div class="col-sm-4">
							<input type="file" class="form-control" name="banner">
							<input type="hidden" class="form-control" value="{{$blog->banner}}" name="obanner">
							</div>
						</div>
						
						
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Title <span>*</span></label>
							<div class="col-sm-4">
								<input type="text" class="form-control" value="{{$blog->title}}"  name="title">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Short Description <span>*</span></label>
							<div class="col-sm-4">
								<textarea type="text" class="form-control" rows="5" cols="30" name="short_description">{{$blog->short_description}}</textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Description <span>*</span></label>
							<div class="col-sm-8">
								<textarea type="text" class="form-control" id="editor1" cols="30" rows="10"  name="description">{{$blog->description}}</textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Slug<span>*</span></label>
							<div class="col-sm-4">
								<input type="text" class="form-control" value="{{$blog->slug}}" required name="slug">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Image Alt<span>*</span></label>
							<div class="col-sm-4">
								<input type="text" class="form-control" value="{{$blog->image_alt}}" required name="image_alt">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Meta Title <span>*</span></label>
							<div class="col-sm-4">
								<input type="text" class="form-control" value="{{$blog->image_alt}}" name="meta_title">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Meta Keyword <span>*</span></label>
							<div class="col-sm-4">
								<textarea type="text" class="form-control" rows="5" name="meta_keywords">{{$blog->meta_keywords}}</textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Meta Description <span>*</span></label>
							<div class="col-sm-4">
								<textarea type="text" class="form-control" rows="5" name="meta_description">{{$blog->meta_description}}</textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label"></label>
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