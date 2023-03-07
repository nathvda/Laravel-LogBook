@extends('dashboard/layout')
@section('content')

<h3>Categories</h3>
<table class="dashboard_table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $category)
        <tr>
            <td>{{$category->name}}</td>
            <td>
                <form method="post" action="/category/delete">
                    @csrf
                    @method('delete')
                    <button type="submit" value="{{$category->id}}" name="category_id">delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<h3>Locations</h3>
<table class="dashboard_table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($locations as $location)
        <tr>
            <td>{{$location->location}}</td>
            <td>
                <form method="post" action="/location/delete">
                    @csrf
                    @method('delete')
                    <button type="submit" value="{{$location->id}}" name="location_id">delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<h3>Users</h3>
<table class="dashboard_table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Username</th>
            <th>Joined on</th>
            <th>Current Role</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->username}}</td>
            <td>{{$user->created_at}}</td>
            <td>{{$user->role}}</td>
            <td>
                <form method="post" action="/user/delete">
                    @csrf
                    @method('delete')
                    <button type="submit" value="{{$user->id}}" name="user_id">delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection