@extends('layouts.app')

@section('styles')
<style media="screen">
    a {
        font-size: 18px !important;
    }
    a:hover {
        text-decoration: none;
    }
    button {
        background: transparent;
        border: 0;
        color: #007aff;
    }
    .full-text {
        /* font-size: 16px; */
    }
</style>
@endsection

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
                            @if (in_array($post->id, $myLikes))
                            <a href="{!! $post->id !!}" class="dislike">
                                <i class="fas fa-heart"></i>
                                @csrf
                                <span class="amount">{!! $post->likes !!}</span>
                            </a>
                            @else
                            <a href="{!! $post->id !!}" class="like">
                                <i class="far fa-heart"></i>
                                @csrf
                                <span class="amount">{!! $post->likes !!}</span>
                            </a>
                            @endif
                        </div>
                        <div class="w-33 p-1 pl-3">
                            <button type="button" class="comment" data-toggle="modal" data-target="#modal" postId="{{ $post->id }}">
                                <i class="fas fa-comment"></i>
                                @csrf
                                <span class="amount">{!! $post->comments !!}</span>
                            </button>
                        </div>
                        <div class="w-33 p-1 pl-3">
                            <a href="#" class="repost"><i class="fas fa-share"></i> <span class="amount">{!! $post->reposts !!}</span></a>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <h3 class="center">Here nothing to show...</h3>
            @endif
        </div>
    </div>
</div>
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body"></div>
            <hr>
            <div class="container">
                <h6>Comments:</h6>
            </div>
            <div class="container" id="all-comments"></div>
            <form action="/comment" class="p-3" method="post" id="send">
                @csrf
                <input type="hidden" name="whom" value="" id="whome">
                <div class="input-group">
                    <img src="{{ asset('/images/nophoto_n.png') }}" alt="Unnamed" class="rounded-circle mr-3" width="40" height="40">
                    <input type="text" class="form-control" placeholder="type something..." aria-label="Recipient's username" aria-describedby="basic-addon2" id="commentBody" autocomplete="off" >
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit"><i class="fas fa-paper-plane"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="{{ asset('/js/likes.js') }}" charset="utf-8"></script>
<script src="{{ asset('/js/comments.js') }}" charset="utf-8"></script>
<script src="{{ asset('/js/addComment.js') }}" charset="utf-8"></script>
<script src="{{ asset('/js/sendComment.js') }}" charset="utf-8"></script>
@endsection
