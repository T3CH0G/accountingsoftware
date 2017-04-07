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
    {!! Form::label('subject', 'subject:', ['class' => 'control-label']) !!}
    {!! Form::textarea('subject', null, ['class' => 'form-control']) !!}
    {!! Form::hidden('quotation_id', 'test',  ['class' => 'form-control']) !!}
    <div class="input_fields_wrap">
    <div class="col-md-3">{!! Form::label('item', 'Item:', ['class' => 'control-label']) !!}</div>
    <div class="col-md-3">{!! Form::label('description', 'Description:', ['class' => 'control-label']) !!}</div>
    <div class="col-md-2">{!! Form::label('cost', 'Cost:', ['class' => 'control-label']) !!}</div>
    <div class="col-md-2">{!! Form::label('quantity', 'Quantity:', ['class' => 'control-label']) !!}</div>
    <div class="col-md-2"></div>
    <div class="col-md-3"><input type="text" name="item[]"></div>
    <div class="col-md-3"><input type="text" name="description[]"></div>
    <div class="col-md-2"><input type="text" name="cost[]"></div>
    <div class="col-md-2"><input type="text" name="quantity[]"></div>
    <div class="col-md-2"><button class="add_field_button">Add More Fields</button></div>
    </div>
    <br>
    <div class="col-md-6">
    {!! Form::label('created_at', 'Date:', ['class' => 'control-label']) !!}
    {!! Form::date('created_at', \Carbon\Carbon::now())!!}
    </div>
    <div class="col-md-6">
    {!! Form::label('discount', 'discount:', ['class' => 'control-label']) !!}
    {!! Form::number('discount', 0, ['class' => 'form-control']) !!}
    </div>
    <br>

</div>
<div class="col-md-12">
{!! Form::submit('Create New quotations', ['class' => 'btn btn-primary']) !!}
</div>
{!! Form::close() !!}
<hr>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
 <script src="{{ asset('js/addfield.js') }}"></script>
@endif
@stop