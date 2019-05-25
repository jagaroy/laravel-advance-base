@extends('aceadminv.app')

@section('content_title')
	<strong> Store  </strong>
@endsection

@section('content')

<div class="inner_body">
	<!-- <a href="{{ action('StoreController@create') }}" class="pull-right">
		<button class="btn btn-primary btn-sm">+ Add New (Restfull)</button>
		<i class="ace-icon fa fa-plus-square-o bigger-230"></i>
	</a>-->
	<a href="#modal_add" id="add_ajax" role="button" class="btn btn-sm btn-primary pull-right" data-toggle="modal" style="margin:0 0 0 10px;">+ Add New </a>

	<div class="clearfix">
		<div class="pull-right tableTools-container"></div>
	</div>

	<table id="dynamic-table" class="table table-striped table-bordered table-hover" >
		<thead>
			<tr>
				<th>SL.</th>
				<th>ID</th>
				<th>Title</th>
				<th>Description</th>
				<th>Created At</th>
				<th>Updated At</th>
				<th colspan="2" width="10%">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php $counter=1;  ?>
			@foreach($stores as $row)
			<tr data-info="{'dd':'ddd'}">
				<td>{{$counter}}</td>
				<td>{{$row['store_id']}}</td>
				<td>{{$row['store_name']}}</td>
				<td>{{$row['store_desc']}}</td>
				<td>{{$row['created_at']}}</td>
				<td>{{$row['updated_at']}}</td>
				<td style="display: inline-flex;">
					<!-- <a href="{{action('StoreController@edit', $row['store_id'])}}" class="btn btn-xs btn-primary pull-left" style="margin:0 12px 0 0;">  Edit  </a> -->

					<a href="#my-modal" id="edit_ajax" role="button" class="btn btn-xs btn-primary pull-left" data-toggle="modal" data-actions="{{ action('StoreController@update', $row['store_id']) }}" data-info="<?php echo htmlentities(json_encode($row)); ?>" style="margin:0 12px 0 0;">Edit </a>

		        	<form action="{{action('StoreController@destroy', $row['store_id'])}}" method="post" id="delete_form">
		        		{{csrf_field()}}
		        		<input name="_method" type="hidden" value="DELETE" />
						<input name="jsidentify" type="hidden" value="<?php echo $row['store_id']; ?>" />						
		        		<button class="btn btn-xs btn-danger" type="submit">Delete</button>
		        	</form>
		        </td>
			</tr>
			<?php $counter++; ?> 
			@endforeach
		</tbody>
	</table>
	
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
						<label for="store_name" class="col-sm-2 col-form-label col-form-label-lg">Store Name</label>
						<div class="col-sm-10">
							<input type="text" class="form-control form-control-lg" id="store_name" placeholder="store_name" name="store_name" value="" autofocus="1">
						</div>
					</div>
					<div class="form-group row">
						<label for="store_desc" class="col-sm-2 col-form-label col-form-label-sm">Store Description</label>
						<div class="col-sm-10">
							<textarea id="store_desc" name="store_desc" rows="8" cols="50"></textarea>
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
				<form id="add_form" method="post" class="form-horizontal" action="{{url('stores')}}">
					<div class="form-group">
						{{csrf_field()}}
						<label for="store_name_add" class="col-sm-2 col-form-label col-form-label-lg control-label">Store Name:</label>
						<div class="col-sm-9">
							<input type="text" class="form-control form-control-lg" id="store_name_add" placeholder="title" name="store_name">
						</div>
					</div>
					<div class="form-group">
						<label for="smFormGroupInput" class="col-sm-2 col-form-label col-form-label-sm control-label">Store Description:</label>
						<div class="col-sm-8">
							<textarea name="store_desc" rows="8" cols="50"></textarea>
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
		$('#store_name').val(data.store_name);
		$('#store_desc').val(data.store_desc);

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

<!-- page specific plugin scripts eg tables -->
<script src="{{ url('/') }}/ace_assets/js/dataTables/jquery.dataTables.js"></script>
<script src="{{ url('/') }}/ace_assets/js/dataTables/jquery.dataTables.bootstrap.js"></script>
<script src="{{ url('/') }}/ace_assets/js/dataTables/extensions/TableTools/js/dataTables.tableTools.js"></script>
<script src="{{ url('/') }}/ace_assets/js/dataTables/extensions/ColVis/js/dataTables.colVis.js"></script>
<!--// page specific plugin scripts ends eg tables -->
<!-- inline scripts related to this page -->
<script type="text/javascript">
  jQuery(function($) {
    //initiate dataTables plugin
    var oTable1 = 
    $('#dynamic-table')
    //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
    .dataTable( {
      bAutoWidth: false,
      "aoColumns": [
        { "bSortable": false },
        null, null,null, null, null,
        { "bSortable": false }
      ],
      "aaSorting": [],
  
      //,
      //"sScrollY": "200px",
      //"bPaginate": false,
  
      //"sScrollX": "100%",
      //"sScrollXInner": "120%",
      //"bScrollCollapse": true,
      //Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
      //you may want to wrap the table inside a "div.dataTables_borderWrap" element
  
      //"iDisplayLength": 50
      } );
    //oTable1.fnAdjustColumnSizing();
  
  
    //TableTools settings
    TableTools.classes.container = "btn-group btn-overlap";
    TableTools.classes.print = {
      "body": "DTTT_Print",
      "info": "tableTools-alert gritter-item-wrapper gritter-info gritter-center white",
      "message": "tableTools-print-navbar"
    }
  
    //initiate TableTools extension
    var tableTools_obj = new $.fn.dataTable.TableTools( oTable1, {
      "sSwfPath": "{{ url('/') }}/ace_assets/js/dataTables/extensions/TableTools/swf/copy_csv_xls_pdf.swf", //in Ace demo assets will be replaced by correct assets path
      
      "sRowSelector": "td:not(:last-child)",
      "sRowSelect": "multi",
      "fnRowSelected": function(row) {
        //check checkbox when row is selected
        try { $(row).find('input[type=checkbox]').get(0).checked = true }
        catch(e) {}
      },
      "fnRowDeselected": function(row) {
        //uncheck checkbox
        try { $(row).find('input[type=checkbox]').get(0).checked = false }
        catch(e) {}
      },
  
      "sSelectedClass": "success",
          "aButtons": [
        {
          "sExtends": "copy",
          "sToolTip": "Copy to clipboard",
          "sButtonClass": "btn btn-white btn-primary btn-bold",
          "sButtonText": "<i class='fa fa-copy bigger-110 pink'></i>",
          "fnComplete": function() {
            this.fnInfo( '<h3 class="no-margin-top smaller">Table copied</h3>\
              <p>Copied '+(oTable1.fnSettings().fnRecordsTotal())+' row(s) to the clipboard.</p>',
              1500
            );
          }
        },
        
        {
          "sExtends": "csv",
          "sToolTip": "Export to CSV",
          "sButtonClass": "btn btn-white btn-primary  btn-bold",
          "sButtonText": "<i class='fa fa-file-excel-o bigger-110 green'></i>"
        },
        
        {
          "sExtends": "pdf",
          "sToolTip": "Export to PDF",
          "sButtonClass": "btn btn-white btn-primary  btn-bold",
          "sButtonText": "<i class='fa fa-file-pdf-o bigger-110 red'></i>"
        },
        
        {
          "sExtends": "print",
          "sToolTip": "Print view",
          "sButtonClass": "btn btn-white btn-primary  btn-bold",
          "sButtonText": "<i class='fa fa-print bigger-110 grey'></i>",
          
          "sMessage": "<div class='navbar navbar-default'><div class='navbar-header pull-left'><a class='navbar-brand' href='#'><small>Optional Navbar &amp; Text</small></a></div></div>",
          
          "sInfo": "<h3 class='no-margin-top'>Print view</h3>\
                <p>Please use your browser's print function to\
                print this table.\
                <br />Press <b>escape</b> when finished.</p>",
        }
          ]
      } );
    //we put a container before our table and append TableTools element to it
      $(tableTools_obj.fnContainer()).appendTo($('.tableTools-container'));
    
    //also add tooltips to table tools buttons
    //addding tooltips directly to "A" buttons results in buttons disappearing (weired! don't know why!)
    //so we add tooltips to the "DIV" child after it becomes inserted
    //flash objects inside table tools buttons are inserted with some delay (100ms) (for some reason)
    setTimeout(function() {
      $(tableTools_obj.fnContainer()).find('a.DTTT_button').each(function() {
        var div = $(this).find('> div');
        if(div.length > 0) div.tooltip({container: 'body'});
        else $(this).tooltip({container: 'body'});
      });
    }, 200);
    
    
    
    //ColVis extension
    var colvis = new $.fn.dataTable.ColVis( oTable1, {
      "buttonText": "<i class='fa fa-search'></i>",
      "aiExclude": [0, 6],
      "bShowAll": true,
      //"bRestore": true,
      "sAlign": "right",
      "fnLabel": function(i, title, th) {
        return $(th).text();//remove icons, etc
      }
      
    }); 
    
    //style it
    $(colvis.button()).addClass('btn-group').find('button').addClass('btn btn-white btn-info btn-bold')
    
    //and append it to our table tools btn-group, also add tooltip
    $(colvis.button())
    .prependTo('.tableTools-container .btn-group')
    .attr('title', 'Show/hide columns').tooltip({container: 'body'});
    
    //and make the list, buttons and checkboxed Ace-like
    $(colvis.dom.collection)
    .addClass('dropdown-menu dropdown-light dropdown-caret dropdown-caret-right')
    .find('li').wrapInner('<a href="javascript:void(0)" />') //'A' tag is required for better styling
    .find('input[type=checkbox]').addClass('ace').next().addClass('lbl padding-8');
  
  
    
    /////////////////////////////////
    //table checkboxes
    $('th input[type=checkbox], td input[type=checkbox]').prop('checked', false);
    
    //select/deselect all rows according to table header checkbox
    $('#dynamic-table > thead > tr > th input[type=checkbox]').eq(0).on('click', function(){
      var th_checked = this.checked;//checkbox inside "TH" table header
      
      $(this).closest('table').find('tbody > tr').each(function(){
        var row = this;
        if(th_checked) tableTools_obj.fnSelect(row);
        else tableTools_obj.fnDeselect(row);
      });
    });
    
    //select/deselect a row when the checkbox is checked/unchecked
    $('#dynamic-table').on('click', 'td input[type=checkbox]' , function(){
      var row = $(this).closest('tr').get(0);
      if(!this.checked) tableTools_obj.fnSelect(row);
      else tableTools_obj.fnDeselect($(this).closest('tr').get(0));
    });
    
  
    
    
      $(document).on('click', '#dynamic-table .dropdown-toggle', function(e) {
      e.stopImmediatePropagation();
      e.stopPropagation();
      e.preventDefault();
    });
    
    
    //And for the first simple table, which doesn't have TableTools or dataTables
    //select/deselect all rows according to table header checkbox
    var active_class = 'active';
    $('#simple-table > thead > tr > th input[type=checkbox]').eq(0).on('click', function(){
      var th_checked = this.checked;//checkbox inside "TH" table header
      
      $(this).closest('table').find('tbody > tr').each(function(){
        var row = this;
        if(th_checked) $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
        else $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
      });
    });
    
    //select/deselect a row when the checkbox is checked/unchecked
    $('#simple-table').on('click', 'td input[type=checkbox]' , function(){
      var $row = $(this).closest('tr');
      if(this.checked) $row.addClass(active_class);
      else $row.removeClass(active_class);
    });
  
    
  
    /********************************/
    //add tooltip for small view action buttons in dropdown menu
    $('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});
    
    //tooltip placement on right or left
    function tooltip_placement(context, source) {
      var $source = $(source);
      var $parent = $source.closest('table')
      var off1 = $parent.offset();
      var w1 = $parent.width();
  
      var off2 = $source.offset();
      //var w2 = $source.width();
  
      if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
      return 'left';
    }
  
  })
</script>

@endsection