@extends('layouts.admin')

@section('content')
	<h1>Posts</h1>
	<div class="row">
		<div class="col-sm-12">
			<table class="table">
				<thead>
					<tr>
						<th>ID</th>
						<th>Photo</th>
						<th>Owner</th>
						<th>Category</th>
						<th>Title</th>
						<th>Body</th>
						<th>Created</th>
						<th>Updated</th>
					</tr>
				</thead>
				<tbody>
					@if($posts)
						@foreach ($posts as $post)
							<tr>
								<td>{{ $post->id }}</td>
								<td><img src="{{ $post->photo ? $post->photo->file : 'https://placehold.it/400x400'}}" style="width:100px;height:50px" alt=""></td>
								<td>{{ $post->user->name }}</td>
								<td>{{ $post->category->name }}</td>
								<td>{{ $post->title }}</td>
								<td>{{ $post->body }}</td>
								<td>{{ $post->created_at->diffForHumans() }}</td>
								<td>{{ $post->updated_at->diffForHumans() }}</td>
							</tr>
						@endforeach
					@endif
				</tbody>
			</table>
		</div>
	</div>
@endsection
