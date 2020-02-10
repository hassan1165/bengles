<?php

namespace App\Http\Controllers;

use App\Color;
use App\Design;
use App\Incoming;
use App\IncomingItems;
use App\Size;
use Illuminate\Http\Request;

class IncomingItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $incomingItems = IncomingItems::with('incomings')->with('colors')->with('size')->with('designs')->paginate(10);

        return view('incomingItems.index')->with([
            'incomingItems' => $incomingItems
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

        return view('incomingItems.create')->with([
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
    public function store(Request $request, IncomingItems $incomingItems)
    {

        $incomingItems->create($request->all());

        return redirect()->route('incomingItems.index')->withStatus(__('Incoming Item successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\IncomingItems  $incomingItems
     * @return \Illuminate\Http\Response
     */
    public function show(IncomingItems $incomingItems)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\IncomingItems  $incomingItems
     * @return \Illuminate\Http\Response
     */
    public function edit(IncomingItems $incomingItems)
    {
        $incomings = Incoming::all();
        $colors = Color::all();
        $sizes = Size::all();
        $designs = Design::all();

        return view('incomingItems.edit')->with([
            'incomingItems' => $incomingItems,
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
     * @param  \App\IncomingItems  $incomingItems
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, IncomingItems $incomingItems)
    {
        $incomingItems->update($request->all());

        return redirect()->route('incomingItems.index')->withStatus(__('Incoming Item successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\IncomingItems  $incomingItems
     * @return \Illuminate\Http\Response
     */
    public function destroy(IncomingItems $incomingItems)
    {
        $incomingItems->delete();

        return redirect()->route('incomingItems.index')->withStatus(__('Incoming Item successfully deleted.'));
    }
}
