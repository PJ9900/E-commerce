@include('admin1.header')

<section class="content-header">
    <div class="content-header-left">
        <h1>Edit Top Level Category</h1>
    </div>
    <div class="content-header-right">
        <a href="{{route('categories')}}" class="btn btn-primary btn-sm">View All</a>
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

            <div class="callout callout-danger">
                @if (Session::has('fail'))
                <p>{{Session::get('fail')}}</p>
                @endif
            </div>

            <form class="form-horizontal" action="{{route('category.update',['id' => $category->tcat_id])}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="box box-info">

                    <div class="box-body">
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Top Category Name <span>*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="tcat_name"
                                    value="{{$category->tcat_name}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Show on Menu? <span>*</span></label>
                            <div class="col-sm-4">
                                <select name="show_on_menu" class="form-control" style="width:auto;">
                                    <option value="1" @php echo $category->show_on_menu == 1 ? 'selected' : ''; @endphp >Yes</option>
                                    <option value="0" @php echo $category->show_on_menu == 0 ? 'selected' : ''; @endphp >No</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="existing_banner" class="col-sm-3 control-label">Existing Banner <span>*</span></label>
                            <img src="{{ asset('storage/category-images/' . $category->banner) }}" width="100" alt="{{$category->tcat_name}}" srcset="">
							<input type="hidden"  class="form-control" name="existing_banner" value="{{$category->banner}}" id="existing_banner">
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Banner <span>*</span></label>
                            <div class="col-sm-4">
                                <input type="file" class="form-control" name="banner">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Slug <span>*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="slug" value="{{$category->slug}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Meta Title <span>*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="meta_title" value="{{$category->meta_title}}" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Meta Keyword <span>*</span></label>
                            <div class="col-sm-4">
                                <textarea type="text" class="form-control" rows="5" name="meta_keyword">{{$category->meta_keyword}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Meta Description <span>*</span></label>
                            <div class="col-sm-4">
                                <textarea type="text" class="form-control" rows="5" name="meta_description">{{$category->meta_description}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Content <span>*</span></label>
                            <div class="col-sm-4">
                                <textarea type="text" class="form-control" id="editor1" rows="5" name="content">{{$category->content}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label"></label>
                            <div class="col-sm-6">
                                <button type="submit" class="btn btn-success pull-left" name="form1">Update</button>
                            </div>
                        </div>
                    </div>

                </div>

            </form>



        </div>
    </div>

</section>

<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Delete Confirmation</h4>
            </div>
            <div class="modal-body">
                Are you sure want to delete this item?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger btn-ok">Delete</a>
            </div>
        </div>
    </div>
</div>

@include('admin1.footer')