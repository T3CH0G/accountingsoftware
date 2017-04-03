<?php

namespace App\Http\Controllers;

use App\Client;
use App\Quotation;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\DB;

class ClientsController extends Controller
{
    public function index()
    {
    $clients = Client::all();
    return view('clients.index',compact('clients'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create');
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
        'name' => 'required',
        'company_name' => 'required',
        'registration_number' => 'required',
        'address' => 'required',
    ]);

    $input = $request->all();

    Client::create($input);

    Session::flash('flash_message', 'Client successfully added!');

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
    $Client = Client::findOrFail($id);
    $Quotations = DB::table('quotations')->where('client_id', $id)->get();
    return view('clients.show',compact('Quotations'))->withClient($Client);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Clients = Client::findOrFail($id);
        return view('clients.edit')->withClient($Clients);
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
    $Client = Client::findOrFail($id);

     $this->validate($request, [
        'name' => 'required',
        'company_name' => 'required',
        'registration_number' => 'required',
        'address' => 'required'
    ]);

    $input = $request->all();

    $Client->fill($input)->save();

    Session::flash('flash_message', 'Client successfully added!');

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
    $Client = Client::findOrFail($id);

    $Client->delete();

    Session::flash('flash_message', 'Client successfully deleted!');

    return redirect()->route('Clients.index');
    }

    public function clientname($name)
    {
    $Clients = DB::table('Clients')->where('client_name', $name)->get();
    return view('pages.Clients',compact('Clients'));
    }

    public function clientcompany($company)
    {
    $Clients = DB::table('Clients')->where('client_company', $company)->get();
    return view('pages.Clients',compact('Clients'));
    }
}
