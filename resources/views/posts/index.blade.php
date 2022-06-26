@extends('layouts.app')

@section('judul')
	Pos
@endsection

@section('content')

<div class="flex justify-center">
	<div class="w-8/12 bg-white p-6 rounded-lg mb-4">
		<form action="{{ route('posts') }}" method="post" class="mb-6">
			@csrf
			<div class="mb-4">
				<label for="body" class="sr-only">Body</label>
				<textarea name="body" id="body" cols="30" rows="4" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror" placeholder="Post Something"></textarea>

				@error('body')
				<div class="text-red-500 mt-2 text-sm">
					{{ $message }}
				</div>
				@enderror
			</div>

			<div class="">
				<button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium">Post</button>
			</div>
		</form>

	</div>

</div>
		<div class="flex justify-center mb-4">
			<div class="w-8/12 bg-white p-6 rounded-lg mb-4">
			{{ $posts->links() }}
			</div>
		</div>

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
			<hr class="mb-6">
				<p>There is no post!</p>
			</div>
			</div>
		@endif

	<!-- </div>
</div> -->

@endsection
