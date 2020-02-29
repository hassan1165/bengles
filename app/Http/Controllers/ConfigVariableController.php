<?php

namespace App\Http\Controllers;

use App\ConfigVariable;
use Illuminate\Http\Request;

class ConfigVariableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $configVariable = ConfigVariable::paginate(5);

        return view('configVariable.index')->with([
            'configVariables' => $configVariable
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('configVariable.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, ConfigVariable $configVariable)
    {
        $configVariable->create($request->all());

        return redirect()->route('configVariable.index')->withStatus(__('Config Variable successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ConfigVariable  $configVariable
     * @return \Illuminate\Http\Response
     */
    public function show(ConfigVariable $configVariable)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ConfigVariable  $configVariable
     * @return \Illuminate\Http\Response
     */
    public function edit(ConfigVariable $configVariable)
    {
        return view('configVariable.edit')->with([
            'configVariable' => $configVariable
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ConfigVariable  $configVariable
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ConfigVariable $configVariable)
    {
        $configVariable->update($request->all());

        return redirect()->route('configVariable.index')->withStatus(__('Config Variable successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ConfigVariable  $configVariable
     * @return \Illuminate\Http\Response
     */
    public function destroy(ConfigVariable $configVariable)
    {
        $configVariable->delete();

        return redirect()->route('configVariable.index')->withStatus(__('Config Variable successfully deleted.'));
    }
}
