@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row" style="margin-top: 20px;">
		<div class="col-md-12">
			<h1>Your Tweets</h1>
			<a href="{{ url('posts/create') }}" class="btn btn-secondary" style="position: absolute; top: 10px; right: 15px;">Create</a>
			<ul class="list-group" style="margin-top: 10px;">
				@if(count($post_list) > 0)
					@foreach($post_list as $post)
						<li class="list-group-item">
							<div class="media">
								<img src="{{ asset('images/avatar.png') }}" class="mr-3" alt="..." style="width: 50px;">
								<div class="media-body">
									<h5 class="mt-0">{{ $post -> name }}</h5>
									<p style="margin-bottom: 5px;">{{ $post -> description }}</p>
									<p style="color: #6C757D; font-size: 12px;">{{ date('h:i', strtotime($post -> created_at)) }} • {{ date('m/d/y', strtotime($post -> created_at)) }}</p>
									<a href="{{ url('posts/'.$post -> id.'/edit') }}" style="color: #1279BD; text-decoration: none;">Edit</a>&nbsp;
									<a href="{{ url('posts/'.$post -> id.'/delete') }}" style="color: #E04A3A; text-decoration: none;">Delete</a>
								</div>
								<p style="color: #6C757D;">{{ ($post -> remark == 1) ? 'Private' : 'Public' }}</p>
							</div>
						</li>
					@endforeach
				@else
					<div class="alert alert-secondary" role="alert">
						<p class="lead" style="text-align: center; margin-bottom: 0px;">Empty</p>
					</div>
				@endif
				
			</ul>
		</div>
	</div>
</div>
@endsection