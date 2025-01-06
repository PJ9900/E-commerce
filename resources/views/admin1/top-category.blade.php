@include('admin1.header')


<section class="content-header">
	<div class="content-header-left">
		<h1>View Top Level Categories</h1>
	</div>
	<div class="content-header-right">
		<a href="{{route('category.add')}}" class="btn btn-primary btn-sm">Add New</a>
	</div>
</section>


<section class="content">

  <div class="row">
    <div class="col-md-12">

      <div class="box box-info">
        
        <div class="box-body table-responsive">
            @if (Session::has('fail'))
            <div class="callout callout-danger">
                <p>
                    {{Session::get('fail')}}
                </p>
            </div>                
            @endif
            @if (Session::has('success'))
            <div class="callout callout-success">
                <p>{{Session::get('success')}}</p>
            </div>                
            @endif
          <table id="example1" class="table table-bordered table-hover table-striped">
			<thead>
			    <tr>
			        <th>#</th>
			        <th>Top Category Name</th>
			        <th>Banner</th>
                    <th>Meta Description</th>
                    <th>Show on Menu</th>
			        <th>Action</th>
			    </tr>
			</thead>
            <tbody>
                @if ($categories->isEmpty())
                <tr>
                    <td colspan="4" class="text-center">No categories</td>
                </tr>
                @else
                @endif
                @foreach ($categories as $item)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->tcat_name}}</td>
                    <td style="width:82px;"><img src="{{ asset('storage/category-images/' . $item->banner) }}" alt="Product Image" width="70" ></td>
                    <td>{{$item->meta_description}}</td>
                    <td> {{ $item->show_on_menu == '1' ? 'Yes' : 'No' }}</td>
                    <td>
                        <a href="{{route('category.edit',['id' => $item->tcat_id])}}" class=" btn-primary btn-xs">Edit</a>
                        <a href="{{route('category.delete',['id' => $item->tcat_id])}}" class="btn-danger btn-xs" data-href="{{route('category.delete',['id' => $item->tcat_id])}}" data-toggle="modal" data-target="#confirm-delete">Delete</a>
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
                <p>Are you sure want to delete this item?</p>
                <p style="color:red;">Be careful! All products, mid level categories and end level categories under this top lelvel category will be deleted from all the tables like order table, payment table, size table, color table, rating table etc.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger btn-ok">Delete</a>
            </div>
        </div>
    </div>
</div>


@include('admin1.footer')