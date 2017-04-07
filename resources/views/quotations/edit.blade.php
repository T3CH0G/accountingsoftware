@extends('layouts.app')

@section('content')

@if (Auth::guest())
<hr>
<h1> Please login </h1>
<hr>

@else
<h1>Editing {{ $quotation->quotation_id }}</h1>
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
    {!! Form::label('subject', 'subject:', ['class' => 'control-label']) !!}
    {!! Form::textarea('subject', null, ['class' => 'form-control']) !!}
    {!! Form::hidden('quotation_id', $quotation->quotation_id,  ['class' => 'form-control']) !!}
    @for($i = 0; $i < $number; $i++)
    <div class="input_fields_wrap">
        <div class="col-md-3">{!! Form::label('item', 'Item:', ['class' => 'control-label']) !!}</div>
        <div class="col-md-3">{!! Form::label('description', 'Description:', ['class' => 'control-label']) !!}</div>
        <div class="col-md-2">{!! Form::label('cost', 'Cost:', ['class' => 'control-label']) !!}</div>
        <div class="col-md-2">{!! Form::label('quantity', 'Quantity:', ['class' => 'control-label']) !!}</div>
        <div class="col-md-3"><input type="text" name="item[]" value="{{$quotation->item[$i]}}"></div>
        <div class="col-md-3"><input type="text" name="description[]" value="{{$quotation->description[$i]}}"></div>
        <div class="col-md-2"><input type="text" name="cost[]" value="{{$quotation->cost[$i]}}"></div>
        <div class="col-md-2"><input type="text" name="quantity[]" value="{{$quotation->quantity[$i]}}"></div>
        @endfor
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
{!! Form::submit('Update quotation', ['class' => 'btn btn-primary']) !!}
</div>
{!! Form::close() !!}
@endif
@stop