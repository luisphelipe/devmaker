@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <post-form v-on:new-post="posts.splice(0, 0, $event)"></post-form>
                
            <div class="card mt-2">
            <div v-if="onlyFav" class="card-header">Favoritos</div>
            <div v-else class="card-header">Ultimos Posts</div>
                <div class="card-body">
                    <div v-for="post in posts">
                        <post-item v-show="!onlyFav || favorites.includes(post.id)" :title="post.title" :name="post.name" :fav="favorites.includes(post.id)" :key="post.id" :chav="post.id" v-on:toggle-fav="toggleFav($event)">
                            @{{ post.body }}
                        </post-item>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
@endsection
