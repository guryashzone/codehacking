@extends('layouts.admin')

@section('content')
	<h1>Users</h1>
	@if(Session::has('deleted_user'))
		<div class="alert alert-danger">{{session('deleted_user')}}</div>
	@endif
	@if(Session::has('updated_user'))
		<div class="alert alert-success">{{session('updated_user')}}</div>
	@endif
	@if(Session::has('created_user'))
		<div class="alert alert-success">{{session('created_user')}}</div>
	@endif
	<table class="table table-stripe table-bordere">
		<thead>
			<tr>
				<th>ID</th>
				<th>Photo</th>
				<th>Name</th>
				<th>Email</th>
				<th>Role</th>
				<th>Active</th>
				<th>Created</th>
				<th>Updated</th>
			</tr>
		</thead>
		<tbody>
			@if($users)
				@foreach( $users as $user )
					<tr>
						<td>{{$user->id}}</td>
						<td><img src="{{ $user->photo ? $user->photo->file : 'http://placehold.it/50x50' }}" style="width:50px;height:50px;border-radius: 50%" alt="no photo"></td>
						<td><a href="{{ route('users.edit',$user->id) }}">{{$user->name}}</a></td>
						<td>{{$user->email}}</td>
						<td>{{$user->role->name}}</td>
						<td>{{$user->is_active ? 'Active' : 'Inactive'}}</td>
						<td>{{$user->created_at->diffForHumans()}}</td>
						<td>{{$user->updated_at->diffForHumans()}}</td>
					</tr>
				@endforeach
			@endif
		</tbody>
	</table>
@endsection