@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Posts</div>
                
                <form  action="/post" method="POST">
                    @csrf
                    <div class="d-flex justify-content-center align-items-center mt-1 border-bottom">
                        <div class="form-group w-75">
                            <input class="form-control my-2" type="text" name="title" placeholder="Titulo">
                            <textarea class="form-control" name="body" placeholder="Conteudo"></textarea>
                        </div>

                        <button class="btn mx-2" type="submit">Postar</button>
                    </div>
                </form>

                <div class="card-body">
                @foreach ($posts as $post)
                    <div class="d-flex justify-content-between">
                        <h5 class="card-title">
                            {{ $post->title }}
                        </h5>
                        <form action="/favorite" method="POST" id="favorite-form-{{ $post->id }}">
                            @csrf

                            <input type="number" name="post_id" value="{{ $post->id }}" hidden>

                            <a href="#" onclick="event.preventDefault(); 
                                document.getElementById('favorite-form-{{ $post->id }}').submit();">

                            @if (in_array($post->id, $favorites))
                                <img src="{{ asset('/svg/heart.svg') }}" alt="Fav" style="width: 15px">
                            @else
                                <img src="{{ asset('/svg/heart-outline.svg') }}" alt="Fav" style="width: 15px">
                            @endif
                            </a>
                            <button class="btn" type="submit" hidden></button>
                            
                        </form>
                    </div>
                    <p class="card-text">
                        {{ $post->body }}
                    </p>
                    <hr>
                @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
