@extends('layouts.admin')

@section('content')
    <h1>Create Post</h1>

    {!! Form::open(['method' => 'post' ,'action'=>'AdminPostsController@store', 'files' => 'true']) !!}

    <div class="form-group">
        {!! Form::label('title', 'Title') !!}
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
        @if($errors->has('title'))
            <strong>{{ $errors->first('title') }}</strong>
        @endif

    </div>
    <div class="form-group">
        {!! Form::label('category_id', 'Category') !!}
        {!! Form::select('category_id', ['' => 'Choose option']+$category, null, ['class' => 'form-control']) !!}

        @if($errors->has('category_id'))
            <strong>{{ $errors->first('category_id') }}</strong>
        @endif
    </div>

    <div class="form-group">
        {!! Form::label('photo_id', 'Photo') !!}
        {!! Form::file('photo_id', null, ['class' => 'form-control']) !!}

        @if($errors->has('photo_id'))
            <strong>{{ $errors->first('photo_id') }}</strong>
        @endif
    </div>

    <div class="form-group">
        {!! Form::label('body', 'Description') !!}
        {!! Form::textarea('body', null, ['class' => 'form-control']) !!}

        @if($errors->has('body'))
            <strong>{{ $errors->first('body') }}</strong>
        @endif
    </div>

    <div class="form-group">
        {!! Form::submit('Create Post', ['class' => 'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
@endsection