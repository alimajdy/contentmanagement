@extends('layouts.admin')

@section('content')
    <h1>Posts Page</h1>

    <table class="table table-bordered table-hover table-strip">

        <thead>
        <tr>
            <th>Id</th>
            <th>Owner</th>
            <th>Photo</th>
            <th>Category</th>
            <th>title</th>
            <th>Body</th>
            <th>Created</th>
            <th>Updated</th>
        </tr>
        </thead>
        <tbody>
        @if($posts)
            @foreach($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->user->name }}</td>
                    <td><img width="80" height="50" src="{{ $post->photo?$post->photo->file:"http://placehold.it/50" }}" alt=""></td>
                    <td>{{ $post->category?$post->category->name:'Uncategorized' }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->body }}</td>
                    <td>{{ $post->created_at->diffForHumans() }}</td>
                    <td>{{ $post->updated_at->diffForHumans() }}</td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
@endsection