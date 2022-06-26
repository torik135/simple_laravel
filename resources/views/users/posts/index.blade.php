@extends('layouts.app')

@section('judul')
	{{$user->name}}
@endsection

@section('content')

<div class="flex justify-center">
	<div class="w-8/12 bg-white p-6 rounded-lg mb-4">

		<h1 class="text-2xl font-medium mb-1">Username: {{ $user->name }}</h1>
		<p>Posted {{ $posts->count() }} {{ Str::plural('post', $posts->count()) }}  and have {{ $user->receivedLikes->count() }} like</p>

	</div>
</div>	

		<!-- <div class="bg-white p-6 rounded-lg"> -->
		<!-- this one -->

		@if($posts->count())
			@foreach($posts as $post)
			<div class="flex justify-center mb-4">
				<div class="w-8/12 bg-white p-6 rounded-lg mb-4">
					<hr class="mb-6">
					<x-post :post="$post"/>
				</div>
			</div>
			@endforeach
			<div class="flex justify-center mb-4">
				<div class="w-8/12 bg-white p-6 rounded-lg mb-4">
					{{ $posts->links() }}
				</div>
			</div>
		@else
		<div class="flex justify-center mb-4">
			<div class="w-8/12 bg-white p-6 rounded-lg mb-4">
				<p>{{ $user->name }} Tidak punya post!</p>
			</div>
		</div>
		
		@endif
		<!-- </div> -->
		

	<!-- </div>
</div> -->

@endsection