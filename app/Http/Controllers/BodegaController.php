<?php

namespace App\Http\Controllers;

use App\Models\Bodega;
use App\Models\Ciudad;
use App\Models\Sede;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BodegaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bodegas = Bodega::paginate();

        return view('bodega.index', compact('bodegas'))
            ->with('i', (request()->input('page', 1) - 1) * $bodegas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bodega = new Bodega();
        $bodega->bodecierre = Bodega::BODEGA_ABIERTA;

        $sedes = Sede::all();
        $ciudades = Ciudad::all();
        $usuarios = Usuario::all();
        return view('bodega.create', compact('bodega', 'sedes', 'ciudades', 'usuarios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'sede' => 'required|exists:sedes,id',
            'ciudad' => 'required|exists:ciudades,id',
            'usuario' => 'required|exists:usuarios,id',
            'bodenomb' => 'required',
            'bodeabrv' => 'required',
            'bodedirec' => 'required',
            'bodeindice' => 'required',
            'bodecierre' => 'required|in:1,0',
            'bodeestado' => 'required|in:A,I',
            'bodeuscr' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('bodegas/create')
                ->withErrors($validator)
                ->withInput();
        }

        $request->merge(['sede_id' => $request->sede]); //remplace field
        $request->merge(['ciudad_id' => $request->ciudad]);
        $request->merge(['usuario_id' => $request->usuario]);

        $campos = $request->all();

        $empleado = Bodega::create($campos);

        return redirect()->route('bodegas.index')
            ->with('success', 'Empleado creado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bodega  $bodega
     * @return \Illuminate\Http\Response
     */
    public function show(Bodega $bodega)
    {
        return view('bodega.show', compact('bodega'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bodega  $bodega
     * @return \Illuminate\Http\Response
     */
    public function edit(Bodega $bodega)
    {
        $sedes = Sede::all();
        $ciudades = Ciudad::all();
        $usuarios = Usuario::all();
        return view('bodega.edit', compact('bodega', 'sedes', 'ciudades', 'usuarios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bodega  $bodega
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bodega $bodega)
    {

        $validator = Validator::make($request->all(), [
            'sede' => 'required|exists:sedes,id',
            'ciudad' => 'required|exists:ciudades,id',
            'usuario' => 'required|exists:usuarios,id',
            'bodenomb' => 'required',
            'bodeabrv' => 'required',
            'bodedirec' => 'required',
            'bodeindice' => 'required',
            'bodecierre' => 'required|in:1,0',
            'bodeestado' => 'required|in:A,I',
            'bodeuscr' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('bodegas/edit')
                ->withErrors($validator)
                ->withInput();
        }

        $request->merge(['sede_id' => $request->sede]); //remplace field
        $request->merge(['ciudad_id' => $request->ciudad]);
        $request->merge(['usuario_id' => $request->usuario]);

        $bodega->fill($request->all());

        $bodega->save();

        return redirect()->route('bodegas.index')
            ->with('success', 'Bodega Editada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bodega  $bodega
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Bodega $bodega)
    {
        $bodega->delete();
        if ($request->ajax()) {
            return response()->json(['message' => 'Bodega eliminada']);
        }
        return redirect()->route('bodegas.index')
            ->with('success', 'Bodega eliminada');
    }
}
