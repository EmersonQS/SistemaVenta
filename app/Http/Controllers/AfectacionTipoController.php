<?php

namespace App\Http\Controllers;

use App\Models\AfectacionTipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Validation\Rule;

class AfectacionTipoController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:afectacion_tipos_list')->only(['index']);
        $this->middleware('can:afectacion_tipos_create')->only(['store']);
        $this->middleware('can:afectacion_tipos_edit')->only(['show', 'update']);
        $this->middleware('can:afectacion_tipos_delete')->only(['destroy']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = AfectacionTipo::select(['codigo', 'nombre', 'descripcion', 'letra', 'porcentaje']);

            return DataTables::of($data)
                ->addColumn('action', function ($row) {
                    $editButton = Gate::allows('afectacion_tipos_edit')
                        ? view('components.button-edit', ['id' => $row->codigo])->render()
                        : '';

                    $deleteButton = Gate::allows('afectacion_tipos_delete')
                        ? view('components.button-delete', ['id' => $row->codigo])->render()
                        : '';

                    return $editButton . $deleteButton;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('afectacion-tipos.index');
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
        $data = $this->validateData($request);
        AfectacionTipo::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Registro creado satisfactoriamente'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $registro = AfectacionTipo::where('codigo', $id)->firstOrFail();
            return response()->json($registro);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Registro no encontrado'], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $this->validateData($request, $id);
        $registro = AfectacionTipo::where('codigo', $id)->firstOrFail();
        $registro->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Registro actualizado correctamente'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $registro = AfectacionTipo::findOrFail($id);
            $registro->delete();

            return response()->json([
                'success' => true,
                'message' => 'Registro eliminado correctamente'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al eliminar el registro'
            ], 500);
        }
    }

    protected function validateData(Request $request, $id = null)
    {
        return $request->validate([
            'codigo' => [
                'required',
                'string',
                'size:2',
                Rule::unique('afectacion_tipos', 'codigo')->ignore($id, 'codigo')
            ],
            'nombre' => 'required|string|max:3',
            'descripcion' => 'required|string|max:50',
            'letra' => 'required|string|size:1',
            'porcentaje' => 'required|numeric|between:0,99.99',
        ]);
    }

    public function select(Request $request)
    {
        $afectaciones = AfectacionTipo::select('codigo', 'descripcion')->get();
        return response()->json($afectaciones);
    }
}
