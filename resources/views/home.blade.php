@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <a href="/create" class="btn btn-primary br-0">Create a new post</a>
                @if($posts != '[]')
                    <div class="p-3">
                        @foreach($posts as $post)
                            <div class="card mt-3">
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
                        @endforeach
                    </div>
                @else
                <div class="m-3">
                    <h3 class="center">Here nothing to show...</h3>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
