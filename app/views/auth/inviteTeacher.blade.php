@extends('layouts.default')

@section('content')
    @include('includes.alert')
    {{ Form::open(['route' => 'teacher.doInvite', 'method' => 'post', 'class' => 'form-signin']) }}
    {{ Form::email('email', null, array('class' => 'form-control', 'placeholder' => 'Email', 'autofocus')) }}
    {{Form::hidden('admin_id',Auth::user()->id)}}
    {{ Form::submit('Invite Member', array('class' => 'btn btn-lg btn-login btn-block')) }}
    {{ Form::close() }}
@stop