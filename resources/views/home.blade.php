@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" style="margin-top: 20px;">
        <div class="col-md-12">
            <h1>Tweets</h1>
            <ul class="list-group" style="margin-top: 10px;">
                @if(count($post_list) > 0)
                    @foreach($post_list as $post)
                        <li class="list-group-item">
                            <div class="media">
                                <img src="{{ asset('images/avatar.png') }}" class="mr-3" alt="..." style="width: 50px;">
                                <div class="media-body">
                                    @if($post -> users_id == Auth::user()->id)
                                        <a href="{{ url('posts') }}" style="text-decoration: none; color: #263238;"><h5 class="mt-0">{{ $post -> name }} (You)</h5></a>
                                    @else
                                        <h5 class="mt-0">{{ $post -> name }}</h5>
                                    @endif
                                    <p style="margin-bottom: 5px;">{{ $post -> description }}</p>
                                    <p style="color: #6C757D; font-size: 12px; margin-bottom: 0px;">{{ date('h:i', strtotime($post -> created_at)) }} • {{ date('m/d/y', strtotime($post -> created_at)) }}</p>
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