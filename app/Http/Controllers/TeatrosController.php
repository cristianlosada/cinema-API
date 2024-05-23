<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use App\Models\Teatro;

class TeatrosController extends Controller
{
    public function store(Request $request)
    {
        try {
        // Validar los campos enviados por el request
        $validator = Validator::make($request->all(), [
            'nombre'   => 'required|string',
            'descripcion'   => 'required|string',
            'numero_sala'        => 'required|string',
            'capacidad'   => 'required|string',
            'tipo_pantalla'        => 'required|string',
            'caracteristicas_especiales'        => 'required|string',
        ]);

        // Comprobar si hay errores de validación
        if ($validator->fails()) {
            return response()->json(['message' => 'Error de validación', 'errors' => $validator->errors()], 400);
        }

        // Crear una nueva película con los datos proporcionados en el request
        $teatro                  = new Teatro();
        $teatro->nombre          = $request->input('nombre');
        $teatro->descripcion     = $request->input('descripcion');
        $teatro->numero_sala     = $request->input('numero_sala');
        $teatro->capacidad       = $request->input('capacidad');
        $teatro->tipo_pantalla   = $request->input('tipo_pantalla');
        $teatro->caracteristicas_especiales = $request->input('caracteristicas_especiales');

        $teatro->save();

        // Devolver una respuesta HTTP 201 Created con los datos de la película creada
        return response()->json(['message' => 'teatro creada correctamente', 'data' => $teatro], 200);
        } catch (\Throwable $e) {
        // Manejar el error y registrar el mensaje de error en el archivo de registro
        \Log::error('Error al crear película: ' . $e->getMessage());
        // Devolver una respuesta HTTP 500 Internal Server Error
        return response()->json(['message' => 'Ocurrió un error interno en el servidor.'.$e->getMessage()], 500);
        }
    }

    public function obtenerTeatros()
    {
        try {
            $confiteria = Teatro::get();

            return response()->json(['message' => 'OK', 'data' => $confiteria], 200);
        } catch (\Throwable $e) {
            \Log::error('Error al hacer la solicitud a la API: ' . $e->getMessage());
            return response()->json(['message' => 'Ocurrió un error interno en el servidor.'], 500);
        }
    }

    public function obtenerTeatroId($id)
    {
        try {
            $confiteria = Teatro::where('id_sala', '=', $id)->first();

            return response()->json(['message' => 'OK', 'data' => $confiteria], 200);
        } catch (\Throwable $e) {
            \Log::error('Error al hacer la solicitud a la API: ' . $e->getMessage());
            return response()->json(['message' => 'Ocurrió un error interno en el servidor.'.$e->getMessage()], 500);
        }
    }
}
