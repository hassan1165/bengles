<?php

namespace App\Http\Controllers;

use App\Labour;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class LabourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if(isset($request)){
            DB::table('labours')
                ->where('id', $request->id)
                ->update(
                    ['status' => $request->status]
                );
        }

        $labours = Labour::paginate(10);

        return view('labours.index')->with([
            'labours' => $labours
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('labours.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Labour $labourModel)
    {
        $labourModel->create($request->all());

        return redirect()->route('labours.index')->withStatus(__('Labour successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Labour  $labour
     * @return \Illuminate\Http\Response
     */
    public function show(Labour $labour)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Labour  $labour
     * @return \Illuminate\Http\Response
     */
    public function edit(Labour $labour)
    {
        return view('labours.edit')->with([
            'labour' => $labour
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Labour  $labour
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Labour $labour)
    {
        $labour->update($request->all());

        return redirect()->route('labours.index')->withStatus(__('Labour successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Labour  $labour
     * @return \Illuminate\Http\Response
     */
    public function destroy(Labour $labour)
    {
        $labour->delete();

        return redirect()->route('labours.index')->withStatus(__('Labour successfully deleted.'));
    }
}
