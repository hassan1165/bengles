<?php

namespace App\Http\Controllers;

use App\DeliveryItems;
use App\Incoming;
use App\Color;
use App\Size;
use App\Design;
use Illuminate\Http\Request;

class DeliveryItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deliveryItems = DeliveryItems::with('incomings')->with('colors')->with('size')->with('designs')->paginate(10);

        return view('deliveryItems.index')->with([
            'deliveryItems' => $deliveryItems
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $incomings = Incoming::all();
        $colors = Color::all();
        $sizes = Size::all();
        $designs = Design::all();

        return view('deliveryItems.create')->with([
            'incomings' => $incomings,
            'colors' => $colors,
            'sizes' => $sizes,
            'designs' => $designs,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, DeliveryItems $deliveryItems)
    {
        $deliveryItems->create($request->all());

        return redirect()->route('deliveryItems.index')->withStatus(__('Delivery Item successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DeliveryItems  $deliveryItems
     * @return \Illuminate\Http\Response
     */
    public function show(DeliveryItems $deliveryItems)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DeliveryItems  $deliveryItems
     * @return \Illuminate\Http\Response
     */
    public function edit(DeliveryItems $deliveryItem)
    {
        $incomings = Incoming::all();
        $colors = Color::all();
        $sizes = Size::all();
        $designs = Design::all();

        return view('deliveryItems.edit')->with([
            'deliveryItem' => $deliveryItem,
            'incomings' => $incomings,
            'colors' => $colors,
            'sizes' => $sizes,
            'designs' => $designs,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DeliveryItems  $deliveryItems
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DeliveryItems $deliveryItem)
    {

        $deliveryItem->update($request->all());

        return redirect()->route('deliveryItems.index')->withStatus(__('Delivery Item successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DeliveryItems  $deliveryItems
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeliveryItems $deliveryItem)
    {
        $deliveryItem->delete();

        return redirect()->route('deliveryItems.index')->withStatus(__('Delivery Item successfully deleted.'));
    }
}
