<?php

namespace App\Http\Controllers;

use App\Design;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DesignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if(isset($request)){
            DB::table('designs')
                ->where('id', $request->id)
                ->update(
                    ['status' => $request->status]
                );
        }

        $designs = Design::paginate(10);

        return view('designs.index')->with([
            'designs' => $designs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('designs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Design $designModel)
    {
        $designModel->create($request->all());

        return redirect()->route('designs.index')->withStatus(__('Design successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Design  $design
     * @return \Illuminate\Http\Response
     */
    public function show(Design $design)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Design  $design
     * @return \Illuminate\Http\Response
     */
    public function edit(Design $design)
    {
        return view('designs.edit')->with([
            'design' => $design
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Design  $design
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Design $design)
    {
        $design->update($request->all());

        return redirect()->route('designs.index')->withStatus(__('Design successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Design  $design
     * @return \Illuminate\Http\Response
     */
    public function destroy(Design $design)
    {
        $design->delete();

        return redirect()->route('designs.index')->withStatus(__('Design successfully deleted.'));
    }
}
