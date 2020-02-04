@extends('layouts.app')

@section('title')
    Create page
@endsection

@section('content')

    <div class="col-md-8 col-md-offset-2">

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        {{--@if(!$user->name)--}}
            {{--{!! Form::model($user, ['route' => ['store'], 'class'=>'form-horizontal'  ]) !!}--}}
        {{--@else--}}
            {{--{!! Form::model($user, ['route' => ['update', $user->id], 'method'=>'PUT', 'class'=>'form-horizontal'  ]) !!}--}}
        {{--@endif--}}
        <div class="form-group">
            {!! Form::label('user_name', 'User name:', ['class'=>'control-label col-sm-3']); !!}
            <div class="col-sm-9">
                {!! Form::text('user_name', null, ['class'=>'form-control']) !!}
            </div>
        </div>
            <div class="form-group">
                {!! Form::label('name', 'Name:', ['class'=>'control-label col-sm-3']); !!}
                <div class="col-sm-9">
                    {!! Form::text('name', null, ['class'=>'form-control']) !!}
                </div>
            </div>
        <div class="form-group">
            {!! Form::label('email', 'Email:', ['class'=>'control-label col-sm-3']); !!}
            <div class="col-sm-9">
                {!! Form::email('email', null, ['class'=>'form-control']) !!}
            </div>
        </div>
            <div class="form-group">
                {!! Form::label('text', 'Text:', ['class'=>'control-label col-sm-3']); !!}
                <div class="col-sm-9">
                    {!! Form::text('text', null, ['class'=>'form-control']) !!}
                </div>
            </div>
            {{--<div class="form-group">--}}
                {{--{!! Form::label('file', 'File:', ['class'=>'control-label col-sm-3']); !!}--}}
                {{--<div class="col-sm-9">--}}
                    {{--{!! Form::text('file', null, ['class'=>'form-control']) !!}--}}
                {{--</div>--}}
            {{--</div>--}}
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
                {!! Form::submit('Save new user in base', ['class'=>'btn btn-info']) !!}
            </div>
        </div>

        {!! Form::close() !!}
    </div>

@endsection