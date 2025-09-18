<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ComprobanteSerie;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Validation\Rule;

class ComprobanteSerieController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:comprobante_tipos_list')->only(['index']);
        $this->middleware('can:comprobante_tipos_create')->only(['store']);
        $this->middleware('can:comprobante_tipos_edit')->only(['show', 'update']);
        $this->middleware('can:comprobante_tipos_delete')->only(['destroy']);
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = ComprobanteSerie::with(['tipo'])
                ->select(['id', 'comprobante_tipo_codigo', 'serie', 'correlativo']);


            return DataTables::of($data)
                ->addColumn('action', function ($row) {
                    $editButton = Gate::allows('comprobante_tipos_edit')
                        ? view('components.button-edit', ['id' => $row->id])->render()
                        : '';

                    $deleteButton = Gate::allows('comprobante_tipos_delete')
                        ? view('components.button-delete', ['id' => $row->id])->render()
                        : '';

                    return $editButton . $deleteButton;
                })
                ->addColumn('tipo', function ($row) {
                    return optional($row->tipo)->descripcion;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('comprobante-series.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $this->validateData($request);

        ComprobanteSerie::create($data);

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
            $registro = ComprobanteSerie::where('id', $id)->firstOrFail();
            return response()->json($registro);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Registro no encontrado'], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $this->validateData($request, $id);
        $registro = ComprobanteSerie::where('id', $id)->firstOrFail();
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
            $registro = ComprobanteSerie::findOrFail($id);
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
            'comprobante_tipo_codigo' => [
                'required',
                'string',
                'max:2',
                Rule::exists('comprobante_tipos', 'codigo')
            ],
            'serie' => 'required|string|max:4',
            'correlativo' => 'required|integer|min:0',
        ]);
    }
}
