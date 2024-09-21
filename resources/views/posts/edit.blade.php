@extends('layouts.app')

@section('content')
<div class="container">
	<h1>Edit Post</h1>

	<!-- Check for validation errors -->
	@if ($errors->any())
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif

	<!-- Edit Post Form -->
	<form action="{{ route('posts.update', $post->id) }}" method="POST">
		@csrf
		@method('PUT')

		<div class="form-group">
			<label for="title">Title:</label>
			<input type="text" name="title" class="form-control" value="{{ old('title', $post->title) }}" required>
		</div>

		<div class="form-group mt-3">
			<label for="date_of_post">Date of Post:</label>
			<input type="date" name="date_of_post" class="form-control" value="{{ old('date_of_post', $post->date_of_post) }}" required>
		</div>

		<div class="form-group mt-3">
			<label for="content">Content:</label>
			<textarea name="text" class="form-control" rows="5" required>{{ old('content', $post->text) }}</textarea>
		</div>

		<div class="form-group mt-3">
			<button type="submit" class="btn btn-primary">Update Post</button>
		</div>
	</form>
</div>
@endsection
