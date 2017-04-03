@extends('layouts.app')

@section('content')

@if (Auth::guest())
<hr>
<h1> Please login </h1>
<hr>

@else
<h1>Editing "{{ $quotation->content }}"</h1>
<p class="lead">Edit and save this quotation below, or <a href="{{ route('quotations.index') }}">go back to all quotations.</a></p>
<hr>

@include('partials.alerts.errors')

{!! Form::model($quotation, [
    'method' => 'PATCH',
    'route' => ['quotations.update', $quotation
   ->id]
]) !!}


<div class="form-group">
    {!! Form::label('client_id', 'client:', ['class' => 'control-label']) !!}
    {!! Form::select('client_id', $q, ['class' => 'form-control']) !!}
    <br>
    {!! Form::label('quotation_id', 'test',  ['class' => 'form-control']) !!}
    {!! Form::textarea('quotation_id', null, ['class' => 'form-control']) !!}
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
    {!! Form::number('discount', null, ['class' => 'form-control']) !!}
</div>

{!! Form::submit('Update quotation', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}
@endif
@stop