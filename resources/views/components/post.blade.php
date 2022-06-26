@props(['post' => $post])

		<div class="mb-4">
			<a href="{{ route('users.posts', $post->user) }}" class="font-bold">{{ $post->user->name }}</a> <span class="text-gray-600 text-small">{{ $post->created_at->diffForHumans() }}</span>
					
			<!-- post -->
			<p class="mb-4">{{ $post->body }}</p>

			<!-- like -->
			<div class="flex items-center mb-4">
				@auth
				@if (!$post->likedBy(auth()->user()))
					<form action="{{ route('posts.likes', $post) }}" method="post" class="mr-1">
						@csrf
						<button class="text-blue-500" type="submit">like</button>
					</form>
				@else
				<!-- dislike -->
					<form action="{{ route('posts.likes', $post) }}" method="post" class="mr-1">
						@csrf
						@method('DELETE')
						<button class="text-blue-500" type="submit">dislike</button>
					</form>
				@endif

				@endauth

					<!-- jum like -->
					<span>{{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count()) }}</span>
			</div>

			<!-- delete -->
			@can('delete', $post)
			<div class="mb-2">
				<form action="{{ route('posts.destroy', $post) }}" method="post">
				@csrf
				@method('DELETE')
					<button type="submit" class="text-blue-500">delete post</button>
				</form>
			</div>
			@endcan

		</div>	