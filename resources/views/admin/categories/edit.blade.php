@extends('layouts.admin')

@section('content')
	<h1>Categories</h1>
	<div class="row">
		<div class="col-sm-6">
			@include('includes.form_error')
			<form action="{{route('categories.update',$category->id)}}" method="POST">
				@csrf
				@method('PATCH')
				<div class="form-group">
					<label for="name">
						Name:
					</label>
					<input type="text" name="name" id="name" class="form-control" value="{{old('name')?old('name'):$category->name}}" required>
				</div>
				<div class="form-group">
					<input type="submit" class="btn btn-primary col-sm-6" value="Update">
				</div>
			</form>
			<form action="{{ route('categories.destroy',$category->id) }}" method="POST">
				@csrf
				@method('DELETE')
				<input type="submit" class="btn-danger btn col-sm-6" value="Delete Category">
			</form>
		</div>
	</div>
@endsection
