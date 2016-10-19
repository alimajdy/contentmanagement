@extends('layouts.admin')

@section('content')
    <h1> Edit Users</h1>
        <div class="col-sm-3">
            <img  class="img-responsive  img-rounded" src="{{$user->photo?$user->photo->file:"http://placehold.it/480x480"}}" alt="">
        </div>


    <div class="col-sm-9">
        {!! Form::model($user, ['method' => 'patch', 'action' => ['AdminUsersController@update', $user->id] , 'files' => true]) !!}
        <div class="form-group">
            {!! Form::label('name', 'Name') !!}
            {!! Form::text('name' ,null ,['class' => 'form-control']) !!}

            @if ($errors->has('name'))
                <strong>{{ $errors->first('name') }}</strong>
            @endif
        </div>

        <div class="form-group">
            {!! Form::label('email', 'Email') !!}
            {!! Form::email('email', null, ['class' => 'form-control']) !!}

            @if($errors->has('email'))
                <strong>{{ $errors->first('email') }}</strong>
            @endif
        </div>

        <div class="form-group">
            {!! Form::label('role_id', 'Role') !!}
            {!! Form::select('role_id', $roles, null, ['class' => 'form-control']) !!}

            @if($errors->has('role_id'))
                <strong>{{ $errors->first('role_id') }}</strong>
            @endif
        </div>


        <div class="form-group">
            {!! Form::label('is_active', 'Status') !!}
            {!! Form::select('is_active',[1 => 'Active', 0 => 'Not Active'], null, ['class' => 'form-control']) !!}

            @if($errors->has('is_active'))
                <strong>{{ $errors->first('is_active') }}</strong>
            @endif
        </div>

        <div class="form-group">
            {!! Form::label('photo_id', 'choose file') !!}
            {!! Form::file('photo_id', null, ['class' => 'form-control']) !!}

            @if($errors->has('photo_id'))
                <strong>{{ $errors->first('photo_id') }}</strong>
            @endif
        </div>

        <div class="form-group">
            {!! Form::label('password', 'Password') !!}
            {!! Form::password('password', ['class' => 'form-control']) !!}

            @if($errors->has('password'))
                <strong>{{ $errors->first('password') }}</strong>
            @endif
        </div>

        <div class="form-group">
            {!! Form::submit('Update User' ,['class' => 'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}

        @if(count($errors)>0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)

                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>

        @endif
    </div>
@endsection


