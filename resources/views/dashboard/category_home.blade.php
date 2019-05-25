@extends('aceadminv.app')

@section('content_title')
	<strong> Category  </strong>
@endsection

@section('content')

<div class="inner_body">
	<!-- <a href="{{ action('CategoryController@create') }}" class="pull-right">
		<button class="btn btn-primary btn-sm">+ Add New (Restfull)</button>
		<i class="ace-icon fa fa-plus-square-o bigger-230"></i>
	</a>-->
	<a href="#modal_add" id="add_ajax" role="button" class="btn btn-sm btn-primary pull-right" data-toggle="modal" style="margin:0 12px 0 0;">+ Add New </a>

	<table class="table table-striped">
		<thead>
			<tr>
				<th>ID</th>
				<th>Title</th>
				<!-- <th>Price</th> -->
				<th>Description</th>
				<th>Created At</th>
				<th>Updated At</th>
				<th colspan="2">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php $count=1; ?>
			@foreach($categories as $row)

			<tr data-info="{'dd':'ddd'}">
				<td>{{ $count }}</td>
				<td>{{$row['cat_name']}}</td>
				<!-- <td>{{$row['cat_price']}}</td> -->
				<td>{{$row['cat_description']}}</td>
				<td>{{$row['created_at']}}</td>
				<td>{{$row['updated_at']}}</td>
				<td style="display: inline-flex;">
					<!-- <a href="{{action('CategoryController@edit', $row['id'])}}" class="btn btn-xs btn-primary pull-left" style="margin:0 12px 0 0;">  Edit  </a> -->

					<a href="#my-modal" id="edit_ajax" role="button" class="btn btn-xs btn-primary pull-left" data-toggle="modal" data-actions="{{ action('CategoryController@update', $row['id']) }}" data-info="<?php echo htmlentities(json_encode($row)); ?>" style="margin:0 12px 0 0;">Edit </a>

		        	<form action="{{action('CategoryController@destroy', $row['id'])}}" method="post" id="delete_form">
		        		{{csrf_field()}}
		        		<input name="_method" type="hidden" value="DELETE" />
						<input name="jsidentify" type="hidden" value="<?php echo $row['id']; ?>" />						
		        		<button class="btn btn-xs btn-danger" type="submit">Delete</button>
		        	</form>
		        </td>
			</tr>
			<?php $count++; ?>
			@endforeach
		</tbody>
	</table>
	<div class="pull-right"> {{ $categories->links() }} </div>
</div>

<div id="my-modal" class="modal fade" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="smaller lighter blue no-margin">Edit Data</h3>
			</div>

			<div class="modal-body">
				<div id="error_msg_edit" style="color: red; font-size: 14px;padding: 0 0 0 20px;"></div>
				<form method="post" action="" id="edit_form">
					<div class="form-group row">
						{{csrf_field()}}
						<input name="_method" type="hidden" value="PATCH">
						<label for="cat_name" class="col-sm-2 col-form-label col-form-label-lg">Category Name</label>
						<div class="col-sm-10">
							<input type="text" class="form-control form-control-lg" id="cat_name" placeholder="cat_name" name="cat_name" value="" autofocus="1">
						</div>
					</div>
					<div class="form-group row" style="display: none;">
						<label for="cat_price" class="col-sm-2 col-form-label col-form-label-lg">Category Price</label>
						<div class="col-sm-10">
							<input type="text" class="form-control form-control-lg" id="cat_price" placeholder="cat_price" name="cat_price" value="1" autofocus="1">
						</div>
					</div>
					<div class="form-group row">
						<label for="cat_description" class="col-sm-2 col-form-label col-form-label-sm">Category Description</label>
						<div class="col-sm-10">
							<textarea id="cat_description" name="cat_description" rows="8" cols="50"></textarea>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-2"></div>
						<button type="submit" class="btn btn-primary">Update</button>
					</div>
				</form>
			</div>

			<div class="modal-footer">
				<button class="btn btn-sm btn-danger pull-right" data-dismiss="modal">
					<i class="ace-icon fa fa-times"></i>
					Close
				</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>
<div id="modal_add" class="modal fade" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="smaller lighter blue no-margin">Add New</h3>
			</div>

			<div class="modal-body">
				<div id="error_msg_add" style="color: red; font-size: 14px;padding: 0 0 0 20px;"></div>
				<form id="add_form" method="post" class="form-horizontal" action="{{url('admin/categories')}}">
					<div class="form-group">
						{{csrf_field()}}
						<label for="cat_name_add" class="col-sm-2 col-form-label col-form-label-lg control-label">Category Name:</label>
						<div class="col-sm-9">
							<input type="text" class="form-control form-control-lg" id="cat_name_add" placeholder="title" name="cat_name">
						</div>
					</div>
					<div class="form-group" style="display: none;">
						<label for="cat_price_add" class="col-sm-2 col-form-label col-form-label-lg control-label">Category Price:</label>
						<div class="col-sm-9">
							<input type="text" class="form-control form-control-lg" id="cat_price_add" placeholder="title" value="1" name="cat_price">
						</div>
					</div>
					<div class="form-group">
						<label for="smFormGroupInput" class="col-sm-2 col-form-label col-form-label-sm control-label">Category Description:</label>
						<div class="col-sm-8">
							<textarea name="cat_description" rows="8" cols="50"></textarea>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-2"></div>
						<input type="submit" class="btn btn-primary" value="      Save      " />
					</div>
				</form>
			</div>

			<div class="modal-footer">
				<button class="btn btn-sm btn-danger pull-right" data-dismiss="modal">
					<i class="ace-icon fa fa-times"></i>
					Close
				</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>

<script type="text/javascript">
function printError (msg) {
	$("#error_msg").html("");
	$("#error_msg").show();
	var str ="<ul>";
	$.each( msg, function( key, value ) {
		str += '<li>'+value+'</li>';
	});
	str += "</ul>";
	return str;	
}

$(document).ready(function() {	
//console.log(msg);

	$('body').on('click', '#edit_ajax', function() {
	
		var data = $(this).data('info');
		$('#cat_name').val(data.cat_name);
		$('#cat_price').val(data.cat_price);
		$('#cat_description').val(data.cat_description);

		var url  = $(this).data('actions');
		$('#edit_form').attr('action', url);
	});
	$('body').on('submit', '#add_form', function(e) {
		e.preventDefault();
	    var url = $('#add_form').attr('action');;
		var data_add = $('#add_form').serializeArray();
		console.log(data_add);console.log(url);
		//return;
		$.ajax({
		  	url: url,
		  	data: data_add,
		  	type: "POST",
		  	//dataType: "html",
		  	dataType: "json",
		  	success:function(res){
		  		console.log(res);
		  		if(!($.isEmptyObject(res.errors) ) ) {
                	var str = printError(res.errors);
                	$("#error_msg_add").html(str);
                }
		  		if (res.status==true) {
		  			$('#modal_add').modal('toggle');
					alert(res.msg);
					location.reload();
				}else if (res.status==false) {

					alert(res.msg);
				}
				
			},
			error:function(XMLHttpRequest, TextStatus, ErrorThrown)
			{
				alert("JS Error: "+ TextStatus +' : '+ ErrorThrown);
			}

		});
	});
	$('body').on('submit', '#edit_form', function(e) {
		e.preventDefault();
	    var url = $('#edit_form').attr('action');;
		var data_edit = $('#edit_form').serializeArray();
		console.log(data_edit);console.log(url);
		//return;
		$.ajax({
		  	url: url,
		  	data: data_edit,
		  	type: "POST",
		  	//dataType: "html",
		  	dataType: "json",
		  	success:function(res){
		  		console.log(res);
		  		if(!($.isEmptyObject(res.errors) ) ) {
                	var str = printError(res.errors);
                	$("#error_msg_edit").html(str);
                }
		  		if (res.status==true) {
		  			$('#my-modal').modal('toggle');
					alert(res.msg);
					location.reload();
				}else if (res.status==false) {

					alert(res.msg);
				}
				
			},
			error:function(XMLHttpRequest, TextStatus, ErrorThrown)
			{
				alert("JS Error: "+ TextStatus +' : '+ ErrorThrown);
			}

		});
	});

	$('#modal_add').on('hidden.bs.modal', function () {
	    $('#error_msg_add').html("");
	});
	$('#my-modal').on('hidden.bs.modal', function () {
	    $('#error_msg_edit').html("");
	});

	$( "form#delete_form" ).on('submit', function( event ) {
	    event.preventDefault();
	    if (!(confirm('Are you sure to delete data!'))) {
	    	return false;
	    }
		var this_tr = $(this).closest('tr');

	    var data = $(this).serializeArray();
		var url = $(this).attr('action');
		$.ajax({
		  	url: url,
		  	data: data,
		  	type: "POST",
		  	//dataType: "html",
		  	dataType: "json",
		  	success:function(res){
		  		//console.log(res.msg);
		  		if (res.status==true) {
					//do something
					$(this_tr).remove();
				}
				alert(res.msg);
			},
			error:function(XMLHttpRequest, TextStatus, ErrorThrown)
			{
				alert("JS Error: "+ TextStatus +' : '+ ErrorThrown);
			}

		});
	});
	
});


</script>

@endsection