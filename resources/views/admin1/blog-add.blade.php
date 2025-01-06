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
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

			<form class="form-horizontal" action="{{route('blog.store')}}" method="post" enctype="multipart/form-data">
				@csrf
				<div class="box box-info">
					<div class="box-body">
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Status <span>*</span></label>
							<div class="col-sm-4">
								<select name="status" class="form-control select2">
									    <option value="1">Active</option>
										<option value="0">Deactive</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Banner<span>*</span></label>
							<div class="col-sm-4">
							<input type="file" class="form-control" name="banner">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Title <span>*</span></label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="title">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Short Description <span>*</span></label>
							<div class="col-sm-4">
								<textarea type="text" class="form-control" rows="5" cols="30" name="short_description"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Description <span>*</span></label>
							<div class="col-sm-8">
								<textarea type="text" class="form-control" id="editor1" cols="30" rows="10"  name="description"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Slug<span>*</span></label>
							<div class="col-sm-4">
								<input type="text" class="form-control" required name="slug">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Image Alt <span>*</span></label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="image_alt">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Meta Title <span>*</span></label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="meta_title">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Meta Keyword <span>*</span></label>
							<div class="col-sm-4">
								<textarea type="text" class="form-control" rows="5" name="meta_keywords"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Meta Description <span>*</span></label>
							<div class="col-sm-4">
								<textarea type="text" class="form-control" rows="5" name="meta_description"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label"></label>
							<div class="col-sm-6">
								<button type="submit" class="btn btn-success pull-left" >Submit</button>
							</div>
						</div>
					</div>
				</div>

			</form>


		</div>
	</div>

</section>

@include('admin1.footer')