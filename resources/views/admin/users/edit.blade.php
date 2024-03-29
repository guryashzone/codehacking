@extends('layouts.admin')

@section('content')
	<h1>Edit users</h1>
	<div class="row">
		<div class="col-sm-3">
			<img src="{{ $user->photo ? $user->photo->file : 'http://placehold.it/400x400' }}" alt="" class="img-responsive img-rounded" id="preview_image" onclick="$('#photo_id').click()" style="cursor:pointer" title="Upload image">
		</div>
		<div class="col-sm-9">
			@include('includes.form_error')
			<form action="{{route('users.update',$user->id)}}" method="POST" enctype="multipart/form-data">
				@csrf
				@method('PATCH')
				<div class="form-group">
					<label for="name">
						Name:
					</label>
					<input type="text" name="name" id="name" class="form-control" value="{{old('name') ? old('name') : $user->name}}">
				</div>
				<div class="form-group">
					<label for="email">
						Email:
					</label>
					<input type="email" name="email" id="email" class="form-control" value="{{old('email') ? old('email') : $user->email}}">
				</div>
				<div class="form-group">
					<label for="role_id">
						Role:
					</label>
					<select name="role_id" id="role_id" class="form-control"  value="{{old('role_id') ? old('role_id') : 0}}">
						<option value disabled>-- Select role --</option>
						@foreach ($roles as $role)
							<option value="{{$role->id}}">{{$role->name}}</option>
						@endforeach	
					</select>
				</div>
				<div class="form-group">
					<label for="status">
						Status:
					</label>
					<select name="is_active" id="is_active" class="form-control" value="{{ old('is_active') ? old('is_active') : $user->is_active }}">
						<option value="1">Active</option>
						<option value="0">Not active</option>
					</select>
				</div>
				<div class="form-group">
					<label for="password">
						Password:
					</label>
					<input type="password" name="password" id="password" class="form-control">
				</div>
				<div class="form-group hide">
					{{-- <label for="photo_id">
						Upload photo_id:
					</label> --}}
					<input type="file" name="photo_id" id="photo_id" class="form-control">
				</div>
				<div class="form-group">
					<input type="submit" class="btn btn-primary col-sm-6" value="Update User">
				</div>
			</form>
			<form action="{{ route('users.destroy',$user->id) }}" method="POST">
				@csrf
				@method('DELETE')
				<input type="submit" class="btn-danger btn col-sm-6" value="Delete User">
			</form>
		</div>
	</div>
@endsection
@section('footer')
	<script src="{{ asset('js/custom-preview.js') }}"></script>
	<script>
		$(function(){
			$("#role_id").val({{ $user->role_id }});
		});
	</script>
@endsection