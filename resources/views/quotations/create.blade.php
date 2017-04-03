@extends('layouts.app')

@section('content')

@include('partials.alerts.errors')

@if (Auth::guest())
<hr>
<h1> Please login </h1>
<hr>

@else

<h1>Add a New Quotation</h1>
<p class="lead">Add to your quotation list below.</p>
{!! Form::open([
    'route' => 'quotations.store'
]) !!}

<div class="form-group">
    {!! Form::label('client_id', 'client:', ['class' => 'control-label']) !!}
    {!! Form::select('client_id', $q, ['class' => 'form-control']) !!}
    <br>
    {!! Form::hidden('quotation_id', 'test',  ['class' => 'form-control']) !!}
    {!! Form::label('item', 'item:', ['class' => 'control-label']) !!}
    {!! Form::textarea('item', null, ['class' => 'form-control']) !!}
    {!! Form::label('subject', 'subject:', ['class' => 'control-label']) !!}
    {!! Form::textarea('subject', null, ['class' => 'form-control']) !!}
    {!! Form::label('description', 'description:', ['class' => 'control-label']) !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
    {!! Form::label('cost', 'cost:', ['class' => 'control-label']) !!}
    {!! Form::number('cost', null, ['class' => 'form-control']) !!}
    {!! Form::label('quantity', 'quantity:', ['class' => 'control-label']) !!}
    {!! Form::number('quantity', null,  ['class' => 'form-control']) !!}
    {!! Form::label('created_at', 'Date:', ['class' => 'control-label']) !!}
    {!! Form::date('created_at', \Carbon\Carbon::now())!!}
    <br>
    {!! Form::label('discount', 'discount:', ['class' => 'control-label']) !!}
    {!! Form::number('discount', 0, ['class' => 'form-control']) !!}
</div>

{!! Form::submit('Create New quotations', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}
<hr>
@endif
@stop