<?php

namespace App\Http\Controllers;

use App\Washing;
use App\Color;
use App\Size;
use App\Design;
use App\WashingItems;
use Illuminate\Http\Request;

class WashingItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $washingItem = WashingItems::with('washing')->with('colors')->with('size')->with('designs')->paginate(10);

        return view('washingItems.index')->with([
            'washingItems' => $washingItem
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $washings = Washing::all();
        $colors = Color::all();
        $sizes = Size::all();
        $designs = Design::all();

        return view('washingItems.create')->with([
            'washings' => $washings,
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
    public function store(Request $request, WashingItems $washingItem)
    {

        $washingItem->create($request->all());

        return redirect()->route('washingItems.index')->withStatus(__('Washing Item successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\WashingItems  $washingItems
     * @return \Illuminate\Http\Response
     */
    public function show(WashingItems $washingItems)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\WashingItems  $washingItems
     * @return \Illuminate\Http\Response
     */
    public function edit(WashingItems $washingItem)
    {
        $washings = Washing::all();
        $colors = Color::all();
        $sizes = Size::all();
        $designs = Design::all();

        return view('washingItems.edit')->with([
            'washingItems' => $washingItem,
            'washings' => $washings,
            'colors' => $colors,
            'sizes' => $sizes,
            'designs' => $designs,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\WashingItems  $washingItems
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WashingItems $washingItem)
    {
        $washingItem->update($request->all());

        return redirect()->route('washingItems.index')->withStatus(__('Washing Item successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\WashingItems  $washingItems
     * @return \Illuminate\Http\Response
     */
    public function destroy(WashingItems $washingItem)
    {
        $washingItem->delete();

        return redirect()->route('washingItems.index')->withStatus(__('Washing Item successfully deleted.'));
    }
}
