@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if($posts != '[]')
                @foreach($posts as $post)
                <div class="mb-5">
                    <div class="user">
                        <div class="avatar"><img src="{{ asset('/images/nophoto_n.png') }}" alt="noImage" class="rounded wh-100"></div>
                        <span class="abs">{{ $post->user->name }}</span>
                    </div>
                    <div class="card shdw-3">
                        <div class="card-header">
                            {{ $post->title }} <br>
                            <span class="date">{{ $post->updated_at->diffForHumans() }}</span>
                        </div>
                        <div class="p-2">
                            {!! $post->body !!}
                        </div>
                        @if($post->file != null)
                        <div>
                            <img src="{!! $post->file !!}" alt="{!! $post->title !!}" class="img-fluid picture">
                        </div>
                        @endif
                    </div>

                    <div class="actions mt-2 card shdw-3 w-50" style="display: block">
                        <div class="w-33 p-1 pl-3">
                            <a href="#" class="like"><i class="fas fa-heart"></i> <span class="amount">1</span></a>
                        </div>
                        <div class="w-33 p-1 pl-3">
                            <a href="#" class="comment"><i class="fas fa-comment"></i> <span class="amount">0</span></a>
                        </div>
                        <div class="w-33 p-1 pl-3">
                            <a href="#" class="repost"><i class="fas fa-share"></i> <span class="amount">0</span></a>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <h3>Here nothing to show...</h3>
            @endif
        </div>
    </div>
</div>
@endsection
