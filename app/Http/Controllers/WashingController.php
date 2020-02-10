<?php

namespace App\Http\Controllers;

use App\Washing;

use App\Customer;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class WashingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(isset($request)){
            DB::table('washings')
                ->where('id', $request->id)
                ->update(
                    ['status' => $request->status]
                );
        }

        $washings = Washing::with('customers')->paginate(10);

        return view('washings.index')->with([
            'washings' => $washings
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

        return view('washings.create')->with([
            'customers' => $customers,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Washing $washingModel)
    {
        $request['date'] = date("Y-m-d", strtotime($request['date']));
        $washingModel->create($request->all());

        return redirect()->route('washings.index')->withStatus(__('Washing successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Washing  $washing
     * @return \Illuminate\Http\Response
     */
    public function show(Washing $washing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Washing  $washing
     * @return \Illuminate\Http\Response
     */
    public function edit(Washing $washing)
    {
        $customers = Customer::all();

        return view('washings.edit')->with([
            'washing' => $washing,
            'customers' => $customers,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Washing  $washing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Washing $washing)
    {
        $request['date'] = date("Y-m-d", strtotime($request['date']));
        $washing->update($request->all());

        return redirect()->route('washings.index')->withStatus(__('Washing successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Washing  $washing
     * @return \Illuminate\Http\Response
     */
    public function destroy(Washing $washing)
    {
        $washing->delete();

        return redirect()->route('washings.index')->withStatus(__('Washing successfully deleted.'));
    }
}
