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
