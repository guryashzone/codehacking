@extends('layouts.admin')

@section('content')
	<h1>Categories</h1>
		@if (Session::has('category'))
			<div class="alert alert-success">
				{{session('category')}}
			</div>
		@endif
	<div class="row">
		<div class="col-sm-6">
			@include('includes.form_error')
			<form action="{{route('categories.store')}}" method="POST" enctype="multipart/form-data">
				@csrf
				<div class="form-group">
					<label for="name">
						Name:
					</label>
					<input type="text" name="name" id="name" class="form-control" value="{{old('name')}}" required>
				</div>
				<div class="form-group">
					<input type="submit" class="btn btn-primary" value="Create">
				</div>
			</form>
		</div>
		<div class="col-sm-6">
			<table class="table">
				<thead>
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Created</th>
						<th>Updated</th>
					</tr>
				</thead>
				<tbody>
					@if ($categories)
						@foreach ($categories as $category)
							<tr>
								<td>{{$category->id}}</td>
								<td><a href="{{ route('categories.edit',$category->id) }}">{{$category->name}}</a></td>
								<td>{{$category->created_at->diffForHumans()}}</td>
								<td>{{$category->updated_at->diffForHumans()}}</td>
							</tr>
						@endforeach
					@endif
				</tbody>
			</table>
		</div>
	</div>
@endsection
