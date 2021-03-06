@extends('layouts.app')

@section('styles')
<style media="screen">
    a:hover {
        text-decoration: none;
    }
</style>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <a href="/create" class="btn btn-primary br-0">Create a new post</a>
                @if($reposts != '[]')
                    <div class="p-3">
                        @foreach($reposts as $repost)
                            <div class="card mt-3">
                                <div class="card-header">
                                    {{ $repost->comment }}
                                    <a href="/repost/{{ $repost->post->id }}" class="right" style="font-size:30px;">&times;</a><br>
                                    <span class="date">{{ $repost->updated_at->diffForHumans() }}</span>
                                </div>
                                <div class="p-2">
                                    {{ $repost->post->title }} <br>
                                    <span class="date">{{ $repost->post->updated_at->diffForHumans() }}</span><br><hr>
                                    {!! $repost->post->body !!}
                                </div>
                                @if($repost->post->file != null)
                                <div>
                                    <img src="{!! $repost->post->file !!}" alt="{!! $repost->post->title !!}" class="img-fluid picture">
                                </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                @endif
                @if($posts != '[]')
                    <div class="p-3">
                        @foreach($posts as $post)
                            <div class="card mt-3">
                                <div class="card-header">
                                    {{ $post->title }}
                                    <a href="/edit/{{ $post->id }}" class="right"><i class="fas fa-pencil-alt"></i></a><br>
                                    <a href="/delete/{{ $post->id }}" class="right" style="font-size:30px;">&times;</a><br>
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
