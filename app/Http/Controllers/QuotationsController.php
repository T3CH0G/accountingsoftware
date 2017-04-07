<?php

namespace App\Http\Controllers;

use App\Quotation;
use App\Client;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\DB;

class QuotationsController extends Controller
{
    public function index()
    {
    $quotations = Quotation::all();
    return view('quotations.index',compact('quotations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::all();
        $q = [];
        foreach ($clients as $client)
            {
                array_push($q,[($client->id)=>($client->name)]);
            }
        return view('quotations.create',compact('q'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    $this->validate($request, [
        'client_id' => 'required',
        'quotation_id' => 'required',
        'subject' => 'required',
        'item' => 'required',
        'description' => 'required',
        'cost' => 'required',
        'quantity' => 'required',
        'created_at' => 'required',
    ]);

    $client_id = $request->client_id;
    $job_id = DB::table('clients')->where('id', $client_id)->value('job_number');
    $job_id = $job_id + 1;
    $update = DB::table('clients')->where('id', $client_id);
    $update->update(['job_number' => $job_id]);

        if ($job_id <= 9)
        {
            $job_id='0'.$job_id;
        }

    $cid ="0"."$client_id";
    $input = $request->all();
    $input['item']=serialize($input['item']);
    $input['description']=serialize($input['description']);
    $input['cost']=serialize($input['cost']);
    $input['quantity']=serialize($input['quantity']);

        if($client_id < 10)
        {
            $input['quotation_id'] = 'QUO0007'.$cid.$job_id;
        }
        elseif ($client_id >= 10) 
        {
            $input['quotation_id'] = 'QUO0007'.$client_id.$job_id;
        }

    Quotation::create($input);

    Session::flash('flash_message', 'quotation successfully added!');

    return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $quotation = Quotation::findOrFail($id);
        $cid=$quotation->client_id;
        $client=Client::findOrFail($cid);
        $quotation['item']=unserialize($quotation['item']);
        $quotation['description']=unserialize($quotation['description']);
        $quotation['cost']=unserialize($quotation['cost']);
        $quotation['quantity']=unserialize($quotation['quantity']);
        $number=count($quotation['item']);
        return view('quotations.show', compact('number'))->withQuotation($quotation)->withClient($client);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $quotation = Quotation::findOrFail($id);
        $clients = Client::all();
        $q = [];
        foreach ($clients as $client)
            {
                array_push($q,[($client->id)=>($client->name)]);
            }
        $quotation['item']=unserialize($quotation['item']);
        $quotation['description']=unserialize($quotation['description']);
        $quotation['cost']=unserialize($quotation['cost']);
        $quotation['quantity']=unserialize($quotation['quantity']);
        $number=count($quotation['item']);
        return view('quotations.edit',compact('q','number'))->withQuotation($quotation);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    $Quotation = Quotation::findOrFail($id);

     $this->validate($request, [
        'client_id' => 'required',
        'quotation_id' => 'required',
        'subject' => 'required',
        'item' => 'required',
        'description' => 'required',
        'cost' => 'required',
        'quantity' => 'required',
        'created_at' => 'required',
    ]);

    $input = $request->all();
    $input['item']=serialize($input['item']);
    $input['description']=serialize($input['description']);
    $input['cost']=serialize($input['cost']);
    $input['quantity']=serialize($input['quantity']);

    $Quotation->fill($input)->save();

    Session::flash('flash_message', 'Quotation successfully added!');

    return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    $Quotation = Quotation::findOrFail($id);

    $Quotation->delete();

    Session::flash('flash_message', 'Quotation successfully deleted!');

    return redirect()->route('quotations.index');
    }

    public function clientname($name)
    {
    $quotations = DB::table('quotations')->where('client_name', $name)->get();
    return view('pages.quotations',compact('quotations'));
    }

    public function clientcompany($company)
    {
    $quotations = DB::table('quotations')->where('client_company', $company)->get();
    return view('pages.quotations',compact('quotations'));
    }
}
