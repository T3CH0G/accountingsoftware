@extends('layouts.app')

@section('content')

<h3> Quotation_id: </h3> 
<p>{{ $quotation->quotation_id }}</p>
<h3> Subject </h3>
<p>{{ $quotation->subject }}</p>
<div class="col-md-3">Item:</div>
<div class="col-md-3">Description:</div>
<div class="col-md-3">Cost:</div>
<div class="col-md-3">Quantity:</div>
@for($i = 0; $i < $number; $i++)
<div class="col-md-3">{{ $quotation->item[$i] }}</div
><div class="col-md-3">{{ $quotation->description[$i] }}</div>
<div class="col-md-3">{{ $quotation->cost[$i]}}</div>
<div class="col-md-3">{{ $quotation->quantity[$i] }}</div>
@endfor
<h3> Date: </h3> 
<p>{{ $quotation->created_at }}</p>

<div class="row">
    <div class="col-md-6">
        <a href="{{ route('quotations.index') }}" class="btn btn-info">Back to all quotations</a>
        <a href="{{ route('quotations.edit', $quotation->id) }}" class="btn btn-primary">Edit quotation</a>
    </div>
    <div class="col-md-6 text-right">
        {!! Form::open([
            'method' => 'DELETE',
            'route' => ['quotations.destroy', $quotation->id]
        ]) !!}
            {!! Form::submit('Delete this quotation?', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    </div>
</div>
<hr>

<h2> Quotations associated with Client </h2>
<br>
<h2> Client Name:</h2>
<h3> {{$client->name}}</p>
<h3> Client Company: </h3> 
<p>{{ $client->company_name}}</p>

<a href="{{ route('clients.show', $client->id) }}" class="btn btn-info">View Client</a>

@stop