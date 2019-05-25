@extends('aceadminv.app')

@section('content_title')
	<strong> Category Create</strong>
@endsection

@section('content')

<div class="container">
	<hr>
	<div class="row">
		@if ($errors->any())
		    <div class="alert alert-danger col-md-6 col-md-offset-2">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif
	</div>
	<div class="row">		
		<form method="post" class="form-horizontal" action="{{url('categories')}}">
			<div class="form-group">
				{{csrf_field()}}
				<label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg control-label">Category Name:</label>
				<div class="col-sm-6">
					<input type="text" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="title" name="cat_name">
				</div>
			</div>
			<div class="form-group">
				<label for="smFormGroupInput" class="col-sm-2 col-form-label col-form-label-sm control-label">Category Description:</label>
				<div class="col-sm-8">
					<textarea name="cat_description" rows="8" cols="70"></textarea>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-2"></div>
				<input type="submit" class="btn btn-primary" value="      Save      " />
			</div>
		</form>
	</div>
</div>
    
@endsection