@extends('layouts.app')

@section('content')
@if (Auth::guest())
<hr>
<h1> Please login </h1>
<hr>

@else

<h1> Client View </h1>
<h2>Name:</h2> 
<p>{{ $client->name }}</p>
<h2>Company: </h2> 
<p>{{ $client->company_name }}</p>
<h2>Registration Number</h2> 
<p>{{ $client->registration_number }}</p>
<h2> Address: </h2> 
<p>{{ $client->address }}</p>

<div class="row">
    <div class="col-md-6">
        <a href="{{ route('clients.index') }}" class="btn btn-info">Back to all clients</a>
        <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-primary">Edit client</a>
    </div>
    <div class="col-md-6 text-right">
        {!! Form::open([
            'method' => 'DELETE',
            'route' => ['clients.destroy', $client->id]
        ]) !!}
            {!! Form::submit('Delete this client?', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    </div>
</div>
<hr>

<h2> Quotations associated with Client </h2>
<br>
@foreach ($Quotations as $quotation)
<h3> Quotation ID: {{$quotation->quotation_id}} </h3>
<h3> Item: </h3> 
<p>{{ $quotation->item }}</p>
<h3> Subject: </h3> 
<p>{{ $quotation->subject }}</p>
    <p>
        <a href="{{ route('quotations.show', $quotation->id) }}" class="btn btn-info">View quotation</a>
    </p>
<hr>
@endforeach
@endif
@stop