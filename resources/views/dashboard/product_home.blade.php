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

	@if (Session::has('message'))
		<div class="row">
		    <div class="col-md-6 col-md-offset-2 alert alert-info">
		    	<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>
				{{Session::get('message')}}
		    </div>
		</div>
	@endif
	
	<!-- if there are creation errors, they will show here -->
	@if ($errors->any())
		<div class="row">
		    <div class="alert alert-danger col-md-6 col-md-offset-2">
		    	<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		</div>
	@endif


</div>





@endsection