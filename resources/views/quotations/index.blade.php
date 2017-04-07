@extends('layouts.app')

@section('content')

@include('partials.alerts.errors')

@if (Auth::guest())
<hr>
<h1> Please login </h1>
<hr>

@else

<h1> Quotations </h1>
<hr>
<body>
@foreach ($quotations as $quotation)
<h3> Quotation ID: {{$quotation->quotation_id}} </h3>
<h3> Subject: </h3> 
<p>{{ $quotation->subject }}</p>
<h3> Date: </h3> 
<p>{{ $quotation->created_at }}</p>
    <p>
        <a href="{{ route('quotations.show', $quotation->id) }}" class="btn btn-info">View quotation</a>
        <a href="{{ route('quotations.edit', $quotation->id) }}">edit</a>
    </p>
<hr>
@endforeach
</body>
@endif
@endsection
