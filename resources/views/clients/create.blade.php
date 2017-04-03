@extends('layouts.app')

@section('content')

@include('partials.alerts.errors')

<h1>Add a New client</h1>
<p class="lead">Add to your client list below.</p>
{!! Form::open([
    'route' => 'clients.store'
]) !!}

<div class="form-group">
    {!! Form::label('name', 'name:', ['class' => 'control-label']) !!}
    {!! Form::textarea('name', null, ['class' => 'form-control']) !!}
    {!! Form::label('company_name', 'company_name:', ['class' => 'control-label']) !!}
    {!! Form::textarea('company_name', null, ['class' => 'form-control']) !!}
    {!! Form::label('registration_number', 'registration_number:', ['class' => 'control-label']) !!}
    {!! Form::textarea('registration_number', null, ['class' => 'form-control']) !!}
    {!! Form::label('address', 'address:', ['class' => 'control-label']) !!}
    {!! Form::textarea('address', null, ['class' => 'form-control']) !!}
</div>

{!! Form::submit('Create New clients', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}
<hr>

@stop