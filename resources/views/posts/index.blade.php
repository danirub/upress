@extends('layouts.app')

@section('content')
<div class="container">
	<h1>Posts</h1>
	@if (Auth::check())
		<a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Create New Post</a>
	@endif
	<div class="mt-3">
		@if ($posts->count())
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Title</th>
						<th>Date</th>
						 
							<th>Actions</th>
						
					</tr>
				</thead>
				<tbody>
					@foreach ($posts as $post)
						<tr>
							<td>{{ $post->title }}</td>
							<td>{{ $post->date_of_post }}</td>
							
								<td>
									@if (Auth::check())
										<a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning btn-sm">Edit</a>
										<form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
											@csrf
											@method('DELETE')
											<button type="submit" class="btn btn-danger btn-sm">Delete</button>
										</form>
									@endif	
 
								</td>
							
						</tr>
					@endforeach
				</tbody>
			</table>
		@else
			<p>No posts available.</p>
		@endif
	</div>
</div>
@endsection
