@extends('layouts.app')

@section('title')
    form page
@endsection

@section('content')
    <a href="{{url('create')}}"><button class="btn btn-info">Create new record</button></a><br><br>

    <table id="user" class="display table">
        <thead>
        <tr>
            <th>№</th>
            <th>User name</th>
            <th>Name</th>
            <th>E-Mail</th>
            <th>Text</th>
            <th>IP</th>
            <th>File</th>
            <th>Date</th>
        </tr>
        </thead>
        <tbody>
        @foreach($user as $value)

            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{ $value->user_name }}</td>
                <td>{{ $value->name }}</td>
                <td>{{ $value->email }}</td>
                <td>{{ $value->text }}</td>
                <td>{{ $value->ip }}</td>
                <td>{{ $value->file }}</td>
                <td>{{ $value->created_at }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection