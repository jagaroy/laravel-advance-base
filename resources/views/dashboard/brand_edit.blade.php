@extends('aceadminv.app')

@section('content_title')
	<strong> Category Edit</strong>
@endsection

@section('content')

<div class="container">
	<form method="post" action="{{action('CategoryController@update', $id)}}">
		<div class="form-group row">
			{{csrf_field()}}
			<input name="_method" type="hidden" value="PATCH">
			<label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Title</label>
			<div class="col-sm-10">
				<input type="text" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="cat_name" name="cat_name" value="{{$category->cat_name}}">
			</div>
		</div>
		<div class="form-group row">
			<label for="smFormGroupInput" class="col-sm-2 col-form-label col-form-label-sm">Post</label>
			<div class="col-sm-10">
				<textarea name="cat_description" rows="8" cols="80">{{$category->cat_description}}</textarea>
			</div>
		</div>
		<div class="form-group row">
			<div class="col-md-2"></div>
			<button type="submit" class="btn btn-primary">Update</button>
		</div>
	</form>
</div>

    
@endsection