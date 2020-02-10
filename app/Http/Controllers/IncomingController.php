<?php

namespace App\Http\Controllers;


use App\Incoming;

use App\Customer;
use App\Labour;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class IncomingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(isset($request)){
            DB::table('incomings')
                ->where('id', $request->id)
                ->update(
                    ['status' => $request->status]
                );
        }

        $incomings = Incoming::with('customers')->with('labours')->paginate(10);

        return view('incomings.index')->with([
            'incomings' => $incomings
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::all();
        $labours = Labour::all();

        return view('incomings.create')->with([
            'customers' => $customers,
            'labours' => $labours,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Incoming $incomingModel)
    {

        $request['date'] = date("Y-m-d", strtotime($request['date']));
        $incomingModel->create($request->all());

        return redirect()->route('incomings.index')->withStatus(__('Incoming successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Incoming  $incoming
     * @return \Illuminate\Http\Response
     */
    public function show(Incoming $incoming)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Incoming  $incoming
     * @return \Illuminate\Http\Response
     */
    public function edit(Incoming $incoming)
    {
        $customers = Customer::all();
        $labours = Labour::all();

        return view('incomings.edit')->with([
            'incoming' => $incoming,
            'customers' => $customers,
            'labours' => $labours,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Incoming  $incoming
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Incoming $incoming)
    {
        $request['date'] = date("Y-m-d", strtotime($request['date']));
        $incoming->update($request->all());

        return redirect()->route('incomings.index')->withStatus(__('Incoming successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Incoming  $incoming
     * @return \Illuminate\Http\Response
     */
    public function destroy(Incoming $incoming)
    {
        $incoming->delete();

        return redirect()->route('incomings.index')->withStatus(__('Incoming successfully deleted.'));
    }
}
