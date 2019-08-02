@extends('layouts.admin')

@section('content')
	<h1>Create Posts</h1>
	<div class="row">
		@include('includes.form_error')
		<img src="http://placehold.it/1000x200" alt="" class="img-responsive img-rounded" id="preview_image" onclick="$('#photo_id').click()" style="cursor:pointer;width:100%;height:200px" title="Upload image">
		<br>
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
				<select name="category_id" class="form-control"  value="{{old('category_id')}}" required>
					<option value>Select Category</option>
					@if ($categorys)
						@foreach ($categorys as $category)
							<option value="{{ $category->id }}">{{ $category->name }}</option>
						@endforeach
					@endif
				</select>	
			</div>
			<div class="form-group hide">
				<label for="Photo">
					Photo:
				</label>
				<input type="file" id="photo_id" name="photo_id" class="form-control">
			</div>
			<div class="form-group">
				<label for="body">
					Description:
				</label>
				<textarea name="body" cols="30" rows="10" class="form-control" placeholder="Post description..">{{old('body')}}</textarea>
			</div>
			<div class="form-group">
				<input type="submit" class="btn btn-primary" value="Create Post">
			</div>
		</form>
	</div>
@endsection
@section('footer')
	<script src="{{ asset('js/custom-preview.js') }}"></script>
@endsection
