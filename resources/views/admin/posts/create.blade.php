@extends('layouts.admin')

@section('content')
	<h1>Create Posts</h1>
	<div class="row">
		<br>
		@include('includes.form_error')
		<form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
			@csrf
			<div class="form-group">
				<label for="title">
					Name:
				</label>
				<input type="text" name="title" class="form-control" placeholder="Post title"  value="{{old('name')}}">
			</div>
			<div class="form-group">
				<label for="category_id">
					Category:
				</label>
				<select name="category_id" class="form-control"  value="{{old('name')}}" required>
					<option value>Select Category</option>
					@if ($categorys)
						@foreach ($categorys as $category)
							<option value="{{ $category->id }}">{{ $category->name }}</option>
						@endforeach
					@endif
				</select>	
			</div>
			<div class="form-group">
				<label for="Photo">
					Photo:
				</label>
				<input type="file" name="photo_id" class="form-control">
			</div>
			<div class="form-group">
				<label for="body">
					Description:
				</label>
				<textarea name="body" cols="30" rows="10" class="form-control" placeholder="Post description.."></textarea>
			</div>
			<div class="form-group">
				<input type="submit" class="btn btn-primary" value="Create Post">
			</div>
		</form>
	</div>
@endsection
