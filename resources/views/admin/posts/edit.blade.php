@extends('layouts.admin')

@section('content')
	<h1>Edit Post</h1>
	<div class="row">
		@include('includes.form_error')
		<img src="{{ $post->photo ? $post->photo->file : 'http://placehold.it/400x400' }}" alt="" class="img-responsive img-rounded" id="preview_image" onclick="$('#photo_id').click()" style="cursor:pointer;width:100%;height:200px" title="Upload image">
		<br>
		<form action="{{ route('posts.update',$post->id) }}" method="POST" enctype="multipart/form-data">
			@csrf
			@method('PATCH')
			<div class="form-group">
				<label for="title">
					Name:
				</label>
				<input type="text" name="title" class="form-control" placeholder="Post title"  value="{{old('name') ? old('name'):$post->title}}">
			</div>
			<div class="form-group">
				<label for="category_id">
					Category:
				</label>
				<select name="category_id" id="category_id" class="form-control"  value="{{old('category_id')}}" required>
					<option value>Select Category</option>
					@if ($categorys)
						@foreach ($categorys as $category)
							<option value="{{ $category->id }}">{{ $category->name }}</option>
						@endforeach
					@endif
				</select>	
			</div>
			<div class="form-group hide">
				{{-- <label for="photo_id">
					Upload photo_id:
				</label> --}}
				<input type="file" name="photo_id" id="photo_id" class="form-control">
			</div>
			<div class="form-group">
				<label for="body">
					Description:
				</label>
				<textarea name="body" cols="30" rows="10" class="form-control" placeholder="Post description..">{{old('body') ? old('body'): $post->body}}</textarea>
			</div>
			<div class="form-group">
				<input type="submit" class="btn btn-success col-sm-6" value="Update Post">
			</div>
		</form>
		<form action="{{ route('posts.destroy',$post->id) }}" method="POST">
				@csrf
				@method('DELETE')
				<input type="submit" class="btn-danger btn col-sm-6" value="Delete Poost">
			</form>
	</div>
	<br>
@endsection
@section('footer')
	<script src="{{ asset('js/custom-preview.js') }}"></script>
	<script>
		$(function(){
			$("#category_id").val({{ $post->category_id }});
		});
	</script>
@endsection
