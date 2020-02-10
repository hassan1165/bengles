<?php

namespace App\Http\Controllers;

use App\CustomerPayment;
use App\Customer;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class CustomerPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customerPayments = CustomerPayment::with('customers')->paginate(10);

        return view('customerPayments.index')->with([
            'customerPayments' => $customerPayments
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

        return view('customerPayments.create')->with([
            'customers' => $customers,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, CustomerPayment $customerPayment)
    {
        $customerPayment->create($request->all());

        return redirect()->route('customerPayments.index')->withStatus(__('Customer Payment successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CustomerPayment  $customerPayment
     * @return \Illuminate\Http\Response
     */
    public function show(CustomerPayment $customerPayment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CustomerPayment  $customerPayment
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomerPayment $customerPayment)
    {
        $customers = Customer::all();

        return view('customerPayments.edit')->with([
            'customerPayment' => $customerPayment,
            'customers' => $customers,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CustomerPayment  $customerPayment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CustomerPayment $customerPayment)
    {
        $customerPayment->update($request->all());

        return redirect()->route('customerPayments.index')->withStatus(__('Customer Payment successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CustomerPayment  $customerPayment
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomerPayment $customerPayment)
    {
        $customerPayment->delete();

        return redirect()->route('customerPayments.index')->withStatus(__('Customer Payment successfully deleted.'));
    }
}
