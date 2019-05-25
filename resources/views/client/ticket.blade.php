@extends('aceclientv.app')

@section('content_title')
	<strong> Ticket  </strong>
@endsection

@section('content')

<div class="inner_body">
	<!-- <a href="{{ action('TicketController@create') }}" class="pull-right">
		<button class="btn btn-primary btn-sm">+ Add New (Restfull)</button>
		<i class="ace-icon fa fa-plus-square-o bigger-230"></i>
	</a>-->
	<a href="#modal_add" id="add_ajax" role="button" class="btn btn-sm btn-primary pull-right" data-toggle="modal" style="margin:0 12px 0 0;">+ Add New </a>

	<table class="table table-striped">
		<thead>
			<tr>
				<th>ID</th>
				<th>Ticket Bus</th>
				<th>Ticket Price</th>
				<th>Ticket Departure Time</th>
				<th>Ticket Client</th>
				<th>Ticket Issuer</th>
				<th>Ticket Start Stand</th>
				<th>Ticket End Stand</th>
				<th>Ticket Description</th>
				<th>Created At</th>
				<th>Updated At</th>
				<th colspan="2">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php $count=1; ?>
			@foreach($tickets as $row)

			<tr data-info="{'dd':'ddd'}">
				<td>{{ $count }}.</td>
				<td>{{$row['ticket_bus']}}</td>
				<td>{{$row['ticket_price']}}</td>
				<td>{{$row['ticket_deperture_time']}}</td>
				<td>{{$row['ticket_client']}}</td>
				<td>{{$row['ticket_issuer']}}</td>
				<td>{{$row['ticket_start_stand']}}</td>
				<td>{{$row['ticket_dest_stand']}}</td>
				<td>{{$row['ticket_description']}}</td>
				<td>{{$row['created_at']}}</td>
				<td>{{$row['updated_at']}}</td>
				<td style="display: inline-flex;">
					<a href="#my-modal" id="edit_ajax" role="button" class="btn btn-xs btn-primary pull-left" data-toggle="modal" data-actions="{{ action('TicketController@update', ['ticket_id'=>$row['ticket_id']]) }}" data-info="{{ json_encode($row) }}" style="margin:0 12px 0 0;">Edit </a>

		        	<form action="{{action('TicketController@destroy', ['ticket_id'=>$row['ticket_id']])}}" method="post" id="delete_form">
		        		{{csrf_field()}}
		        		<input name="_method" type="hidden" value="DELETE" />
						<input name="jsidentify" type="hidden" value="{{ $row['id'] }}" />						
		        		<button class="btn btn-xs btn-danger" type="submit">Delete</button>
		        	</form>
		        </td>
			</tr>
			<?php $count++; ?>
			@endforeach
		</tbody>
	</table>
	<div class="pull-right"> {{ $tickets->links() }} </div>
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
						<label for="ticket_bus" class="col-sm-2 col-form-label col-form-label-lg">Ticket Bus</label>
						<div class="col-sm-10">
							<select class="form-control" id="ticket_bus" name="ticket_bus" >
								@foreach ($buses as  $value)
									<option data-info="{{json_encode($value)}}" value="{{$value->bus_id}}">{{$value->bus_name}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="ticket_price" class="col-sm-2 col-form-label col-form-label-lg">Ticket Price</label>
						<div class="col-sm-10">
							<input type="text" class="form-control form-control-lg" id="ticket_price" placeholder="ticket_price" name="ticket_price" value="" autofocus="1">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label col-form-label-lg">Ticket Departure Time</label>
						<div class="col-sm-10">
							<div class="input-group">
								<input readonly id="ticket_deperture_time" name="ticket_deperture_time" type="text" class="form-control date-timepicker1" />
								<span class="input-group-addon">
									<i class="fa fa-clock-o bigger-110"></i>
								</span>
							</div>
						</div>						
					</div>
					<div class="form-group row">
						<label for="ticket_client" class="col-sm-2 col-form-label col-form-label-lg">Ticket Client</label>
						<div class="col-sm-10">
							<select class="form-control" id="ticket_client" name="ticket_client" >
								@foreach ($users as  $value)
									<option data-info="{{json_encode($value)}}" value="{{$value->id}}">{{$value->name}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="ticket_start_stand" class="col-sm-2 col-form-label col-form-label-lg">Ticket Start Stand</label>
						<div class="col-sm-10">
							<select class="form-control" id="ticket_start_stand" name="ticket_start_stand" >
								<option value="rangpur">Rangpur</option>
								<option value="dhaka">Dhaka</option>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="ticket_dest_stand" class="col-sm-2 col-form-label col-form-label-lg">Ticket Dest Stand</label>
						<div class="col-sm-10">
							<select class="form-control" id="ticket_dest_stand" name="ticket_dest_stand" >
								<option value="rangpur">Rangpur</option>
								<option value="dhaka">Dhaka</option>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="ticket_description" class="col-sm-2 col-form-label col-form-label-sm">Ticket Description</label>
						<div class="col-sm-10">
							<textarea id="ticket_description" name="ticket_description" rows="8" cols="50"></textarea>
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
				<form id="add_form" method="post" class="form-horizontal" action="{{url('tickets')}}">
					<div class="form-group row">
						{{csrf_field()}}
						<label for="ticket_bus" class="col-sm-2 col-form-label col-form-label-lg">Ticket Bus</label>
						<div class="col-sm-10">
							<select class="form-control" id="ticket_bus_add" name="ticket_bus" >
								@foreach ($buses as  $value)
									<option data-info="{{json_encode($value)}}" value="{{$value->bus_id}}">{{$value->bus_name}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="ticket_price" class="col-sm-2 col-form-label col-form-label-lg">Ticket Price</label>
						<div class="col-sm-10">
							<input type="text" class="form-control form-control-lg" id="ticket_price_add" placeholder="ticket_price" name="ticket_price" value="" autofocus="1">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label col-form-label-lg">Ticket Departure Time</label>
						<div class="col-sm-10">
							<div class="input-group">
								<input readonly id="ticket_deperture_time" name="ticket_deperture_time" type="text" class="form-control date-timepicker1" />
								<span class="input-group-addon">
									<i class="fa fa-clock-o bigger-110"></i>
								</span>
							</div>
						</div>						
					</div>
					<div class="form-group row">
						<label for="ticket_client" class="col-sm-2 col-form-label col-form-label-lg">Ticket Client</label>
						<div class="col-sm-10">
							<select class="form-control" id="ticket_client_add" name="ticket_client" >
								@foreach ($users as  $value)
									<option data-info="{{json_encode($value)}}" value="{{$value->id}}">{{$value->name}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="ticket_start_stand" class="col-sm-2 col-form-label col-form-label-lg">Ticket Start Stand</label>
						<div class="col-sm-10">
							<select class="form-control" id="ticket_start_stand_add" name="ticket_start_stand" >
								<option value="rangpur">Rangpur</option>
								<option value="dhaka">Dhaka</option>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="ticket_dest_stand" class="col-sm-2 col-form-label col-form-label-lg">Ticket Dest Stand</label>
						<div class="col-sm-10">
							<select class="form-control" id="ticket_dest_stand_add" name="ticket_dest_stand" >
								<option value="rangpur">Rangpur</option>
								<option value="dhaka">Dhaka</option>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="ticket_description" class="col-sm-2 col-form-label col-form-label-sm">Ticket Description</label>
						<div class="col-sm-10">
							<textarea id="ticket_description_add" name="ticket_description" rows="8" cols="50"></textarea>
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
function load_ticket_price() {
	var bus = $('#ticket_bus_add option:selected').data('info');
	var bus_price = bus.cat_price;
	$('#ticket_price_add').val(bus_price)
}
load_ticket_price();
function change_destination() {
	if($('#ticket_start_stand_add').val() == 'rangpur')
		$('#ticket_dest_stand_add').val('dhaka');
	else $('#ticket_dest_stand_add').val('rangpur');
}
change_destination();
function change_start_stand() {
	if($('#ticket_dest_stand_add').val() == 'rangpur')
	
		$('#ticket_start_stand_add').val('dhaka');
	else $('#ticket_start_stand_add').val('rangpur');
}
change_start_stand();
function change_destination_edit() {
	if($('#ticket_start_stand').val() == 'rangpur')
		$('#ticket_dest_stand').val('dhaka');
	else $('#ticket_dest_stand').val('rangpur');
}
change_destination_edit();
function change_start_stand_edit() {
	if($('#ticket_dest_stand').val() == 'rangpur')
	
		$('#ticket_start_stand').val('dhaka');
	else $('#ticket_start_stand').val('rangpur');
}
change_start_stand_edit();

$(document).ready(function() {	
	$('#ticket_bus_add').change(function(event) {
		load_ticket_price();
	});
	$('#ticket_start_stand_add').change(function(event) {
		change_destination();
	});
	$('#ticket_dest_stand_add').change(function(event) {
		change_start_stand();
	});
	$('#ticket_start_stand').change(function(event) {
		change_destination_edit();
	});
	$('#ticket_dest_stand').change(function(event) {
		change_start_stand_edit();
	});

	$('body').on('click', '#edit_ajax', function() {
	
		var data = $(this).data('info');
		$('#ticket_bus').val(data.ticket_bus);
		$('#ticket_price').val(data.ticket_price);
		$('#ticket_deperture_time').val(data.ticket_deperture_time);
		$('#ticket_client').val(data.ticket_client);
		$('#ticket_start_stand').val(data.ticket_start_stand);
		$('#ticket_dest_stand').val(data.ticket_dest_stand);
		$('#ticket_description').val(data.ticket_description);

		var url  = $(this).data('actions');
		$('#edit_form').attr('action', url);
	});
	$('body').on('submit', '#add_form', function(e) {
		e.preventDefault();
	    var url = $('#add_form').attr('action');;
		var data_add = $('#add_form').serializeArray();
		console.log("data_add", data_add);

		//return;
		$.ajax({
		  	url: url,
		  	data: data_add,
		  	type: "POST",
		  	//dataType: "html",
		  	dataType: "json",
		  	success:function(res){

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

		//return;
		$.ajax({
		  	url: url,
		  	data: data_edit,
		  	type: "POST",
		  	//dataType: "html",
		  	dataType: "json",
		  	success:function(res){

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