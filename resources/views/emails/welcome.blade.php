<html>
<head></head>
@foreach ($quotations as $quotation)
------------------------------------------
<body>
<h1> The Techy Hub </h1>
<h2> Client Name: </h2> 
<p>{{ $quotation->client_name }}</p>
<h2> Client Company: </h2> 
<p>{{ $quotation->client_company }}</p>
<h2> Item: </h2> 
<p>{{ $quotation->item }}</p>
<h2> Subject: </h2> 
<p>{{ $quotation->subject }}</p>
<h2> Description: </h2> 
<p>{!! $quotation->description !!}</p>
<h2> Cost: </h2> 
<p>{{ $quotation->cost }}</p>
<h2> Quantity: </h2> 
<p>{{ $quotation->quantity }}</p>
<h2> Date: </h2> 
<p>{{ $quotation->created_at }}</p>
</body>
------------------------------------------
@endforeach
</html>