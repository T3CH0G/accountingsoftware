@extends('layouts.app')

@section('content')

<h3> Quotation_id: </h3> 
<p>{{ $quotation->quotation_id }}</p>
<h3> Item: </h3> 
<p>{{ $quotation->item }}</p>
<h3> Subject: </h3> 
<p>{{ $quotation->subject }}</p>
<h3> Description: </h3> 
<p>{!! $quotation->description !!}</p>
<h3> Cost: </h3> 
<p>{{ $quotation->cost }}</p>
<h3> Quantity: </h3> 
<p>{{ $quotation->quantity }}</p>
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