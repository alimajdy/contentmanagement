@extends('layouts/admin')

@section('content')

    <table class="table">
        <theah>
            <tr>
                <th>Id</th>
                <th>name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Status</th>
                <th>Created</th>
                <th>Updated</th>
            </tr>
        </theah>
        <tbody>
        @if($users)
            @foreach($users as $user)
                <tr>
                    <td> {{$user->id}} </td>
                    <td> {{$user->name}} </td>
                    <td> {{$user->email}} </td>
                    <td> {{$user->role->name}} </td>
                    <td> {{$user->is_active == 1 ?'Active':'Not Active'}} </td>
                    <td> {{$user->created_at->diffForHumans()}} </td>
                    <td> {{$user->updated_at->diffForHumans()}} </td>

                </tr>
            @endforeach
        @endif

        </tbody>
    </table>
@endsection