<?php

namespace App\Http\Controllers;

use App\Models\AfectacionTipo;
use Illuminate\Http\Request;

class AfectacionTipoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(AfectacionTipo $afectacionTipo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AfectacionTipo $afectacionTipo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AfectacionTipo $afectacionTipo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AfectacionTipo $afectacionTipo)
    {
        //
    }
    public function select(Request $request)
    {
        $afectaciones = AfectacionTipo::select('codigo', 'descripcion')->get();
        return response()->json($afectaciones);
    }
}
