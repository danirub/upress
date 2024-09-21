@extends('layouts.app')

@section('content')
<div class="container">
	<h1>Apple News Articles</h1>
	 
	<div class="mt-3">
		@if(count($articles) > 0)
			@foreach($articles as $article)
				<div>
					<h2>{{ $article['title'] }}</h2>
					<p>{{ $article['description'] }}</p>
					<a href="{{ $article['url'] }}" target="_blank">Read more</a>
				</div>
				<hr>
			@endforeach
		@else
			<p>No articles found.</p>
		@endif
	</div>
</div>
@endsection
