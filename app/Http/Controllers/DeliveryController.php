<?php

namespace App\Http\Controllers;

use App\Delivery;
use App\Customer;
use App\Labour;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class DeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(isset($request)){
            DB::table('deliveries')
                ->where('id', $request->id)
                ->update(
                    ['status' => $request->status]
                );
        }

        $deliveries = Delivery::with('customers')->with('labours')->paginate(10);

        return view('deliveries.index')->with([
            'deliveries' => $deliveries
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

        return view('deliveries.create')->with([
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
    public function store(Request $request, Delivery $deliveryModel)
    {
        $request['date'] = date("Y-m-d", strtotime($request['date']));
        $deliveryModel->create($request->all());

        return redirect()->route('deliveries.index')->withStatus(__('Delivery successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function show(Delivery $delivery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function edit(Delivery $delivery)
    {
        $customers = Customer::all();
        $labours = Labour::all();

        return view('deliveries.edit')->with([
            'delivery' => $delivery,
            'customers' => $customers,
            'labours' => $labours,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Delivery $delivery)
    {
        $request['date'] = date("Y-m-d", strtotime($request['date']));
        $delivery->update($request->all());

        return redirect()->route('deliveries.index')->withStatus(__('Delivery successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Delivery $delivery)
    {
        $delivery->delete();

        return redirect()->route('deliveries.index')->withStatus(__('Delivery successfully deleted.'));
    }
}
