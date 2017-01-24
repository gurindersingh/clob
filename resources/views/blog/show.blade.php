@extends('blog.layout', ['title' => $post->title])

@section('content')
	<article class="post">
		<div class="container">
			<header>
				<p class="post-info">
					{{ $post->published_at->format('F j, Y') }}
					@if($post->read_time_minutes)
						<span class="separator">&bull;</span>
						@lang('blog.read_time', ['minutes' => $post->read_time_minutes])
					@endif
				</p>
				<h1>{{ $post->title }}</h1>
				@if($post->subtitle)
					<h2>{{ $post->subtitle }}</h2>
				@endif
			</header>
			<div class="post-content">
				{!! $post->html_content !!}
			</div>
			<div class="meta">
				{{ trans('blog.meta', ['user' => $post->user->name, 'date' => $post->published_at->format('jS F Y @ g:ia')]) }}
				@if($post->tags)
					<br><strong>@lang('blog.tags')</strong> {{ $post->tags }}
				@endif
				<div class="post-links clearfix">
					@if($next_post)
						<div class="pull-right">
							<small class="text-muted">@lang('blog.next')</small>
							<a href="{{ route('blog.show', $next_post) }}">{{ $next_post->title }}</a>
						</div>
					@endif
					@if($previous_post)
						<small class="text-muted">@lang('blog.previous')</small>
						<a href="{{ route('blog.show', $previous_post) }}">{{ $previous_post->title }}</a>
					@endif
				</div>
			</div>
			<p class="back"><a href="{{ route('blog.index') }}">@lang('blog.back')</a></p>
		</div>
	</article>
@endsection

@section('scripts')
	<script src="{{ elixir('js/blog.js') }}"></script>
@endsection